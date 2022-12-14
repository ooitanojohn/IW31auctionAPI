<?php 

namespace Classes\Entities;

class Product {
  private ?int $product_id = null;
  private ?int $car_id = null;
  private ?int $stock_id = null;
  private ?int $start_price = null;
  private ?int $asking_price = null;
  private ?string $start_time = "";
  private ?string $end_time = "";
  private ?int $user_id = null;
  private ?string $car_img = "";
  private ?int $product_state = null;
  private ?string $update_time = "";

  public function getProductId()
  {
    return $this->product_id;
  }
  public function getCarId()
  {
    return $this->car_id;
  }
  public function getStockId()
  {
    return $this->stock_id;
  }
  public function getStartPrice()
  {
    return $this->start_price;
  }
  public function getAskingPrice()
  {
    return $this->asking_price;
  }
  public function getStartTime()
  {
    return $this->start_time;
  }
  public function getEndTime()
  {
    return $this->end_time;
  }
  public function getUserId()
  {
    return $this->user_id;
  }
  public function getCarImg()
  {
    return $this->car_img;
  }
  public function getProductState()
  {
    return $this->product_state;
  }
  public function getUpdateTime()
  {
    return $this->update_time;
  }
  public function setProductId($product_id)
  {
    $this->product_id = $product_id;
  }
  public function setCarId($car_id)
  {
    $this->car_id = $car_id;
  }
  public function setStockId($stock_id)
  {
    $this->stock_id = $stock_id;
  }
  public function setStartPrice($start_price)
  {
    $this->start_price = $start_price;
  }
  public function setAskingPrice($asking_price)
  {
    $this->asking_price = $asking_price;
  }
  public function setStartTime($start_time)
  {
    $this->start_time = $start_time;
  }
  public function setEndTime($end_time)
  {
    $this->end_time = $end_time;
  }
  public function setUserId($user_id)
  {
    $this->user_id = $user_id;
  }
  public function setCarImg($car_img)
  {
    $this->car_img = $car_img;
  }
  public function setProductState($product_state)
  {
    $this->product_state = $product_state;
  }
  public function setUpdateTime($update_time)
  {
    $this->update_time = $update_time;
  }
}
?>