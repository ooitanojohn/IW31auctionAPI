<?php

use Slim\Factory\AppFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();

// Add error middleware
require_once __DIR__ . '/../middleware/middleware.php';
// Add route
require_once __DIR__ . '/../router/route.php';
$app->setBasePath('/IW31auction/IW31auctionAPI/public');
// 環境変数読み込み
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$app->run();
