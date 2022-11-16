<?php

/**
 * DB 設定クラス
 * @author Syuto Niimi
 */

namespace Iw31auctionApi\Conf;

/**
 * 定数クラス
 */
class Conf
{
  const DB_DNS = 'mysql:host=localhost;dbname=auction;charset=utf8';
  const DB_USERNAME = 'root'; // user作成して
  const DB_PASSWORD = ''; // パスワード変更 .envに記述
}
