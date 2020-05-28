<?php

class vcFileWithText extends WPBakeryShortCode
{

	//Initialize Component
	function __construct()
	{
		add_action( 'vc_before_init', [ $this, 'vc_file_with_text_mapping' ] );
		add_shortcode( 'vc_file_with_text', [ $this, 'vc_file_with_text_html' ] );
	}

	//Element mapping
	public function vc_file_with_text_mapping()
	{

		if ( !defined( 'WPB_VC_VERSION' ) ) {
            exit();
            return;
        }

		vc_map( [
			'name'			=> __( 'Text plus image, gallery or video', 'text-domain' ),
			'base'			=> 'vc_file_with_text',
			'description'	=> __( 'Text plus image, gallery or video surrounded by a square', 'text-domain' ),
			'category'		=> __( 'Restaurant Element', 'text-domain' ),
			'icon'			=> get_template_directory_uri() . '/img/logo.png',
			'params'		=> [
				[
					'type'			=> 'dropdown',
					'param_name'	=> 'type_view',
					'heading'		=> 'Choose image(s) or video',
					'description'	=> 'Gallery images and video are displayed only in large size',
					'value'			=> [
						'Choose image(s) or video'	=> 'choose_view',
						'Single image'				=> 'single_img',
						'Gallery images'			=> 'gallery',
						'Video'						=> 'video',
					],
					'std'	=> 'choose_view',
				],
				[
					'type'			=> 'dropdown',
					'param_name'	=> 'size_img',
					'heading'		=> 'Choose size for single image',
					'value'			=> [
						'Choose size'	=> 'choose_size',
						'Small'			=> 'sm',
						'Large'			=> 'lg',
					],
					'dependency'	=> [ 
						'element'	=> 'type_view',
						'value'		=> 'single_img'
					],
				],
				[
					'type'			=> 'attach_image',
					'param_name'	=> 'img',
					'heading'		=> 'Add single image',
					'dependency'	=> [
						'element'	=> 'type_view',
						'value'		=> 'single_img',
					]
				],
				[
					'type'			=> 'attach_images',
					'param_name'	=> 'imgs',
					'heading'		=> 'Add gallery images',
					'dependency'	=> [
						'element'	=> 'type_view',
						'value'		=> 'gallery',
					],
				],
				[
					'type'			=> 'vc_link',
					'param_name'	=> 'video_url',
					'heading'		=> 'Add video URL',
					'dependency'	=> [
						'element'	=> 'type_view',
						'value'		=> 'video',
					]
				],
				[
					'type'			=> 'dropdown',
					'param_name'	=> 'side',
					'heading'		=> 'Choose where to display your image(s) or video',
					'value'			=> [
						'Choose left or right side'		=> 'side',
						'Left'							=> 'left',
						'Right'							=> 'right',
					],
				],
				[
					'type'			=> 'textarea_html',
					'param_name'	=> 'content',
					'heading'		=> 'Add a dummy content',
				],
				[
					'type'			=> 'dropdown',
					'param_name'	=> 'alignment',
					'heading'		=> 'Select how to align your text',
					'value'			=> [
						'Choose text alignment'=> 'align_default',
						'Align central'=> 'align_central',
						'Align_left'=> 'align_left',

					],
				],
			],
		] );
	}

