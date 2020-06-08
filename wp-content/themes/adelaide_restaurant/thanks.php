<?php
/*
* Template name: Thanks page
*/
session_start();

get_header();
?>

<div class="container my-5">
	<div class="row">
		<div class="col-md-8 offset-md-2">
			<h1><?= $_SESSION[ 'thanks_title' ]; ?></h1>
			<p><?= $_SESSION[ 'thanks_content' ]; ?></p>
		</div>
	</div>
</div>

<?php
get_footer();
