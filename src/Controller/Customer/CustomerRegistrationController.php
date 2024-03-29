<?php

namespace App\Controller\Customer;

use App\Entity\User;
use App\Services\HandleImageService;
use App\Services\CookieService;
use App\Entity\ContentCollection;
use App\Form\RegistrationFormType;
use App\Security\ChunAuthenticator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Security\Http\Authentication\UserAuthenticatorInterface;

class CustomerRegistrationController extends AbstractController
{
    #[Route('/customer/register', name: 'app_register')]
    public function register(Request $request, UserPasswordHasherInterface $userPasswordHasher, UserAuthenticatorInterface $userAuthenticator, ChunAuthenticator $authenticator, HandleImageService $handleImage, EntityManagerInterface $entityManager,
    CookieService $cookieService): Response
    {
        $session = $cookieService->checkAndSetCookieNoRepeat($request);
        $user = new User();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            if ($form["agreeTerms"]->getData() === true)
            {
                $user->agreeTerms();
            }
            $user->setPassword(
            $userPasswordHasher->hashPassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );

            /** @var UploadedFile $file */
            $file = $form->get('file')->getData();
            if ($file)
            {
                $handleImage->save($file, $user, true);
            }
            else
            {
                $handleImage->saveDefault($user);
            }
            $entityManager->persist($user);
            $contentCollection = new ContentCollection();
            $contentCollection->setUser($user);
            $entityManager->persist($contentCollection);
            $entityManager->flush();
            // do anything else you need here, like send an email

            return $userAuthenticator->authenticateUser(
                $user,
                $authenticator,
                $request
            );
        }

        return $this->render('customer/registration/register.html.twig', [
            'registrationForm' => $form->createView(),
            'session' => $session
        ]);
    }
}