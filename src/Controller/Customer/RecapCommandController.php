<?php

namespace App\Controller\Customer;

use App\Entity\CommandShop;
use App\Entity\CommandShopLine;
use App\Entity\DeliveryAddress;
use App\Entity\User;
use App\Form\DeliveryAddressType;
use App\Services\CartService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class RecapCommandController extends AbstractController
{
    #[Route('/command/recap', name: 'command_recap')]
    public function recap(Request $request, EntityManagerInterface $em, CartService $cartService)
    {
        $deliveryAddress = new DeliveryAddress();
        $form = $this->createForm(DeliveryAddressType::class, $deliveryAddress);
        $form->handleRequest($request);

        $cart = $cartService->detail();
        $totalCart = $cartService->getTotal();

        /** @var User */
        $user = $this->getUser();

        if ($form->isSubmitted() && $form->isValid())
        {
            $commandShop = new CommandShop();
            $commandShop->setUser($user);
            $commandShop->setTotalPrice($totalCart);
            $em->persist($commandShop);
            foreach($cart as $item)
            {
                $commandShopLine = new CommandShopLine();
                $commandShopLine->setCommandShop($commandShop);
                $commandShopLine->setProduct($item->getProduct());
                $commandShopLine->setQuantity($item->getQty());
                $em->persist($commandShopLine);
            }

            $deliveryAddress->setCommandShop($commandShop);
            $em->persist($deliveryAddress);
            $em->flush();

            return $this->redirectToRoute('stripe_checkout');
        }

        return $this->render("customer/command/recap.html.twig", [
            'form' => $form->createView(),
            'cart' => $cart,
            'totalCart' => $totalCart,
        ]);
    }
}