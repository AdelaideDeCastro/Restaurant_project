<?php
/*
* Template Name: General template
*/
get_header();

get_template_part( 'partials/content', 'page' );

$employees = get_field( 'add_employees' );

if ( $employees == 'yes' ) {

	$args = [
		'post_type'=> 'employee',

	];

	$query = new WP_Query( $args ); ?>

	<div class="container">
		<div class="team-wrapper d-flex flex-wrap my-5">

		
			<?php
			foreach ($query->posts as $value) { ?>

				<article >
					<div class="bg-img bg-img-sm bg-img-team" style="background-image: url(' <?= get_the_post_thumbnail_url( $value->ID, 'full' ) ?> ');"></div>
					<div class="team-description mt-2 text-center">
						<p class="mb-1 text-primary"><strong><?= $value->post_title; ?></strong></p>
						<p><?= $value->post_content ?></p>
					</div>	
				</article>
			
			<?php
			} ?>

		</div>
	</div>

	<?php
}

wp_reset_postdata();

get_footer();