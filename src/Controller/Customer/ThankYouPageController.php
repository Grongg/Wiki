<?php

namespace App\Controller\Customer;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ThankYouPageController extends AbstractController
{
    #[Route('/thanks', name: 'thank_you_page')]
    public function thanks()
    {
        return $this->render("customer/command/thank_you_page.html.twig");
    }
}