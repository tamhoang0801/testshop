<?php
class product {
    
    private int $id;
    private string $name;
    private float $price;
    private string $images;

    public function __construct(int $id, string $name, float $price, string $images){
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->images = $images;
    }
    public function getId():int{
        return $this->id;
    }
    public function getName():string {
        return $this->name;
    }
    public function getPrice():float {
        return $this->price;
    }
    public function getImages():string {
        return $this->images;
    }
}
?>