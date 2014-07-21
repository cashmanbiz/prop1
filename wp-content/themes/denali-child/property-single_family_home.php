<?php
/**
 * Property Default Template for Single Property View
 *
 * Overwrite by creating your own in the theme directory called either:
 * property.php
 * or add the property type to the end to customize further, example:
 * property-building.php or property-floorplan.php, etc.
 *
 * By default the system will look for file with property type suffix first,
 * if none found, will default to: property.php
 *
 * Copyright 2010 Andy Potanin <andy.potanin@twincitiestech.com>
 *
 * @version 1.4
 * @author Andy Potanin <andy.potnain@twincitiestech.com>
 * @package WP-Property
*/


  if(denali_theme::is_active_sidebar("wpp_sidebar_" . $property['property_type'])) {
    $right_sidebar = true;
  }

  if(get_post_meta($post->ID, 'hide_sidebar', true) != 'true' && $right_sidebar) {
    $have_sidebar = true;
  }
  
	/* Calculate unformatted property price */
/*	function format_property_price($property_price_formatted){
		
		$property_price=0;
		
		if($property_price_formatted) {
			$property_price_lesscurrency=substr( $property_price_formatted, 3 ) ;  // remove currency identifier
			$property_price=(int)intval(str_ireplace(",","",$property_price_lesscurrency));  // get integer val for property price
			
		}else {	
			$property_price=0;
		}
		
		return $property_price;
	}
*/	
	/* Calculate stamp duty */ 
/*	function calculate_stamp_duty($property_price){
		$stamp_duty['rate']=1;
		$stamp_duty_ceiling=1000000;
		if($property_price > $stamp_duty_ceiling) $stamp_duty['rate']=2 ;
		$stamp_duty['price']=$property_price * $stamp_duty['rate']/100;
		
		return $stamp_duty;
	}
		
*/			
	?>
		

<?php the_post(); ?>

<?php
//session_start();
$_SESSION['property_price'] = $property['price'];

?>

<?php get_header(); ?>

