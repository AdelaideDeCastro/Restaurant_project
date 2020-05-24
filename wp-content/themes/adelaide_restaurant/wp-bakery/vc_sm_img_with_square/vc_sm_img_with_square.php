<?php

class vcSmImgWithSquare extends WPBakeryShortCode
{

	//Initialize Component
	function __construct()
	{
		add_action( 'vc_before_init', [ $this, 'vc_sm_img_with_square_mapping' ] );
		add_shortcode( 'vc_sm_img_with_square', [ $this, 'vc_sm_img_with_square_html' ] );
	}

	//Element mapping
	public function vc_sm_img_with_square_mapping()
	{

		if ( !defined( 'WPB_VC_VERSION' ) ) {
            exit();
            return;
        }

		vc_map( [
			'name'			=> __( 'Small image', 'text-domain' ),
			'base'			=> 'vc_sm_img_with_square',
			'description'	=> __( 'Small image surrounded by a square', 'text-domain' ),
			'category'		=> __( 'Restaurant Element', 'text-domain' ),
			'icon'			=> get_template_directory_uri() . '/img/logo.png',
			'params'		=> [
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
				[
					'type'			=> 'attach_image',
					'param_name'	=> 'img',
					'heading'		=> 'Add single image',
				],
				[
					'type'			=> 'dropdown',
					'param_name'	=> 'side',
					'heading'		=> 'Choose where to display your image',
					'value'			=> [
						'Choose left or right side'		=> 'side',
						'Left'							=> 'left',
						'Right'							=> 'right',
					],
				],
			],
		] );
	}

	//Element html
	public function vc_sm_img_with_square_html( $atts, $content ) 
	{
		ob_start();

		// echo "<pre>";

		// print_r( $content );

		// echo "</pre>";

		// echo "<pre>";

		// print_r( $atts );

		// echo "</pre>";

		$single_img = wp_get_attachment_image_src( $atts['img'] );

		if ( !empty( $single_img[0] ) ) {
			if ( $atts['side'] == 'right' ) { ?>

				<div class="description-wrapper">
					<div class="row">
						<div class="col-sm-8 offset-sm-2 col-lg-4<?php if( $atts['alignment'] == 'align_central' ) {
							echo " align-self-center text-center";} else { echo ""; } ?>">
							<?= $content; ?>
						</div>
						<div class="col-sm-4 offset-sm-4 offset-lg-0 mt-5 mt-lg-0">
							<div class="surrounded-img position-relative">
								<div class="bg-img bg-img-home bg-img-sm mx-auto" style="background-image: url(' <?= $single_img[0] ?> ');"></div>
								<div class="border-around-img border-around-img-sm position-absolute"></div>
							</div>
						</div>
					</div>
				</div>

			<?php
			}

			if ( $atts['side'] == 'left' ) { ?>

				<div class="description-wrapper">
					<div class="row">
						<div class="col-sm-4 offset-sm-4 offset-lg-0 mt-5 mt-lg-0">
							<div class="surrounded-img position-relative">
								<div class="bg-img bg-img-home bg-img-sm" style="background-image: url(' <?= $single_img[0] ?> ');"></div>
								<div class="border-around-img border-around-img-sm position-absolute"></div>
							</div>
						</div>
						<div class="col-sm-8 offset-sm-2 col-lg-4<?php if( $atts['alignment'] == 'align_central' ) {
							echo " align-self-center text-center";} else { echo ""; } ?>">
							<?= $content; ?>
						</div>
					</div>
				</div>

			<?php
			}
		}


		$html = ob_get_clean();

		return $html;
	}

}

// Element Class Init
new vcSmImgWithSquare;