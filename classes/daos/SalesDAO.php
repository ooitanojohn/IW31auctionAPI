<?php 
    
  namespace Classes\Daos;

  use PDO;
  use Classes\Entities\Sale;

  class SalesDAO
  {
    private PDO $db;

    public function __construct(PDO $db)
    {
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
      $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
      $this->db = $db;
    }

    public function insert(Sale $Sale): int
    {
      $sql = "INSERT INTO sales(user_id, sales_money, sales_time, product_id) VALUES (:user_id,:sales_money,:sales_time,:product_id)";
      $stmt = $this->db->prepare($sql);
      $stmt->bindValue(':user_id', $Sale->getUserId(), PDO::PARAM_INT);
      $stmt->bindValue(':sales_money', $Sale->getSalesMoney(), PDO::PARAM_INT);
      $stmt->bindValue(':sales_time', $Sale->getSalesTime(), PDO::PARAM_INT);
      $stmt->bindValue(':product_id', $Sale->getProductId(), PDO::PARAM_INT);
      $result = $stmt->execute();
      if ($result) {
        $saleId = $this->db->lastInsertId();
      } else {
        $saleId = -1;
      }
      return $saleId;
    }
    
    public function collectiveRegistration(Sale $Sale)
    {
      $sql = "INSERT INTO sales(user_id, sales_money, sales_time, product_id) VALUES (:user_id, :sales_money, :sales_time, :product_id)";
      $stmt = $this->db->prepare($sql);
      for ($i=0; $i < 10; $i++) { 
        $stmt->bindValue(':user_id',$Sale->getUserId(),PDO::PARAM_INT);
        $stmt->bindValue(':sales_money',$Sale->getSalesMoney(),PDO::PARAM_INT);
        $stmt->bindValue(':stock_id',$Sale->getSalesTime(),PDO::PARAM_INT);
        $stmt->bindValue(':product_id',$Sale->getProductId(),PDO::PARAM_INT);
        $result = $stmt->execute();
      }
      if ($result) {
        $saleId = $this->db->lastInsertId();
      } else {
        $saleId = -1;
      }
      return $saleId;
    }

    public function findAll(): array
    {
      $sql = "SELECT * FROM sales";
      $stmt = $this->db->prepare($sql);
      $result = $stmt->execute();
      $SaleList = [];
      while($row = $stmt->fetch())
      {
        $Sale = new Sale();
        $Sale->setUserId($row["user_id"]);
        $Sale->setSalesMoney($row["sales_money"]);
        $Sale->setSalesTime($row["sales_time"]);
        $Sale->setProductId($row["product_id"]);

        $SalesList[] = $Sale;
      }
      return $SaleList;
    }
  }
?>