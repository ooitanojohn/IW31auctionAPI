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
  /**
   * ログインIDによる検索。
   *
   * @param int $userId ログインID 。
   * @return User 該当するUserオブジェクト。ただし、該当データがない場合はnull。
   */
  public function findByUserId(int $userId): ?User
  {
    $sql = "SELECT * FROM users WHERE id = :loginId";
    $stmt = $this->db->prepare($sql);

    $stmt->bindValue(":loginId", $userId, PDO::PARAM_STR);
    $result = $stmt->execute();
    $user = null;
    if ($result && $row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $id = $row["id"];
      $us_mail = $row["us_mail"];
      $us_name = $row["us_name"];
      $us_password = $row["us_password"];
      $us_auth = $row["us_auth"];

      $user = new User();
      $user->setId($id);
      $user->setUsMail($us_mail);
      $user->setUsName($us_name);
      $user->setUsPassword($us_password);
      $user->setUsAuth($us_auth);
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
    $sql = "SELECT * FROM users";
    $stmt = $this->db->prepare($sql);
    $result = $stmt->execute();
    $UserList = [];
    while ($row = $stmt->fetch()) {
      $User = new User();
      $User->setId($row["id"]);
      $User->setUsMail($row["us_mail"]);
      $User->setUsName($row["us_name"]);
      $User->setUsPassword($row["us_password"]);
      $User->setUsAuth($row["us_auth"]);
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
    $sqlInsert = "INSERT INTO Users (us_mail,us_name,us_password,us_auth) VALUES(:us_mail,:us_name,
:us_password,:us_auth)";
    $stmt = $this->db->prepare($sqlInsert);
    $stmt->bindvalue('us_mail', $User->getUsMail(), PDO::PARAM_STR);
    $stmt->bindvalue('us_name', $User->getUsName(), PDO::PARAM_STR);
    $stmt->bindvalue('us_password', $User->getUsPassword(), PDO::PARAM_STR);
    $stmt->bindvalue('us_auth', $User->getUsAuth(), PDO::PARAM_STR);
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
