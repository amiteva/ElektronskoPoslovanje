<?php

$jsondata = file_get_contents("data.json");
$decoded = json_decode($jsondata);
header('Content-type:application/json;charset=utf-8');
$encoded = json_encode($decoded);
echo $encoded;

?>