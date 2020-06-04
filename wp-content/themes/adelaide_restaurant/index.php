<?php
get_header();

/*
 * Include header image
 */
get_template_part('partials/page', 'image');
/*
 * Include default content
 */
get_template_part( 'partials/default', 'content' );

get_footer();