<?php
class vcHeaderBackgroundBlock extends WPBakeryShortCode {

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
					'heading'		=> 'Description'
				],
				[
					'type'			=> 'vc_link',
					'param_name'	=> 'btn_reservation',
					'heading'		=> 'Reservation button',
				],
			],
		] );

	}
	

	//Element html
	public function vc_header_background_block_html( $atts ) {

		ob_start();

		extract( shortcode_atts( [
			'header_bg_image'	=> '',
			'type_content'		=> '',
			'content'			=> '',
			'btn_reservation'	=> ''
		], $atts ) );

		$header_img = wp_get_attachment_image_src( $header_bg_image, 'full' );


		 // if ( !empty( $header_img ) ) { 

		echo '<pre>';

		print_r($atts);

		echo '</pre>';


		 	?>
		            <!-- <div class="bg-image" style="background-image: url( ' <?= $header_img[0] ?> ' ); height: 200px;"></div>
		            <div class="header-content">
		            	<div class="zeus">

		            		<h1>Contenuto:</h1>

		                	<?php echo $content; ?>
		                </div>

		            </div> -->
		            <?php
		        // } else {
		        	// echo "Non ce sto a capi' una ceppa";
		        // }

		$html = ob_get_clean();

		return $html;

	}

}

// Element Class Init
new vcHeaderBackgroundBlock();