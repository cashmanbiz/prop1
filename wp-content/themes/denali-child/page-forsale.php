<?php
/**
 * Template Name: forsale
 *
 */
?>

<?php

  if(is_property_overview_page() && denali_theme::is_active_sidebar('property_overview_sidebar')) {
    $property_overview_sidebar = true;
  }    
 
  if(denali_theme::is_active_sidebar('right_sidebar')) {
    $right_sidebar = true;
  }  
     
  if(get_post_meta($post->ID, 'hide_sidebar', true) != 'true' && ($property_overview_sidebar || $right_sidebar)) {
    $have_sidebar = true;
  }

?>

<?php
static function setup_forsale_page() {
      global $wpdb, $user_ID;

        //** Check if this page actually exists */
      $post_id = $wpdb->get_var("SELECT ID FROM {$wpdb->posts} WHERE post_name = 'home' AND post_type = 'page' AND post_status = 'publish'");

      if(!$post_id) {
        $post_id = '';
      } else {
        return $post_id;
      }

      $forsale_page_content[] = "<h2>Welcome to " . get_bloginfo('blogname') . "!</h2>";
      $_page_content[] = "[property_search]";
      //$home_page_content[] = "[property_overview per_page=5 pagination=off template=grid]";

      $property_page = array(
        'post_title' => __('For Sale', 'denali'),
        'post_content' => implode("\n", $forsale_page_content),
        'post_name' => 'for-sale',
        'post_type' => 'page',
        'post_status' => 'publish',
        'post_id' => $post_id,
        'post_author' =>  $user_ID
      );

      $post_id = wp_insert_post($property_page);


      return $post_id;

    }
?>
<?php get_header(); ?>

<?php get_template_part('attention', 'page'); ?>



  <div id="content" class="inner_content_wrapper <?php echo ($have_sidebar  ? 'have-sidebar' : 'no_columns'); ?>">
  
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
          <div id="post-<?php the_ID(); ?>" <?php post_class('main'); ?>>

              <?php if(!hide_page_title()) { ?>
              <h1 class="entry-title"><?php the_title();?></h1>
              <?php } ?>

              <div class="entry-content">
                  <?php the_content('More Info'); ?>
                  <?php comments_template(); ?>
              </div>
              <?php do_action('denali_page_below_entry_content'); ?>
          </div>
      <?php endwhile; endif; ?>

  <?php if ($have_sidebar) : ?>
    <div class="sidebar">
        <?php dynamic_sidebar( 'property_overview_sidebar' ); ?>
        <?php dynamic_sidebar( 'right_sidebar' ); ?>
    </div>
  <?php endif; ?>

  <div class="cboth"></div>

  </div>

<?php get_footer() ?>