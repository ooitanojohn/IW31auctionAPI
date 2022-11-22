<?php 
  namespace Classes\daos;

  use Classes\Entities\Product;
  use PDO;

  class ProductDAO {
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
     * productIdによる検索。
     * 
     * @param int $product_id productID
     * @return Product 該当するUserオブジェクト。ただし、該当データがない場合はnull。
     */
    public function findByProductId(int $productId): ?ProductDAO
    {
      $sql = "SELECT * FROM product_tbl WHERE product_id = :productId";
      $stmt = $this->db->prepare($sql);

      $stmt->bindValue(":prodctId", $productId, PDO::PARAM_STR);
      $result = $stmt->execute();
      $user = null;
      if ($result && $row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $product_id = $row["product_id"];
        $car_id = $row["car_id"];
        $car_price = $row["car_price"];
        $start_price = $row["start_price"];
        $asking_price = $row["asking_price"];
        $exhibit_date = $row["exhibit_date"];
        $purchase_date = $row["purchase_date"];
        $user_id = $row["user_id"];
        $car_condition = $row["car_condition"];

        $Product = new Product();
        $Product->setId($product_id);
        $Product->setCarId($car_id);
        $Product->setCarPrice($car_price);
        $Product->setStartPrice($start_price);
        $Product->setAskingPrice($asking_price);
        $Product->setExhibitDate($exhibit_date);
        $Product->setPurchaseDate($purchase_date);
        $Product->setUserId($user_id);
        $Product->setCarCondition($car_condition);
      }
      return $Product;
    }
    /**
     * ユーザーリスト全取得
     * @return Product Productオブジェクト該当なしの場合null
     */
    public function findAll():array
    {
      $sql = "SELECT * FROM product_tbl";
      $stmt = $this->db->prepare($sql);
      $result = $stmt->execute();
      $product_list = [];
      while($row = $stmt->fetch()) {
        $Product = new Product();
        $Product->setId($row["id"]);
        $Product->setCarId($row["car_id"]);
        $Product->setCarPrice($row["car_price"]);
        $Product->setStartPrice($row["start_price"]);
        $Product->setAskingPrice($row["asking_price"]);
        $Product->setExhibitDate($row["exhibit_date"]);
        $Product->setPurchaseDate($row["purchase_date"]);
        $Product->setUserId($row["user_id"]);
        $Product->setCarCondition($row["car_condition"]);
        $product_list[$row['id']] = $Product;
      }
      return $Product;
    }
    /**
     * ユーザー新規作成画面
     * @param Product
     * @return integer =-1
     */
    public function insert(Product $Product): bool
    {
      $sql_insert = "INSERT INTO product_tbl (car_id, car_price, start_price, asking_price, exhibit_date, purchase_date, user_id,car_condition) VALUES (:car_id, :car_price, :start_price, :asking_price, :exhibit_date, :purchase_date, :user_id, :car_condition);";
      $stmt = $this->db->prepare($sql_insert);
      $stmt->bindValue(':car_id', $Product->getCarId(), PDO::PARAM_STR);
      $stmt->bindValue(':car_price', $Product->getCarPrice(), PDO::PARAM_STR);
      $stmt->bindValue(':start_price', $Product->getStartPrice(), PDO::PARAM_STR);
      $stmt->bindValue(':asking_price', $Product->getAskingPrice(), PDO::PARAM_STR);
      $stmt->bindValue(':exhibit_date', $Product->getExhibitDate(), PDO::PARAM_STR);
      $stmt->bindValue(':purchase_date', $Product->getPurchaseDate(), PDO::PARAM_STR);
      $stmt->bindValue(':user_id', $Product->getUserId(), PDO::PARAM_STR);
      $stmt->bindValue(':car_condition', $Product->getCarCondition(), PDO::PARAM_STR);
      $result = $stmt->execute();
      if ($result) {
        $product_id = $this->db->lastInsertId();
      } else {
        $product_id = -1;
      }
      return $product_id;
    }
    /**
     * 商品更新
     * @param Product
     * @return boolean
     */
    public function update(Product $Product) :bool
    {
      $sql_update = "UPDATE product_tbl SET car_id = :car_id, car_price = :car_price, start_price = :start_price, asking_price = :asking_price, exhibit_date = :exhibit_date, purchase_date = :purchase_date,user_id = :user_id,car_condition = :car_condition WHERE product_id = :product_id";
      $stmt = $this->db->prepare($sql_update);
      $stmt->bindValue(':car_id', $Product->getCarId(), PDO::PARAM_STR);
      $stmt->bindValue(':car_price', $Product->getCarPrice(), PDO::PARAM_STR);
      $stmt->bindValue(':start_price', $Product->getStartPrice(), PDO::PARAM_STR);
      $stmt->bindValue(':asking_price', $Product->getAskingPrice(), PDO::PARAM_STR);
      $stmt->bindValue(':exhibit_date', $Product->getExhibitDate(), PDO::PARAM_STR);
      $stmt->bindValue(':purchase_date', $Product->getPurchaseDate(), PDO::PARAM_STR);
      $stmt->bindValue(':user_id', $Product->getUserId(), PDO::PARAM_STR);
      $stmt->bindValue(':car_condition', $Product->getCarCondition(), PDO::PARAM_STR);
      $result = $stmt->execute();
      return $result;
    }
    /**
     * 商品削除
     * @param integer 商品ID
     * @return boolean 登録が成功したかどうか
     */
    public function delete(int $id): bool
    {
      $sql = "DELETE FROM product_tbl WHERE id=:id";
      $stmt = $this->db->prepare($sql);
      $stmt->bindValue(":id", $id, PDO::PARAM_INT);
      $result = $stmt->execute();
      return $result;
    }
  }
 ?>