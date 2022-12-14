<?php 
  namespace Classes\Entities;

  class Carstock
  {
    private ?int $stock_id = null;
    private ?int $car_id = null;
    private ?int $car_state = null;
    private ?string $arrival_time = "";
    private ?int $arrival_price = null;
    private ?string $update_time = "";

     
    public function getStockId():?int
    {
      return $this->stock_id;
    } 
    public function getCarId():?int
    {
      return $this->car_id;
    } 
    public function getCarState():?int
    {
      return $this->car_state;
    } 
    public function getArrivalTime():?string
    {
      return $this->arrival_time;
    } 
    public function getArrivalPrice():?int
    {
      return $this->arrival_price;
    } 
    public function getUpdateTime():?string
    {
      return $this->update_time;
    }
    public function setStockId($stock_id):void
    {
      $this->stock_id = $stock_id;
    }
    public function setCarId($car_id):void
    {
      $this->car_id = $car_id;
    }
    public function setCarState($car_state):void
    {
      $this->car_state = $car_state;
    }
    public function setArrivalTime($arrival_time):void
    {
      $this->arrival_time = $arrival_time;
    }
    public function setArrivalPrice($arrival_price):void
    {
      $this->arrival_price = $arrival_price;
    }
    public function setUpdateTime($update_time):void
    {
      $this->update_time = $update_time;
    }
  }  
?>