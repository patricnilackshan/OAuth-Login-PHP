<?php
session_start();

if (isset($_SESSION['access_token'])) {
  require_once 'vendor/autoload.php';

  $client = new Google_Client();
  $client->setClientId('GoogleClientId'); # Set GoogleClientId
  $client->setClientSecret('GoogleClientSecret'); # Set GoogleClientSecret
  $client->addScope('email');
  $client->addScope("profile");

  $token = $_SESSION['access_token'];
  $client->setAccessToken($token);

  $oauth2 = new Google_Service_Oauth2($client);
  $userInfo = $oauth2->userinfo->get();
  $userName = $userInfo->name;

  // Dashboard UI
  echo "
  <!DOCTYPE html>
  <html lang='en'>
  <head>
  <meta charset='UTF-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1.0'>
  <title>Dashboard - Pandora Company</title>
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
padding: 3rem;
border-radius: 10px;
box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
width: 350px;
}

h1 {
font-size: 2rem;
margin-bottom: 2rem;
color: #ffffff; /* White text */
}

</style>
</head>
<body>
<div class='container'>
<h1>Hello, $userName! Welcome to Pandora Company Limited.</h1>
</div>
</body>
</html>";
} else {
  header('Location: login.php');
  exit();
}
?>
