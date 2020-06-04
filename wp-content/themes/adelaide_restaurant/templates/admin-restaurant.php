<h1>Restaurant Social links</h1>

<?php settings_errors(); ?>

<form method="post" action="options.php">
	<?php 
	settings_fields( 'restaurant-settings-group' );

	do_settings_sections( 'admin_restaurant' );

	submit_button(  );
	?>
</form>