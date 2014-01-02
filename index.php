<!DOCTYPE html>
<html>
<head>
	<title>DonationAPI</title>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<!--<link rel="stylesheet" type="text/css" href="http://cdn.lynxaa.info/main/lds.css">-->
</head>
</html>

<?php
	require_once 'DonateAPI.php';

	$donationAPI = new DonateAPI("lynxaaog@gmail.com", "Minecraft Donate");

	$username = isset($_GET['username']) ? $_GET['username'] : 'Username';

	if (strlen($username) == 0) {
		$username = "Invalid Input";
	}

	$donationAPI->generate_form("../index.php", $username, "null@gmail.com", "http://lynxaa.info/visionary/donate.php");
	$donationAPI->automatically_submit("DONATION");
	echo 'test';
?>
