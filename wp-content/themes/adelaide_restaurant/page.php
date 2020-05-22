<?php
/*
* Template Name: General template
*/
get_header();


if ( have_posts() ) :
	while ( have_posts() ) :
		the_post(); ?>
        <div class="page-content">
            <div class="container">
				<?php
				
				the_content();
				
				?>
            </div>

        </div>
	<?php
	endwhile;
endif; 

get_footer();
?>