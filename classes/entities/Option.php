<?php 
namespace Classes\Entities;

class Option
{
  private ?int $product_id = null;
  private ?int $aircon = null;
  private ?int $powerstee = null;
  private ?int $powerwindou = null;
  private ?int $centraldoor = null;
  private ?int $abs = null;
  private ?int $airback = null;
  private ?int $etc = null;
  private ?int $keyless = null;
  private ?int $smartkey = null;
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
  private ?int $tractioncon = null;
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

  public function getProductId():?int
  {
    return $this->product_id;
  }
  public function getAircon():?int
  {
    return $this->aircon;
  }
  public function getPowerstee():?int
  {
    return $this->powerstee;
  }
  public function getPowerwindou():?int
  {
    return $this->powerwindou;
  }
  public function getCentraldoor():?int
  {
    return $this->centraldoor;
  }
  public function getAbs():?int
  {
    return $this->abs;
  }
  public function getAirback():?int
  {
    return $this->airback;
  }
  public function getEtc():?int
  {
    return $this->etc;
  }
  public function getKeyless():?int
  {
    return $this->keyless;
  }
  public function getSmartkey():?int
  {
    return $this->smartkey;
  }
  public function getCd():?int
  {
    return $this->cd;
  }
  public function getMd():?int
  {
    return $this->md;
  }
  public function getDvd():?int
  {
    return $this->dvd;
  }
  public function getTv():?int
  {
    return $this->tv;
  }
  public function getNavi():?int
  {
    return $this->navi;
  }
  public function getBackcamera():?int
  {
    return $this->backcamera;
  }
  public function getAutodoor():?int
  {
    return $this->autodoor;
  }
  public function getSunroof():?int
  {
    return $this->sunroof;
  }
  public function getLeather():?int
  {
    return $this->leather;
  }
  public function getAero():?int
  {
    return $this->aero;
  }
  public function getAlumi():?int
  {
    return $this->alumi;
  }
  public function getEsc():?int
  {
    return $this->esc;
  }
  public function getTractioncon():?int
  {
    return $this->tractioncon;
  }
  public function getColdareas():?int
  {
    return $this->coldareas;
  }
  public function getWelfare():?int
  {
    return $this->welfare;
  }
  public function getLowdown():?int
  {
    return $this->lowdown;
  }
  public function getNosmoking():?int
  {
    return $this->nosmoking;
  }
  public function getPet():?int
  {
    return $this->pet;
  }
  public function getExclusive():?int
  {
    return $this->exclusive;
  }
  public function getConfirmation():?int
  {
    return $this->confirmation;
  }
  public function getInstruction():?int
  {
    return $this->instruction;
  }
  public function getNewguarantee():?int
  {
    return $this->newguarantee;
  }
  public function getSpare():?int
  {
    return $this->spare;
  }
  public function setProductId($product_id):void
  {
    $this->product_id = $product_id;
  }
  public function setAircon($aircon):void
  {
    $this->aircon = $aircon;
  }
  public function setPowerstee($powerstee):void
  {
    $this->powerstee = $powerstee;
  }
  public function setPowerwindou($powerwindou):void
  {
    $this->powerwindou = $powerwindou;
  }
  public function setCentraldoor($centraldoor):void
  {
    $this->centraldoor = $centraldoor;
  }
  public function setAbs($abs):void
  {
    $this->abs = $abs;
  }
  public function setAirback($airback):void
  {
    $this->airback = $airback;
  }
  public function setEtc($etc):void
  {
    $this->etc = $etc;
  }
  public function setKeyless($keyless):void
  {
    $this->keyless = $keyless;
  }
  public function setSmartkey($smartkey):void
  {
    $this->smartkey = $smartkey;
  }
  public function setCd($cd):void
  {
    $this->cd = $cd;
  }
  public function setMd($md):void
  {
    $this->md = $md;
  }
  public function setDvd($dvd):void
  {
    $this->dvd = $dvd;
  }
  public function setTv($tv):void
  {
    $this->tv = $tv;
  }
  public function setNavi($navi):void
  {
    $this->navi = $navi;
  }
  public function setBackcamera($backcamera):void
  {
    $this->backcamera = $backcamera;
  }
  public function setAutodoor($autodoor):void
  {
    $this->autodoor = $autodoor;
  }
  public function setSunroof($sunroof):void
  {
    $this->sunroof = $sunroof;
  }
  public function setLeather($leather):void
  {
    $this->leather = $leather;
  }
  public function setAero($aero):void
  {
    $this->aero = $aero;
  }
  public function setAlumi($alumi):void
  {
    $this->alumi = $alumi;
  }
  public function setEsc($esc):void
  {
    $this->esc = $esc;
  }
  public function setTractioncon($tractioncon):void
  {
    $this->tractioncon = $tractioncon;
  }
  public function setColdareas($coldareas):void
  {
    $this->coldareas = $coldareas;
  }
  public function setWelfare($welfare):void
  {
    $this->welfare = $welfare;
  }
  public function setLowdown($lowdown):void
  {
    $this->lowdown = $lowdown;
  }
  public function setNosmoking($nosmoking):void
  {
    $this->nosmoking = $nosmoking;
  }
  public function setPet($pet):void
  {
    $this->pet = $pet;
  }
  public function setExclusive($exclusive):void
  {
    $this->exclusive = $exclusive;
  }
  public function setConfirmation($confirmation):void
  {
    $this->confirmation = $confirmation;
  }
  public function setInstruction($instruction):void
  {
    $this->instruction = $instruction;
  }
  public function setNewguarantee($newguarantee):void
  {
    $this->newguarantee = $newguarantee;
  }
  public function setSpare($spare):void
  {
    $this->spare = $spare;
  }
}
?>