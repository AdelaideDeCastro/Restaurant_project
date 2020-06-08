<?php 
session_start();
?>

<form action="<?php echo get_stylesheet_directory_uri(); ?>/partials/contactform.php" method="post">
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
			<input type="tel" class="form-control" name="phone" value="<?php if( isset($_POST[ 'phone' ] ) ) { echo $_POST[ 'phone' ]; } ?>" placeholder="Telefoon" required="">
		</div>
		<div class="form-group col-lg-6">
			<input type="email" class="form-control" name="email" value="<?php if( isset($_POST[ 'email' ] ) ) { echo $_POST[ 'email' ]; } ?>" pattern="[^@\s]+@[^@\s]+\.[^@\s]+" placeholder="E-mailadres" required>
		</div>
	</div>
	<div class="form-row">
		<div class="form-group col-lg-4 position-relative">
			<input type="text" class="form-control" id="datepicker_restaurant" name="reservatio_date" value="<?php if( isset($_POST[ 'reservatio_date' ] ) ) { echo $_POST[ 'reservatio_date' ]; } ?>" placeholder="Datum" required="">
		</div>
		<div class="form-group col-lg-4">
			<input type="time" class="form-control" name="hour" value="<?php if( isset($_POST[ 'hour' ] ) ) { echo $_POST[ 'hour' ]; } ?>" placeholder="hour" required="">
		</div>
		<div class="form-group col-lg-4">
			<input type="number" class="form-control" name="people" value="<?php if( isset($_POST[ 'people' ] ) ) { echo $_POST[ 'people' ]; } ?>" min="1" max="33" placeholder="People" required="">
		</div>
		<textarea class="form-control mb-4" name="message" value="<?php if( isset($_POST[ 'message' ] ) ) { echo $_POST[ 'message' ]; } ?>" rows="10" cols="30" placeholder="Eventuele opmerking waarmee wij rekeningen kunnen houden"></textarea>
	</div>
<button type="submit" class="btn btn-outline-primary mb-5" name="submit" value="<?php if( isset($_POST[ 'submit' ] ) ) { echo $_POST[ 'submit' ]; } ?>"><?php echo $_SESSION[ 'submit_title' ]; ?></button> 
</form>



