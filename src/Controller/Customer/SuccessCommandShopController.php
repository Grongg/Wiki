<?php

namespace App\Controller\Customer;

use App\Entity\User;
use App\Repository\CommandShopRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class SuccessCommandShopController extends AbstractController
{
    #[Route('/successfullpayment/{id}', name: 'stripe_success_payment')]
    public function success($id, EntityManagerInterface $em, CommandShopRepository $commandShopRepository, UserRepository $userRepository, Request $request)
    {
        //$user = $this->getUser();
        $user = $userRepository->find($id);
        //dd($user);


        $commandShop = $commandShopRepository->findOneBy([
            'user' => $user,
            ], [
                'id' => 'DESC'
        ]);

        $commandShop->setIsPayed(true);
        $em->flush();
        return $this->redirectToRoute('thank_you_page');
    }

    #[Route('/failedpayment', name: 'stripe_failed_payment')]
    public function failed()
    {
        $this->addFlash("info", "Votre payment a echoue");
        return $this->redirectToRoute("cart_detail");
    }
}