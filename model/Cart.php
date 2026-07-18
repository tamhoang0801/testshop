<?php
require_once __DIR__ . "/cartItem.php";
class Cart {
    private array $item = [];
    public function add(int $id, string $name, float $price, int $quantity){
        if(isset($this->item[$id])){
            $this->item[$id]->increase($quantity);
        }
        else {
            $this->item[$id] = new cartItem($id, $name, $price, $quantity);
        }
    }
    public function total():float {
        $total = 0.0;
        foreach($this->item as $item){
            $total += $item->calculate();
        }
        return $total;
    }
    public function getItem():array{
        return $this->item;
    }
}
?>