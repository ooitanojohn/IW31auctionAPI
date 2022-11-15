<?php

// get or post
if ($_SERVER["REQUEST_METHOD"]) {
}
if ($_GET['search']) {
}
// ブラウザからリクエストが来たら暫定 データを帰す場合jsonP形式にする
$data = json_encode($_GET['name']."購入者");
echo "callback({" . $data . "})";
