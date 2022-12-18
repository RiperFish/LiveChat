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

if ($data['type'] == 'private') {
    // Check if it's coming from the operator or client
    $pusher->trigger('new_client_chat', $data['private_event'], [
        'from' => $data['from'],
        'type' => "private chat",
        'name' => $data['name'],
        'message' => $data['message'],
        'private-event' => $data['private_event'],
    ]);
} else {
    $pusher->trigger('new_client_chat', 'new_client_chat_event', [
        'type' => "new",
        'name' => $data['name'],
        'message' => $data['message'],
        'private-event' => $data['private_event'],
    ]);
}

/* if (isset($_POST['message']) && !empty($_POST['message'])) {

    if ($_POST['type'] == 'private') {
        // Check if it's coming from the operator or client
        $pusher->trigger('new_client_chat', $_POST['private_event'], [
            'from' => $_POST['from'],
            'type' => "private chat",
            'name' => $_POST['name'],
            'message' => $_POST['message'],
            'private-event' => $_POST['private_event'],
        ]);
    } else {
        $pusher->trigger('new_client_chat', 'new_client_chat_event', [
            'type' => "new",
            'name' => $_POST['name'],
            'message' => $_POST['message'],
            'private-event' => $_POST['private_event'],
        ]);
    }
} */

/* if ($_POST['type'] === 'private') {
    $pusher->trigger('new_client_chat', $_POST['private_event'], [
        'halo' => "Let's start a private chat",
        'name' => $_POST['name'],
        'message' => $_POST['message'],
        'private-event' => $_POST['private_event'],
    ]);
}
if ($_POST['type'] = 'request_chat') {
    $pusher->trigger('new_client_chat', 'new_client_chat_event', [
        'type' => "new",
        'name' => $_POST['name'],
        'message' => $_POST['message'],
        //'private-channel' => $_POST['private_channel'],
        'private-event' => $_POST['private_event'],
    ]);
} */