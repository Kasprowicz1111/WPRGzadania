<?php

class Product {
    private $name;
    private $price;
    private $quantity;

    public function __construct($name, $price, $quantity) {
        $this->name = $name;
        $this->price = $price;
        $this->quantity = $quantity;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setPrice($price) {
        $this->price = $price;
    }

    public function setQuantity($quantity) {
        $this->quantity = $quantity;
    }

    public function getName() {
        return $this->name;
    }

    public function getPrice() {
        return $this->price;
    }

    public function getQuantity() {
        return $this->quantity;
    }

    public function __toString() {
        return "Product: $this->name, Price: $this->price, Quantity: $this->quantity";
    }
}

class Cart {
    private $products;

    public function __construct() {
        $this->products = [];
    }

    public function addProduct(Product $product) {
        $this->products[] = $product;
    }

    public function removeProduct($productName) {
        foreach ($this->products as $key => $product) {
            if ($product->getName() === $productName) {
                unset($this->products[$key]);
                $this->products = array_values($this->products); // Reindex the array
                break;
            }
        }
    }

    public function getTotalPrice() {
        $totalPrice = 0;
        foreach ($this->products as $product) {
            $totalPrice += $product->getPrice() * $product->getQuantity();
        }
        return $totalPrice;
    }

    public function __toString() {
        $output = "Cart Contents:\n";
        foreach ($this->products as $product) {
            $output .= $product . "\n";
        }
        $output .= "Total Price: " . $this->getTotalPrice();
        return $output;
    }
}

$product1 = new Product("GeForce RTX 4090", 9000, 1);
$product2 = new Product("Macbook Pro M3", 12000, 1);

$cart  = new Cart();
$cart->addProduct($product1);
$cart->addProduct($product2);

echo $cart . "\n" . "\n";

$cart->removeProduct("Macbook Pro M3");

echo $cart;