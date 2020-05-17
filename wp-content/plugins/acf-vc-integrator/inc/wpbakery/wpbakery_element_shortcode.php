<?php
if ( ! defined( 'ABSPATH' ) ) exit;
class Acf_vc_integrator_Shortcode extends WPBakeryShortCode {
    /**
     * @param $atts
     * @param null $content
     *
     * @return mixed|void
     */
    protected function content( $atts, $content = null ) {
        $field_key = $label = '';
        $clone_field_key = "";
        /**
         * @var string $el_class
         * @var string $show_label
         * @var string $align
         * @var string $get_field_data_from
         * @var string $field_group
         * @var string $link_text
         * @var string $prepend_append
         * @var string $repeater_header
         * @var string $gallery_columns
         * @var string $gallery_image_size
         * @var string $gallery_order_by
         * @var string $gallery_order
         * @var string $gallery_itemtag_dropdown
         * @var string $gallery_itemtag
         * @var string $gallery_icontag_dropdown
         * @var string $gallery_icontag
         * @var string $gallery_captiontag_dropdown
         * @var string $gallery_captiontag
         * @var string $gallery_link
         */
        extract( shortcode_atts( array(
            'el_class' => '',
            'get_field_data_from' => '',
            'field_group' => '',
            'show_label' => '',
            'align' => '',
            'link_text' => '',
            'prepend_append' => '',
            'repeater_header' => '',
            'gallery_columns' => '',
            'gallery_image_size' => '',
            'gallery_order_by' => '',
            'gallery_order' => '',
            'gallery_itemtag_dropdown' => '',
            'gallery_itemtag' => '',
            'gallery_icontag_dropdown' => '',
            'gallery_icontag' => '',
            'gallery_captiontag_dropdown' => '',
            'gallery_captiontag' => '',
            'gallery_link' => '',
        ), $atts ) );

        $acf_version = get_acf_version_number();

        if (!get_option('acfvc_default')) {
            acfvc_add_default_options();
        }

        if ( 0 === strlen( $field_group ) ) {
            $groups = function_exists( 'acf_get_field_groups' ) ? acf_get_field_groups() : apply_filters( 'acf/get_field_groups', array() );
            if ( is_array( $groups ) && isset( $groups[0] ) ) {
                $key = isset( $groups[0]['id'] ) ? 'id' : ( isset( $groups[0]['ID'] ) ? 'ID' : 'id' );
                $field_group = $groups[0][ $key ];
            }
        }
        if ( ! empty( $field_group ) ) {
            $field_key = ! empty( $atts[ 'field_from_' . $field_group ] ) ? $atts[ 'field_from_' . $field_group ] : 'field_from_group_' . $field_group;
        }

        /*Check if option page is selected as data source*/
        if ( empty( $get_field_data_from ) OR $get_field_data_from == false) {
            /*Get the page/post id when using Templatera*/
            if(get_queried_object_id() != get_the_ID()) {
              $post_id = get_queried_object_id();
            } else {
              $post_id = get_the_ID();
            }
        } else {
            $post_id = $get_field_data_from;
        }

        $output = "";

        $field_key_array = explode("_field_",$field_key);
        if ( count($field_key_array) == 1 ) {
            $field_key = $field_key_array[0];
        } else {
            $field_key = $field_key_array[0];
            $clone_field_key = "field_".$field_key_array[1];
        }
        $custom_field = get_field_object($field_key,$post_id);
            // print_r($field_key2);

        if ( empty($align) OR $align == "default" ) {
            $acfvc_option = get_option('acfvc_default');
            if ( !array_key_exists('align',$acfvc_option['general']) ) {
                $acfvc_option["general"]["align"] = "left";
            }
            $align = $acfvc_option["general"]["align"];
        }
        $css_class = 'vc_sw-acf' . ( strlen( $el_class ) ? ' ' . $el_class : '' ) . ( strlen( $align ) ? ' vc_sw-align-' . $align : '' ) . ( strlen( $field_key ) ? ' ' . $field_key : '' );
        $link_text = ( strlen( $link_text ) ? $link_text : 'Link' );
        $gallery_options["columns"] = $gallery_columns;
        $gallery_options["image_size"] = $gallery_image_size;
        $gallery_options["order_by"] = $gallery_order_by;
        $gallery_options["order"] = $gallery_order;
        if (empty($gallery_itemtag_dropdown)) {
            $gallery_options["itemtag"] = 'default';
        } else {
            $gallery_options["itemtag"] = $gallery_itemtag;
        }
        if (empty($gallery_itemtag_dropdown)) {
            $gallery_options["icontag"] = 'default';
        } else {
            $gallery_options["icontag"] = $gallery_icontag;
        }
        if (empty($gallery_itemtag_dropdown)) {
            $gallery_options["captiontag"] = 'default';
        } else {
            $gallery_options["captiontag"] = $gallery_captiontag;
        }
        $gallery_options["link"] = $gallery_link;

        $args = array (
            "field_key" => $field_key,
            "clone_field_key" => $clone_field_key,
            "acf_version" => $acf_version,
            "link_text" => $link_text,
            'prepend_append' => $prepend_append,
            "gallery_options" => $gallery_options,

        );

        if ( $repeater_header ) {
            $args['repeater']['header'] = $repeater_header; 
        }

        $acf_vc_helper = new acf_vc_helper();
        $output_empty = false;

        if (empty($custom_field["value"])) {
            $output_empty = true;
        } elseif('text' === $custom_field["type"]) {
            $output = $acf_vc_helper->text($custom_field, $args, $post_id);
        } elseif('textarea' === $custom_field["type"]) {
            $output = $acf_vc_helper->textarea($custom_field, $args, $post_id);
        } elseif('wysiwyg' === $custom_field["type"]) {
            $output = $acf_vc_helper->wysiwyg($custom_field, $args, $post_id);
        } elseif('number' === $custom_field["type"]) {
            $output = $acf_vc_helper->number($custom_field, $args, $post_id);
        } elseif('email' === $custom_field["type"]) {
            $output = $acf_vc_helper->email($custom_field, $args, $post_id);
        } elseif('password' === $custom_field["type"]) {
            $output = $acf_vc_helper->password($custom_field, $args, $post_id);
        } elseif('image' === $custom_field["type"]) {
            $output = $acf_vc_helper->image($custom_field, $args, $post_id);
        } elseif('file' === $custom_field["type"]) {
            $output = $acf_vc_helper->file($custom_field, $args, $post_id);
        } elseif('checkbox' === $custom_field["type"]) {
            $output = $acf_vc_helper->checkbox($custom_field, $args, $post_id);
        } elseif('radio' === $custom_field["type"]) {
            $output = $acf_vc_helper->radio($custom_field, $args, $post_id);
        } elseif('user' === $custom_field["type"]) {
            $output = $acf_vc_helper->user($custom_field, $args, $post_id);
        } elseif('page_link' === $custom_field["type"]) {
            $output = $acf_vc_helper->page_link($custom_field, $args, $post_id);
        } elseif('google_map' === $custom_field["type"]) {
            $output = $acf_vc_helper->google_map($custom_field, $args, $post_id);
        } elseif('date_picker' === $custom_field["type"]) {
            $output = $acf_vc_helper->date_picker($custom_field, $args, $post_id);
        } elseif('color_picker' === $custom_field["type"]) {
            $output = $acf_vc_helper->color_picker($custom_field, $args, $post_id);
        } elseif('true_false' === $custom_field["type"]) {
            $output = $acf_vc_helper->true_false($custom_field, $args, $post_id);
        } elseif('taxonomy' === $custom_field["type"]) {
            $output = $acf_vc_helper->taxonomy($custom_field, $args, $post_id);
        } elseif('post_object' === $custom_field["type"]) {
            $output = $acf_vc_helper->post_object($custom_field, $args, $post_id);
        } elseif('relationship' === $custom_field["type"]) {
            $output = $acf_vc_helper->relationship($custom_field, $args, $post_id);
        } elseif('url' === $custom_field["type"]) {
            $output = $acf_vc_helper->url($custom_field, $args, $post_id);
        } elseif('link' === $custom_field["type"]) {
            $output = $acf_vc_helper->link($custom_field, $args, $post_id);
        } elseif('select' === $custom_field["type"]) {
            $output = $acf_vc_helper->select($custom_field, $args, $post_id);
        } elseif('oembed' === $custom_field["type"]) {
            $output = $acf_vc_helper->oembed($custom_field, $args, $post_id);
        } elseif('gallery' === $custom_field["type"]) {
            $output = $acf_vc_helper->gallery($custom_field, $args, $post_id);
        } elseif('repeater' === $custom_field["type"]) {
            $output = $acf_vc_helper->repeater($custom_field,$args,$post_id);
        } else {
            $output_filter = apply_filters( "acf_vc_add_on_fields",$custom_field,$args,$post_id );
            if ( is_array( $output_filter ) ) {
                $output = $output_filter["type"]." is not supported";
            } else {
                $output = $output_filter;
            }
        }

        if($output == "data-mismatch") {
            // set the mismatch error message here.
            $output = 'Data mismatch error. Custom field value doesn\'t match the field type. Please set the field value again.';
        }
        if ( $show_label == "default" ) {
            $acfvc_option = get_option('acfvc_default');
            $show_label = $acfvc_option["general"]["show_label"];
        }
        if ( 'yes' === $show_label OR 'yes_no' === $show_label AND $output_empty === false) {
            if(!isset($output)) {
                $output = '<span class="sw-acf-field-label label-'.$field_key.'">'.$custom_field["label"].':</span> '.$custom_field["value"];
            } else {
                $output = '<span class="sw-acf-field-label label-'.$field_key.'">'.$custom_field["label"].':</span> '.$output;
            }
        } elseif ( 'yes_no' === $show_label AND  $output_empty === true) {
            $output = "";
        } else {
            if(!isset($output) OR empty($output)) $output = $custom_field["value"];
        }
        $css = '';
        extract(shortcode_atts(array(
            'css' => ''
        ), $atts));
        $css_class_vc = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
        return '<div id="' . $field_key . '" class="type-'.$custom_field["type"].' ' . esc_attr( $css_class_vc ) . ' ' . esc_attr( $css_class ) . '">'.$output. '</div>';
        /*return '<< Working on retrieving the data from ACF. >>';*/

    }
}

 ?>
