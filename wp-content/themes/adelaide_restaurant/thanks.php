<?php
/*
* Template name: Thanks page
*/
session_start();

get_header();
?>

<div class="container my-5">
	<h1><?= $_SESSION[ 'thanks_title' ]; ?></h1>
	<p><?= $_SESSION[ 'thanks_content' ]; ?></p>
</div>

<?php
get_footer();
