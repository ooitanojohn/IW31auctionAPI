<?php 

namespace Classes\Entities;

class Kokyaku {
  private ?int $user_id = null;
  private ?int $kokyaku_money = null;
  private ?string $kokyaku_time = "";
  private ?int $product_id = null;

  // アクセスメソッド
  public function getUserId() :?int
  {
    return $this->user_id;
  }
  public function setUserId($user_id) :void
  {
    $this->user_id = $user_id;
  }
  public function getKokyakuMoney() :?int
  {
    return $this->kokyaku_money;
  }
  public function setKokyakuMoney($kokyaku_money) :void
  {
    $this->kokyaku_money = $kokyaku_money;
  }
  public function getKokyakuTime() :?string
  {
    return $this->kokyaku_time;
  }
  public function setKokyakuTime($kokyaku_time) :void
  {
    $this->kokyaku_time = $kokyaku_time;
  }
  public function getProductId() :?int
  {
    return $this->product_id;
  }
  public function setProductId($product_id) :void
  {
    $this->product_id = $product_id;
  }
}
?>