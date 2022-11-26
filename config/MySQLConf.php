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
  const DB_HOSTNAME = $_ENV['DB_HOSTNAME']; // hostname
  const DB_USERNAME = $_ENV['DB_USERNAME']; // user作成して
  const DB_PASSWORD = $_ENV['DB_PASSWORD']; // パスワード変更
  const DB_DATABASE = $ENV['DB_DATABASE']; // データベース
  const DB_CHARSET = $_ENV['DB_CHARSET'];
  const DB_PORT = $_ENV['DB_PORT'];
  const DB_DNS = "mysql:host=localhost;dbname=auction;charset=utf8";
}
