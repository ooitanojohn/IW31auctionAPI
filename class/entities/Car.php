<?php 

namespace Classes\Entities;

class Car
{
  private ?int $car_id = null;
  private ?string $car_name = "";
  private ?int $maker_id = null; 

  // アクセスメソッド
  public function getCarId()
  {
    return $this->car_id;
  }
  public function setCarId($car_id)
  {
    $this->car_id = $car_id;
  }
  public function getCarName()
  {
      return $this->car_name;
  }
  public function setCarName($car_name)
  {
    $this->car_name = $car_name;
  }
  public function getMakerId()
  {
    return $this->maker_id;
  }
  public function setMakerId($maker_id)
  {
    $this->maker_id = $maker_id;
  }
}
?>