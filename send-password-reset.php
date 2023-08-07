<?php
include('dbcon.php');
$EMAIL=$_POST["email"];


include('D:\xampp\htdocs\Gate-Pass\vendor\phpmailer\PHPMailer\src\PHPMailer.php');
include('D:\xampp\htdocs\Gate-Pass\vendor\phpmailer\PHPMailer\src\SMTP.php');
include('D:\xampp\htdocs\Gate-Pass\vendor\phpmailer\PHPMailer\src\Exception.php');

  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;

  $token=bin2hex(random_bytes(16));
  $token_hash=hash("sha256",$token);
  $expiry=date("Y-m-d H:i:s,time() + 60*30");
  
  $sql1="UPDATE Pass SET reset_token_hash='$token_hash', reset_token_expires_at='$expiry' WHERE email_id='$EMAIL'" ;
   $run1=sqlsrv_query($conn,$sql1);
  


$sql="SELECT reset_token_hash FROM Pass where email_id='$EMAIL'";
$run=sqlsrv_query($conn,$sql);
$row=sqlsrv_fetch_array($run,SQLSRV_FETCH_ASSOC);



if(isset($_POST["email"])){
  $mail = new PHPMailer(true);
  $mail->IsSMTP();                   //Sets Mailer to send message using SMTP
  $mail->Host = 'smtp.office365.com';                  //Sets the SMTP hosts of your Email hosting, this for Godaddy
  $mail->Port = 587;                    //Sets the default SMTP server port
  $mail->SMTPAuth = true;                 //Sets SMTP authentication. Utilizes the Username and Password variables
  $mail->Username = 'alert@seplcables.com';       //Sets SMTP username
  $mail->Password = 'Sabudana#696';               //Sets SMTP Password
  $mail->SMTPSecure = 'tls';                //Sets connection prefix. Options are "", "ssl" or "tls"
  $mail->From = 'alert@seplcables.com';       //Sets the From email address for the message
  $mail->FromName = 'RM Software';            //Sets the From name of the message
  $mail->AddAddress($_POST["email"]);  //Adds a "To" address
  $mail->WordWrap = 52;               //Sets word wrapping on the body of the message to a given number of characters
  $mail->IsHTML(true);                //Sets message type to HTML
  $mail->CharSet = 'UTF-8';
  $mail->Subject = 'Store - Minimum order Qnty.';       //Sets the Subject of the message
  $mail->Body = '<a href="http://localhost:8080/gate-pass/reset.php?token='.$row['reset_token_hash'].'">here</a>'; //An HTML or plain text message body
  if ($mail->Send()) {                //Send an Email. Return true on success or false on error
    echo '<label class="text-success">Mail has been send successfully...</label>';
  }
    }else{
      echo $_POST["email"];
    }


?>










