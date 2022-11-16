<?php

use Slim\Factory\AppFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();
$app->setBasePath('/IW31auction/IW31auctionAPI/public');

// Add error middleware
require_once __DIR__ . '/../config/middleware.php';
// Add route
require_once __DIR__ . '/../router/route.php';

$app->run();