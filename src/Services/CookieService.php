<?php 

namespace App\Services;

use Symfony\Component\HttpFoundation\Request;

class CookieService
{
    public function checkAndSetCookieNoRepeat(Request $request)
    {
        $session = $request->getSession();

        if (!$session->get('cookiesNoRepeat'))
        {
            $session->set('cookiesNoRepeat', false);
        }

        return $session;
    }
}