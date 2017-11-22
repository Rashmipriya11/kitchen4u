<?php 
$errors = '';
$myemail = 'rashmipriya1102@gmail.com';//<-----Put Your email address here.
if(empty($_POST['name']) || 
   empty($_POST['email']) || 
   empty($_POST['phone']) || 
   empty($_POST['msg'])) 
{
    $errors .= "\n Error: all fields are required";
}

$name = $_POST['name']; 
$email_address = $_POST['email']; 
$phone = $_POST['phone']; 
$msg = $_POST['msg']; 

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
    " Here are the details:\n name: $name  \n email: $email \n phone: $phone \n msg: $msg";
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