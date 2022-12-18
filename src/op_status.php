<?php

$pdo = new PDO('mysql:host=localhost;dbname=livechat', 'root', '');
$sql = 'SELECT * FROM operator where status ="available" ';

$statement = $pdo->query($sql);

$row = $statement->fetchAll(PDO::FETCH_ASSOC);

if (count($row) > 0) {
    echo json_encode(["operator" => "available"]);
} else {
    echo json_encode(["operator" => "unavailable"]);
}
