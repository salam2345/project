<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'path/to/PHPMailer/src/Exception.php';
require 'path/to/PHPMailer/src/PHPMailer.php';
require 'path/to/PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve form data
  $name = $_POST["name"];
  $phone = $_POST["phone"];
  $person = $_POST["person"];
  $reservationDate = $_POST["reservation-date"];
  $reservationTime = $_POST["reservation-time"];
  $message = $_POST["message"];
  $email = $_POST["email"];
  $address = $_POST["address"];
  $specialRequests = $_POST["specialRequests"];

  // Set up PHPMailer
  $mail = new PHPMailer(true);
  try {
    // Server settings
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'abdullahisalam03@gmail.com'; // Your Gmail username
    $mail->Password   = 'Salam1759'; // Your Gmail password
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;

    // Recipients
    $mail->setFrom('abdullahisalam03@gmail.com', 'Salam Abdi'); // Your Gmail address and your name
    $mail->addAddress('abdullahisalam03@gmail.com', 'Restaurant Manager'); // Manager's Gmail address and their name

    // Content
    $mail->isHTML(true);
    $mail->Subject = 'Reservation Details';
    $mail->Body    = "Reservation Details:<br>
                      Name: $name<br>
                      Phone: $phone<br>
                      Person: $person<br>
                      Reservation Date: $reservationDate<br>
                      Reservation Time: $reservationTime<br>
                      Message: $message<br>
                      Email: $email<br>
                      Address: $address<br>
                      Special Requests: $specialRequests";

    $mail->send();
    echo 'Message has been sent';
  } catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }
}
?>




