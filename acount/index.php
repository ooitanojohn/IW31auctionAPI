<?php

// get or post
if ($_SERVER["REQUEST_METHOD"]) {
}
if ($_GET['search']) {
}
// ブラウザからリクエストが来たら暫定 データを帰す場合jsonP形式にする
$data = json_encode("object-key:"."object-val");
echo "callback({" . $data . "})";
