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


// You need to define this function for your application, but for testing purposes, it always returns true

function user_is_authenticated()
{
    // Insert your logic here
    return true;
}

if (user_is_authenticated()) {
    echo $pusher->authorizeChannel($_POST['channel_name'], $_POST['socket_id']);
} else {
    header('', true, 403);
    echo "Forbidden";
}
