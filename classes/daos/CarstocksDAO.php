<?php 

  namespace Classes\Daos;

use Classes\Entities\Car;
use PDO;
  use Classes\Entities\Carstock;

  class CarstockDAO
  {
    private PDO $db;

    public function __construct(PDO $db) {
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
      $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
      $this->db = $db;
    }
    
    public function collectiveRegistration(Carstock $Carstock)
    {
      $sql = "INSERT INTO carstocks(car_id, car_state, arrival_time, arrival_price, updata_time) VALUES (:car_id,:car_state, :arrival_time, arrival_price, updata_time);";
      $stmt = $this->db->prepare($sql);
      for ($i=0; $i < 10; $i++) { 
        $stmt->bindvalue(':car_id', $Carstock->getCarId(), PDO::PARAM_INT);
        $stmt->bindvalue(':car_state', $Carstock->getCarState(), PDO::PARAM_INT);
        $stmt->bindvalue(':arrival_time', $Carstock->getArrivalTime(), PDO::PARAM_STR);
        $stmt->bindValue(':arrival_price', $Carstock->getArrivalPrice(), PDO::PARAM_INT);
        $stmt->bindValue(':updata_time', $Carstock->getUpdateTime(), PDO::PARAM_STR);
        $stmt->bindValue(':stock_id', $Carstock->getStockId(), PDO::PARAM_INT);
        $result = $stmt->execute();
      }
      if ($result) {
        $carstockId = $this->db->lastInsertId();
      } else {
        $carstockId = -1;
      }
      return $carstockId;
    }
    public function findByCarsock(int $Carstock_id)
    {
      $sql = "SELECT * FROM carstocks WHERE carstock_id = :stock_id";
      $stmt = $this->db->prepare($sql);

      $stmt->bindValue(":carstock_id", $Carstock_id, PDO::PARAM_INT);
      $result = $stmt->execute();
      $carstock = null;
      if ($result && $row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $stock_id = $row["stock_id"];
        $car_id = $row["car_id"];
        $car_state = $row["car_state"];
        $arrival_time = $row["arrival_time"];
        $arrival_price = $row["arrival_price"];
        $updata_time = $row["updata_time"];

        $carstock = new Carstock();
        $carstock->setStockId($stock_id);
        $carstock->setCarId($car_id);
        $carstock->setCarState($car_state);
        $carstock->setArrivalTime($arrival_time);
        $carstock->setArrivalPrice($arrival_price);
        $carstock->setUpdateTime($updata_time);
        
      }
    }
    public function findRowPK(int $stock_id): ?Car
    {
      $sql = "SELECT * FROM carstocks WHERE stock_id = :stock_id";
      $stmt = $this->db->prepare($sql);
      
      $stmt->bindValue(":stock_id", $stock_id, PDO::PARAM_STR);
      $result = $stmt->execute();
      $carstock = null;
      if ($result && $row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $stock_id = $row["stock_id"];
        $car_id = $row["car_id"];
        $car_state = $row["car_state"];
        $arrival_time = $row["arrival_time"];
        $arrival_price = $row["arrival_price"];
        $updata_time = $row["updata_time"];
  
        $carstock = new Carstock();
        $carstock->setStockId($stock_id);
        $carstock->setCarId($car_id);
        $carstock->setCarState($car_state);
        $carstock->setArrivalTime($arrival_time);
        $carstock->setArrivalPrice($arrival_price);
        $carstock->setUpdateTime($updata_time);
      }
      return $carstock;
    }
    public function findAll(): array
    {
      $sql = "SELECT * FROM carstocks";
      $stmt = $this->db->prepare($sql);
      $result = $stmt->execute();
      $CarstockList = [];
      while ($row = $stmt->fetch()) {
        $carstock = new carstock();
        $carstock->setStockId($row["stock_id"]);
        $carstock->setCarId($row["car_id"]);
        $carstock->setArrivalTime($row["arrival_time"]);
        $carstock->setArrivalPrice($row["arrival_price"]);
        $carstock->setUpdateTime($row["updata_time"]);
        $CarstockList[$row['stock_id']] = $carstock;
      }
      return $CarstockList;
    }
    public function update(Carstock $Carstock)
    {
      $sql = "UPDATE carstocks SET car_id=:car_id,car_state=:car_state,arrival_time=:arrival_time,arrival_price=:arrival_price,updata_time=:updata_time WHERE stock_id = :stock_id";
      $stmt = $this->db->prepare($sql);
      $stmt->bindvalue(':car_id', $Carstock->getCarId(), PDO::PARAM_INT);
      $stmt->bindvalue(':car_state', $Carstock->getCarState(), PDO::PARAM_INT);
      $stmt->bindvalue(':arrival_time', $Carstock->getArrivalTime(), PDO::PARAM_STR);
      $stmt->bindValue(':arrival_price', $Carstock->getArrivalPrice(), PDO::PARAM_INT);
      $stmt->bindValue(':updata_time', $Carstock->getUpdateTime(), PDO::PARAM_STR);
      $stmt->bindValue(':stock_id', $Carstock->getStockId(), PDO::PARAM_INT);
    }
    public function insert(Carstock $Carstock)
    {
      $sql = "INSERT INTO carstocks(car_id, car_state, arrival_time, arrival_price, updata_time) VALUES (:car_id, :car_state, :arrival_time, :arrival_price, :updata_time)";
      $stmt = $this->db->prepare($sql);
      $stmt->bindValue(':car_id', $Carstock->getCarId(), PDO::PARAM_INT);
      $stmt->bindValue(':car_state', $Carstock->getCarState(), PDO::PARAM_INT);
      $stmt->bindValue(':arrival_time', $Carstock->getArrivalTime(), PDO::PARAM_STR);
      $stmt->bindValue(':arrival_price', $Carstock->getArrivalPrice(), PDO::PARAM_INT);
      $stmt->bindValue(':updata_time', $Carstock->getUpdateTime(), PDO::PARAM_INT);
    }
    public function delete(int $stock_id): bool
    {
      $sql = "DELETE FROM carstocks WHERE stock_id = :stock_id";
      $stmt = $this->db->prepare($sql);
      $stmt->bindValue(":stock_id", $stock_id, PDO::PARAM_INT);
      $result = $stmt->execute();
      return $result;  
    }  
  }
  
?>