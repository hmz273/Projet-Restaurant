<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/contact.scss">
    <title>contact us</title>
</head>
<body>
<div class="container">
		<div class="contact-box">
			<div class="left">
                <h2>Contact Us</h2>
				<form method="POST">
                    <input type="text" name="name" placeholder="Full-Name" class="field">
                    <input type="text" name="mail" placeholder="Your e-mail" class="field">
                    <input type="text" name="subject" placeholder="Subject" class="field">
                    <textarea name="message" placeholder="Message" class="field"></textarea>
                    <input type="submit" name="submit" value="Send" class="sbm"></div>
                    </form>
			<div class="right"></div>
		</div>
	</div>
</body>
</html>





<?php
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $mailFrom = $_POST['mail'];
    $message = $_POST['message'];
    $mailTo = "hamzamorningstar@gmail.com";
    //$headers = "From: ".$mailFrom;
    $txt = "You have received an e-mail from ".$name.".\n\n".$message;

    if (mail($mailTo,$subject,$txt)) {
        echo "<script>alert('Successfuly')</script>";
    } else {
        echo "<script>alert('SomeThing Wrong')</script>";
    }
    
    header('location: home.php');
}
?>