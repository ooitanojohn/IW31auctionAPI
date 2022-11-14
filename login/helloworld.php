<?php

$val = [
  "HelloWorld",
  true,
  1,
  ["apple", 0, "0"],
  ["object" => "value"]
];

echo json_encode($val);
