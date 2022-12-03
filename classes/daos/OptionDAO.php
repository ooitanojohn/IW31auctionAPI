<?php 
  namespace Classes\daos;

  use Classes\Entities\Option;
  use PDO;

  class OptionDAO {
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
    
    public function collectiveRegistration(Option $Option)
    {
      $sql = "INSERT INTO options(product_id, aircon, powerstee, powerwidou, centraldoor, abs, airback, ETC, keyless, smartkey, cd, md, dvd, tv, navi, backcamera, autodoor, sunroof, leather, aero, alumi, esc, tractioncon, coldareas, welfare, lowdown, nosmoking, pet, exclusive, confirmation, instruction, newguarantee, spare) VALUES ";
      $sql .= "(:product_id ,:aircon ,:powerstee ,:powerwidou ,:centraldoor ,:abs ,:airback ,:ETC ,:keyless ,:smartkey ,:cd ,:md ,:dvd ,:navi ,:backcamera ,:autodoor ,:sunroof ,:leather ,:aero ,:alumi ,:esc ,:tractioncon ,:coldareas ,:welfare ,:lowdown ,:nosmoking ,:pet ,:exclusive ,:confirmation ,:instruction ,:newguarantee ,:spare)";
      $stmt = $this->db->prepare($sql);
      for ($i=0; $i < 10; $i++) { 
        $stmt->bindValue(':product_id', $Option->getProductId(), PDO::PARAM_INT);
        $stmt->bindValue(':aircon', $Option->getAircon(), PDO::PARAM_INT);
        $stmt->bindValue(':power_stee', $Option->getPowerstee(), PDO::PARAM_INT);
        $stmt->bindValue(':power_windou', $Option->getPowerwindou(), PDO::PARAM_INT);
        $stmt->bindValue(':central_door', $Option->getCentraldoor(), PDO::PARAM_INT);
        $stmt->bindValue(':abs', $Option->getAbs(), PDO::PARAM_INT);
        $stmt->bindValue(':airback', $Option->getAirback(), PDO::PARAM_INT);
        $stmt->bindValue(':ETC', $Option->getEtc(), PDO::PARAM_INT);
        $stmt->bindValue(':keyless', $Option->getKeyLess(), PDO::PARAM_INT);
        $stmt->bindValue(':smartkey', $Option->getSmartKey(), PDO::PARAM_INT);
        $stmt->bindValue(':cd', $Option->getCd(), PDO::PARAM_INT);
        $stmt->bindValue(':md', $Option->getSmartKey(), PDO::PARAM_INT);
        $stmt->bindValue(':dvd', $Option->getDvd(), PDO::PARAM_INT);
        $stmt->bindValue(':navi', $Option->getNavi(), PDO::PARAM_INT);
        $stmt->bindValue(':backcamera', $Option->getBackcamera(), PDO::PARAM_INT);
        $stmt->bindValue(':autodoor', $Option->getAutodoor(), PDO::PARAM_INT);
        $stmt->bindValue(':sunroof', $Option->getSunroof(), PDO::PARAM_INT);
        $stmt->bindValue(':leather', $Option->getLeather(), PDO::PARAM_INT);
        $stmt->bindValue(':aero', $Option->getAero(), PDO::PARAM_INT);
        $stmt->bindValue(':alumi', $Option->getAlumi(), PDO::PARAM_INT);
        $stmt->bindValue(':esc', $Option->getEsc(), PDO::PARAM_INT);
        $stmt->bindValue(':tractioncon', $Option->getTractioncon(), PDO::PARAM_INT);
        $stmt->bindValue(':welfare', $Option->getWelfare(), PDO::PARAM_INT);
        $stmt->bindValue(':lowdown', $Option->getLowdown(), PDO::PARAM_INT);
        $stmt->bindValue(':nosmoking', $Option->getNosmoking(), PDO::PARAM_INT);
        $stmt->bindValue(':pet', $Option->getPet(), PDO::PARAM_INT);
        $stmt->bindValue(':exclusive', $Option->getExclusive(), PDO::PARAM_INT);
        $stmt->bindValue(':confirmation', $Option->getConfirmation(), PDO::PARAM_INT);
        $stmt->bindValue(':instruction', $Option->getInstruction(), PDO::PARAM_INT);
        $stmt->bindValue(':newguarantee', $Option->getNewguarantee(), PDO::PARAM_INT);
        $stmt->bindValue(':spare', $Option->getSpare(), PDO::PARAM_INT);
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
     * optionIdによる検索。
     * 
     * @param int $option_id optionId
     * @return Option 該当するUserオブジェクト。ただし、該当データがない場合はnull。
     */
    public function findByOpitonId(int $optionId): ?optionDAO
    {
      $sql = "SELECT * FROM options WHERE option_id = :optionId";
      $stmt = $this->db->prepare($sql);

      $stmt->bindValue(":optionId", $optionId, PDO::PARAM_INT);
      $result = $stmt->execute();
      $user = null;
      if ($result && $row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $product_id = $row["product_id"];
        $aircon = $row["aircon"];
        $powerstee = $row["powerstee"];
        $powerwindou = $row["powerwindou"];
        $centraldoor = $row["centraldoor"];
        $abs = $row["abs"];
        $airback = $row["airback"];
        $etc = $row["ETC"];
        $keyless = $row["keyless"];
        $smartkey = $row["smartkey"];
        $cd = $row["cd"];
        $md = $row["md"];
        $dvd = $row["dvd"];
        $tv = $row["tv"];
        $navi = $row["navi"];
        $backcamera = $row["backcamera"];
        $autodoor = $row["autodoor"];
        $sunroof = $row["sunroof"];
        $leather = $row["leather"];
        $aero = $row["aero"];
        $alumi = $row["alumi"];
        $esc = $row["esc"];
        $traction_con = $row["traction_con"];
        $coldareas = $row["coldareas"];
        $welfare = $row["welfare"];
        $lowdown = $row["lowdown"];
        $nosmoking = $row["nosmoking"];
        $pet = $row["pet"];
        $exclusive = $row["exclusive"];
        $confirmation = $row["confirmation"];
        $instruction = $row["instruction"];
        $newguarantee = $row["newguarantee"];
        $spare = $row["spare"];

        $Option = new Option();
        $Option->setProductId($product_id);
        $Option->setAircon($aircon);
        $Option->setPowerstee($powerstee);
        $Option->setPowerwindou($powerwindou);
        $Option->setCentraldoor($centraldoor);
        $Option->setAbs($abs);
        $Option->setAirback($airback);
        $Option->setEtc($etc);
        $Option->setKeyLess($keyless);
        $Option->setSmartKey($smartkey);
        $Option->setCd($cd);
        $Option->setMd($md);
        $Option->setDvd($dvd);
        $Option->setTv($tv);
        $Option->setNavi($navi);
        $Option->setBackcamera($backcamera);
        $Option->setAutodoor($autodoor);
        $Option->setSunroof($sunroof);
        $Option->setLeather($leather);
        $Option->setAero($aero);
        $Option->setAlumi($alumi);
        $Option->setEsc($esc);
        $Option->setTractioncon($traction_con);
        $Option->setColdareas($coldareas);
        $Option->setWelfare($welfare);
        $Option->setLowdown($lowdown);
        $Option->setNosmoking($nosmoking);
        $Option->setPet($pet);
        $Option->setExclusive($exclusive);
        $Option->setConfirmation($confirmation);
        $Option->setInstruction($instruction);
        $Option->setNewguarantee($newguarantee);
        $Option->setSpare($spare);
      }
      return $Option;
    }
    /**
     * ユーザーリスト全取得
     * @return Option Productオブジェクト該当なしの場合null
     */
    public function findAll():array
    {
      $sql = "SELECT * FROM options";
      $stmt = $this->db->prepare($sql);
      $result = $stmt->execute();
      $product_list = [];
      while($row = $stmt->fetch()) {
        $Option = new Option();
        $Option->getProductId($row["product_id"]);
        $Option->getAircon($row["aircon"]);
        $Option->getPowerstee($row["powerstee"]);
        $Option->getPowerwindou($row["powerwindou"]);
        $Option->getCentraldoor($row["central_door"]);
        $Option->getAbs($row["abs"]);
        $Option->getAirback($row["airback"]);
        $Option->getEtc($row["etc"]);
        $Option->getKeyLess($row["keyless"]);
        $Option->getSmartKey($row["smartkey"]);
        $Option->getCd($row["cd"]);
        $Option->getMd($row["md"]);
        $Option->getDvd($row["dvd"]);
        $Option->getTv($row["tv"]);
        $Option->getNavi($row["navi"]);
        $Option->getBackcamera($row["backcamera"]);
        $Option->getAutodoor($row["autodoor"]);
        $Option->getSunroof($row["sunroof"]);
        $Option->getLeather($row["leather"]);
        $Option->getAero($row["aero"]);
        $Option->getAlumi($row["alumi"]);
        $Option->getEsc($row["esc"]);
        $Option->getTractioncon($row["traction_con"]);
        $Option->getColdareas($row["coldareas"]);
        $Option->getWelfare($row["welfare"]);
        $Option->getLowdown($row["lowdown"]);
        $Option->getNosmoking($row["nosmoking"]);
        $Option->getPet($row["pet"]);
        $Option->getExclusive($row["exclusive"]);
        $Option->getConfirmation($row["confirmation"]);
        $Option->getInstruction($row["instruction"]);
        $Option->getNewguarantee($row["newguarantee"]);
        $Option->getSpare($row["spare"]);
        $product_list[$row['product_id']] = $Option;
      }
      return $Option;
    }
    /**
     * ユーザー新規作成画面
     * @param Option
     * @return integer =-1
     */
    public function insert(Option $Option): bool
    {
      $sql = "INSERT INTO options(product_id, aircon, powerstee, powerwidou, centraldoor, abs, airback, ETC, keyless, smartkey, cd, md, dvd, tv, navi, backcamera, autodoor, sunroof, leather, aero, alumi, esc, tractioncon, coldareas, welfare, lowdown, nosmoking, pet, exclusive, confirmation, instruction, newguarantee, spare) VALUES ";
      $sql .= "(:product_id ,:aircon ,:powerstee ,:powerwidou ,:centraldoor ,:abs ,:airback ,:ETC ,:keyless ,:smartkey ,:cd ,:md ,:dvd ,:navi ,:backcamera ,:autodoor ,:sunroof ,:leather ,:aero ,:alumi ,:esc ,:tractioncon ,:coldareas ,:welfare ,:lowdown ,:nosmoking ,:pet ,:exclusive ,:confirmation ,:instruction ,:newguarantee ,:spare)";
      $stmt = $this->db->prepare($sql);
      $stmt->bindValue(':product_id', $Option->getProductId(), PDO::PARAM_INT);
      $stmt->bindValue(':aircon', $Option->getAircon(), PDO::PARAM_INT);
      $stmt->bindValue(':power_stee', $Option->getPowerstee(), PDO::PARAM_INT);
      $stmt->bindValue(':power_windou', $Option->getPowerwindou(), PDO::PARAM_INT);
      $stmt->bindValue(':central_door', $Option->getCentraldoor(), PDO::PARAM_INT);
      $stmt->bindValue(':abs', $Option->getAbs(), PDO::PARAM_INT);
      $stmt->bindValue(':airback', $Option->getAirback(), PDO::PARAM_INT);
      $stmt->bindValue(':ETC', $Option->getEtc(), PDO::PARAM_INT);
      $stmt->bindValue(':keyless', $Option->getKeyLess(), PDO::PARAM_INT);
      $stmt->bindValue(':smartkey', $Option->getSmartKey(), PDO::PARAM_INT);
      $stmt->bindValue(':cd', $Option->getCd(), PDO::PARAM_INT);
      $stmt->bindValue(':md', $Option->getSmartKey(), PDO::PARAM_INT);
      $stmt->bindValue(':dvd', $Option->getDvd(), PDO::PARAM_INT);
      $stmt->bindValue(':navi', $Option->getNavi(), PDO::PARAM_INT);
      $stmt->bindValue(':backcamera', $Option->getBackcamera(), PDO::PARAM_INT);
      $stmt->bindValue(':autodoor', $Option->getAutodoor(), PDO::PARAM_INT);
      $stmt->bindValue(':sunroof', $Option->getSunroof(), PDO::PARAM_INT);
      $stmt->bindValue(':leather', $Option->getLeather(), PDO::PARAM_INT);
      $stmt->bindValue(':aero', $Option->getAero(), PDO::PARAM_INT);
      $stmt->bindValue(':alumi', $Option->getAlumi(), PDO::PARAM_INT);
      $stmt->bindValue(':esc', $Option->getEsc(), PDO::PARAM_INT);
      $stmt->bindValue(':tractioncon', $Option->getTractioncon(), PDO::PARAM_INT);
      $stmt->bindValue(':welfare', $Option->getWelfare(), PDO::PARAM_INT);
      $stmt->bindValue(':lowdown', $Option->getLowdown(), PDO::PARAM_INT);
      $stmt->bindValue(':nosmoking', $Option->getNosmoking(), PDO::PARAM_INT);
      $stmt->bindValue(':pet', $Option->getPet(), PDO::PARAM_INT);
      $stmt->bindValue(':exclusive', $Option->getExclusive(), PDO::PARAM_INT);
      $stmt->bindValue(':confirmation', $Option->getConfirmation(), PDO::PARAM_INT);
      $stmt->bindValue(':instruction', $Option->getInstruction(), PDO::PARAM_INT);
      $stmt->bindValue(':newguarantee', $Option->getNewguarantee(), PDO::PARAM_INT);
      $stmt->bindValue(':spare', $Option->getSpare(), PDO::PARAM_INT);
      $result = $stmt->execute();
      if ($result) {
        $option_id = $this->db->lastInsertId();
      } else {
        $option_id = -1;
      }
      return $option_id;
    }
    /**
     * 商品更新
     * @param Option
     * @return boolean
     */
    public function update(Option $Option) :bool
    {
      $sql = "UPDATE options SET aircon=:aircon,powerstee=:powerstee,powerwidou=:powerwidou,centraldoor=:centraldoor,abs=:abs,airback=:airback,ETC=:ETC,keyless=:keyless,smartkey=:smartkey,cd=:cd,md=:md,dvd=:dvd,tv=:tv,navi=:navi,backcamera=:backcamera,autodoor=:autodoor,sunroof=:sunroof,leather=:leather,aero=:aero,alumi=:alumi,esc=:esc,tractioncon=:tractioncon,coldareas=:coldareas,welfare=:welfare,lowdown=:lowdown,nosmoking=:nosmoking,pet=:pet,exclusive=:exclusive,confirmation=:confirmation,instruction=:instruction,newguarantee=:newguarantee,spare=:spare WHERE option_id = :option_id";
      $stmt = $this->db->prepare($sql);
      $stmt->bindValue(':product_id', $Option->getProductId(), PDO::PARAM_INT);
      $stmt->bindValue(':aircon', $Option->getAircon(), PDO::PARAM_INT);
      $stmt->bindValue(':power_stee', $Option->getPowerstee(), PDO::PARAM_INT);
      $stmt->bindValue(':power_windou', $Option->getPowerwindou(), PDO::PARAM_INT);
      $stmt->bindValue(':central_door', $Option->getCentraldoor(), PDO::PARAM_INT);
      $stmt->bindValue(':abs', $Option->getAbs(), PDO::PARAM_INT);
      $stmt->bindValue(':airback', $Option->getAirback(), PDO::PARAM_INT);
      $stmt->bindValue(':ETC', $Option->getEtc(), PDO::PARAM_INT);
      $stmt->bindValue(':keyless', $Option->getKeyLess(), PDO::PARAM_INT);
      $stmt->bindValue(':smartkey', $Option->getSmartKey(), PDO::PARAM_INT);
      $stmt->bindValue(':cd', $Option->getCd(), PDO::PARAM_INT);
      $stmt->bindValue(':md', $Option->getSmartKey(), PDO::PARAM_INT);
      $stmt->bindValue(':dvd', $Option->getDvd(), PDO::PARAM_INT);
      $stmt->bindValue(':navi', $Option->getNavi(), PDO::PARAM_INT);
      $stmt->bindValue(':backcamera', $Option->getBackcamera(), PDO::PARAM_INT);
      $stmt->bindValue(':autodoor', $Option->getAutodoor(), PDO::PARAM_INT);
      $stmt->bindValue(':sunroof', $Option->getSunroof(), PDO::PARAM_INT);
      $stmt->bindValue(':leather', $Option->getLeather(), PDO::PARAM_INT);
      $stmt->bindValue(':aero', $Option->getAero(), PDO::PARAM_INT);
      $stmt->bindValue(':alumi', $Option->getAlumi(), PDO::PARAM_INT);
      $stmt->bindValue(':esc', $Option->getEsc(), PDO::PARAM_INT);
      $stmt->bindValue(':tractioncon', $Option->getTractioncon(), PDO::PARAM_INT);
      $stmt->bindValue(':welfare', $Option->getWelfare(), PDO::PARAM_INT);
      $stmt->bindValue(':lowdown', $Option->getLowdown(), PDO::PARAM_INT);
      $stmt->bindValue(':nosmoking', $Option->getNosmoking(), PDO::PARAM_INT);
      $stmt->bindValue(':pet', $Option->getPet(), PDO::PARAM_INT);
      $stmt->bindValue(':exclusive', $Option->getExclusive(), PDO::PARAM_INT);
      $stmt->bindValue(':confirmation', $Option->getConfirmation(), PDO::PARAM_INT);
      $stmt->bindValue(':instruction', $Option->getInstruction(), PDO::PARAM_INT);
      $stmt->bindValue(':newguarantee', $Option->getNewguarantee(), PDO::PARAM_INT);
      $stmt->bindValue(':spare', $Option->getSpare(), PDO::PARAM_INT);
      $stmt->bindValue(':product_id', $Option->getProductId(), PDO::PARAM_INT);
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
      $sql = "DELETE FROM options WHERE product_id=:product_id";
      $stmt = $this->db->prepare($sql);
      $stmt->bindValue(":product_id", $id, PDO::PARAM_INT);
      $result = $stmt->execute();
      return $result;
    }
  }
 ?>