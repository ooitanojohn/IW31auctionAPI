<?php

namespace Classes\Daos;

use PDO;
use Classes\Entities\Car;

class CarsDAO
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

  public function collectiveRegistration(Car $Car)
  {
    $sql = "INSERT INTO cars(car_name, stock, maker_id, update_time) VALUES (:car_name,:stock,:maker_id,:update_time)";
    $stmt = $this->db->prepare($sql);
    for ($i=0; $i < 10; $i++) { 
      $stmt->bindValue(':car_name', $Car->getCarName(), PDO::PARAM_STR);
      $stmt->bindValue(':stock', $Car->getStock(), PDO::PARAM_INT);
      $stmt->bindValue(':maker_id', $Car->getMakerId(), PDO::PARAM_INT);
      $stmt->bindValue(':update_time', $Car->getUpdateTime(), PDO::PARAM_STR);
      $result = $stmt->execute();
    }
    if ($result) {
      $carId = $this->db->lastInsertId();
    } else {
      $carId = -1;
    }
    return $carId;
  }

  public function findByCar(int $CarId): ?Car
  {
    $sql = "SELECT * FROM users WHERE car_id = :car_Id";
    $stmt = $this->db->prepare($sql);

    $stmt->bindValue(":car_id", $CarId, PDO::PARAM_STR);
    $result = $stmt->execute();
    $car = null;
    if ($result && $row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $car_id = $row["car_id"];
      $car_name = $row["car_name"];
      $stock = $row["stock"];
      $maker_id = $row["maker_id"];
      $update_time = $row["update_time"];

      $car = new Car();
      $car->setCarId($car_id);
      $car->setCarName($car_name);
      $car->setStock($stock);
      $car->setMakerId($maker_id);
      $car->setUpdateTime($update_time);
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
    $sql = "SELECT * FROM car";
    $stmt = $this->db->prepare($sql);
    $result = $stmt->execute();
    $CarList = [];
    while ($row = $stmt->fetch()) {
      $Car = new Car();
      $Car->setCarId($row["car_id"]);
      $Car->setCarName($row["car_name"]);
      $Car->setStock($row["stock"]);
      $Car->setMakerId($row["maker_id"]);
      $Car->setUpdateTime($row["update_time"]);
      $CarList[$row['car_id']] = $Car;
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
    $sql = "INSERT INTO biddings (car_name, stock, maker_id,  update_time) VALUES(:car_name, :stock, :maker_id, :update_time)";
    $stmt = $this->db->prepare($sql);
    $stmt->bindvalue(':car_name', $Car->getCarName(), PDO::PARAM_STR);
    $stmt->bindvalue(':stock', $Car->getStock(), PDO::PARAM_STR);
    $stmt->bindvalue(':maker_id', $Car->getMakerId(), PDO::PARAM_INT);
    $stmt->bindvalue(':upadate_time', $Car->getUpdateTime(), PDO::PARAM_STR);
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
    $sql = "UPDATE cars SET car_id=:car_id,car_name=:car_name,stock=:stock,maker_id=:maker_id,update_time=:update_time WHERE car_id = :car_id";
    $stmt = $this->db->prepare($sql);
    $stmt->bindvalue(':car_name', $Car->getCarName(), PDO::PARAM_STR);
    $stmt->bindvalue(':maker_id', $Car->getMakerId(), PDO::PARAM_STR);
    $result = $stmt->execute();
    return $result;
  }
  /**
   * 車削除
   * @param integer ユーザID
   * @return boolean 登録が成功したかどうか
   */
  public function delete(int $car_id): bool
  {
    $sql = "DELETE FROM car";
    $stmt = $this->db->prepare($sql);
    $result = $stmt->execute();
    return $result;
  }
}
