<?php 

namespace App\Services;

use App\Services\CartItem;
use App\Services\CartRealProduct;
use App\Repository\ProductRepository;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class CartService
{

    private $session;
    private $productRepository;

    public function __construct(SessionInterface $session, ProductRepository $productRepository)
    {
        $this->session = $session;
        $this->productRepository = $productRepository;
    }

    public function getCart()
    {
        return $this->session->get('cart', []);
    }

    public function saveCart(array $cart)
    {
        return $this->session->set('cart', $cart);
    }

    public function add($id)
    {
        $cart = $this->getCart();

        foreach($cart as $item)
        {
            if ($item->getId() === $id)
            {
                $qtyActuel = $item->getQty();
                $item->setQty($qtyActuel + 1);
                $this->saveCart($cart);
                return;
            }
        }

        $cartItem = new CartItem() ;
        $cartItem->setId($id);
        $cartItem->setQty(1);

        $cart[] = $cartItem;
        $this->saveCart($cart);
        return;
    }

    public function detail()
    {
        $detailCart = [];

        $cart = $this->getCart();
        foreach($cart as $item)
        {
            $product = $this->productRepository->find($item->getId());
            if (!$product)
            {
                continue;
            }
            $cartRealProduct = new CartRealProduct();
            $cartRealProduct->setProduct($product);
            $cartRealProduct->setQty($item->getQty());

            $detailCart[] = $cartRealProduct;
        }
        return $detailCart;
    }

    public function getTotal()
    {
        $total = 0;

        $cart = $this->getCart();

        foreach($cart as $item)
        {
            $product = $this->productRepository->find($item->getId());

            if(!$product)
            {
                continue;
            }

            $total += $product->getPrice() * $item->getQty();
        }

        return $total;
    }

    public function remove(int $id)
    {
        $cart = $this->getCart();

        foreach($cart as $key => $item)
        {
            if($item->getId() === $id)
            {
                unset($cart[$key]);
                $this->saveCart($cart);
            }
        }
    }

    public function decrement(int $id)
    {
        $cart = $this->getCart();

        foreach($cart as $key => $item)
        {
            if($item->getId() === $id)
            {
                $qty = $item->getQty();

                if($qty === 1)
                {
                    unset($cart[$key]);
                    $this->saveCart($cart);
                    return;
                }
                else 
                {
                    $item->setQty($qty - 1);
                    $this->saveCart($cart);
                    return;
                }
            }
        }
    }
}

?>