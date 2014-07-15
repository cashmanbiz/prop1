<?php
/**
 * WP-Property Overview Grid Template
 *
 * To customize this file, copy it into your theme directory, and the plugin will
 * automatically load your version.
 *
 * You can also customize it based on property type.  For example, to create a custom
 * overview page for 'building' property type, create a file called property-overview-building.php
 * into your theme directory.
 *
 * @version 1.4
 * @author Andy Potanin <andy.potnain@twincitiestech.com>
 * @package WP-Property
*/
global $ds;
?>

<?php if ( have_properties() ) { ?>

 <script type="text/javascript"><?php do_action('wpp_js_on_property_overview_display', 'grid'); ?> </script>
  <div class="wpp_grid_view all-properties wpp_property_view_result clearfix">

  <?php foreach ( returned_properties('load_gallery=true') as $property) {  ?>

    <div class="property_div_nugent <?php echo $property['post_type']; ?> <?php echo $property['property_type']; ?> clearfix">

      <div class="wpp_overview_left_column_nugent">
        <?php property_overview_image("image_type={$thumbnail_size}"); ?>
      </div>
	 
	  <div id="nugentsliderow1"><a style="color : #ccc;" href="<?php echo $property['permalink']; ?>"><?php echo $property['area']; ?><?php if(isset($property['bedrooms'])) echo " - ".$property['bedrooms']." Bed"; ?> <?php echo " - ".$property['property_type_label'] ; ?></a></div>


    </div><?php // .property_div_nugent ?>
  <?php } ?>
  </div><?php // .wpp_grid_view ?>
<?php } else { ?>
  <div class="wpp_nothing_found">
    <?php echo sprintf(__('Sorry, no properties found - try expanding your search, or <a href="%s">view all</a>.','denali'), site_url().'/'.$wp_properties['configuration']['base_slug']); ?>
  </div>
<?php } ?>
