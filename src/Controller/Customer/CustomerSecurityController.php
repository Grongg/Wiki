<?php

namespace App\Controller\Customer;

use App\Services\CookieService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class CustomerSecurityController extends AbstractController
{
    /**
     * @Route("login", name="app_login")
     */
    public function login(AuthenticationUtils $authenticationUtils, CookieService $cookieService, Request $request): Response
    {
        $session = $cookieService->checkAndSetCookieNoRepeat($request);
        // if ($this->getUser()) {
        //     return $this->redirectToRoute('target_path');
        // }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('customer/security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error, 'session' => $session]);
    }

    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}
