<?php
session_start();

// Check if the user is already authenticated
if (isset($_SESSION['access_token'])) {
    header('Location: dashboard.php');
    exit();
}

require_once 'vendor/autoload.php';

$client = new Google_Client();
$client->setClientId('GoogleClientId'); # Set GoogleClientId
$client->setClientSecret('GoogleClientSecret'); # Set GoogleClientSecret
$client->setRedirectUri('http://localhost/pandora/redirect.php');  # Set RedirectURI
$client->addScope('email');
$client->addScope('profile');

if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);

    if (!isset($token['error'])) {
        $client->setAccessToken($token);
        $_SESSION['access_token'] = $token;
        header('Location: dashboard.php');
        exit();
    } else {
        echo "Error: " . $token['error_description'];
    }
}
?>
