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
        	'description'	=> __( 'Gallery with text', 'text-domain' ),
        	'category'		=> __( 'Restaurant Element', 'text-domain' ),
        	'icon'			=> get_template_directory_uri() . '/img/logo.png',
			'params' 		=> [					
				// params group
				[
					'type' => 'param_group',
					'value' => '',
					'heading'		=> 'Add images and text to the gallery',
					'param_name' => 'gallery_content',
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
				]
			],
		] );

	}

	//Element html
	public function vc_gallery_html( $atts )
	{
		ob_start();

		$galleries = vc_param_group_parse_atts( $atts['gallery_content'] );

		// $gallry_img = wp_get_attachement_image_src( $galleries['img'] );

		
		// echo "<pre>";

		// print_r($galleries);

		// echo "</pre>";


		// foreach ($galleries as $gallery ) {

		// 	if ( !empty( $gallery['img'] ) && !empty( $gallery['title'] ) && !empty( $gallery['description'] ) ) { 
				
				// <!-- <div class="menu-overview-slick slick-arrow-position position-relative">
				// 	<div class="menu-card">
				// 		<div class="menu-slick-img bg-img bg-img-menu-1" style="background-image: url(' $gallry_img[0] ');"></div>
				// 		<div class="slick-content text-center">
    //                     	<h2 class="text-primary">Titel</h2>
    //                     	<p>Lorem ipsum dolor sit amet</p>
    //                     </div>
				// 	</div>
				// </div> -->

				
		// 	}

		// }

		$html = ob_get_clean();

		return $html;
	}

}

new vcGallery;