<?php

namespace Classes\Entities;

class User
{
  private ?int $user_id = null;
  private ?string $user_login_id = "";
  private ?string $hashed_password = "";
  private ?string $user_name = "";
  private ?string $user_mail = "";
  private ?string $user_post_code = "";
  private ?string $user_address = "";
  private ?int $user_phone_number = null;
  private ?int $card_number = null;
  private ?int $card_key = null;
  private ?string $icon_img = "";
  private ?int $user_state = null;
  
  // アクセサメソッド
  public function getUserId()
  {
    return $this->user_id;
  }
  public function getUserLoginId()
  {
    return $this->user_login_id;
  }
  public function getHashedPassword()
  {
    return $this->hashed_password;
  }
  public function getUserName()
  {
    return $this->user_name;
  }
  public function getUserMail()
  {
    return $this->user_mail;
  }
  public function getUserPostCode()
  {
    return $this->user_post_code;
  }
  public function getUserAddress()
  {
    return $this->user_address;
  }
  public function getUserPhoneNumber()
  {
    return $this->user_phone_number;
  }
  public function getCardNumber()
  {
    return $this->card_number;
  }
  public function getCardKey()
  {
    return $this->card_key;
  }
  public function getIconImg()
  {
    return $this->icon_img;
  }
  public function getUserState()
  {
    return $this->user_state;
  }
  public function setUserId($user_id)
  {
    $this->user_id = $user_id;
  }
  public function setUserLoginId($user_login_id)
  {
    $this->user_login_id = $user_login_id;
  }
  public function setHashedPassword($hashed_password)
  {
    $this->hashed_password = $hashed_password;
  }
  public function setUserName($user_name)
  {
    $this->user_name = $user_name;
  }
  public function setUserMail($user_mail)
  {
    $this->user_mail = $user_mail;
  }
  public function setUserPostCode($user_post_code)
  {
    $this->user_post_code = $user_post_code;
  }
  public function setUserAddress($user_address)
  {
    $this->user_address = $user_address;
  }
  public function setUserPhoneNumber($user_phone_number)
  {
    $this->user_phone_number = $user_phone_number;
  }
  public function setCardNumber($card_number)
  {
    $this->card_number = $card_number;
  }
  public function setCardKey($card_key)
  {
    $this->card_key = $card_key;
  }
  public function setIconImg($icon_img)
  {
    $this->icon_img = $icon_img;
  }
  public function setUserState($user_state)
  {
    $this->user_state = $user_state;
  }
}
