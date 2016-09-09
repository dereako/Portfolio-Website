<?php $to = "dereako@gmail.com";
$subject = "Website Feedback";

if ($_POST['message'] != "") {
	$message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);
	if ($message=="") {
		header("Location: connect.php?invalid=message&email=".urlencode($_POST['email'])); die();
	}
} else {
	header("Location: connect.php?invalid=message&email=".urlencode($_POST['email'])); die();
}

if ($_POST['email'] != "") {
	$from = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
	if (!filter_var($from, FILTER_VALIDATE_EMAIL)) {
		header("Location: connect.php?invalid=email&email=".urlencode($_POST['email'])."&message=".urlencode($message)); die();
	}
} else {
	header("Location: connect.php?invalid=email&email=".urlencode($_POST['email'])."&message=".urlencode($message)); die();
}

$headers = "From: 'Derek Hall' <derek@derekhalldesign.com>\r\n";
$headers .= "Reply-To: {$from}\r\n";

if (mail($to,$subject,$message,$headers)) {
	header("Location: connect.php?sent=true&email=".urlencode($from)); die();
} else {
	header("Location: connect.php?invalid=send&email=".urlencode($from)."&message=".urlencode($message)); die();
} ?>