<?php

namespace App\Controller\Customer;

use App\Entity\User;
use App\Repository\CommandShopRepository;
use App\Repository\UserRepository;
use App\Security\ChunAuthenticator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\UserAuthenticatorInterface;

class SuccessCommandShopController extends AbstractController
{
    #[Route('/successfullpayment/{id}', name: 'stripe_success_payment')]
    public function success($id, EntityManagerInterface $em,
                            CommandShopRepository $commandShopRepository,
                            UserRepository $userRepository,
                            Request $request,
                            UserAuthenticatorInterface $ue,
                            ChunAuthenticator $chun)
    {
        $user = $userRepository->find($id);

        if ($user)
        {
            $commandShop = $commandShopRepository->findOneBy([
                'user' => $user,
                ], [
                    'id' => 'DESC'
            ]);

            $commandShop->setIsPayed(true);
            $em->flush();
            $ue->authenticateUser(
                $user,
                $chun,
                $request
            );

            return $this->redirectToRoute('thank_you_page');
        }
        else
        {
            return $this->redirectToRoute('customer_home');
        }
    }

    #[Route('/failedpayment/{id}', name: 'stripe_failed_payment')]
    public function failed($id, EntityManagerInterface $em,
                            CommandShopRepository $commandShopRepository,
                            UserRepository $userRepository,
                            Request $request,
                            UserAuthenticatorInterface $ue,
                            ChunAuthenticator $chun)
    {
        // $this->addFlash("info", "Votre payment a echoue");
        $user = $userRepository->find($id);

        if ($user)
        {
            $commandShop = $commandShopRepository->findOneBy([
                'user' => $user,
                ], [
                    'id' => 'DESC'
            ]);

            $commandShop->setIsPayed(true);
            $em->flush();
            $ue->authenticateUser(
                $user,
                $chun,
                $request
            );
            return $this->redirectToRoute('payment_failed_page');
        }
        return $this->redirectToRoute("cart_detail");
    }
}