<?php 

namespace App\Controller\Customer;

use App\Services\CartService;
use App\Repository\ProductRepository;
use App\Services\CookieService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CartController extends AbstractController
{
    private $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    #[Route('/cart/add/{id}', name: 'cart_add')]
    public function add(int $id, ProductRepository $productRepository,
                                Request $request, CookieService $cookieService)
    {
        $product = $productRepository->find($id);

        if (!$product)
        {
            $this->addFlash("danger", "Produit introuvable");
            return $this->redirectToRoute("customer_home");
        }

        $this->cartService->add($id);

        $this->addFlash("success", "Le produit à bien été ajouté au panier");
        if($request->query->get('returnToCart'))
        {
            return $this->redirectToRoute("cart_detail");
        }

        return $this->redirectToRoute("customer_home");
    }

    #[Route('/cart/delete/{id}', name: 'cart_remove')]
    public function delete(int $id, ProductRepository $productRepository, CookieService $cookieService)
    {
        $product = $productRepository->find($id);

        if(!$product)
        {
            $this->addFlash("danger","Produit introuvable");
            return $this->redirectToRoute("cart_detail");
        } 

        $this->cartService->remove($id);

        $this->addFlash("success","Le produit a bien été supprimé du panier");
        return $this->redirectToRoute("cart_detail");
    }

    #[Route('/cart/detail', name: 'cart_detail')]
    public function detail(CookieService $cookieService, Request $request)
    {
        $session = $cookieService->checkAndSetCookieNoRepeat($request);
        $cart = $this->cartService->detail();

        $totalCart = $this->cartService->getTotal();

        // dd($cart);

        return $this->render("customer/cart/detail.html.twig",[
            'cart' => $cart,
            'totalCart' => $totalCart,
            'session' => $session
        ]);
    }

    #[Route('/cart/decrement/{id}', name: 'cart_decrement')]
    public function decrementProduct(int $id, ProductRepository $productRepository, CookieService $cookieService)
    {
        $product = $productRepository->find($id);

        if(!$product)
        {
             $this->addFlash("danger","Le produit est introuvable.");
             return $this->redirectToRoute("cart_detail");
        }

        $this->cartService->decrement($id);

        $this->addFlash("success","La quantité du produit a bien été décrémentée.");
        return $this->redirectToRoute("cart_detail");
    }

}

?>