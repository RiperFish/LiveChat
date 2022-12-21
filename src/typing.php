<?php

require '../vendor/autoload.php';




$options = array(
    'cluster' => 'eu',
    'useTLS' => true
);
$pusher = new Pusher\Pusher(
    '35475b12a7cc14bf25c9',
    'afe8f439b29053ebf326',
    '1289984',
    $options
);



$content = trim(file_get_contents("php://input"));
$data = json_decode($content, true);

$pusher->trigger($data['private_channel'], 'user_is_typing_event', [

    'action' => $data['action'],
    'name' => $data['name'],
    'channel' => $data['private_channel'],
]);
