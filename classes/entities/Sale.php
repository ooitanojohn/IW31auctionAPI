<?php 
  namespace Classes\Entities;
  class Sale
  {
    private ?int $user_id = null;
    private ?int $sales_money = null;
    private ?string $sales_time = "";
    private ?int $product_id = null;

    public function getUserId()
    {
      return $this->user_id;
    }
    public function getSalesMoney()
    {
      return $this->sales_money;
    }
    public function getSalesTime()
    {
      return $this->sales_time;
    }
    public function getProductId()
    {
      return $this->product_id;
    }
    public function setUserId($user_id)
    {
      $this->user_id = $user_id;
    }
    public function setSalesMoney($sales_money)
    {
      $this->sales_money = $sales_money;
    }
    public function setSalesTime($sales_time)
    {
      $this->sales_time = $sales_time;
    }
    public function setProductId($product_id)
    {
      $this->product_id = $product_id;
    }
  }
  
?>