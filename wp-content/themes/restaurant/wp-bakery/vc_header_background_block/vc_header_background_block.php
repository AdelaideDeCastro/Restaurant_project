<?php

class vcHeaderBackgroundBlock extends WPBakeryShortCode
{

	//Initialize Component
	function __construct() {

	    add_action( 'vc_before_init', [ $this, 'vc_header_background_block_mapping' ] );            
	    add_shortcode( 'vc_header_background_block', [ $this, 'vc_header_background_block_html' ] );

	}

	//Element mapping
	public function vc_header_background_block_mapping() {

		 if ( !defined( 'WPB_VC_VERSION' ) ) {
            exit();
            return;
        }

		vc_map( [
			'name'			=> __( 'Background image', 'text-domain' ),
			'base'			=> 'vc_header_background_block',
			'description'	=> __( 'Background image with dummy text', 'text-domain' ),
			'category'		=> __( 'Restaurant Element', 'text-domain' ),
			'icon'			=> get_template_directory_uri() . '/img/logo.png',
			'params'		=> [
				[
					'type'			=> 'attach_image',
					'param_name'	=> 'header_bg_image',
					'heading'		=> 'Bacground Image',
				],
				[
					'type'			=> 'dropdown',
					'param_name'	=> 'type_content',
					'heading'		=> 'Select option',
					'description'	=> 'Choose to add text or link',
					'value'			=> [
						'Add text or link'	=> 'choose',
						'Text'				=> 'text',
						'Link'				=> 'link',
					],
					'std'			=> 'choose',
				],
				[
					'type'			=> 'textarea_html',
					'param_name'	=> 'content',
					'heading'		=> 'Description',
					'dependency'	=> [
						'element'	=> 'type_content',
						'value'		=> 'text',
					],
				],
				[
					'type'			=> 'vc_link',
					'param_name'	=> 'reservation_url',
					'heading'		=> 'Reservation button',
					'dependency'	=> [
						'element'	=> 'type_content',
						'value'		=> 'link',
					]
				],
			],
		] );

	}

	//Element html
	public function vc_header_background_block_html( $atts, $const ) {

		ob_start();

		// extract( shortcode_atts( [
		// 	'header_bg_image'	=> '',
		// 	'type_content'		=> '',
		// 	'content'			=> '',
		// 	'btn_reservation'	=> ''
		// ], $atts ) );

		$header_img = wp_get_attachment_image_src( $atts['header_bg_image'], 'full' );

		if ( !empty( $header_img[0] ) ) { ?>


		 	<div class="container-fluid bg-img bg-img-header d-flex justify-content-center" style="background-image: url( ' <?= $header_img[0] ?> ' );">
		        <div class="text-center align-self-center">

		        	<?php if ( $atts['type_content'] == 'text' && !empty( $const ) ) { ?>
		        	
		            	<div class="text-primary"><?= $const; ?></div>

		            <?php }


		            if ( $atts['type_content'] == 'link' ) {

						$btn_link = vc_build_link( $atts['reservation_url'] );

		            	if ( empty( $btn_link) ) { ?>

			            	<div class="link-reservatin d-flex justify-content-center align-items-center">
		            				<a href="<?= $btn_link['url']; ?>" title="<?= $btn_link['title']; ?>" target="<?= $btn_link['target']; ?>" class=""><?= $btn_link['title']; ?></a>
		            				<div class="overlapping-layer position-absolute bg-white"></div>
		        			</div>

		            <?php 
		        		} 

		        	} ?>
		        </div>
		    </div>

		<?php

		}
		       

		$html = ob_get_clean();

		return $html;

	}

}

// Element Class Init
new vcHeaderBackgroundBlock();