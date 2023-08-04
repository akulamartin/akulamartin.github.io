<?php
$to = "martin.the.developer12@gmail.com";
$subject = "My subject";
$txt = "Hello world!";
$headers = "From: martin.akula@gmail.com";
echo "Sending email...";
if(mail($to,$subject,$txt, $headers)) {
    echo "The email message was sent.";
} else {
    echo "The email message was not sent.";
}
?>