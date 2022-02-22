<?php 

namespace App\Services;

class CartRealProduct
{
    private $product;

    private $qty;

    public function getProduct()
    {
        return $this->product;
    }

    public function setProduct($product)
    {
        $this->product = $product;
        return $this;
    }

    public function getQty()
    {
        return $this->qty;
    }

    public function setQty($qty)
    {
        $this->qty = $qty;
        return $this;
    }
    public function getTotal()
    {
        return $this->product->getPrice() * $this->qty;
    }
}

?>