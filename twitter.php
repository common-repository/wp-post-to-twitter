<?php
	function postToTwitter($username,$password,$message){
	    $host = "http://twitter.com/statuses/update.xml?status=".urlencode(stripslashes(urldecode($message)));
	    $ch = curl_init();
	    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
	    curl_setopt($ch, CURLOPT_URL, $host);
	    curl_setopt($ch, CURLOPT_VERBOSE, 1);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	    curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
	    curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
	    curl_setopt($ch, CURLOPT_POST, 1);
	    $result = curl_exec($ch);
	    $resultArray = curl_getinfo($ch);
	    curl_close($ch);
	    if($resultArray['http_code'] == "200"){
	         $twitter_status='You just tweeted! <a href="http://twitter.com/'.$username.'" target="_blank">See your profile</a>';
	    } else {
	         $twitter_status="Error posting to Twitter. Retry";
	    }
		return $twitter_status;
	}
?>