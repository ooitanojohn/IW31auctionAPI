<?php

namespace Classes\Daos;

use PDO;
use Classes\Entities\Bidding;

class BiddingsDAO
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

  

  public function collectiveRegistration(Bidding $Bidding)
  {
    $sql = "INSERT INTO biddings(user_id, product_id, bidding_money, bidding_time) VALUES (:user_id,:product_id,bidding_money,bidding_time)";
    $stmt = $this->db->prepare($sql);
    for ($i=0; $i < 10; $i++) { 
      $stmt->bindValue(':user_id', $Bidding->getUserId(), PDO::PARAM_INT);
      $stmt->bindValue(':product_id', $Bidding->getProductId(), PDO::PARAM_INT);
      $stmt->bindValue(':bidding_time', $Bidding->getBiddingTime(), PDO::PARAM_STR);
      $stmt->bindValue(':bidding_money', $Bidding->getBiddingMoney(), PDO::PARAM_INT);
      $result = $stmt->execute();
    }
    if ($result) {
      $biddingId = $this->db->lastInsertId();
    } else {
      $biddingId = -1;
    }
    return $biddingId;
  }

  /**
   * biddings全取得
   */
  public function findAll() 
  {
    $sql = "SELECT * FROM biddings";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    $BiddingList = [];
    while ($row = $stmt->fetch()) {
      $Bidding = new Bidding();
      $Bidding->setUserId($row["user_id"]);
      $Bidding->setProductId($row["product_id"]);
      $Bidding->setBiddingMoney($row["bidding_money"]);
      $Bidding->setBiddingTime($row["bidding_time"]);
      $BiddingList[$row['user_id']] = $Bidding;
    }
    return $BiddingList;
  }

  public function insert(Bidding $Bidding): int  
  {
    $sql = "INSERT INTO biddings(user_id, product_id, bidding_money, bidding_time) VALUES (:user_id, :product_id, :bidding_money, :bidding_time)";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    $stmt->bindValue(':user_id', $Bidding->getUserId(), PDO::PARAM_INT);
    $stmt->bindValue(':product_id', $Bidding->getProductId(), PDO::PARAM_INT);
    $stmt->bindValue(':bidding_time', $Bidding->getBiddingTime(), PDO::PARAM_STR);
    $stmt->bindValue(':bidding_money', $Bidding->getBiddingMoney(), PDO::PARAM_INT);
    $result = $stmt->execute();
    if ($result) {
      $Bidding_id = $this->db->lastInsertId();
    } else {
      $Bidding_id = -1;
    }
    return $Bidding_id;
  }

  public function update(Bidding $Bidding)
  {
    $sqlUpdate = "UPDATE biddings SET user_id = :user_id , product_id = :product_id , Bidding_time = :Bidding_time , Bidding_money= :Bidding_money WHERE Bidding_id = :Bidding_id";
    $stmt = $this->db->prepare($sqlUpdate);
    $stmt->bindvalue(':user_id', $Bidding->getUserId(), PDO::PARAM_INT);
    $stmt->bindvalue(':product_id', $Bidding->getProductId(), PDO::PARAM_INT);
    $stmt->bindvalue(':Bidding_time', $Bidding->getBiddingTime(), PDO::PARAM_STR);
    $stmt->bindvalue(':Bidding_money', $Bidding->getBiddingMoney(), PDO::PARAM_INT);
    $result = $stmt->execute();
    return $result;
  }
}