<?php

namespace App\Controller\Customer;

use App\Form\EditPasswordType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class CustomerAccountController extends AbstractController
{
    #[Route('/customer/account/updatepassword', name: 'customer_account_edit_password')]
    public function editPassword(Request $request, EntityManagerInterface $em,
                                UserPasswordHasherInterface $userPasswordHasher)
    {
        /** @var User $user */
        $user = $this->getUser();
        $form = $this->createForm(EditPasswordType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user->setPassword(
            $userPasswordHasher->hashPassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );

            $em->flush();
            $this->addFlash("success", "Votre mot de pase a bien ete modifié.");
            return $this->redirectToRoute('customer_account_edit_password');
        }

        return $this->render('customer/account/edit_password.html.twig', [
            'editForm' => $form->createView(),
        ]);
    }
}
