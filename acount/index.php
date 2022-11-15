<?php

// get or post
if ($_SERVER["REQUEST_METHOD"]) {
}
if ($_GET['search']) {
}
// ブラウザからリクエストが来たら暫定 データを帰す場合jsonP形式にする
$date = new DateTime();
$data = [
  1,
  "string",
  true,
  [$date,null],
  "name" => $_GET['name'],
];
$json = json_encode($data);
echo "callback({" . $json . "})";
