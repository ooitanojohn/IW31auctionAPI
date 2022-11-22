<?php

namespace Classes\Entities;

class User
{
  // 主キーのid
  private ?int $id = null;
  // ユーザー名
  private ?string $user_name = "";
  // ログインID
  private ?string $user_login_id = "";
  // パスワード
  private ?string $user_password = "";
  // メール
  private ?string $user_mail = "";
  // 郵便番号
  private ?int $user_post_code = null;
  // 携帯番号
  private ?int $user_phone_number = null;
  // クレカ番号
  private ?int $card_number = null;
  // カードキー
  private ?int $card_key = null;
  //　退会情報
  private ?int $user_state = null;

  // アクセサメソッド
  public function getId(): ?int
  {
    return $this->id;
  }
  public function setId(int $id): void
  {
    $this->id = $id;
  }
  public function getUserName(): ?string
  {
    return $this->user_name;
  }
  public function setUserName(string $user_name): void
  {
    $this->user_name = $user_name;
  }
  public function getUserLoginId(): ?string
  {
    return $this->user_login_id;
  }
  public function setUserLoginId(string $user_login_id): void
  {
    $this->user_login_id = $user_login_id;
  }
  public function getUserPassword(): ?string
  {
    return $this->user_password;
  }
  public function setUserPassword(string $user_password): void
  {
    $this->user_password = $user_password;
  }
  public function getUserMail(): ?string
  {
    return $this->user_mail;
  }
  public function setUserMail(string $user_mail): void
  {
    $this->user_mail = $user_mail;
  }
  public function getUserPostCode(): ?int
  {
    return $this->user_post_code;
  }
  public function setUserPostCode(int $user_post_code): void
  {
    $this->user_post_code = $user_post_code;
  }
  public function getUserAddress(): ?string
  {
    return $this->user_address;
  }
  public function setUserAddress(string $user_address): void
  {
    $this->user_address = $user_address;
  }
  public function getUserPhoneNumber(): ?int
  {
    return $this->user_phone_number;
  }
  public function setUserPhoneNumber(int $user_phone_number): void
  {
    $this->user_phone_number = $user_phone_number;
  }
  public function getCardNumber(): ?int
  {
    return $this->card_number;
  }
  public function setCardNumber(int $card_number): void
  {
    $this->card_number = $card_number;
  }
  public function getCardKey(): ?int
  {
    return $this->card_key;
  }
  public function setCardKey(int $card_key): void
  {
    $this->card_key = $card_key;
  }
  public function getUserState(): ?int
  {
    return $this->user_state;
  }
  public function setUserState(int $user_state): void
  {
    $this->user_state = $user_state;
  }
}
