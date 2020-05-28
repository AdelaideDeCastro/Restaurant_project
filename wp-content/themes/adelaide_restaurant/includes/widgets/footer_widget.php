<?php
// Creating the widget 
class Reservetion_Link extends WP_Widget 
{
  
	public function __construct() {

		// Widget description
		$widget_ops = array( 'description' => __( 'Link that redirect you to a reservation form' ), );

		parent::__construct( 'reservetion_link', __('Reservetion Link', 'Restaurant footer menu'), $widget_ops );
	}
  
	// Creating widget front-end
	  
	public function widget( $args, $instance ) {

		$title = ! empty( $instance['title'] ) ? $instance['title'] : '';

		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

		$reservation_title = !empty( $instance['reservation_title'] ) ? $instance['reservation_title'] : '';

		$reservation_title = apply_filters( 'widget_title', $reservation_title, $instance, $this->id_base );

		$link = !empty( $instance['link'] ) ? $instance['link'] : '';

		$link = apply_filters( 'widget_title', $link, $instance, $this->id_base );
	  
		// before and after widget arguments are defined by themes
		echo $args['before_widget'];

		if (  $title ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}



		if ( $reservation_title && $link ) {
		?>
		
            <div class="link-reservation mt-4">
                <a href="<?php echo $link; ?>" class="text-secondary"><?php echo $reservation_title; ?></a>
            </div>
       
		<?php
		}

		echo $args['after_widget'];
	}
          
	// Widget Backend 
	public function form( $instance ) {

		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		else {
			$title = __( '', 'Restaurant footer menu' );
		}

		if ( isset( $instance[ 'reservation_title' ] ) ) {	
			$reservation_title = $instance[ 'reservation_title' ];
		} else {
			$reservation_title = __( '', 'Restaurant footer menu' );
		}

		if ( isset( $instance[ 'link' ] ) ) {
			$link = $instance['link'];

			$menus = wp_get_nav_menus();

			$nav_menu_items = wp_get_nav_menu_items( $menus[0]->term_id );

			foreach ( $nav_menu_items as $nav_menu_item) {

				$nav_menu_name[] = $nav_menu_item->title;

				$nav_menu_links[] = $nav_menu_item->url;
			
			}
		} else {
			$link = __( '', 'Restaurant footer menu' );
		}
	// Widget admin form
		?>
			<p>
				<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
				<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
			</p>

			<p>
				<label for="<?php echo $this->get_field_id( 'reservation_title' ); ?>"><?php _e( 'Reservation title:' ); ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id( 'reservation_title' ); ?>" name="<?php echo $this->get_field_name( 'reservation_title' ); ?>" type="text" value="<?php echo esc_attr( $reservation_title ); ?>" />
			</p>

			<p>
				<label for="<?php echo $this->get_field_id( 'link' ); ?>"><?php _e( 'Link page where make a reservation:' ); ?></label>
				<select class="widefat" id="<?php echo $this->get_field_id( 'link' ); ?>" name="<?php echo $this->get_field_name( 'link' ); ?>" value="<?php echo esc_attr( $link ); ?>">

					<?php
					$length_link = count( $nav_menu_name );

					$i = 0;

					for ($i; $i < $length_link ; $i++) { ?>
						
						<option value="<?= $nav_menu_links[$i]; ?>"><?= $nav_menu_name[$i]; ?></option>;

					<?php } ?>

				  </select>
			</p>
		<?php 
		}
      
	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance[ 'title' ] = ( ! empty( $new_instance[ 'title' ] ) ) ? strip_tags( $new_instance[ 'title' ] ) : '';
		$instance[ 'reservation_title' ] = ( ! empty( $new_instance[ 'reservation_title' ] ) ) ? strip_tags( $new_instance[ 'reservation_title' ] ) : '';
		$instance[ 'link' ] = ( !empty( $new_instance[ 'link' ] ) ) ? strip_tags( $new_instance[ 'link' ] ) : '';
		return $instance;
	}
 
// Class Reservetion_Link ends here
}