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

    public function collectiveRegistration(Product $Product)
    {
      $sql = "INSERT INTO products (stock_id, start_price, asking_price, start_time, end_time, user_id, car_img, product_state, update_time) VALUES (:stock_id,:start_price,:asking_price,:start_time,:end_time,:user_id,:product_state,:update_time)";
      $stmt = $this->db->prepare($sql);
      for ($i=0; $i < 10; $i++) { 
        $stmt->bindValue(':car_id',$Product->getCarId(),PDO::PARAM_INT);
        $stmt->bindValue(':stock_id',$Product->getStockId(),PDO::PARAM_INT);
        $stmt->bindValue(':start_price',$Product->getStartPrice(),PDO::PARAM_INT);
        $stmt->bindValue(':asking_price',$Product->getAskingPrice(),PDO::PARAM_INT);
        $stmt->bindValue(':start_time',$Product->getStartTime(),PDO::PARAM_INT);
        $stmt->bindValue(':end_time',$Product->getEndTime(),PDO::PARAM_INT);
        $stmt->bindValue(':user_id',$Product->getUserId(),PDO::PARAM_INT);
        $stmt->bindValue(':product_state',$Product->getCarImg(),PDO::PARAM_INT);
        $stmt->bindValue(':update_time',$Product->getProductState(),PDO::PARAM_INT);
        $result = $stmt->execute();
      }
      if ($result) {
        $carId = $this->db->lastInsertId();
      } else {
        $carId = -1;
      }
      return $carId;
    }

    /**
     * productIdによる検索。
     * 
     * @param int $product_id productID
     * @return Product 該当するUserオブジェクト。ただし、該当データがない場合はnull。
     */
    public function findByProduct(int $productId): ?ProductDAO
    {
      $sql = "SELECT * FROM products WHERE product_id = :productId";
      $stmt = $this->db->prepare($sql);

      $stmt->bindValue(":prodctId", $productId, PDO::PARAM_STR);
      $result = $stmt->execute();
      $Product = null;
      if ($result && $row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $product_id = $row["product_id"];
        $car_id = $row["car_id"];
        $stock_id = $row["stock_id"];
        $start_price = $row["start_price"];
        $asking_price = $row["asking_price"];
        $start_time = $row["start_time"];
        $end_time = $row["end_time"];
        $user_id = $row["user_id"];
        $car_img = $row["car_img"];
        $product_state = $row["product_state"];
        $update_time = $row["update_time"];
        
        $Product = new Product();
        $Product->setProductId($product_id);
        $Product->setCarId($car_id);
        $Product->setStockId($stock_id);
        $Product->setStartPrice($start_price);
        $Product->setAskingPrice($asking_price);
        $Product->setStartTime($start_time);
        $Product->setEndTime($end_time);
        $Product->setUserId($user_id);
        $Product->setCarImg($car_img);
        $Product->setProductState($product_state);
        $Product->setUpdateTime($update_time);
      }
      return $Product;
    }
    /**
     * ユーザーリスト全取得
     * @return Product Productオブジェクト該当なしの場合null
     */
    public function findAll():array
    {
      $sql = "SELECT * FROM products";
      $stmt = $this->db->prepare($sql);
      $result = $stmt->execute();
      $product_list = [];
      while($row = $stmt->fetch()) {
        $Product = new Product();
        $Product->setProductId($row["product_id"]);
        $Product->setCarId($row["car_id"]);
        $Product->setStockId($row["stock_id"]);
        $Product->setStartPrice($row["start_price"]);
        $Product->setAskingPrice($row["asking_price"]);
        $Product->setStartTime($row["start_time"]);
        $Product->setEndTime($row["end_time"]);
        $Product->setUserId($row["user_id"]);
        $Product->setCarImg($row["car_img"]);
        $Product->setProductState($row["product_state"]);
        $Product->setUpdateTime($row["update_time"]);
        $product_list[$row['id']] = $Product;
      }
      return $Product;
    }
    /**
     * ユーザー新規作成画面
     * 
     * @param Product
     * @return integer =-1
     */
    public function insert(Product $Product): bool
    {
      $sql = "INSERT INTO products (stock_id, start_price, asking_price, start_time, end_time, user_id, car_img, product_state, update_time) VALUES (:stock_id,:start_price,:asking_price,:start_time,:end_time,:user_id,:product_state,:update_time)";
      
      $stmt = $this->db->prepare($sql);
      $stmt->bindValue(':car_id',$Product->getCarId(),PDO::PARAM_INT);
      $stmt->bindValue(':stock_id',$Product->getStockId(),PDO::PARAM_INT);
      $stmt->bindValue(':start_price',$Product->getStartPrice(),PDO::PARAM_INT);
      $stmt->bindValue(':asking_price',$Product->getAskingPrice(),PDO::PARAM_INT);
      $stmt->bindValue(':start_time',$Product->getStartTime(),PDO::PARAM_INT);
      $stmt->bindValue(':end_time',$Product->getEndTime(),PDO::PARAM_INT);
      $stmt->bindValue(':user_id',$Product->getUserId(),PDO::PARAM_INT);
      $stmt->bindValue(':product_state',$Product->getCarImg(),PDO::PARAM_INT);
      $stmt->bindValue(':update_time',$Product->getProductState(),PDO::PARAM_INT);
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
      $stmt->bindValue(':car_id',$Product->getCarId(),PDO::PARAM_INT);
      $stmt->bindValue(':stock_id',$Product->getStockId(),PDO::PARAM_INT);
      $stmt->bindValue(':start_price',$Product->getStartPrice(),PDO::PARAM_INT);
      $stmt->bindValue(':asking_price',$Product->getAskingPrice(),PDO::PARAM_INT);
      $stmt->bindValue(':start_time',$Product->getStartTime(),PDO::PARAM_INT);
      $stmt->bindValue(':end_time',$Product->getEndTime(),PDO::PARAM_INT);
      $stmt->bindValue(':user_id',$Product->getUserId(),PDO::PARAM_INT);
      $stmt->bindValue(':product_state',$Product->getCarImg(),PDO::PARAM_INT);
      $stmt->bindValue(':update_time',$Product->getProductState(),PDO::PARAM_INT);
      $result = $stmt->execute();
      return $result;
    }
    /**
     * 商品削除
     * @param integer 商品ID
     * @return boolean 登録が成功したかどうか
     */
    public function delete(): bool
    {
      $sql = "DELETE FROM products";
      $stmt = $this->db->prepare($sql);
      $result = $stmt->execute();
      return $result;
    }
  }
 ?>