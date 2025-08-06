<?php
class Car {
    public $brand;
    public $model;

    public function __construct($brand, $model) {
        $this->brand = $brand;
        $this->model = $model;
    }

    public function getInfo() {
        return "Автомобиль: {$this->brand} {$this->model}";
    }
}

$car = new Car("Toyota", "Camry");
echo $car->getInfo();
?>
