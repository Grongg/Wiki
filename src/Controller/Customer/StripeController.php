<?php

namespace App\Controller\Customer;

use Stripe\Stripe;
use App\Entity\User;
use DirectoryIterator;
use Stripe\Checkout\Session;
use App\Services\CartService;
use App\Services\CookieService;
use App\Services\CartRealProduct;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class StripeController extends AbstractController
{
    #[Route('/stripe/checkout', name: 'stripe_checkout')]
    public function createSession(CartService $cartService, CookieService $cookieService, Request $request)
    {
        Stripe::setApiKey(file_get_contents(".token"));

        $domain = 'http://localhost:8000/';

        /** @var CartRealProduct[] $detailCart */
        $detailCart = $cartService->detail();

        $productForStripe = [];

        /** @var User $user */
        $user = $this->getUser();
        foreach ($detailCart as $item) {
            $productForStripe[] = [
                'price_data' => [
                    'currency' => 'eur',
                    'unit_amount' => $item->getProduct()->getPrice(),
                    'product_data' => [
                        'name' => $item->getProduct()->getName(),
                        'images' => [
                            $domain . $item->getProduct()->getImage()
                        ]
                    ]
                ],
                'quantity' => $item->getQty()
            ];
        }

        $checkout_session = Session::create([
            'customer_email' => $user->getEmail(),
            'payment_method_types' => [
                'card',
            ],
            'line_items' => [
                $productForStripe
            ],
            'mode' => 'payment',
            'success_url' => $domain . 'successfullpayment/' . $user->getId(),
            'cancel_url' => $domain . 'failedpayment/' . $user->getId(),
        ]);

        return $this->redirect($checkout_session->url);
    }
}