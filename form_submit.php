<?php
if(isset($_POST['email'])) {
    $email_to = "miles.pallett@hotmail.com";
    $email_subject = "test";
    $first_name = $_POST['first_name']; // required
    $email_from = $_POST['email']; // required
    $telephone = $_POST['telephone']; // not required
    $location = $_POST['location']; // required
    $availability = $_POST['inPersonCheck']; //required

    function clean_string($string) {
    $bad = array("content-type","bcc:","to:","cc:","href");
    return str_replace($bad,"",$string);
    }

    $email_message = "Form details below.\n\n";
    $email_message .= "Name: ".clean_string($first_name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Telephone: ".clean_string($telephone)."\n";
    $email_message .= "Location: ".clean_string($location)."\n";
    $email_message .= "Availability: ".clean_string($availability)."\n";
}
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
mail($email_to, $email_subject, $email_message, $headers);
?>