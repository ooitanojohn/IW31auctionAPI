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
  const DB_DNS = $_ENV['DB_DNS'];
  const DB_USERNAME = $_ENV['DB_USERNAME']; // user作成して
  const DB_PASSWORD = $_ENV['DB_PASSWORD']; //パスワード変更
}
