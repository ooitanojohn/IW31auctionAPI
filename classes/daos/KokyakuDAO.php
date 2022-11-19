<?php
namespace Classes\daos;

use PDO;
use Classes\Entities\Kokyaku_tbl;

class KokyakuDAO
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
   * 顧客リスト全取得
   *
   * @return Kokyaku kokyakuオブジェクト 該当なしの場合null
   */
  public function findAll(): array
  {
    $sql = "SELECT * FROM kokyaku_tbl";
    $stmt = $this->db->prepare($sql);
    $result = $stmt->execute();
    $KokyakuList = [];
    while ($row = $stmt->fetch()) {
      $Kokyaku = new Kokyaku();
      $Kokyaku->setPurchaseId($row["purchase_id"]);
      $Kokyaku->setUserId($row["user_id"]);
      $Kokyaku->setPrice($row["price"]);
      $Kokyaku->setPrice($row["purchase_datetime"]);
      $Kokyaku->setPrice($row["product_id"]);
      $KokyakuList[$row['purchase_id']] = $Kokyaku;
    }
    return $KokyakuList;
  }
  /**
   * 顧客新規作成画面
   * @param Kokyaku
   * @return integer 登録失敗 = -1
   */
  public function insert(Kokyaku $Kokyaku): int
  {
    $sqlInsert = "INSERT INTO kokyaku_tbl (user_id, price, purchase_datetime, product_id) VALUES(:user_id,:price,:purchase_datetime,:product_id)";
    $stmt = $this->db->prepare($sqlInsert);
    $stmt->bindvalue(':user_id', $Kokyaku->getUserId(), PDO::PARAM_STR);
    $stmt->bindvalue(':price', $Kokyaku->getPrice(), PDO::PARAM_STR);
    $stmt->bindvalue(':purchase_datetime', $Kokyaku->getPurchaseDatetime(), PDO::PARAM_STR);
    $stmt->bindvalue(':product_id', $Kokyaku->getProductId(), PDO::PARAM_STR);
    $result = $stmt->execute();
    if ($result) {
      $kokyaku_id = $this->db->lastInsertId();
    } else {
      $kokyaku_id = -1;
    }
    return $maker_id;
  }
  /**
   * 車更新
   * @param Kokyaku
   * @return boolean
   */
  public function update(Kokyaku $Kokyaku): bool
  {
    $sqlUpdate = " UPDATE kokyaku_tbl SET  user_id= :user_id , price = :price , purchase_datetime = :purchase_datetime , product_id = :product_id  WHERE purchase_id = :purchase_id";
    $stmt = $this->db->prepare($sqlUpdate);
    $stmt->bindvalue(':user_id', $Kokyaku->getUserId(), PDO::PARAM_STR);
    $stmt->bindvalue(':price', $Kokyaku->getPrice(), PDO::PARAM_STR);
    $stmt->bindvalue(':purchase_datetime', $Kokyaku->getPurchaseDatetime(), PDO::PARAM_STR);
    $stmt->bindvalue(':product_id', $Kokyaku->getProductId(), PDO::PARAM_STR);
    $result = $stmt->execute();
    return $result;
  }
  /**
   * 車削除
   * @param integer ユーザID
   * @return boolean 登録が成功したかどうか
   */
  public function delete(int $purchase_id): bool
  {
    $sql = "DELETE FROM purchase_tbl WHERE purchase_id = :purchase_id";
    $stmt = $this->db->prepare($sql);
    $stmt->bindValue(":purchase_id", $purchase_id, PDO::PARAM_INT);
    $result = $stmt->execute();
    return $result;
  }
}
?>