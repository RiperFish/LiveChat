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
/* $statement = $pdo->query($sql);

// get all publishers
$publishers = $statement->fetchAll(PDO::FETCH_ASSOC);

if ($publishers) {
	// show the publishers
	foreach ($publishers as $publisher) {
		echo $publisher['name'] . '<br>';
	}
} */


//$xx = array("a" => "Apple", "b" => "Ball", "c" => "Cat");
/* 

$content = trim(file_get_contents("php://input"));
$data = json_decode($content, true);


echo json_encode($data['operation'], true); */
//echo json_encode($xx);
