<?php
session_start();

// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Replace with your actual OAuth credentials
$client_id = '668736236743-1u8jrlmfke4s2q0e2hbrfq24oih5jhuq.apps.googleusercontent.com';
$client_secret = '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';
$redirect_uri = 'http://localhost/diabetestracker/setebiad_rekcart/oauth2callback.php';

// Step 1: Check for authorization code
if (!isset($_GET['code'])) {
    exit('❌ No authorization code returned from Google.');
}

$code = $_GET['code'];

// Step 2: Prepare token request
$token_url = 'https://oauth2.googleapis.com/token';
$post_fields = [
    'code' => $code,
    'client_id' => $client_id,
    'client_secret' => $client_secret,
    'redirect_uri' => $redirect_uri,
    'grant_type' => 'authorization_code'
];

// Step 3: Send POST request to exchange code for token
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $token_url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post_fields));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/x-www-form-urlencoded']);

$response = curl_exec($ch);
$http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

// Step 4: Parse response
if ($http_status !== 200 || !$response) {
    exit("❌ Failed to exchange code. HTTP Status: $http_status<br>Response: $response");
}

$tokens = json_decode($response, true);

// Step 5: Store tokens in session
$_SESSION['access_token'] = $tokens['access_token'] ?? null;
$_SESSION['refresh_token'] = $tokens['refresh_token'] ?? null;

// Optional: Debug display
/*
echo "✅ Access Token: " . $_SESSION['access_token'] . "<br>";
echo "🔄 Refresh Token: " . $_SESSION['refresh_token'] . "<br>";
exit;
*/

// Step 6: Redirect to home
header('Location: home.php');
exit();
?>
