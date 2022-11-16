<?php

namespace Classes\Common;

class Hash
{
  /** md5でハッシュ化 */
  public function crypto(string $val)
  {
    return md5($val);
  }
}
