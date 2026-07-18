<?php
class cartItem {
    private int $id;
    private string $name;
    private float $price;
    private int $quantity;
    public function __construct(int $id, string $name, float $price, int $quantity){
        $this->id = $id ?? "";
        $this->name = $name ?? "";
        $this->price = $price ?? 0.0;
        $this->quantity = $quantity ?? 1;
    }
    public function increase(int $quantity):void {
        $this->quantity += $quantity;
    }
    public function calculate():float {
        return $this->quantity * $this->price;
    }
    public function getId():int {
        return $this-> id;
    }
    public function getName():string {
        return $this-> name;
    }
    public function getPrice():float {
        return $this-> price;
    }
    public function getQuantity():int {
        return $this-> quantity;
    }
}
?>