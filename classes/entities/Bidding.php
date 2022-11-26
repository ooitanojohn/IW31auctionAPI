<?php

namespace Classes\Entities;

class Bidding
{
  private ?int $user_id = null;
  private ?int $product_id = null;
  private ?string $bidding_time = "";
  private ?int $bidding_money = null;

  public function getUserId()
  {
    return $this->user_id;
  }
  public function setUserId($user_id)
  {
    $this->user_id = $user_id;
  }
  public function getProductId()
  {
    return $this->product_id;
  }
  public function setProductId($product_id)
  {
    $this->product_id = $product_id;
  }
  public function getBiddingTime()
  {
    return $this->bidding_time;
  }
  public function setBiddingTime($bidding_time)
  {
    $this->bidding_time = $bidding_time;
  }
  public function getBiddingMoney()
  {
    return $this->bidding_money;
  }
  public function setBiddingMoney($bidding_money)
  {
    $this->bidding_money = $bidding_money;
  }
}
