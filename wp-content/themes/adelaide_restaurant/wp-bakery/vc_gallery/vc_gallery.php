<?php

class vcGallery extends WPBakeryShortCode
{
	
	//Initialize Component
	function __construct()
	{
		add_action( 'vc_before_init', [ $this, 'vc_gallery_mapping' ] );
		add_shortcode( 'vc_gallery', [ $this, 'vc_gallery_html' ] );	
	}

	//Element mapping
	public function vc_gallery_mapping()
	{
		if ( !defined( 'WPB_VC_VERSION' ) ) {
            exit();
            return;
        }

        vc_map( [
			'name'			=> __( 'Gallery', 'text-domain' ),
        	'base'			=> 'vc_gallery',
        	'description'	=> __( 'Gallery with text or overlay', 'text-domain' ),
        	'category'		=> __( 'Restaurant Element', 'text-domain' ),
        	'icon'			=> get_template_directory_uri() . '/img/logo.png',
			'params' 		=> [
				[
					'type'			=> 'dropdown',
					'param_name'	=> 'gallery_title',
					'heading'		=> 'Add title to gallery (optional)',
					'value'			=> [
						'Choose title or link'	=> 'title_link',
						'Title'					=> 'std_title',
						'Link'					=> 'std_link',
					],
					'std'			=> 'title_link',
				],	
				[
					'type'			=> 'textfield',
					'param_name'	=> 'general_title',
					'heading'		=> 'Add title to gallery',
					'dependency'	=> [
						'element'	=> 'gallery_title',
						'value'		=> 'std_title',
					],
				],
				[
					'type'			=> 'vc_link',
					'param_name'	=> 'link',
					'heading'		=> 'Add title as link to gallery',
					'dependency'	=> [
						'element'	=> 'gallery_title',
						'value'		=> 'std_link',
					],
				],
				[
					'type'			=> 'dropdown',
					'param_name'	=> 'type_gallery',
					'heading'		=> 'Choose to add a gallery with text or just a gallery with overlay of images',
					'value'			=> [
						'Choose type gallery'				=> 'choose_gallery',
						'Gallery with text'					=> 'gallery_text',
						'Gallery with overlay of images'	=> 'gallery_overlay',
					],
					'std'			=> 'choose_gallery',
				],
				// params group
				[
					'type'			=> 'param_group',
					'value'			=> '',
					'heading'		=> 'Add images and text to the gallery',
					'dependency'	=> [
						'element'	=> 'type_gallery',
						'value'		=> 'gallery_text',
					],
					'param_name'	=> 'gallery_content',
					// Note params is mapped inside param-group:
					'params' => [
						[
							'type' => 'attach_image',
							'value' => '',
							'heading' => 'Add image to your gallery',
							'param_name' => 'img',
						],
						[
							'type' => 'textarea',
							'value'=> '',
							'heading'=> 'Add a title',
							'param_name'=> 'title',
						],
						[
							'type' => 'textarea',
							'value'=> '',
							'heading'=> 'Add a description',
							'param_name'=> 'description',
						],
					]
				],
				[
					'type'			=> 'attach_images',
					'param_name'	=> 'gallery_overlay_imgs',
					'heading'		=> 'Add images',
					'dependency'	=> [
						'element'	=> 'type_gallery',
						'value'		=> 'gallery_overlay'
					],
				],
			],
		] );

	}

	//Element html
	public function vc_gallery_html( $atts )
	{
		ob_start();

		$galleries = vc_param_group_parse_atts( $atts['gallery_content'] );

		$counter = 1; ?>

			<?php
			if ( !empty( $atts['gallery_title'] ) ) {
				if( $atts['gallery_title'] == 'std_title' ) { ?>
				
					<h1 class="text-center mt-5"><?= $atts['general_title']; ?></h1>

				<?php
				} else { 
				
					$btn_link = vc_build_link( $atts['link'] );
					?>

					<h1 class="text-center mt-5"><a href="<?= $btn_link['url'] ?>" title="<?= $btn_link['title']; ?>"><?= $btn_link['title']; ?></a></h1>
			
				<?php
				}
			}

			if ( $atts['type_gallery'] == 'gallery_text' ) { ?>

				<div class="menu-wrapper w-100<?php if( empty( $atts['gallery_title'] ) ) { echo ' my-5'; } else { echo ' pb-5 mb-5'; } ?>">
					<div class="menu-overview-slick slick-arrow-position">

						<?php
						foreach ($galleries as $gallery ) {

							if ( !empty( $gallery['img'] ) && !empty( $gallery['title'] ) && !empty( $gallery['description'] ) ) { 

								$galleries_img = wp_get_attachment_image_src( $gallery['img'], 'full' ); 

								if( $counter % 2 ) { ?>

									<div class="menu-card">
										<div class="menu-slick-img bg-img" style="background-image: url(' <?= $galleries_img[0]; ?> ');"></div>
										<div class="slick-content text-center">
				                        	<h2 class="text-primary"><?= $gallery['title']; ?></h2>
				                        	<p><?= $gallery['description'] ?></p>
				                        </div>
									</div>

								<?php
								} else { ?>

									<div class="menu-card">
				                        <div class="slick-content text-center">
				                            <h2 class="text-primary"><?= $gallery['title']; ?></h2>
				                            <p><?= $gallery['description'] ?></p>
				                        </div>
				                        <div class="menu-slick-img bg-img" style="background-image: url(' <?= $galleries_img[0]; ?> ');"></div>
				                    </div>

				                <?php
			            		} 
							}

							$counter++;

						} 

						?>

					</div>
				</div>

			<?php
			}

			if ( $atts['type_gallery'] == 'gallery_overlay' ) { 

				$gallery_overlay_imgs = explode(',',$atts['gallery_overlay_imgs']); ?>

				<div id="gallery-overlay" class=" d-flex flex-wrap<?php if( empty( $atts['gallery_title'] ) ) { echo ' my-5'; } else { echo ' mb-5'; } ?>">

					<?php
					foreach ( $gallery_overlay_imgs as $image_url ) {

						$images_url = wp_get_attachment_image_src( $image_url ); ?>

						
						<a href="<?= $images_url[0]; ?>" data-lightbox="bacco-gallery" class="bg-img bg-img-sm" style="background-image: url(' <?= $images_url[0]; ?> ');"></a>

					<?php } ?>

				</div>

			<?php } ?>

			</div>

		<?php
		$html = ob_get_clean();

		return $html;
	}

}

new vcGallery;