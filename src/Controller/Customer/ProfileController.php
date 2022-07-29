<?php

namespace App\Controller\Customer;

use App\Form\EditProfileFormType;
use App\Repository\UserRepository;
use App\Services\HandleImage;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfileController extends AbstractController
{
    #[Route('/profile/{id}', name: 'customer_profile')]
    public function index() : Response
    {

        /** @var User $user */
        $user = $this->getUser();

        return $this->render('customer/profile/index.html.twig', [
            "commands" => $user->getCommandShops(),
        ]);
    }

    #[Route('/profile/{id}/edit', name: 'customer_edit_profile')]
    public function edit($id, Request $request, EntityManagerInterface $em, HandleImage $handleImage, UserRepository $userRepository) : Response
    {
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
        ]);
    }

}