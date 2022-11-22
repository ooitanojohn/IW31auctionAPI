<?php

/** 使用するコントローラをuseする */

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Classes\Api\TempApi;

/** ルーティングを決める (URLエンドポイント、メソッド設定) */
/** テンプレート */
// メソッド
$app->get('/', TempApi::class . ":get");
$app->post('/', TempApi::class . ":post");
// URL
$app->get('/url', TempApi::class . ":url");
$app->get('/url/{page}', TempApi::class . ":url");
$app->get('/request', TempApi::class . ":requestInfo");

/** ユーザのルーティング */
/** ログイン,アカウント登録 */
// $app->get("/{args}", UserAPI::class . ":stringHash");

// $app->post("/login/{id}", LoginAPI::class . ":login");
// $app->get("/logout", LoginAPI::class . ":logout");
// /** マイページ */
// $app->get("/mypage", MypageAPI::class . ":logout");
// /** オークション */
// $app->get("/auction", LoginAPI::class . ":logout");


/** 管理側のルーティング */

/** 管理者ログイン管理 */
/** 車両在庫管理 */
/** 管理者、会員管理 */
/** 出品、オークション管理 */
/** 入札管理 */
/** 売上管理 */
