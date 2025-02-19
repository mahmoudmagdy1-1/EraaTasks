<?php

$img_DB = [];
// this is acting as if its the database

class Product
{
    public string $name;
    public float $price;
    public string $description;
    public string $image;
    public function calcPrice($tax)
    {
        // Implement price calculation logic here or for example return price * percent% tax
        return $this->price * (1 + $tax);
    }
    public function upload_image()
    {
        global $img_DB;
        $img_DB[] = $this->image;
    }
}

class Book extends Product
{
    private array $publishers;
    public string $writer;
    public string $color;
    public string $supplier;

    public function set_publishers(array $publishers)
    {
        $this->publishers = $publishers;
    }
    public function choose_publishers()
    {
        echo empty($this->publishers) ? "" : $this->publishers[array_rand($this->publishers)];
    }
    public function show_all_publishers()
    {
        if (!empty($this->publishers)) {
            echo "<ul>";
            foreach ($this->publishers as $publisher) {
                echo "<li> $publisher </li>";
            }
            echo "</ul>";
        }
    }
}

class BabyCar extends Product
{
    public int $age;
    public int $weight;
    private array $materials;
    private int $special_tax = 14;
    public function set_materials(array $materials)
    {
        $this->materials = $materials;
    }
    public function show_all_materials()
    {
        if (!empty($this->materials)) {
            echo "<ul>";
            foreach ($this->materials as $material) {
                echo "<li> $material </li>";
            }
            echo "</ul>";
        }
    }
    public function get_final_price()
    {
        return $this->price * (1 + $this->special_tax);
    }
}

$book1 = new Book();
$book1->name = "The Alchemist";
$book1->price = 20;
$book1->description = "A book about booking";
$book1->image = "book1.jpg";
$book1->writer = "Mahmoud";
$book1->color = "Red";
$book1->supplier = "Amazon";
$book1->set_publishers(["Penguin", "Fish", "Cat"]);
$book1->upload_image();
$book1->price = $book1->calcPrice(0.14);
$book1->choose_publishers();
$book1->show_all_publishers();


$babycar1 = new BabyCar();
$babycar1->name = "Baby Car";
$babycar1->price = 100;
$babycar1->description = "A car for babies";
$babycar1->image = "car1.jpg";
$babycar1->age = 3;
$babycar1->weight = 10;
$babycar1->upload_image();
$babycar1->set_materials(["Plastic", "Metal", "Wood"]);
$babycar1->show_all_materials();
$babycar1->price = $babycar1->get_final_price();



print_r($img_DB);
