<?php

class Product
{
    private string $name;
    public float $price;
    public int $discount;
    public string $brand;
    public string $image;
    public string $description;
    public int $tax = 10;

    public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
        $this->name = $name;
    }
    private function priceAfterDiscount()
    {
        return $this->discount >= 1 ? $this->price - ($this->discount / 100) * $this->price : $this->price;
    }
    public function getFinalPrice()
    {
        return $this->priceAfterDiscount() + ($this->tax / 100) * $this->priceAfterDiscount();
    }
}

$products = [];

$productData = [
    [
        'name' => 'Product 1',
        'price' => 100,
        'discount' => 10,
        'brand' => 'Brand 1',
        'image' => 'https://placehold.co/600x400',
        'description' => 'Description 1'
    ],
    [
        'name' => 'Product 2',
        'price' => 200,
        'discount' => 20,
        'brand' => 'Brand 2',
        'image' => 'https://placehold.co/600x400',
        'description' => 'Description 2'
    ],
    [
        'name' => 'Product 3',
        'price' => 300,
        'discount' => 30,
        'brand' => 'Brand 3',
        'image' => 'https://placehold.co/600x400',
        'description' => 'Description 3'
    ]
];

foreach ($productData as $data) {
    $product = new Product();
    $product->setName($data['name']);
    $product->price = $data['price'];
    $product->discount = $data['discount'];
    $product->brand = $data['brand'];
    $product->image = $data['image'];
    $product->description = $data['description'];
    $product->price = $product->getFinalPrice();
    $products[] = $product;
}
