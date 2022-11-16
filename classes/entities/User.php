<?php

namespace Classes\Entities;

class User
{
  private ?int $user_id = null;
  private ?string $user_name = "";
  private ?string $user_login_id = "";
  private ?string $user_password = "";
  private ?string $user_mail = "";
  private ?int $user_post_code = null;
  private ?string $user_address = "";
  private ?int $user_phone_number = null;
  private ?int $card_number = null;
  private ?int $card_key = null;
  private ?int $user_state = null;

  /**
   * セッター
   *
   * @param integer $user_id  主キーのid
   * @param string $user_name 名前
   * @param string $user_login_id ログインID
   * @param string $user_password パスワード
   * @param string $user_mail メール
   * @param integer $user_post_code 郵便番号
   * @param string $user_address 住所
   * @param integer $user_phone_number 住所
   * @param integer $card_number クレカ番号
   * @param integer $card_key カードキー
   * @param integer $user_state 耐怪情報
   * @return void
   */
  public function __construct(int $user_id, string $user_name, string $user_login_id, string $user_password, string $user_mail, int $user_post_code, string $user_address, int $user_phone_number, int $card_number, int $card_key, int $user_state): void
  {
    $this->user_id = $user_id;
    $this->user_name = $user_name;
    $this->user_login_id = $user_login_id;
    $this->user_password = $user_password;
    $this->user_mail = $user_mail;
    $this->user_post_code = $user_post_code;
    $this->user_address = $user_address;
    $this->user_phone_number = $user_phone_number;
    $this->card_number = $card_number;
    $this->card_key = $card_key;
    $this->user_state = $user_state;
  }
  public function getUserId(): ?int
  {
    return $this->user_id;
  }
  public function getUserName(): ?string
  {
    return $this->user_name;
  }
  public function getUserLoginId(): ?string
  {
    return $this->user_login_id;
  }
  public function getUserPassword(): ?string
  {
    return $this->user_password;
  }
  public function getUserMail(): ?string
  {
    return $this->user_mail;
  }
  public function getUserPostCode(): ?int
  {
    return $this->user_post_code;
  }
  public function getUserAddress(): ?string
  {
    return $this->user_address;
  }
  public function getUserPhoneNumber(): ?int
  {
    return $this->user_phone_number;
  }
  public function getCardNumber(): ?int
  {
    return $this->card_number;
  }
  public function getCardKey(): ?int
  {
    return $this->card_key;
  }
  public function getUserState(): ?int
  {
    return $this->user_state;
  }
}
