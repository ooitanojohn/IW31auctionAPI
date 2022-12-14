<?php 

  namespace Classes\Entities;

  class Car
  {
    private ?int $car_id = null;
    private ?string $car_name = "";
    private ?int $maker_id = null;
    private ?int $stock = null;
    private ?string $update_time = "";

    // アクセスメソッド
    public function getCarId():?int
    {
      return $this->car_id;
    }
    public function getCarName():?string
    {
      return $this->car_name;
    }
    public function getMakerId():?int
    {
      return $this->maker_id;
    }
    public function getStock():?int
    {
      return $this->stock;
    }
    public function getUpdateTime():?string
    {
      return $this->update_time;
    }
    public function setCarId($car_id):void
    {
      $this->car_id = $car_id;
    }
    public function setCarName($car_name):void
    {
      $this->car_name = $car_name;
    }
    public function setMakerId($maker_id):void
    {
      $this->maker_id = $maker_id;
    }
    public function setStock($stock):void
    {
      $this->stock = $stock;
    }
    public function setUpdateTime($update_time):void
    {
      $this->update_time = $update_time;
    }
  }
?>