	//Element html
	public function vc_file_with_text_html( $atts, $content ) 
	{
		ob_start();

		$single_img = wp_get_attachment_image_src( $atts['img'] );

		echo "<div class='file-wrapper my-5 pb-4'>";
		echo "<div class='row'>"; 

			
			if ( $atts['side'] == 'right' ) {

				if ( $atts['type_view'] == 'single_img' ) { ?>
					
					<div class="col-sm-8 offset-sm-2<?php if( $atts['size_img'] == 'sm' ) { echo' col-lg-4'; } else { echo'col-lg-5 offset-lg-0'; } ?><?php if( $atts['alignment'] == 'align_central' ) {
							echo ' align-self-center text-center';} else { echo ''; } ?>">
							<?= $content; ?>
					</div>
					<div class="<?php if( $atts['size_img'] == 'sm' ) { echo'col-sm-4 offset-sm-4 offset-lg-0 mt-5 mt-lg-0'; } else { echo'col-lg-7 mt-5 mt-lg-0'; } ?>">
						<div class="surrounded-img position-relative">
							<div class="bg-img bg-img-home bg-img-sm mx-auto" style="background-image: url(' <?= $single_img[0] ?> ');"></div>
							<div class="border-around-img border-around-img-sm position-absolute"></div>
						</div>
					</div>

				<?php
				} elseif ( $atts['type_view'] == 'gallery' ) {

					$galleries_array = explode( ',', $atts['imgs'] );
					
					if ( !empty( $galleries_array ) ) { ?>

						<div class="col-sm-8 offset-sm-2 col-lg-5 offset-lg-0<?php if( $atts['alignment'] == 'align_central' ) { echo 'align-self-center text-center'; } else { echo ''; } ?>">
							<?= $content; ?>
						</div>
						<div class="col-lg-7 mt-5 mt-lg-0">
							<div class="surrounded-img surrounded-img-lg position-relative">
								<div class="menu-slick slick-arrow-position">

									<?php foreach ( $galleries_array as $gallery_src ) { 

										$img_src = wp_get_attachment_image_src( $gallery_src );
										?>
										
										<div class="menu-slick-img bg-img" style="background-image: url(' <?= $img_src[0]; ?> ');"></div>

									<?php } ?>

								</div>
								<div class="border-around-img border-around-img-lg position-absolute"></div>
							</div>
						</div>
				
					<?php
					}
				} else { 
					$video_url_squared = vc_build_link( $atts['video_url'] );
				?>

					<div class="col-sm-8 offset-sm-2 col-lg-5 offset-lg-0<?php if( $atts['alignment'] == 'align_central' ) { echo " align-self-center text-center"; } else { echo ""; } ?>">
							<?= $content; ?>
					</div>
					<div class="col-lg-7 mt-5 mt-lg-0">
						<div class="surrounded-img surrounded-img-lg position-relative">
							<iframe src="<?= $video_url_squared['url']; ?>"></iframe>
							<div class="border-around-img border-around-img-lg position-absolute"></div>
						</div>
					</div>

				<?php
				}
			}
		

			if ( $atts['side'] == 'left' ) {

				if ( $atts['type_view'] == 'single_img' ) { ?>

					<div class="<?php if( $atts['size_img'] == 'sm' ) { echo'col-sm-4 offset-sm-4 offset-lg-0 mt-5 mt-lg-0'; } else { echo'col-lg-7 mt-5 mt-lg-0'; } ?>">
						<div class="surrounded-img position-relative">
							<div class="bg-img bg-img-home bg-img-sm mx-auto" style="background-image: url(' <?= $single_img[0] ?> ');"></div>
							<div class="border-around-img border-around-img-sm position-absolute"></div>
						</div>
					</div>
					<div class="col-sm-8 offset-sm-2<?php if( $atts['size_img'] == 'sm' ) { echo' col-lg-4'; } else { echo'col-lg-5 offset-lg-0'; } ?><?php if( $atts['alignment'] == 'align_central' ) {
							echo ' align-self-center text-center';} else { echo ''; } ?>">
							<?= $content; ?>
					</div>

				<?php
				} elseif ( $atts['type_view'] == 'gallery' ) {

					$galleries = wp_get_attachment_image_src( $atts['imgs'] );

					if( !empty( $galleries ) ) { ?>

						<div class="col-lg-7 mt-5 mt-lg-0">
							<div class="surrounded-img surrounded-img-lg position-relative">
								<div class="menu-slick slick-arrow-position">

									<?php foreach ($galleries as $gallery) { ?>
										
										<div class="menu-slick-img bg-img" style="background-image: url('img/antipasto_menu.jpg');"></div>

									<?php
									} ?>
							
								</div>
								<div class="border-around-img border-around-img-lg position-absolute"></div>
							</div>
						</div>
						<div class="col-sm-8 offset-sm-2 col-lg-5 offset-lg-0<?php if( $atts['alignment'] == 'align_central' ) { echo " align-self-center text-center"; } else { echo ""; } ?>">
							<?= $content; ?>
						</div>
						
					<?php
					}
				} else { 
					$video_url_squared = vc_build_link( $atts['video_url'] );
				?>

					<div class="col-lg-7 mt-5 mt-lg-0">
						<div class="surrounded-img surrounded-img-lg position-relative">
							<iframe src="<?= $video_url_squared['url']; ?>"></iframe>
							<div class="border-around-img border-around-img-lg position-absolute"></div>
						</div>
					</div>
					<div class="col-sm-8 offset-sm-2 col-lg-5 offset-lg-0<?php if( $atts['alignment'] == 'align_central' ) { echo " align-self-center text-center"; } else { echo ""; } ?>">
							<?= $content; ?>
					</div>
					
				<?php
				}
			} 

		echo'</div>';
		echo'</div>';

		$html = ob_get_clean();

		return $html;
	}

}

// Element Class Init
new vcFileWithText;