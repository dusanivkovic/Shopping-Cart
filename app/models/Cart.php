<?php
namespace app\models;
use app\lib\Session;

class Cart
{
    /**
     * @var CartItem[]
     */
    public array $items = [];

        // TODO Generate getters and setters of properties
    public function getCartItems (): array
    {
        return $this->items;
    }

    public function setCartItems ($item): void
    {
        $this->items = $item;
    }


    /**
     * Add Product $product into cart. If product already exists inside cart
     * it must update quantity.
     * This must create CartItem and return CartItem from method
     * Bonus: $quantity must not become more than whatever
     * is $availableQuantity of the Product
     *
     * @param Product $product
     * @param int $quantity
     * @return CartItem
     */
    public function addProduct(Product $product, int $quantity): CartItem
    {
        $cartItem = $this->findCartItem($product->getProductId());
        if ($cartItem === null)
        {
            $cartItem = new CartItem($product, 0);
            $this->items [$product->getProductId()] = $cartItem;
        }
        $cartItem->increaseQuantity();
        return $cartItem;
    }

    public function findCartItem(int $productId)
    {
        return $this->items[$productId] ?? null;
    }

    /**
     * Remove product from cart
     *
     * @param Product $product
     */
    public function removeProduct(Product $product)
    {
        //TODO Implement method
        unset($this->items[$product->getProductId()]);
    }

    /**
     * This returns total number of products added in cart
     *
     * @return int
     */
    // public int $sum;
    public function getTotalQuantity(): int
    {
        //TODO Implement method
        $sum = 0;
        foreach ($this->items as $item)
        {
            $sum += $item->getQuantity();
        }
        return $sum;
    }

    /**
     * This returns total price of products added in cart
     *
     * @return float
     */
    public function getTotalSum(): float
    {
        //TODO Implement method
        $totalSum = 0;
        foreach ($this->items as $item)
        {
            $totalSum += $item->getQuantity() * $item->getProduct()->getProductPrice();
        }
        return $totalSum;
    }

    public function print (): void
    {
        print_r($this);
    }
    
    public function setCartItemSession ()
    {
        Session::set('cart', serialize($this));
    }

    public function setItemsQuantity (int $quantity, int $id): void
    {
        $cartItem = $this->findCartItem($id);

        if ($quantity < $cartItem->getProduct()->getAvailableQuantity())
        {
            $cartItem->setQuantity($quantity);
        }

    }
    
}