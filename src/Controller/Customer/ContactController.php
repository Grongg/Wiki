<?php 

namespace App\Controller\Customer;

use App\Form\ContactType;
use App\Services\CookieService;
use App\Services\MailerService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'contact')]
    public function contact(Request $request, MailerService $mailerService, CookieService $cookieService)
    {
        $session = $cookieService->checkAndSetCookieNoRepeat($request);
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $emailCustomer = $form->get('email_customer')->getData();

            $content = $form->get('content')->getData();

            $mailerService->sendContactMail($emailCustomer, $content);

            $this->addFlash("sucess", "Votre Message a bien été pris en compte.");

            return $this->redirectToRoute("contact");
        }
        return $this->render("customer/contact.html.twig", [
            "form" => $form->createView(),
            'session' => $session
        ]);
    }
}

?>