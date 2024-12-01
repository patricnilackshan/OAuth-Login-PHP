<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login with Google</title>
<style>
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background: #121212; /* Dark background */
    color: #e0e0e0; /* Light text */
}

.container {
    text-align: center;
    background: #1a1a1a; /* Slightly lighter gray background */
    padding: 2rem;
    border-radius: 10px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
    width: 350px;
}

h1 {
    font-size: 2rem;
    margin-bottom: 2rem;
    color: #ffffff; /* White text */
}

.google-btn {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    padding: 0.8rem;
    font-size: 1rem;
    background-color: #333333; /* Dark black shade */
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.google-btn:hover {
    background-color: #444444; /* Lighter shade on hover */
}

.google-btn img {
    width: 20px;
    height: 20px;
    margin-right: 8px;
}
</style>
</head>
<body>
<div class="container">
<h1>Welcome to Pandora</h1>
<?php
require_once 'vendor/autoload.php';

$client = new Google_Client();
$client->setClientId('GoogleClientId'); # Set GoogleClientId
$client->setClientSecret('GoogleClientSecret'); # Set GoogleClientSecret
$client->setRedirectUri('http://localhost/pandora/redirect.php'); # Set RedirectURI
$client->addScope('email');
$client->addScope('profile');

session_start();

if (isset($_SESSION['access_token'])) {
    header('Location: dashboard.php');
    exit();
}

$authUrl = $client->createAuthUrl();
echo "<a href='$authUrl' class='google-btn'>
<img src='https://auth.openai.com/assets/google-logo-NePEveMl.svg' alt='Google logo'>
Continue with Google
</a>";
?>
</div>
</body>
</html>
