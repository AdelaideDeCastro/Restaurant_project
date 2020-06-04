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
			<input type="number" class="form-control" name="phone" value="<?php if( isset($_POST[ 'phone' ] ) ) { echo $_POST[ 'phone' ]; } ?>" placeholder="Telefoon" required="">
		</div>
		<div class="form-group col-lg-6">
			<input type="email" class="form-control" name="email" value="<?php if( isset($_POST[ 'email' ] ) ) { echo $_POST[ 'email' ]; } ?>" pattern="/^(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){255,})(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){65,}@)(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22))(?:\\.(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-+[a-z0-9]+)*\\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-+[a-z0-9]+)*)|(?:\\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\\]))$/iD" placeholder="E-mailadres" required>
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
		<textarea class="form-control" name="message" value="<?php if( isset($_POST[ 'message' ] ) ) { echo $_POST[ 'message' ]; } ?>" rows="10" cols="30" placeholder="Eventuele opmerking waarmee wij rekeningen kunnen houden"></textarea>
	</div>
<button type="submit" class="btn btn-outline-primary" name="submit" value="<?php if( isset($_POST[ 'submit' ] ) ) { echo $_POST[ 'submit' ]; } ?>"><?php echo $_SESSION[ 'submit_title' ]; ?></button> 
</form>



