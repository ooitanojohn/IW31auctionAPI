<?php

namespace Classes\Daos;

use PDO;
use Classes\Entities\User;

class UserDAO
{
  /**
   * @var PDO DB接続オブジェクト
   */
  private PDO $db;

  /**
   * コンストラクタ
   *
   * @param PDO $db DB接続オブジェクト
   */
  public function __construct(PDO $db)
  {
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $this->db = $db;
  }
  public function collectiveRegistration(User $User)
  {
    $sql = "INSERT INTO users(user_id, user_login_id, hashed_password, user_name, user_mail, user_post_code, user_address, user_phone_number, card_number, card_key, icon_img, user_state) VALUES (:user_id, :user_login_id, :hashed_password, :user_name, :user_mail, :user_post_code, :user_address, :user_phone_number, :card_number, :card_key, :icon_img, :user_state)";
    $stmt = $this->db->prepare($sql);
    for ($i=0; $i < 10; $i++) { 
      $stmt->bindValue(':user_login_id', $User->getUserLoginId(), PDO::PARAM_STR);
      $stmt->bindValue(':hashed_password', $User->getHashedPassword(), PDO::PARAM_STR);
      $stmt->bindValue(':user_name', $User->getUserName(), PDO::PARAM_STR);
      $stmt->bindValue(':user_mail', $User->getUserMail(), PDO::PARAM_STR);
      $stmt->bindValue(':user_post_code', $User->getUserPostCode(), PDO::PARAM_STR);
      $stmt->bindValue(':user_address', $User->getUserAddress(), PDO::PARAM_STR);
      $stmt->bindValue(':user_phone_number', $User->getUserPhoneNumber(), PDO::PARAM_INT);
      $stmt->bindValue(':card_number', $User->getCardNumber(), PDO::PARAM_INT);
      $stmt->bindValue(':card_key', $User->getCardKey(), PDO::PARAM_INT);
      $stmt->bindValue(':icon_img', $User->getIconImg(), PDO::PARAM_STR);
      $stmt->bindValue(':user_state ', $User->getUserState(), PDO::PARAM_INT);
      $result = $stmt->execute();
    }
    if ($result) {
      $saleId = $this->db->lastInsertId();
    } else {
      $saleId = -1;
    }
    return $saleId;
  }
  /**
   * userIdによる検索。
   *
   * @param int $userId userID 。
   * @return User 該当するUserオブジェクト。ただし、該当データがない場合はnull。
   */
  public function findByUserId(int $userId): ?UserDAO
  {
    $sql = "SELECT * FROM users WHERE user_id = :user_id";
    $stmt = $this->db->prepare($sql);
    $stmt->bindValue(":user_id", $userId, PDO::PARAM_INT);
    $result = $stmt->execute();

    $User = null;
    if ($result && $row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $user_id = $row["user_id"];
      $user_login_id = $row["user_login_id"];
      $hashed_password = $row["hashed_password"];
      $user_name = $row["user_name"];
      $user_mail = $row["user_mail"];
      $user_post_code = $row["user_post_code"];
      $user_address = $row["user_address"];
      $user_phone_number = $row["user_phone_number"];
      $card_number = $row["card_number"];
      $card_key = $row["card_key"];
      $icon_img = $row["icon_img"];
      $user_state = $row["user_state"];

      $User = new User();
      $User->setUserId($user_id);
      $User->setUserLoginId($user_login_id);
      $User->setHashedPassword($hashed_password);
      $User->setUserName($user_name);
      $User->setUserMail($user_mail);
      $User->setUserPostCode($user_post_code);
      $User->setUserAddress($user_address);
      $User->setUserPhoneNumber($user_phone_number);
      $User->setCardNumber($card_number);
      $User->setCardKey($card_key);
      $User->setIconImg($icon_img);
      $User->setUserState ($user_state);
    }
    return $User;
  }
  /**
   * メールアドレスによる検索。
   *
   * @param string $user_mail メルアド。
   * @return User 該当するUserオブジェクト。ただし、該当データがない場合はnull。
   */
  public function findByUserMail(string $user_mail): ?User
  {
    $sql = "SELECT * FROM users WHERE user_mail = :user_mail";
    $stmt = $this->db->prepare($sql);
    $stmt->bindValue(":user_mail", $user_mail, PDO::PARAM_INT);
    $result = $stmt->execute();

    $User = null;
    if ($result && $row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $user_id = $row["user_id"];
      $user_login_id = $row["user_login_id"];
      $hashed_password = $row["hashed_password"];
      $user_name = $row["user_name"];
      $user_mail = $row["user_mail"];
      $user_post_code = $row["user_post_code"];
      $user_address = $row["user_address"];
      $user_phone_number = $row["user_phone_number"];
      $card_number = $row["card_number"];
      $card_key = $row["card_key"];
      $icon_img = $row["icon_img"];
      $user_state = $row["user_state"];

      $User = new User();
      $User->setUserId($user_id);
      $User->setUserLoginId($user_login_id);
      $User->setHashedPassword($hashed_password);
      $User->setUserName($user_name);
      $User->setUserMail($user_mail);
      $User->setUserPostCode($user_post_code);
      $User->setUserAddress($user_address);
      $User->setUserPhoneNumber($user_phone_number);
      $User->setCardNumber($card_number);
      $User->setCardKey($card_key);
      $User->setIconImg($icon_img);
      $User->setUserState ($user_state);
    }
    return $User;
  }
  /**
   * ユーザリスト全取得
   *
   * @return User Userオブジェクト 該当なしの場合null
   */
  public function findAll(): array
  {
    $sql = "SELECT * FROM users";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    $UserList = [];
    while ($row = $stmt->fetch()) {
      $User = new User();
      $User->setUserId($row["user_id"]);
      $User->setUserLoginId($row["user_login_id"]);
      $User->setHashedPassword($row["hashed_password"]);
      $User->setUserName($row["user_name"]);
      $User->setUserMail($row["user_mail"]);
      $User->setUserPostCode($row["user_post_code"]);
      $User->setUserAddress($row["user_address"]);
      $User->setUserPhoneNumber($row["user_phone_number"]);
      $User->setCardNumber($row["card_number"]);
      $User->setCardKey($row["card_key"]);
      $User->setIconImg($row["icon_img"]);
      $User->setUserState ($row["user_state"]);
      $UserList[$row['id']] = $User;
    }
    return $UserList;
  }
  /**
   * ユーザ新規作成画面
   * @param User
   * @return integer 登録失敗 = -1
   */
  public function insert(User $User): int
  {
    $sql = "INSERT INTO users(user_login_id, hashed_password, user_name, user_mail, user_post_code, user_address, user_phone_number, card_number, card_key, icon_img, user_state) VALUES (:user_login_id, :hashed_password, :user_name, :user_mail, :user_post_code, :user_address, :user_phone_number, :card_number, :card_key, :icon_img, :user_state)";
    $stmt = $this->db->prepare($sql);
    $stmt->bindValue(':user_login_id', $User->getUserLoginId(), PDO::PARAM_STR);
    $stmt->bindValue(':hashed_password', $User->getHashedPassword(), PDO::PARAM_STR);
    $stmt->bindValue(':user_name', $User->getUserName(), PDO::PARAM_STR);
    $stmt->bindValue(':user_mail', $User->getUserMail(), PDO::PARAM_STR);
    $stmt->bindValue(':user_post_code', $User->getUserPostCode(), PDO::PARAM_STR);
    $stmt->bindValue(':user_address', $User->getUserAddress(), PDO::PARAM_STR);
    $stmt->bindValue(':user_phone_number', $User->getUserPhoneNumber(), PDO::PARAM_INT);
    $stmt->bindValue(':card_number', $User->getCardNumber(), PDO::PARAM_INT);
    $stmt->bindValue(':card_key', $User->getCardKey(), PDO::PARAM_INT);
    $stmt->bindValue(':icon_img', $User->getIconImg(), PDO::PARAM_STR);
    $stmt->bindValue(':user_state ', $User->getUserState(), PDO::PARAM_INT);
    $result = $stmt->execute();
    if ($result) {
      $UserId = $this->db->lastInsertId();
    } else {
      $UserId = -1;
    }
    return $UserId;
  }
  /**
   * ユーザ更新
   * @param User
   * @return boolean
   */
  public function update(User $User): bool
  {
    $sql = "UPDATE users SET user_login_id = :user_login_id,hashed_password = :hashed_password,user_name = :user_name,user_mail = :user_mail,user_post_code = :user_post_code,user_address = :user_address,user_phone_number = :user_phone_number,card_number = :card_number,card_key = :card_key,icon_img = :icon_img,user_state = :user_state WHERE user_id = :user_id;";
    $stmt = $this->db->prepare($sql);
    $stmt->bindValue(':user_login_id', $User->getUserLoginId(), PDO::PARAM_STR);
    $stmt->bindValue(':hashed_password', $User->getHashedPassword(), PDO::PARAM_STR);
    $stmt->bindValue(':user_name', $User->getUserName(), PDO::PARAM_STR);
    $stmt->bindValue(':user_mail', $User->getUserMail(), PDO::PARAM_STR);
    $stmt->bindValue(':user_post_code', $User->getUserPostCode(), PDO::PARAM_STR);
    $stmt->bindValue(':user_address', $User->getUserAddress(), PDO::PARAM_STR);
    $stmt->bindValue(':user_phone_number', $User->getUserPhoneNumber(), PDO::PARAM_INT);
    $stmt->bindValue(':card_number', $User->getCardNumber(), PDO::PARAM_INT);
    $stmt->bindValue(':card_key', $User->getCardKey(), PDO::PARAM_INT);
    $stmt->bindValue(':icon_img', $User->getIconImg(), PDO::PARAM_STR);
    $stmt->bindValue(':user_state ', $User->getUserState(), PDO::PARAM_INT);
    $result = $stmt->execute();
    return $result;
  }
  /**
   * ユーザ削除
   * @param integer ユーザID
   * @return boolean 登録が成功したかどうか
   */
  public function delete(): bool
  {
    $sql = "DELETE FROM Users";
    $stmt = $this->db->prepare($sql);
    $result = $stmt->execute();
    return $result;
  }
}