<?php 

namespace Classes\Entities;

class Kokyaku {
  private ?int $purchase_id = null;
  private ?int $user_id = null;
  private ?int $price = "";
  private ?string $purchase_datetime = null;
  private ?int $product_id = null;

  // アクセスメソッド
  public function getPurcheseId() :?int
  {
    return $this->purchase_id;
  }
  public function setPurchase($purchase_id) :void
  {
    $this->purhcase = $purchase_id;
  }
  public function getUserId() :?int
  {
    return $this->user_id;
  }
  public function setUserId($user_id) :void
  {
    $this->user_id = $user_id;
  }
  public function getPrice() :?string
  {
    return $this->price;
  }
  public function setPrice($price) :void
  {
    $this->price = $price;
  }
  public function getPurchaseDatetime() :?int
  {
    return $this->purchase_datetime;
  }
  public function setPurchaseDatetime($purchase_datetime) :void
  {
    $this->purchase_datetime = $purchase_datetime;
  }
  public function getProductId() :?int
  {
    return $this->product_id;
  }
  public function setProductId() :void
  {
    $this->product_id = $product_id;
  }
}
?>