<?php
session_start();

$client_id = '668736236743-1u8jrlmfke4s2q0e2hbrfq24oih5jhuq.apps.googleusercontent.com';
$redirect_uri = 'http://localhost/diabetestracker/setebiad_rekcart/oauth2callback.php';

// ✅ Don't encode the scopes manually
$scope = 'https://www.googleapis.com/auth/fitness.blood_glucose.read https://www.googleapis.com/auth/userinfo.profile';

$params = [
    'response_type' => 'code',
    'client_id' => $client_id,
    'redirect_uri' => $redirect_uri,
    'scope' => $scope,
    'access_type' => 'offline',
    'prompt' => 'consent'
];

$auth_url = 'https://accounts.google.com/o/oauth2/v2/auth?' . http_build_query($params);

header("Location: $auth_url");
exit;
?>
