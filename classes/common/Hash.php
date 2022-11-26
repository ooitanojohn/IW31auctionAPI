<?php

namespace Classes\Common;

class Hash
{
  /** md5でハッシュ化 */
  public function Md5(string $val)
  {
    return md5($val);
  }

  public static function plus(string $val)
  {
    return $val . "plus";
  }
}
