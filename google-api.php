<?php 

	class GoogleLoginApi(){
		public function GetAccessToken($client_id, $redirect_uri,$client_secret,$code){

        $url = 'https://www.googleapis.com/oauth2/v4/token';
        $curlPost = 'client_id='.$client_id.'&redirect_uri='.$redirect_uri.'&client_secret='.$client_secret.'&code='.$code.'&grant_type=authorization_code';

			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_POST,1);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,FALSE);
			curl_setopt($ch, CURLOPT_POSTFIELDS,$curlPost);

			$exec = curl_exec($ch);
			$data = json_decode($exec,true);
			return $data;
		}


	public function GetUserProfileInfo($access_token){

        $url = 'https://www.googleapis.com/oauth2/v2/userinfo?fields=name, email, gender,id,picture,verified_email';

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,FALSE);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer '.  $access_token));
		$exec = curl_exec($ch);
		$data = json_decode($exec,true);
		return $data;
	}
}
 ?>
