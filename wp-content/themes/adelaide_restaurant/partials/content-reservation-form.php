<?php 
session_start();

$reservationEmail = esc_attr( get_option( 'reservation_email' ) );

if( isset( $_POST[ 'submit' ] ) ) {

	$to = $reservationEmail; // this is your Email address
    $from = $_POST['email']; // this is the sender's Email address
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $subject = "Reservation submission";
    $subject2 = "Copy of your Reservation submission";
    $message = "Booked by: " . $first_name . " " . $last_name . "\n\n" . "Telephone: " . $_POST[ 'phone' ] . "Email address: " . $_POST[ 'email' ] . "\n\n" . "Date: " . $_POST[ 'reservatio_date' ] . " at: " . $_POST[ 'hour' ] . "hours" . "\n\n" . $_POST['message'];
    $message2 = "Here is a copy of your message " . $first_name . "\n\n" . $_POST['message'];

    $headers = "From:" . $from;
    $headers2 = "From:" . $to;
    wp_mail( $to, $subject, $message, $headers );
    wp_mail( $from, $subject2, $message2, $headers2 ); // sends a copy of the message to the sender
    echo "Mail Sent. Thank you " . $first_name . " " . $last_name . ", we will contact you shortly.";
    // You can also use header('Location: thank_you.php'); to redirect to another page.
}

if ( !empty( $_POST ) ) { ?>
	
	<div class="thanks-wrapper">
		<h1><?php echo $_SESSION[ 'thanks_title' ]; ?></h1>
		<p><?php echo $_SESSION[ 'thanks_content' ]; ?></p>
	</div>

<?php	
}
?>

<form action="content-reservation-form.php" method="post">
	<div class="form-row">
		<div class="form-group col-lg-6">
			<input type="text" class="form-control" name="first_name" value="<?php if( isset($_POST[ 'first_name' ] ) ) { echo $_POST[ 'first_name' ]; } ?>" placeholder="Voornaam" required="">
		</div>
		<div class="form-group col-lg-6">
			<input type="text" class="form-control" name="last_name" value="<?php if( isset($_POST[ 'last_name' ] ) ) { echo $_POST[ 'last_name' ]; } ?>" placeholder="Achternaam" required="">
		</div>
	</div>
	<div class="form-row">
		<div class="form-group col-lg-6">
			<input type="number" class="form-control" name="phone" value="<?php if( isset($_POST[ 'phone' ] ) ) { echo $_POST[ 'phone' ]; } ?>" placeholder="Telefoon" required="">
		</div>
		<div class="form-group col-lg-6">
			<input type="email" class="form-control" name="email" value="<?php if( isset($_POST[ 'email' ] ) ) { echo $_POST[ 'email' ]; } ?>" pattern="/^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}
  [a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/" placeholder="E-mailadres" required>
		</div>
	</div>
	<div class="form-row">
		<div class="form-group col-lg-4 position-relative">
			<input type="text" class="form-control" id="datepicker_restaurant" name="reservatio_date" value="<?php if( isset($_POST[ 'reservatio_date' ] ) ) { echo $_POST[ 'reservatio_date' ]; } ?>" placeholder="Datum" required="">
		</div>
		<div class="form-group col-lg-4">
			<input type="time" class="form-control" name="hour" value="<?php if( isset($_POST[ 'hour' ] ) ) { echo $_POST[ 'hour' ]; } ?>" placeholder="Uur" required="">
		</div>
		<div class="form-group col-lg-4">
			<input type="number" class="form-control" name="people" value="<?php if( isset($_POST[ 'people' ] ) ) { echo $_POST[ 'people' ]; } ?>" min="0" max="33" placeholder="Personen" required="">
		</div>
		<textarea class="form-control" name="message" value="<?php if( isset($_POST[ 'message' ] ) ) { echo $_POST[ 'message' ]; } ?>" rows="10" cols="30" placeholder="Eventuele opmerking waarmee wij rekeningen kunnen houden"></textarea>
	</div>
	<div>
		
		<button class="g-recaptcha" 
        data-sitekey="reCAPTCHA_site_key" 
        data-callback='onSubmit' 
        data-action='submit'>Submit</button>
	</div>
	<button type="submit" class="btn btn-outline-primary" name="submit" value="<?php if( isset($_POST[ 'submit' ] ) ) { echo $_POST[ 'submit' ]; } ?>"><?php echo $_SESSION[ 'submit_title' ]; ?></button>
</form>

<script src="https://www.google.com/recaptcha/api.js?render=reCAPTCHA_site_key"></script>
<script>
  function onClick(e) {
    e.preventDefault();
    grecaptcha.ready(function() {
      grecaptcha.execute('reCAPTCHA_site_key', {action: 'submit'}).then(function(token) {
          // Add your logic to submit to your backend server here.
      });
    });
  }
</script>



