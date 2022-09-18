<?php

namespace App\Controller\Customer;

use App\Services\CartService;
use App\Services\CookieService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ThankYouPageController extends AbstractController
{
    #[Route('/thanks', name: 'thank_you_page')]
    public function thanks(CookieService $cookieService, CartService $cartService,  Request $request)
    {
        $session = $cookieService->checkAndSetCookieNoRepeat($request);

        /** @var CartRealProduct[] $detailCart */
        $detailCart = $cartService->detail();

        foreach ($detailCart as $item) {
            $cartService->remove($item->getProduct()->getId());
        }

        return $this->render("customer/command/thank_you_page.html.twig",[
            'session' => $session,
        ]);
    }
}