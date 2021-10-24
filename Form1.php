<?php

$error = ""; $successMessage = "";

if ($_POST) {
  
    if (!$_POST["name"]) {
        
        $error .= "The Name is required.<br>";
        
    }
    
    if (!$_POST["functiontype"]) {
        
        $error .= "The Function Type field is required.<br>";
        
    }
    
    if (!$_POST["email"]) {
        
        $error .= "An Email address is required.<br>";
        
    }
    if (!$_POST["phone"]) {
        
        $error .= "The Phone Number is required.<br>";
        
    }

    if (!$_POST["functiondate"]) {
        
        $error .= "Function Date is required.<br>";
        
    }
    
    if (!$_POST["functionplace"]) {
        
        $error .= "The Function Place is required.<br>";
        
    }
    

    if (!$_POST["timing"]) {
        
        $error .= "The Timing of your Function is required.<br>";
        
    }
    
    
    if ($_POST['email'] && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) === false) {
        
        $error .= "The email address is invalid.<br>";
        
    }

    if ($error != "") {
            
      $error = '<div class="alert alert-danger" role="alert"><p>There were error(s) in your form:</p>' . $error . '</div>';
  
    } else {
            $to = "ankitpatel159357@gmail.com" . $_POST['email'];
            $subject = "Inquiry for Pizza Point Franchise";

            $message = "Here is the details that " . $_POST['name'] . " fill for the franchise." . "\r\n\n" . 
                        "Name: ".$_POST['name'] . "\r\n" .
                        "Function Type: ".$_POST['functiontype'] . "\r\n" .
                        "Email: ".$_POST['email'] . "\r\n" .
                        "Phone Number: ".$_POST['phone'] . "\r\n" .
                        "Function Date: ".$_POST['functiondate'] . "\r\n" .
                        "Function Place: ".$_POST['functionplace'] . "\r\n" .
                        "Function Time: ".$_POST['timing'] . "\r\n";

            $headers = "From: " . $_POST['name'] . "\r\n";   

            if(mail($to,$subject,$message,$headers)) {
                $successMessage = '<div class="alert alert-success"role="alert">Thanks for filling the form we will get back to you ASAP!</div>';

            } else {
                $error = '<div class="alert alert-danger"role="alert">Your message couldn\'t be sent - please try again later</div>';
            }
        }
    }

    header("Location: ThankYou.html")
?>