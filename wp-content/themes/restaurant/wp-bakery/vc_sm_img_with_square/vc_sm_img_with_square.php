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
	public function vc_sm_img_with_square_html( $atts ) 
	{
		ob_start();

		$single_img = wp_get_attachment_image_src( $atts['img'] );

		if ( !empty( $single_img[0] ) ) {
			if ( $atts['side'] == 'right' ) { ?>
			
				<div class="surrounded-img position-relative">
	                <div class="bg-img bg-img-home bg-img-sm mx-auto" style="background-image: url(' <?= $single_img[0] ?> ');"></div>
	       	        <div class="border-around-img border-around-img-sm position-absolute"></div>
	            </div>

			<?php
			}

			if ( $atts['side'] == 'left' ) { ?>
				
				<div class="surrounded-img position-relative flex-grow-1">
					<div class="bg-img bg-img-home bg-img-sm" style="background-image: url(' <?= $single_img[0] ?> ');"></div>
					<div class="border-around-img border-around-img-sm border-around-img-lf position-absolute"></div>
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