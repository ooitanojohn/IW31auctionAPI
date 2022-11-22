<?php

namespace Classes\daos;

use PDO;
use classes\entities\User;

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
  /**
   * userIdによる検索。
   *
   * @param int $userId userID 。
   * @return User 該当するUserオブジェクト。ただし、該当データがない場合はnull。
   */
  public function findByUserId(int $userId): ?UserDAO
  {
    $sql = "SELECT * FROM user_tbl WHERE user_id = :loginId";
    $stmt = $this->db->prepare($sql);

    $stmt->bindValue(":loginId", $userId, PDO::PARAM_STR);
    $result = $stmt->execute();
    $user = null;
    if ($result && $row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $id = $row["id"];
      $user_name = $row["user_name"];
      $user_login_id = $row["user_login_id"];
      $user_password = $row["user_password"];
      $user_mail = $row["user_mail"];
      $user_post_code = $row["user_post_code"];
      $user_phone_number = $row["user_phone_number"];
      $card_number = $row["card_number"];
      $card_key = $row["card_key"];
      $user_state = $row["user_state"];

      $user = new User();
      $user->setId($id);
      $user->setUserName($user_name);
      $user->setUserLoginId($user_login_id);
      $user->setUserPassword($user_password);
      $user->setUserMail($user_mail);
      $user->setUserPostCode($user_post_code);
      $user->setUserPhoneNumber($user_phone_number);
      $user->setCardNumber($card_number);
      $user->setCardKey($card_key);
      $user->setUserState($user_state);
    }
    return $user;
  }
  /**
   * メールアドレスによる検索。
   *
   * @param string $user_mail メルアド。
   * @return User 該当するUserオブジェクト。ただし、該当データがない場合はnull。
   */
  public function findByUserMail(string $user_mail): ?User
  {
    $sql = "SELECT * FROM user_tbl WHERE user_mail = :user_mail";
    $stmt = $this->db->prepare($sql);

    $stmt->bindValue(":user_mail", $user_mail, PDO::PARAM_STR);
    $result = $stmt->execute();
    $user = null;
    if ($result && $row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $id = $row["id"];
      $user_name = $row["user_name"];
      $user_login_id = $row["user_login_id"];
      $user_password = $row["user_password"];
      $user_mail = $row["user_mail"];
      $user_post_code = $row["user_post_code"];
      $user_phone_number = $row["user_phone_number"];
      $card_number = $row["card_number"];
      $card_key = $row["card_key"];
      $user_state = $row["user_state"];

      $user = new User();
      $user->setId($id);
      $user->setUserName($user_name);
      $user->setUserLoginId($user_login_id);
      $user->setUserPassword($user_password);
      $user->setUserMail($user_mail);
      $user->setUserPostCode($user_post_code);
      $user->setUserPhoneNumber($user_phone_number);
      $user->setCardKey($card_number);
      $user->setUserMail($card_key);
      $user->setUserState($user_state);
    }
    return $user;
  }
  /**
   * ユーザリスト全取得
   *
   * @return User Userオブジェクト 該当なしの場合null
   */
  public function findAll(): array
  {
    $sql = "SELECT * FROM user_tbl";
    $stmt = $this->db->prepare($sql);
    $result = $stmt->execute();
    $UserList = [];
    while ($row = $stmt->fetch()) {
      $User = new User();
      $User->setId($row["id"]);
      $User->setUserName($row["user_mail"]);
      $User->setUserLoginId($row["user_login_id"]);
      $User->setUserPassword($row["user_password"]);
      $User->setUserMail($row["user_mail"]);
      $User->setUserPostCode($row["user_post_code"]);
      $User->setUserPhoneNumber($row["user_phone_number"]);
      $User->setCardNumber($row["card_number"]);
      $User->setCardKey($row["card_key"]);
      $User->setUserState($row["user_state"]);
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
    $sqlInsert = "INSERT INTO user_tbl (user_name,user_login_id,user_password,user_mail,user_post_code, user_phone_number,card_number,card_key) VALUES (:user_name,:user_login_id,:user_password,:user_mail,:user_post_code,: user_phone_number,:card_number,:card_key)";
    $stmt = $this->db->prepare($sqlInsert);
    $stmt->bindvalue(':user_name', $User->getUsMail(), PDO::PARAM_STR);
    $stmt->bindvalue(':user_login_id', $User->getUsName(), PDO::PARAM_STR);
    $stmt->bindvalue(':user_password', $User->getUsPassword(), PDO::PARAM_STR);
    $stmt->bindvalue(':user_mail', $User->getUsAuth(), PDO::PARAM_STR);
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
    $sqlUpdate = " UPDATE Users SET us_mail = :us_mail , us_name = :us_name , us_password = :us_password , = :us_auth WHERE id = :id";
    $stmt = $this->db->prepare($sqlUpdate);
    $stmt->bindvalue('us_mail', $User->getUsMail(), PDO::PARAM_STR);
    $stmt->bindvalue('us_name', $User->getUsName(), PDO::PARAM_STR);
    $stmt->bindvalue('us_password', $User->getUsPassword(), PDO::PARAM_STR);
    $stmt->bindvalue('us_auth', $User->getUsAuth(), PDO::PARAM_STR);
    $result = $stmt->execute();
    return $result;
  }
  /**
   * ユーザ削除
   * @param integer ユーザID
   * @return boolean 登録が成功したかどうか
   */
  public function delete(int $id): bool
  {
    $sql = "DELETE FROM Users WHERE id = :id";
    $stmt = $this->db->prepare($sql);
    $stmt->bindValue(":id", $id, PDO::PARAM_INT);
    $result = $stmt->execute();
    return $result;
  }
}
