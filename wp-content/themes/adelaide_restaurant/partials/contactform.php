<?php
//email from admin page
// not working esc_attr
// $reservationEmail = get_option( 'reservation_email' );

$host  = $_SERVER['HTTP_HOST'];
$uri   =  basename(dirname(__FILE__, 5));
$extra = 'thanks';

if( isset( $_POST[ 'submit' ] ) ) {

	$to = $reservation_email; // this is your Email address
    $from = $_POST['email']; // this is the sender's Email address
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $subject = "Reservation submission";
    $subject2 = "Copy of your Reservation submission";
    $message = "Booked by: " . $first_name . " " . $last_name . "\n\n" . "Telephone: " . $_POST[ 'phone' ] . "Email address: " . $_POST[ 'email' ] . "\n\n" . "Date: " . $_POST[ 'reservatio_date' ] . " at: " . $_POST[ 'hour' ] . "hours" . "\n\n" . $_POST['message'];

    $headers = "From:" . $from;
    
    mail( $to, $subject, $message, $headers );

    // echo $host;
    // echo "</br>";
    // echo $uri;
    header("Location: http://$host/$uri/$extra");
    // You can also use header('Location: thank_you.php'); to redirect to another page.
    

}
?>