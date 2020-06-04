<?php

class vcWineListWithImage extends WPBakeryShortcode
{
	
	//Initialize Component
	function __construct()
	{
		add_action( 'vc_before_init', [ $this, 'vc_wine_list_with_image_mapping' ] );
		add_shortcode( 'vc_wine_list_with_image', [ $this, 'vc_wine_list_with_image_html' ] );
	}

	//Element mapping
	public function vc_wine_list_with_image_mapping()
	{

		if ( !defined( 'WPB_VC_VERSION' ) ) {
            exit();
            return;
        }

        vc_map( [
			'name'			=> __( 'Wine list', 'text-domain' ),
			'base'			=> 'vc_wine_list_with_image',
			'description'	=> __( 'Wine list with Small image surrounded by a square', 'text-domain' ),
			'category'		=> __( 'Restaurant Element', 'text-domain' ),
			'icon'			=> get_template_directory_uri() . '/img/logo.png',
			'params'		=> [
				[
					'type'			=>'textfield',
					'param_name'	=> 'title',
					'heading'		=>'Title type wine',
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
				[
					'type'			=> 'param_group',
					'param_name'	=> 'info_wine',
					'heading'		=> 'Add name wine, price per glass and bottle',
					'params'			=> [
						[
							'type'=> 'textfield',
							'param_name'=> 'name_wine',
							'heading'=> 'Name wine',
						],
						[
							'type'=> 'textfield',
							'param_name'=> 'price_glass',
							'heading'=> 'Price per glass',
						],
						[
							'type'=> 'textfield',
							'param_name'=> 'price_bottle',
							'heading'=> 'Price per bottle',
						],
					],
				],
			],
        ] );

	}

	//Element html
	public function vc_wine_list_with_image_html( $atts )
	{

		ob_start();

		$single_img = wp_get_attachment_image_src( $atts['img'] );

		$info_wine = vc_param_group_parse_atts( $atts['info_wine'] );

		if ( !empty( $single_img[0] ) && !empty( $atts['info_wine'] ) ) { ?>

			<div class="wine-wrapper my-5">
				
				<?php
				if ( $atts['side'] == 'right' ) { ?>

					<div class="type-wine">
						<div class="row">
							<div class="col-sm-8">
								<div class="d-flex justify-content-between mb-4">
									<h3 class="text-primary"><?= $atts['title']; ?></h3>
									<h3 class="text-primary mr-5">Prijs</h3>
								</div>
								<ul class="list-unstyled mb-0">

									<?php
									foreach ( $info_wine as $wine ) { ?>
										
										<li class="d-flex"><?= $wine['name_wine']; ?><span class="ml-auto"><?= $wine['price_glass']; ?> &euro;</span> <span class="ml-4"><?= $wine['price_bottle']; ?> &euro;</span></li>
										
									<?php
									}
									?>

								</ul>
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
				} else { ?>

					<div class="type-wine">
						<div class="row">
							<div class="col-sm-4 offset-sm-4 offset-lg-0 mt-5 mt-lg-0">
								<div class="surrounded-img position-relative">
									<div class="bg-img bg-img-home bg-img-sm mx-auto" style="background-image: url(' <?= $single_img[0] ?> ');"></div>
									<div class="border-around-img border-around-img-sm position-absolute"></div>
								</div>
							</div>
							<div class="col-sm-8">
								<div class="d-flex justify-content-between mb-4">
									<h3 class="text-primary"><?= $atts['title']; ?></h3>
									<h3 class="text-primary mr-5">Prijs</h3>
								</div>
								<ul class="list-unstyled mb-0">

									<?php foreach ( $info_wine as $wine ) { ?>
										
										<li class="d-flex"><?= $wine['name_wine']; ?><span class="ml-auto"><?= $wine['price_glass']; ?> &euro;</span> <span class="ml-4"><?= $wine['price_bottle']; ?> &euro;</span></li>

									<?php
									}
									?>

								</ul>
							</div>
						</div>
					</div>

				<?php
				}
				?>

			</div>

		<?php
		}

		$html = ob_get_clean();

		return $html;

	}

}

// Element Class Init
new vcWineListWithImage;