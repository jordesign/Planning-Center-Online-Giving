<?php

// Define  Shortcode
function pco_giving_shortcode( $atts) {

	//Enqueue script
	wp_enqueue_script( 'pco-giving' );

	//Pull in the site options
	$options = get_option( 'pco_options_option_name' ) ;  

	//Get Tithely Church ID
	$pco_church_id = esc_html($options['pco_church_id_0']);

	//Get the Button Text
	$pco_button_text = esc_html($options['default_button_text_1']);

	//Get the Styling Class
	$pco_styling_class = esc_html($options['styling_class_2']);

	// Attributes
	$shortcode_atts =  shortcode_atts(
		array(
			'button' => $pco_button_text,
			'subdomain' => $pco_church_id,
			'class' => $pco_styling_class,
		), $atts );


    // Code
    if ($pco_church_id!=''){
    	 return '<a href="https://' . $shortcode_atts['subdomain'] . '.churchcenteronline.com/giving" class="pco-giving btn btn-primary et_pb_button fl-button elementor-button ' . $shortcode_atts['class'] . '" data-open-in-church-center-modal="true">' . $shortcode_atts['button'] . '</a>';
    }else{
    	return $pco_church_id;
    }
   
}
add_shortcode( 'pco-giving', 'pco_giving_shortcode' );