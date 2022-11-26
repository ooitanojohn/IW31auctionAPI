<?php

namespace Classes\Daos;

use PDO;
use Classes\Entities\Bidding;

class BiddingDAO
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
   * BiddingIdによる検索。
   *
   * @param int $userId userID 。
   * @return Bidding 該当するUserオブジェクト。ただし、該当データがない場合はnull。
   */
  public function findByBiddingId(int $Bidding_id): ?Bidding
  {
    $sql = "SELECT * FROM bidding WHERE bidding_id = :biddingId";
    $stmt = $this->db->prepare($sql);

    $stmt->bindValue(":biddingId", $Bidding_id, PDO::PARAM_STR);
    $result = $stmt->execute();
    $user = null;
    if ($result && $row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $user_id = $row["user_id"];
      $product_id = $row["product_id"];
      $Bidding_time = $row["bidding_time"];
      $Bidding_money = $row["bidding_money"];

      $Bidding = new Bidding();
      $Bidding->setUserId($user_id);
      $Bidding->setProductId($product_id);
      $Bidding->setBiddingTime($Bidding_time);
      $Bidding->setBiddingMoney($Bidding_money);
    }
    return $Bidding;
  }
  /**
   * 入札リスト全取得
   *
   * @return Bidding Biddingオブジェクト 該当なしの場合null
   */
  public function findAll(): array
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
      $BiddingList[] = $Bidding;
    }
    return $BiddingList;
  }

  /**
   * ユーザ新規作成画面
   * @param Bidding
   * @return integer 登録失敗 = -1
   */
  public function insert(Bidding $Bidding): int
  {
    $sqlInsert = "INSERT INTO bidding (user_id , product_id, Bidding_time, Bidding_money) VALUES(:user_id,:product_id,:Bidding_time,Bidding_money)";
    $stmt = $this->db->prepare($sqlInsert);
    $stmt->bindvalue(':user_id', $Bidding->getUserID(), PDO::PARAM_INT);
    $stmt->bindvalue(':product_id', $Bidding->getProductId(), PDO::PARAM_INT);
    $stmt->bindvalue(':bidding_time', $Bidding->getBiddingTime(), PDO::PARAM_STR);
    $stmt->bindvalue(':bidding_money', $Bidding->getBiddingMoney(), PDO::PARAM_INT);
    $result = $stmt->execute();
    if ($result) {
      $Bidding_id = $this->db->lastInsertId();
    } else {
      $Bidding_id = -1;
    }
    return $Bidding_id;
  }
  /**
   * ユーザ更新
   * @param Bidding
   * @return boolean
   */
  public function update(Bidding $Bidding): bool
  {
    $sqlUpdate = " UPDATE Bidding SET user_id = :user_id , product_id = :product_id , Bidding_time = :Bidding_time , Bidding_money= :Bidding_money WHERE Bidding_id = :Bidding_id";
    $stmt = $this->db->prepare($sqlUpdate);
    $stmt->bindvalue(':user_id', $Bidding->getUserId(), PDO::PARAM_STR);
    $stmt->bindvalue(':product_id', $Bidding->getProductId(), PDO::PARAM_STR);
    $stmt->bindvalue(':Bidding_time', $Bidding->getBiddingTime(), PDO::PARAM_STR);
    $stmt->bindvalue(':Bidding_money', $Bidding->getBiddingMoney(), PDO::PARAM_STR);
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
    $sql = "DELETE FROM Bidding WHERE Bidding_id = :Bidding_id";
    $stmt = $this->db->prepare($sql);
    $stmt->bindValue(":id", $id, PDO::PARAM_INT);
    $result = $stmt->execute();
    return $result;
  }
}
