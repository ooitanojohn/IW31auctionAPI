<?php

/**
 * DB 設定クラス
 * @author Syuto Niimi
 */

namespace Config;

/**
 * 定数クラス
 */
class MySQLConf
{
  const DB_DNS = "mysql:host=localhost;dbname=auction;charset=utf8;port=3308";
  const DB_HOSTNAME = "localhost"; // hostname
  const DB_USERNAME = 'root'; // user作成して
  const DB_PASSWORD =  ''; // パスワード変更
  const DB_DATABASE = "auction"; // データベース
  const DB_CHARSET = "utf8";
  const DB_PORT = "3308";
}
