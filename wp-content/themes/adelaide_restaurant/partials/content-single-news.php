<?php
if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();
		?>

		<div class="container my-5">
			<div class="row">
				<div class="col-lg-7">
					<article>
						<h1 class="mb-3"><?= the_title(); ?></h1>
						<div class="bg-img bg-img-home bg-img-fluid" style="background-image: url( ' <?= the_post_thumbnail_url( 'full' ); ?> ' );"></div>
						<p><?= the_date( 'd/m/Y' ); ?></p>
						<?= the_content(); ?>
					</article>
				</div>
				<div class="col-lg-5">
					<div class="d-flex flex-wrap single-nieuws-img-wrapper">

						<?php
						$gallery = get_field( 'news_gallery' );

						if ( !empty( $gallery ) ) { ?>

							<div class="gallery-overlay gallery-overlay-news d-flex flex-wrap w-100">
								
								<?php
								foreach ( $gallery as $img ) { ?>

									<a href="<?= $img['url']; ?>" data-lightbox="bacco-gallery" class="bg-img bg-img-sm" style="background-image: url( ' <?= $img['url']; ?> ');"></a>

								<?php }	?>

							</div>
						
						<?php } ?>

					</div>
				</div>
			</div>
		</div>	

		<?php
	endwhile;
endif;