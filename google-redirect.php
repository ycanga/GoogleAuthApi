<?php 
	require_once 'google-api.php';
	require_once 'google-settings.php';

	if(isset($_GET['code'])){
    $gapi = new GoogleLoginApi();
    $data = $gapi->GetAccessToken(CLIENT_ID,CLIENT_REDIRECT_URL,CLIENT_SECRET, $_GET['code']);

    $user = $gapi->GetUserProfileInfo($data['access_token']);
	echo $user["name"];
	}
 ?>
