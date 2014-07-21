<?php
/*
 * This file is an example of a child theme.
 * The functions in this file sill be loaded before functions.php file from the Denali theme
 * You can setup hooks and filters in here that will be used by the Denali theme.
 * 
 */

// Uncomment to use, this is just for example
//add_action('denali_post_theme_support', 'denali_remove_custom_background');

/**
 * Remove custom background.
 *
 */
function denali_remove_custom_background() {
	global $_wp_theme_features;	
	unset($_wp_theme_features['custom-background']);	
	
	
	remove_theme_support('header-property-search');
	remove_theme_support('header-property-contact');
	remove_theme_support('header-login');
	remove_theme_support('header-card');
}



/* Calculate unformatted property price */
	function format_property_price($property_price_formatted){
		
		$property_price=0;
		
		if($property_price_formatted) {
			$property_price_lesscurrency=substr( $property_price_formatted, 3 ) ;  // remove currency identifier
			$property_price=(int)intval(str_ireplace(",","",$property_price_lesscurrency));  // get integer val for property price
			
		}else {	
			$property_price=0;
		}
		
		return $property_price;
	}
	
	/* Calculate stamp duty */ 
	function calculate_stamp_duty($property_price){
		$stamp_duty['rate']=1;
		$stamp_duty_ceiling=1000000;
		if($property_price > $stamp_duty_ceiling) $stamp_duty['rate']=2 ;
		$stamp_duty['price']=$property_price * $stamp_duty['rate']/100;
		
		return $stamp_duty;
	}
?>