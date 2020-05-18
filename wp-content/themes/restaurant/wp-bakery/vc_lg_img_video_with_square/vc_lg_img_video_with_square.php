<?php

class vcLgImgVideoWithSquare extends WPBakeryShortCode
{

	//Initialize Component
	function __construct()
	{
		add_action( 'vc_before_init', [ $this, 'vc_lg_img_video_with_square_mapping' ] );
		add_shortcode( 'vc_lg_img_video_with_square', [ $this, 'vc_lg_img_video_with_square_html' ] );
	}

	//Element mapping
	public function vc_lg_img_video_with_square_mapping()
	{

		 if ( !defined( 'WPB_VC_VERSION' ) ) {
            exit();
            return;
        }

		vc_map( [
			'name'			=> __( 'Large image or video', 'text-domain' ),
			'base'			=> 'vc_lg_img_video_with_square',
			'description'	=> __( 'Large image(s) or video surrounded by a square', 'text-domain' ),
			'category'		=> __( 'Restaurant Element', 'text-domain' ),
			'icon'			=> get_template_directory_uri() . '/img/logo.png',
			'params'		=> [
				[
					'type'			=> 'dropdown',
					'param_name'	=> 'type_view',
					'heading'		=> 'Choose image(s) or video',
					'value'			=> [
						'Choose image(s) or video'	=> 'choose_view',
						'Single image'				=> 'single_img',
						'Gallery images'			=> 'gallery',
						'Video'						=> 'video',
					],
					'std'	=> 'choose_view',
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
				]
			],
		] );
	}

	//Element html
	public function vc_lg_img_video_with_square_html( $atts ) 
	{
		ob_start();

		if ( $atts['type_view'] == 'single_img' ) {

			$large_img = wp_get_attachment_image_src( $atts['img'] );


			if( !empty( $large_img[0] ) ) { ?>
			
				<div class="surrounded-img surrounded-img-lg position-relative">
					<div class="bg-img menu-slick" style="background-image: url( '<?= $large_img[0]; ?>' );">
						
					</div>
					<div class="border-around-img border-around-img-lg position-absolute"></div>
				</div>

			<?php
			}
		} elseif ( $atts['type_view'] == 'gallery' ) {

			$large_imgs = wp_get_attachment_image_src( $atts['imgs'] );

			if( !empty( $large_imgs ) ) { ?>

				<div class="surrounded-img surrounded-img-lg position-relative">
					<div class="menu-slick slick-arrow-position">
						<div class="menu-slick-img bg-img" style="background-image: url('img/antipasto_menu.jpg');"></div>
						<div class="menu-slick-img bg-img" style="background-image: url('img/antipasto_2_menu.jpg');"></div>
						<div class="menu-slick-img bg-img" style="background-image: url('img/pasta_menu.jpg');"></div>
						<div class="menu-slick-img bg-img" style="background-image: url('img/pasta_2_menu.jpg');"></div>
						<div class="menu-slick-img bg-img" style="background-image: url('img/pasta_3_menu.jpg');"></div>
						<div class="menu-slick-img bg-img" style="background-image: url('img/dolce_menu.jpg');"></div>
						<div class="menu-slick-img bg-img" style="background-image: url('img/dolce_2_menu.jpg');"></div>
					</div>
					<div class="border-around-img border-around-img-lg position-absolute"></div>
				</div>
		
			<?php
			}
		} else { 

			$video_url_squared = vc_build_link( $atts['video_url'] );

			?>

			<div class="surrounded-img surrounded-img-lg position-relative">
				<iframe src="<?= $video_url_squared['url']; ?>"></iframe>
				<div class="border-around-img border-around-img-lg position-absolute"></div>
			</div>

		<?php
		}

		$html = ob_get_clean();

		return $html;
	}

}

// Element Class Init
new vcLgImgVideoWithSquare;