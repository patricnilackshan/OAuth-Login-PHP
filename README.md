# Pandora Login with Google - PHP OAuth2

This is a PHP-based login system that integrates **Login with Google** functionality using OAuth2. The system authenticates users via Google, and once authenticated, displays a personalized greeting message.

## Prerequisites

Before running the project, ensure you have the following installed:

1. **PHP** (version 7.4 or higher)
2. **Composer** (for managing PHP dependencies)
3. **Google Cloud Console project** (with OAuth2 credentials setup)

## Setup Instructions

Follow the steps below to install the necessary dependencies and run the application:

### 1. Clone the Repository

Clone this project to your local machine using the following command:

```bash
git clone https://github.com/patricnilackshan/OAuth-Login-PHP.git
cd OAuth-Login-PHP
```

### 2. Install Composer Dependencies
Ensure **Composer** is installed on your system. If not, you can download it from the [Composer website](https://getcomposer.org/).

Run the following command in your project directory to install the required dependencies:
```bash
composer install
```
This command will read the composer.json file and install the **Google API Client** and other dependencies.

### 3. Set Up Google OAuth Credentials
You need to set up OAuth credentials for Google authentication:

1. Go to the [Google Cloud Console](https://cloud.google.com/).

2. Create a new project (or use an existing project).

3. Navigate to **APIs & Services > OAuth consent screen** and configure it with the following settings:

    * **Application Name**: Pandora Authentication
    * **Scopes**: email, profile
    * **Authorized Redirect URI**: http://localhost/pandora/redirect.php

4. Go to **APIs & Services > Credentials**, and create **OAuth 2.0 Client IDs** for the application.

5. **Download the credentials** and keep the **Client ID** and **Client Secret**.


### 4. Configure `Google_Client` in PHP Files
In your `login.php` and `redirect.php` files, replace the following placeholders with your actual **Client ID** and **Client Secret** from the Google Developer Console:
```php
$client->setClientId('YOUR_GOOGLE_CLIENT_ID');
$client->setClientSecret('YOUR_GOOGLE_CLIENT_SECRET');
```

### 5. Run the Application
Make sure your local server is running. You can use **PHP’s built-in server** to run the application:
```bash
php -S localhost:8000
```
This command will start a PHP server on `http://localhost:8000`. You can visit `http://localhost:8000/login.php` to test the Google login flow.

### 6. Access the Application
* Visit `http://localhost:8000/login.php` to see the login screen.
* Once logged in, you'll be redirected to dashboard.php, where you’ll see a personalized greeting message.

### Notes
* The application assumes you are running it on **localhost** for testing purposes. If you plan to deploy it to production, you need to adjust the redirect URIs accordingly in both the Google Cloud Console and the code.
* Make sure to configure your **session settings** and ensure the server can handle sessions properly.