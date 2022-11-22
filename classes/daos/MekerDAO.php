<?php

namespace Classes\Daos;

use PDO;
use Classes\Entities\Car;

class CarDAO
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

  public function findByMaker(int $MakerId): ?Car
  {
    $sql = "SELECT * FROM maker WHERE maker_id = :maker_Id";
    $stmt = $this->db->prepare($sql);

    $stmt->bindValue(":maker_id", $MakerId, PDO::PARAM_STR);
    $result = $stmt->execute();
    $car = null;
    if ($result && $row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $maker_id = $row["maker_id"];
      $maker_name = $row["maker_name"];

      $car = new Car();
      $car->setCarId($maker_id);
      $car->setCarName($maker_name);
    }
    return $car;
  }
  /**
   * 車リスト全取得
   *
   * @return Car carオブジェクト 該当なしの場合null
   */
  public function findAll(): array
  {
    $sql = "SELECT * FROM maker";
    $stmt = $this->db->prepare($sql);
    $result = $stmt->execute();
    $CarList = [];
    while ($row = $stmt->fetch()) {
      $Car = new Car();
      $Car->setCarId($row["maker_id"]);
      $Car->setCarName($row["maker_name"]);
      $CarList[$row['maker_id']] = $Car;
    }
    return $CarList;
  }
  /**
   * 車新規作成画面
   * @param Car
   * @return integer 登録失敗 = -1
   */
  public function insert(Car $Car): int
  {
    $sqlInsert = "INSERT INTO maker (maker_name) VALUES(:maker_name)";
    $stmt = $this->db->prepare($sqlInsert);
    $stmt->bindvalue(':maker_name', $Car->getCarName(), PDO::PARAM_STR);
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
   * @param Car
   * @return boolean
   */
  public function update(Car $Car): bool
  {
    $sqlUpdate = " UPDATE maker SET  maker_name= :maker_name WHERE maker_id = :maker_id";
    $stmt = $this->db->prepare($sqlUpdate);
    $stmt->bindvalue(':maker_name', $Car->getMakerName(), PDO::PARAM_STR);
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
    $sql = "DELETE FROM maker WHERE maker_id = :maker_id";
    $stmt = $this->db->prepare($sql);
    $stmt->bindValue(":maker_id", $makerId, PDO::PARAM_INT);
    $result = $stmt->execute();
    return $result;
  }
}
