<?php
session_start();

$restaurant_email = $_SESSION[ 'reservation_email' ];

$host  = $_SERVER['HTTP_HOST'];
$uri   =  basename(dirname(__FILE__, 5));
$extra = 'thanks';

if( isset( $_POST[ 'submit' ] ) ) {

	$to = $restaurant_email; // this is restaurant Email address
    $from = $_POST['email']; // this is the sender's Email address
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $subject = "Reservation submission";
    $message = "Booked by: " . $first_name . " " . $last_name . "\n\n" . "Telephone: " . $_POST[ 'phone' ] . "Email address: " . $_POST[ 'email' ] . "\n\n" . "Date: " . $_POST[ 'reservatio_date' ] . " at: " . $_POST[ 'hour' ] . "hours" . "\n\n" . $_POST['message'];

    $headers = "From:" . $from;

    // echo "<pre>";
    // print_r($_POST);
    // echo "</pre>";

    // die();

    // echo "<pre>";
    // print_r($_POST);
    // echo "</pre>";
    
    mail( $to, $subject, $message, $headers );

    header("Location: http://$host/$uri/$extra");
}
?>