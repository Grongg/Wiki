<?php

namespace App\Controller\Customer;

use App\Services\CookieService;
use App\Form\EditProfileFormType;
use App\Repository\UserRepository;
use App\Services\HandleImageService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProfileController extends AbstractController
{
    #[Route('/profile/{id}', name: 'customer_profile')]
    public function index(int $id, CookieService $cookieService, UserRepository $userRepository, Request $request) : Response
    {
        $session = $cookieService->checkAndSetCookieNoRepeat($request);
        $user = $userRepository->find($id);

        return $this->render('customer/profile/index.html.twig', [
            "commands" => $user->getCommandShops(),
            'session' => $session
        ]);
    }

    #[Route('/profile/{id}/edit', name: 'customer_edit_profile')]
    public function edit(int $id, Request $request, EntityManagerInterface $em, HandleImageService $handleImage, UserRepository $userRepository,
    CookieService $cookieService) : Response
    {
        $session = $cookieService->checkAndSetCookieNoRepeat($request);
        $user = $userRepository->find($id);
        $form = $this->createForm(EditProfileFormType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $handleImage->prepEdit($user, $form);
            $em->flush();
            return $this->redirectToRoute('customer_profile' , [ 'id' => $user->getId()], Response::HTTP_SEE_OTHER);
        }
        return $this->renderForm('customer/profile/edit.html.twig', [
            'user' => $user,
            'EditProfileForm' => $form,
            'session' => $session
        ]);
    }

}