<?php

// get or post
if ($_SERVER["REQUEST_METHOD"]) {
}
if ($_GET['order']) {
  // 並び替えクエリ発行
  echo json_encode($data);
}

if ($_GET['search']) {
}
