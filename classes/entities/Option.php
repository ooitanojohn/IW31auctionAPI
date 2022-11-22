<?php 

namespace Classes\Entities;

class Option
{
  // 主キーのid
  private ?int $id = null;
  // エアコンの有無
  private ?int $aircon = null;
  // パワーステアリングの有無
  private ?int $powerstee = null;
  // パワーウィンドウの有無
  private ?int $powerwindou = null;
  // 集中ドアロックの有無
  private ?int $centraldoor = null;
  // アンチブレーキシステムの有無
  private ?int $abs = null;
  private ?int $airback = null;
  private ?int $etc = null;
  private ?int $key_less = null;
  private ?int $smart_key = null;
  private ?int $cd = null;
  private ?int $md = null;
  private ?int $dvd = null;
  private ?int $tv = null;
  private ?int $navi = null;
  private ?int $backcamera = null;
  private ?int $autodoor = null;
  private ?int $sunroof = null;
  private ?int $leather = null;
  private ?int $aero = null;
  private ?int $alumi = null;
  private ?int $esc = null;
  private ?int $traction_con = null;
  private ?int $coldareas = null;
  private ?int $welfare = null;
  private ?int $lowdown = null;
  private ?int $nosmoking = null;
  private ?int $pet = null;
  private ?int $exclusive = null;
  private ?int $confirmation = null;
  private ?int $instruction = null;
  private ?int $newguarantee = null;
  private ?int $spare = null;

  // アクセスメソッド
  public function getId() :?int
  {
    return $this->id;
  }
  public function setId($id) :void
  {
    $this->id = $id;
  }
  public function getAircon() :?int
  {
    return $this->aircon;
  }
  public function setAircon($aircon) :void
  {
    $this->aircon = $aircon;
  }
  public function getPowerstee() :?int
  {
    return $this->powerstee;
  }
  public function setPowerstee($powerstee) :void
  {
    $this->powerstee = $powerstee;  
  }
  public function getPowerwindou() :?int
  {
    return $this->powerwindou;
  }
  public function setPowerwindou($powerwindou) :void
  {
    $this->powerwindou = $powerwindou;
  }
  public function getCentraldoor() :?int
  {
    return $this->centraldoor;
  }
  public function setCentraldoor($centraldoor) :void
  {
    $this->centraldoor = $centraldoor;
  }
  public function getAbs() :?int
  {
    return $this->abs;
  }
  public function setAbs($abs) :void
  {
    $this->abs = $abs;  
  }
  public function getAirback() :?int
  {
    return $this->airback;
  }
  public function setAirback($airback) :void
  {
    $this->airback = $airback;   
  }
  public function getEtc() :?int
  {
    return $this->etc;
  }
  public function setEtc($etc) :void
  { 
    $this->etc = $etc;
  }
  public function getKey_less():?int
  {
    return $this->key_less;
  }
  public function setKey_less($key_less) :void
  { 
    $this->key_less = $key_less;  
  }
  public function getSmart_key():?int
  {
    return $this->smart_key;
  }
  public function setSmart_key($smart_key) :void
  {
    $this->smart_key = $smart_key;  
  }
  public function getCd():?int
  {
    return $this->cd;
  }
  public function setCd($cd) :void
  {
    $this->cd = $cd;
  }
  public function getMd():?int
  {
    return $this->md;
  } 
  public function setMd($md) :void
  {
    $this->md = $md;   
  }
  public function getDvd():?int
  {
    return $this->dvd;
  }
  public function setDvd($dvd) :void
  {
    $this->dvd = $dvd;   
  }
  public function getTv():?int
  {
    return $this->tv;
  }
  public function setTv($tv) :void
  {
    $this->tv = $tv;
  }
  public function getNavi():?int
  {
    return $this->navi;
  }
  public function setNavi($navi) :void
  {
    $this->navi = $navi;
  }
  public function getBackcamera():?int
  {
    return $this->backcamera;
  }
  public function setBackcamera($backcamera) :void
  {
    $this->backcamera = $backcamera;
  }
  public function getAutodoor():?int
  {
    return $this->autodoor;
  }
  public function setAutodoor($autodoor) :void
  {
    $this->autodoor = $autodoor;
  }
  public function getSunroof():?int
  {
    return $this->sunroof;
  }
  public function setSunroof($sunroof) :void
  {
    $this->sunroof = $sunroof;
  }
  public function getLeather():?int
  {
    return $this->leather;
  }
  public function setLeather($leather) :void
  {
    $this->leather = $leather;   
  }
  public function getAero():?int
  {
    return $this->aero;
  }
  public function setAero($aero) :void
  {
    $this->aero = $aero;   
  }
  public function getAlumi():?int
  {
    return $this->alumi;
  }
  public function setAlumi($alumi) :void
  {
    $this->alumi = $alumi;
  }
  public function getEsc():?int
  {
    return $this->esc;
  }
  public function setEsc($esc) :void
  {
    $this->esc = $esc;
  }
  public function getTraction_con():?int
  {
    return $this->traction_con;
  }
  public function setTraction_con($traction_con) :void
  {
    $this->traction_con = $traction_con;
  }
  public function getColdareas():?int
  {
    return $this->coldareas;
  }
  public function setColdareas($coldareas) :void
  {
    $this->coldareas = $coldareas;
  }
  public function getWelfare():?int
  {
    return $this->welfare;
  }
  public function setWelfare($welfare) :void
  {
    $this->welfare = $welfare;
  }
  public function getLowdown():?int
  {
    return $this->lowdown;
  }
  public function setLowdown($lowdown) :void
  {
    $this->lowdown = $lowdown;
  }
  public function getNosmoking():?int
  {
    return $this->nosmoking;
  }
  public function setNosmoking($nosmoking) :void
  {
    $this->nosmoking = $nosmoking;
  }
  public function getPet():?int
  {
    return $this->pet;
  }
  public function setPet($pet) :void
  {
    $this->pet = $pet;
  }
  public function getExclusive():?int
  {
    return $this->exclusive;
  }
  public function setExclusive($exclusive) :void
  {
    $this->exclusive = $exclusive;        
  }
  public function getConfirmation():?int
  {
    return $this->confirmation;
  }
  public function setConfirmation($confirmation) :void
  {
    $this->confirmation = $confirmation;
  }
  public function getInstruction():?int
  {
    return $this->instruction;
  }
  public function setInstruction($instruction) :void
  {
    $this->instruction = $instruction;
  }
  public function getNewguarantee():?int
  {
    return $this->newguarantee;
  }
  public function setNewguarantee($newguarantee) :void
  {
    $this->newguarantee = $newguarantee;  
  }
  public function getSpare():?int
  {
    return $this->spare;
  }
  public function setSpare($spare) :void
  {
    $this->spare = $spare;
  }
}
?>