<?php

require '../vendor/autoload.php';



// Change the following with your app details:

// Create your own pusher account @ https://app.pusher.com



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



// Check the receive message
$content = trim(file_get_contents("php://input"));
$data = json_decode($content, true);

//if ($data['type'] == 'private') {
// Check if it's coming from the operator or client
$pusher->trigger($data['private_channel'], 'new_private_message', [
    'reply_message' => $data['message'],
    'name' => $data['name'],
    'from' => $data['from']
]);
