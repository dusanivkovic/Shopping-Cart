<?php
namespace app\models;

class Product
{
    private int $id;
    private string $title;
    private float $price;
    private int $availableQuantity;

    // TODO Generate constructor with all properties of the class
    public function __construct(int $id, string $title, float $price, int $availableQuantity)
    {
        $this->id = $id;
        $this->title = $title;
        $this->price = $price;
        $this->availableQuantity = $availableQuantity;
    }
    // TODO Generate getters and setters of properties
    public function getProductId (): int
    {
        return $this->id;
    }
    public function setProductId (int $id): void
    {
        $this->id = $id;
    }

    public function getProductTitle (): string
    {
        return $this->title;
    }
    public function setProductTitle (string  $title): void
    {
        $this->title = $title;
    }

    public function getProductPrice (): float
    {
        return $this->price;
    }
    public function setProductPrice (float $price): void
    {
        $this->price = $price;
    }

    public function getAvailableQuantity (): int
    {
        return $this->availableQuantity;
    }
    public function setAvailableQuantity (int $availableQuantity): void
    {
        $this->availableQuantity = $availableQuantity;
    }

    /**
     * Add Product $product into cart. If product already exists inside cart
     * it must update quantity.
     * This must create CartItem and return CartItem from method
     * Bonus: $quantity must not become more than whatever
     * is $availableQuantity of the Product
     *
     * @param Cart $cart
     * @param int $quantity
     * @return CartItem
     */
    public function addToCart(Cart $cart, int $quantity): CartItem
    {
        //TODO Implement method
        return $cart->addProduct($this, $quantity);
    }

    /**
     * Remove product from cart
     *
     * @param Cart $cart
     */
    public function removeFromCart(Cart $cart)
    {
        //TODO Implement method
        return $cart->removeProduct($this);
    }

}