<?php
namespace app\models;
use app\lib\Session;

class CartItem
{
    public Product $product;
    public int $quantity;

    // TODO Generate constructor with all properties of the class
    public function __construct(Product $product, int $quantity)
    {
        $this->product = $product;
        $this->quantity = $quantity;
    }
    // TODO Generate getters and setters of properties
    public function getProduct (): Product
    {
        return $this->product;
    }
    public function setProduct (Product $product): void
    {
        $this->product = $product;
    }

    public function getQuantity (): int
    {
        return $this->quantity;
    }
    public function setQuantity (int $quantity): void
    {
        if ($quantity < $this->product->getAvailableQuantity())
        {
            $this->quantity = $quantity;
        }
    }

    public function increaseQuantity()
    {
        //TODO $quantity must be increased by one.

        // Bonus: $quantity must not become more than whatever is Product::$availableQuantity
        if ($this->quantity < $this->product->getAvailableQuantity())
        {
            $this->quantity ++;
        }
    }

    public function decreaseQuantity()
    {
        //TODO $quantity must be decreased by one.

        // Bonus: Quantity must not become less than 1
        if ($this->product->getAvailableQuantity() > 1)
        {
            $this->quantity --;
        }
    }

}