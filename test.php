<?php 
$errors = '';
$myemail = 'rashmipriya1102@gmail.com';//<-----Put Your email address here.
if(empty($_POST['date'])  || 
   empty($_POST['options']) || 
   empty($_POST['time']))
{
    $errors .= "\n Error: all fields are required";
}

$date = $_POST['date']; 
$options = $_POST['options']; 
$time = $_POST['time']; 

if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", 
$email_address))
{
    $errors .= "\n Error: Invalid email address";
}

if( empty($errors))
{
    $to = $myemail; 
    $email_subject = "Contact form submission: $name";
    $email_body = "You have received a new message. /n".
    " Here are the details:\n date: $date \n options: $options \n time: $time";
}

    $headers = "From: $myemail\n"; 
    $headers .= "Reply-To: $email_address";

    mail($to,$email_subject,$email_body,$headers);
    //redirect to the 'thank you' page
    // header('Location: contact-form-thank-you.html');

    echo "Thank You!";
?>
<!-- This page is displayed only if there is some error -->
<!-- <?php
// echo nl2br($errors);
?>
 -->

</body>
</html>