<?php get_template_part('attention','single-property'); ?>

 <div id="content" class="inner_content_wrapper property_content <?php echo ($have_sidebar  ? 'have-sidebar' : 'no_columns'); ?>">
	<div style="width : 660px;" id="post-<?php the_ID(); ?>" <?php post_class('main property_page_post'); ?>>
		<div style="padding : 10px 5px;" id="container" class="<?php echo (!empty($property['property_type']) ? $property['property_type'] . "_container" : "");?>">
			<div class="property_title_wrapper building_title_wrapper">
				<div><h1 class="property-title entry-title"><?php the_title(); ?></h1></div>
				<div > <h3 class="entry-subtitle"><?php the_tagline(); ?></h3></div>
				<div style="position : relative; float : left;"><h1 class="property-title entry-title" style="color:#ad907c">
				 <?php if($property['status']=="Sale Agreed" ) { 
					echo $property['status'] ;
					
				} elseif($property['status']=="Sold" ) { 
					echo $property['status'];
				} else { 
					echo "Price: ".	$property['price']; 
				}?>
				</div>
				<div style="position: relative ; float : right ;"><IMG src="<?php echo get_stylesheet_directory_uri() ?>/img/ber/<?php echo $property['ber']; ?>-s.png"</IMG></div>
			</div>
			<div style="clear : both;" class="entry-content">
				<div class="the_content">
					<?php @the_content(); ?>
				<?php echo do_shortcode("[property_gallery image_size=nugentslide large_size=nugentnfull   thumb_size=nugent_thumbnail carousel=false]"); ?> 
				</div>
			</div><!-- .entry-content -->
			<?php get_template_part('content','single-property-map'); ?>
		</div><!-- #container -->
	</div>	
	
	<?php if ($have_sidebar) : ?>
    <div id="nugent-sidebar-prop">
		<div class="sidebar">
			<div  class="features_list nugent-widget" >	
			<!-- <div class="features_list" style="margin-bottom: 0px;"><h2 style="margin-bottom : 10px;">Details</h2></div>-->
				<h2>Property Information</h2>
				<ul style="background-color : #fff;  border: 1px solid #d6d6d6; margin : 5px 5px;" class="overview_stats list" id="property_stats">
					<li class="property_status wpp_stat_plain_list_status ">
					  <span class="attribute">Status<span class="wpp_colon">:</span></span>
					  <span class="value"><?php echo $property['status'] ; ?>&nbsp;</span>
					</li>
					<li class="property_type wpp_stat_plain_list_type alt">
					  <span class="attribute">Type<span class="wpp_colon">:</span></span>
					  <span class="value"><?php echo $property['type'] ; ?>&nbsp;</span>
					</li>

					<li class="property_price wpp_stat_plain_list_price">
					  <span class="attribute">Price<span class="wpp_colon">:</span></span>
					  <span class="value"><?php echo $property['price'] ; ?>&nbsp;</span>
					</li>
					<li class="property_area wpp_stat_plain_list_area alt ">
					  <span class="attribute">Area<span class="wpp_colon">:</span></span>
					  <span class="value"><?php echo $property['area'] ; ?>&nbsp;</span>
					</li>
				</ul>
			</div>
			<div  class="features_list nugent-widget" >	
			<!-- <div class="features_list" style="margin-bottom: 0px;"><h2 style="margin-bottom : 10px;">Details</h2></div>-->
				<ul style="background-color : #fff;  margin : 5px 5px; border: 1px solid #d6d6d6;" class="overview_stats list" id="property_stats">
					<li class="property_bedrooms wpp_stat_plain_list_bedrooms alt">
					  <span class="attribute">Bedrooms<span class="wpp_colon">:</span></span>
					  <span class="value"><?php echo $property['bedrooms'] ; ?>&nbsp;</span>
					</li>
					<li class="property_bathrooms wpp_stat_plain_list_bathrooms">
					  <span class="attribute">Baths/WCs<span class="wpp_colon">:</span></span>
					  <span class="value"><?php echo $property['bathrooms'] ; ?>&nbsp;</span>
					</li>
					
					<?php if ($property['ber']) {					
						echo "<li class='property_ber wpp_stat_plain_list_ber alt'>
						  <span class='attribute'>BER<span class='wpp_colon'>:</span></span>
						  <span class='value'>";
						echo $property['ber']. "&nbsp;</span></li>" ;
						echo "<li class='property_ber_no wpp_stat_plain_list_ber_no'>
						  <span class='attribute'>BER No<span class='wpp_colon'>:</span></span>
						  <span class='value'>";
						echo $property['ber_no']."&nbsp;</span></li>";
						echo "<li class='property_energy_performance_indicator wpp_stat_plain_list_energy_performance_indicator alt'>
						  <span class='attribute'>Energy Performance Indicator<span class='wpp_colon'>:</span></span>
						  <span class='value'>";
						echo $property['energy_performance_indicator']."&nbsp;</span></li>" ;
					} ?>
				</ul>
			</div>
			
			
			<div> 
				<?php if(!empty($wp_properties['taxonomies'])) foreach($wp_properties['taxonomies'] as $tax_slug => $tax_data): ?>
				<?php if(get_features("type={$tax_slug}&format=count")):  ?>
				<div  class="<?php echo $tax_slug; ?>_list features_list nugent-widget">
					<h2><?php echo $tax_data['label']; ?></h2>
					<ul class="wp_<?php echo $tax_slug; ?>s  wpp_feature_list clearfix">
						<?php get_features("type={$tax_slug}&format=list&links=false"); ?>
					</ul>
				</div>
				<?php endif; ?>
				<?php endforeach; ?>
			</div>
			<div style="clear : both"> </div>
			
			<div  class="features_list nugent-widget" > 	
				<h2>Stamp Duty</h2>
				
				<?php  /* Calculate stamp duty */  
			
					$property_price=format_property_price($property['price']);
					$stamp_duty=calculate_stamp_duty($property_price);
					$property_price_full=$stamp_duty['price'] + $property_price;
				?>
				
				<div style="position : relative; float : left;margin 0px 5px; width:45%;"> <?php echo "@".$stamp_duty['rate']."%" ?><br>
				<?php echo substr( $property['price'], 0,3 ).number_format($stamp_duty['price']) ; ?>		
				</div>
				<div style="position : relative; float : left;margin 0px 5px; text-align: center;"> Total Amount <br>
					<?php echo substr( $property['price'], 0,3 ).number_format($property_price_full) ; ?>
				</div>
			</div>
			
			<div  class="features_list nugent-widget" > 	
			<?php echo do_shortcode('[mortgage-calculator]'); ?>
			</div>
			
			<ul> 
				<?php  get_template_part('content','single-property-inquiry'); ?>
				<?php dynamic_sidebar( "wpp_sidebar_" . $property['property_type'] ); ?>
			</ul>
		</div>
	</div>
	<?php endif; ?>
 </div>
  <div class="cboth"></div>
 <?php get_template_part('content','single-property-bottom'); ?>

 <div class="cboth"></div>

<?php get_footer(); ?>