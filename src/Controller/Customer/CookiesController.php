<?php

namespace App\Controller\Customer;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CookiesController extends AbstractController
{
    #[Route('/cookies/{bool}', name: 'cookies')]
    public function createCookie($bool, Request $request)
    {
        $rep = $bool;
        $session = $request->getSession();
        
        if ($session->get('cookiesNoRepeat'))
        {
            return $this->json([
            'code' => 203,
            'message' => "Les cookies ont deja ete repondu"
            ], 203);
        }
        
        $session->set('cookies', $rep);
        $session->set('cookiesNoRepeat', true);
        
        if ($rep == 0)
        {
            return $this->json([
                'code' => 200,
                'message' => "Les cookies n'ont pas ete acceptes"
            ], 200);
        }
        
        $cookie = new Cookie('counter', 2, strtotime('tomorrow'), '/', "wiki", false, true);
        $res = new Response();
        $res->headers->setCookie($cookie);
        $res->send();
        
        return $this->json([
            'code' => 201,
            'message' => "Les cookies ont ete acceptes"
        ], 201);
    }
    
    #[Route('/cookiesSetting', name: 'cookies_setting')]
    public function cookiesSetting(Request $request) : Response
    {
        $request->getSession()->set('cookiesNoRepeat', false);

        return $this->json([
            'code' => 200,
            'message' => "cookies no repeat"
        ], 200);
        
    }

    public function deleteCookie($cookie) :Response
    {
        $res = new Response();

        $res->headers->clearCookie($cookie);
        $res->send();

        return $res;
    }
}