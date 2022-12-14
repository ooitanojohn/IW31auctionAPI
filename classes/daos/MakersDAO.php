<?php

namespace Classes\Daos;

use PDO;
use Classes\Entities\Maker;

class MakersDAO
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
  
  public function collectiveRegistration(Maker $Maker)
  {
    $sql = "INSERT INTO makers(maker_name, update_time) VALUES (:maker_name, update_time)";
    $stmt = $this->db->prepare($sql);
    for ($i=0; $i < 10; $i++) { 
      $stmt->bindvalue(':maker_name', $Maker->getMakerName(), PDO::PARAM_STR);
      $stmt->bindvalue(':update_time', $Maker->getUpdateTime(), PDO::PARAM_STR);
      $result = $stmt->execute();
    }
    if ($result) {
      $carId = $this->db->lastInsertId();
    } else {
      $carId = -1;
    }
    return $carId;
  }

  public function findByMaker(int $MakerId): ?Maker
  {
    $sql = "SELECT * FROM makers WHERE maker_id = :maker_id";
    $stmt = $this->db->prepare($sql);

    $stmt->bindValue(":maker_id", $MakerId, PDO::PARAM_STR);
    $result = $stmt->execute();
    $Maker = null;
    if ($result && $row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $maker_id = $row["maker_id"];
      $maker_name = $row["maker_name"];
      $update_time = $row["update_time"];

      $Maker = new Maker();
      $Maker->setMakerId($maker_id);
      $Maker->setMakerName($maker_name);
      $Maker->setUpdateTime($update_time);
    }
    return $Maker;
  }
  /**
   * 車リスト全取得
   *
   * @return maker carオブジェクト 該当なしの場合null
   */
  public function findAll(): array
  {
    $sql = "SELECT * FROM makers";
    $stmt = $this->db->prepare($sql);
    $result = $stmt->execute();
    $MakerList = [];
    while ($row = $stmt->fetch()) {
      $Maker = new Maker();
      $Maker->setMakerId($row["maker_id"]);
      $Maker->setMakerName($row["maker_name"]);
      $Maker->setUpdateTime($row["update_time"]);
      $MakerList[$row['maker_id']] = $Maker;
    }
    return $MakerList;
  }
  /**
   * 車新規作成画面
   * @param Maker
   * @return integer 登録失敗 = -1
   */
  public function insert(Maker $Maker): int
  {
    $sql = "INSERT INTO makers (maker_name, update_time) VALUES(:maker_name, :update_time)";
    $stmt = $this->db->prepare($sql);
    $stmt->bindvalue(':maker_name', $Maker->getMakerName(), PDO::PARAM_STR);
    $stmt->bindvalue(':update_time', $Maker->getUpdateTime(), PDO::PARAM_STR);
    $result = $stmt->execute();
    if ($result) {
      $makerId = $this->db->lastInsertId();
    } else {
      $makerId = -1;
    }
    return $makerId;
  }
  /**
   * 車更新
   * @param Maker
   * @return boolean
   */
  public function update(Maker $Maker): bool
  {
    $sql = "UPDATE makers SET maker_name= :maker_name ,update_time = :update_time WHERE maker_id = :maker_id";
    $stmt = $this->db->prepare($sql);
    $stmt->bindvalue(':maker_name', $Maker->getMakerName(), PDO::PARAM_STR);
    $stmt->bindvalue(':update_time', $Maker->getUpdateTime(), PDO::PARAM_STR);
    $stmt->bindValue(':maker_id', $Maker->getMakerId(), PDO::PARAM_INT);
    $result = $stmt->execute();
    return $result;
  }
  /**
   * 車削除
   * @param integer ユーザID
   * @return boolean 登録が成功したかどうか
   */
  public function delete(int $makerId): bool
  {
    $sql = "DELETE FROM makers WHERE maker_id = :maker_id";
    $stmt = $this->db->prepare($sql);
    $stmt->bindValue(":maker_id", $makerId, PDO::PARAM_INT);
    $result = $stmt->execute();
    return $result;
  }
}
