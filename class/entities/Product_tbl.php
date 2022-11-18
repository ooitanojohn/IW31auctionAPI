<?php 

namespace Classes\Entities;

class Product {
  // 商品の主キーのid
  private ?int $id = null;
  // 車のid
  private ?int $car_id = null;
  // 車の金額
  private ?int $car_price = null;
  // 
  private ?int $start_price = null;
  // 
  private ?int $asking_price = null;
  // 
  private ?string $exhibit_date = "";
  // 
  private ?string $purchase_date = "";
  // 商品の購入日
  private ?int $user_id = null;
  // 車の状態
  private ?int $car_condition = null;

  // アクセサメソッド
  public function getId(): ?int
  {
    return $this->id;
  }
  public function setId(int $id): void
  {
    $this->id = $id;
  }  
  public function getCarId(): ?int
  {
    return $this->car_id;
  }
  public function setCarId(int $car_id): void
  {
    $this->car_id = $car_id;
  }
  public function getCarPrice(): ?int
  {
    return $this->car_price;
  }
  public function setCarPrice(int $car_price): void
  {
    $this->car_price = $car_price;
  }
  public function getStartPrice(): ?int
  {
    return $this->start_price;
  }
  public function setStartPrice(int $start_price): void
  {
    $this->start_price = $start_price;
  }
  public function getAskingPrice(): ?int
  {
    return $this->asking_price;
  }
  public function setAskingPrice(int $asking_price): void
  {
    $this->asking_price = $asking_price;
  }
  public function getExhibitDate(): ?string
  {
    return $this->exhibit_date;
  }
  public function setExhibitDate(int $exhibit_date): void
  {
    $this->exhibit_price = $exhibit_date;
  }
  public function getPurchaseDate(): ?string
  {
    return $this->purchase_date;
  }
  public function setPurchaseDate(int $purchase_date): void
  {
    $this->purchase_date = $purchase_date;
  }
  public function getUserId(): ?int
  {
    return $this->user_id;
  }
  public function setUserId(int $user_id): void
  {
    $this->user_id = $user_id;
  }
  public function getCarCondition(): ?int
  {
    return $this->car_condition;
  }
  public function setCarCondition(int $car_condition): void
  {
    $this->car_condition = $car_condition;
  }
}
?>