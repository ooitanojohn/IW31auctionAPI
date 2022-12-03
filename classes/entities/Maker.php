<?php 

  namespace Classes\Entities;

  class Maker
  {
    private ?int $maker_id = null;
    private ?string $maker_name = "";
    private ?string $update_time = "";

    public function getMakerId():?int
    {
      return $this->maker_id;
    }
    public function getMakerName():?string
    {
      return $this->maker_name;
    }
    public function getUpdateTime():?string
    {
      return $this->update_time;
    }
    public function setMakerId($maker_id):void
    {
      $this->maker_id = $maker_id;
    }
    public function setMakerName($maker_name):void
    {
      $this->maker_name = $maker_name;
    }
    public function setUpdateTime($update_time):void
    {
      $this->update_time = $update_time;
    }
  }
?>