<?php
session_start();

class vcReservationForm extends WPBakeryShortcode
{
	
	//Initialize Component
	function __construct()
	{
		add_action( 'vc_before_init', [ $this, 'vc_reservation_form_mapping' ] );
		add_shortcode( 'vc_reservation_form', [ $this, 'vc_reservation_form_html' ] );
	}

	//Element mapping
	public function vc_reservation_form_mapping()
	{
		if ( !defined( 'WPB_VC_VERSION' ) ) {
            exit();
            return;
        }

        vc_map( [
        	'name'			=> __( 'Reservation form', 'text-domain' ),
			'base'			=> 'vc_reservation_form',
			'category'		=> __( 'Restaurant Element', 'text-domain' ),
			'icon'			=> get_template_directory_uri() . '/img/logo.png',
			'params'		=> [
				[
					'type'			=> 'textarea_html',
					'param_name'	=> 'content',
					'heading'		=> 'Add title and description (optional)',
				],
				[
					'type'			=> 'textfield',
					'param_name'	=> 'submit_title',
					'heading'		=> 'Title of submit botton',
				],
				[
					'type'			=> 'textfield',
					'param_name'	=> 'thanks_title',
					'heading'		=> 'Thanks title',
				],
				[
					'type'			=> 'textarea',
					'param_name'	=> 'thanks_content',
					'heading'		=> 'Add a text to the thanks message (optional)',
				],
			],
        ] );
	}

	//Element html
	public function vc_reservation_form_html( $atts, $content ) 
	{

		ob_start();
		?>

		<div class="row">
			<div class="col-lg-8 offset-lg-2">

				<?php
				if ( !empty( $content ) ) {

					echo $content;

				}

				$_SESSION = $atts;

				// echo "</br>";
				// echo "Session is:";
				// echo "<pre>";
				// print_r( $_SESSION );
				// echo "<pre>";

				get_template_part( 'partials/content', 'reservation-form' );
				
				?>

			</div>
		</div>

		<?php
		$html = ob_get_clean();

		return $html;	

	}
}

// Element Class Init
new vcReservationForm;