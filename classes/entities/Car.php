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
  public function getCarId()
  {
    return $this->car_id;
  }
  public function getCarName()
  {
    return $this->car_name;
  }
  public function getMakerId()
  {
    return $this->maker_id;
  }
  public function getStock()
  {
    return $this->stock;
  }
  public function getUpdateTime()
  {
    return $this->update_time;
  }
  public function setCarId($car_id)
  {
    $this->car_id = $car_id;
    return $this;
  }
  public function setCarName($car_name)
  {
    $this->car_name = $car_name;
    return $this;
  }
  public function setMakerId($maker_id)
  {
    $this->maker_id = $maker_id;
    return $this;
  }
  public function setStock($stock)
  {
    $this->stock = $stock;
    return $this;
  }
  public function setUpdateTime($update_time)
  {
    $this->update_time = $update_time;
    return $this;
  }
}
?>