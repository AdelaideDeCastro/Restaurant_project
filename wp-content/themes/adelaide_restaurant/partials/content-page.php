<?php
if ( have_posts() ) :
	while ( have_posts() ) :
		the_post(); ?>

        <div class="page-content">
            <div class="container">

				<?php
				/*
				 * Default content
				 */
				the_content();
				?>
				
            </div>
        </div>

	<?php
	endwhile;
endif; ?>