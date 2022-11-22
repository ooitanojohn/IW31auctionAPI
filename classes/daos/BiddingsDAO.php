<?php
namespace Classes\daos;

use PDO;
use Classes\Entities\Biddings_tbl;

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

  /**
   * biddingsIdによる検索。
   *
   * @param int $userId userID 。
   * @return Biddings 該当するUserオブジェクト。ただし、該当データがない場合はnull。
   */
  public function findByBiddingsId(int $biddings_id): ?Biddings
  {
    $sql = "SELECT * FROM biddings_tbl WHERE biddings_id = :biddingsId";
    $stmt = $this->db->prepare($sql);

    $stmt->bindValue(":biddingId", $biddings_id, PDO::PARAM_STR);
    $result = $stmt->execute();
    $user = null;
    if ($result && $row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $biddings_id = $row["biddings_id"];
      $user_id = $row["user_id"];
      $product_id = $row["product_id"];
      $biddings_time = $row["biddings_time"];
      $biddings_money = $row["biddings_money"];

      $Biddings = new Biddings();
      $Biddings->setBiddingsId($biddings_id);
      $Biddings->setUserId($user_id);
      $Biddings->setProductId($product_id);
      $Biddings->setBiddingsTime($biddings_time);
      $Biddings->setBiddingsMoney($biddings_money);
    }
    return $Biddings;
  }
  /**
   * 入札リスト全取得
   *
   * @return Biddings Biddingsオブジェクト 該当なしの場合null
   */
  public function findAll(): array
  {
    $sql = "SELECT * FROM biddings_tbl";
    $stmt = $this->db->prepare($sql);
    $result = $stmt->execute();
    $BiggingsList = [];
    while ($row = $stmt->fetch()) {
      $Biddings = new Biddings();
      $Biddings->setBiddingId($row["bidding_id"]);
      $Biddings->setUserId($row["user_id"]);
      $Biddings->setProductId($row["product_id"]);
      $Biddings->setBiddingTime($row["bidding_time"]);
      $Biddings->setBiddingMoney($row["bidding_money"]);
      $BiddingsList[$row['bidding_id']] = $Biddings;
    }
    return $BiddingsList;
  }

  /**
   * ユーザ新規作成画面
   * @param Biddings
   * @return integer 登録失敗 = -1
   */
  public function insert(Biddings $Biddings): int
  {
    $sqlInsert = "INSERT INTO biddings_tbl (user_id , product_id, biddings_time, biddings_money) VALUES(:user_id,:product_id,:biddings_time,biddings_money)";
    $stmt = $this->db->prepare($sqlInsert);
    $stmt->bindvalue(':user_id', $Biddings->getUserID(), PDO::PARAM_STR);
    $stmt->bindvalue(':product_id', $Biddings->getProductId(), PDO::PARAM_STR);
    $stmt->bindvalue(':biddings_time', $Biddings->getBiddingsTime(), PDO::PARAM_STR);
    $stmt->bindvalue(':biddings_money', $User->getBiddingsMoney(), PDO::PARAM_STR);
    $result = $stmt->execute();
    if ($result) {
      $biddings_id = $this->db->lastInsertId();
    } else {
      $biddings_id = -1;
    }
    return $biddings_id;
  }
  /**
   * ユーザ更新
   * @param Biddings
   * @return boolean
   */
  public function update(Biddings $Biddings): bool
  {
    $sqlUpdate = " UPDATE biddings_tbl SET user_id = :user_id , product_id = :product_id , biddings_time = :biddings_time , biddings_money= :biddings_money WHERE biddings_id = :biddings_id";
    $stmt = $this->db->prepare($sqlUpdate);
    $stmt->bindvalue(':user_id', $Biddings->getUserId(), PDO::PARAM_STR);
    $stmt->bindvalue(':product_id', $Biddings->getProductId(), PDO::PARAM_STR);
    $stmt->bindvalue(':biddings_time', $Biddings->getBiddingsTime(), PDO::PARAM_STR);
    $stmt->bindvalue(':biddings_money', $Biddings->getBiddingsMoney(), PDO::PARAM_STR);
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
    $sql = "DELETE FROM biddings_tbl WHERE biddings_id = :biddings_id";
    $stmt = $this->db->prepare($sql);
    $stmt->bindValue(":id", $id, PDO::PARAM_INT);
    $result = $stmt->execute();
    return $result;
  }
}
?>