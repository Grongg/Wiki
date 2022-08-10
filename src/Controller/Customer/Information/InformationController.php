<?php 

namespace App\Controller\Customer\Information;

use App\Services\CookieService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class InformationController extends AbstractController
{
    #[Route('/cgv', name: 'cgv')]
    public function cgv(CookieService $cookieService, Request $request)
    {
        $session = $cookieService->checkAndSetCookieNoRepeat($request); 
        /** @var User $user */
        $user = $this->getUser();

        return $this->render("customer/informations/cgv.html.twig", [
            'session' => $session,
        ]);
    }

    #[Route('/cgu', name: 'cgu')]
    public function cgu(CookieService $cookieService, Request $request)
    {
        $session = $cookieService->checkAndSetCookieNoRepeat($request);
        /** @var User $user */
        $user = $this->getUser();

        return $this->render("customer/informations/cgu.html.twig", [
            'session' => $session,
        ]);
    }

    #[Route('/mentionsLegales', name: 'mentionsLegales')]
    public function mentionsLegales(CookieService $cookieService, Request $request)
    {
        $session = $cookieService->checkAndSetCookieNoRepeat($request);
        /** @var User $user */
        $user = $this->getUser();

        return $this->render("customer/informations/mentionsLegales.html.twig", [
            'session' => $session,
        ]);
    }

    #[Route('/confidentialite', name: 'confidentialite')]
    public function confidentialite(CookieService $cookieService, Request $request)
    {
        $session = $cookieService->checkAndSetCookieNoRepeat($request);
        /** @var User $user */
        $user = $this->getUser();

        return $this->render("customer/informations/politiqueConfidentialite.html.twig", [
            'session' => $session,
        ]);
    }
}

