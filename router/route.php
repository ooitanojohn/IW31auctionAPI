<?php

/** 使用するコントローラをuseする */

use Classes\api\UserAPI;

/** ルーティングを決める (URLエンドポイント、メソッド設定) */

/** ユーザのルーティング */

/** ログイン,アカウント登録 */
$app->get("/", LoginController::class . ":goLogin");
$app->post("/login", LoginController::class . ":login");
$app->get("/logout", LoginController::class . ":logout");
/** マイページ */
/** オークション */



/** 管理側のルーティング */

/** 管理者ログイン管理 */
/** 車両在庫管理 */
/** 管理者、会員管理 */
/** 出品、オークション管理 */
/** 入札管理 */
/** 売上管理 */
