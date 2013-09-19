<?php
/*****************************************************************************/
/*Define Constants*/
/*****************************************************************************/

define('THEMEROOT', get_stylesheet_directory_uri());
define('IMAGES',THEMEROOT. '/images');

/**
 * Sets up theme defaults and registers the various WordPress features that
 * voyage supports.
 */
function voyage_setup() {
	/*
	 * Makes voyage available for translation.
	 *
	 * Translations can be added to the /languages/ directory.
	 * If you're building a theme based on Twenty Thirteen, use a find and
	 * replace to change 'twentythirteen' to the name of your theme in all
	 * template files.
	 */
	load_theme_textdomain( 'voyage', get_template_directory() . '/languages' );

	require( get_template_directory() . '/inc/widgets.php' );
	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );
	/*
	 * This theme supports all available post formats by default.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'gallery', 'video'
	) );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menu( 'primary', __( 'Navigation Menu', 'voyage' ) );
	/*
	 * This theme uses a custom image size for featured images, displayed on
	 * "standard" posts and pages.
	 */
	add_theme_support( 'post-thumbnails' );
	//set_post_thumbnail_size( 300, 150, true );
	add_image_size( 'thumbnail-container',300, 150,true);
}
add_action( 'after_setup_theme', 'voyage_setup' );

if ( ! function_exists( 'voyage_paging_nav' ) ) :
/**
 * Displays navigation to next/previous set of posts when applicable.
 */
function voyage_paging_nav() {
	global $wp_query;

	// Don't print empty markup if there's only one page.
	if ( $wp_query->max_num_pages < 2 )
		return;
	?>
	<nav id="nav-below" class="nav-pagination clearfix">
          <div class="dirt-thin"></div>
          <div class="dirt-thick"></div>
          	<?php if ( get_previous_posts_link() ) : ?>
          	<div class="nav-previous">
            	<?php previous_posts_link(__('Previous Page')); ?>  
          	</div>
      		<?php endif;?>
          	<?php if ( get_next_posts_link() ) : ?>
          	<div class="nav-next">
            	<?php next_posts_link(__('Next Page')); ?>  
          	</div>
      		<?php endif;?>
        </nav> 
	<?php
}
endif;

if ( ! function_exists( 'voyage_post_nav' ) ) :
/**
 * Displays navigation to next/previous post when applicable.
*/
function voyage_post_nav() {
	global $post;

	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous )
		return;
	?>
	<nav id="nav-below" class="nav-pagination clearfix">
        <div class="dirt-thin"></div>
        <div class="nav-previous">
          	<?php previous_post_link( '%link', _x('Previous Post', 'voyage' ) ); ?>
        </div>
        <div class="nav-next">
           	<?php next_post_link( '%link', _x( 'Next Post', 'voyage' ) ); ?>
        </div>
    </nav> 
	<?php
}
endif;


remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
/**
 * Loads a set of CSS and/or Javascript documents. 
 */
function mega_enqueue_admin_scripts($hook) {
	wp_register_style( 'ot-admin-custom', get_template_directory_uri() . '/inc/css/ot-admin-custom.css' );
	if ( $hook == 'appearance_page_ot-theme-options' ) {
		wp_enqueue_style( 'ot-admin-custom' );
	}

	wp_register_style( 'admin.custom', get_template_directory_uri() . '/inc/css/admin.custom.css' );
	wp_register_script( 'jquery.admin.custom', get_template_directory_uri() . '/inc/jquery.admin.custom.js', array( 'jquery' ) );
	if( $hook != 'edit.php' && $hook != 'post.php' && $hook != 'post-new.php' ) 
		return;
	wp_enqueue_style( 'admin.custom' );
	wp_enqueue_script( 'jquery.admin.custom' );
}
add_action( 'admin_enqueue_scripts', 'mega_enqueue_admin_scripts' );

// Gallery
function mega_clean( $var ) {
	return sanitize_text_field( $var );
}
/**
 * Load up our theme meta boxes and related code.
 */
	require( get_template_directory() . '/inc/meta-functions.php' );
	require( get_template_directory() . '/inc/meta-box-post.php' );
	
	function custom_excerpt_length( $length ) {
		return 45;
	}
	add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
	
	function new_excerpt_more( $more ) {
		return '';
	}
	add_filter('excerpt_more', 'new_excerpt_more');
	
	/**
 * Get Vimeo & YouTube Thumbnail.
 */
function mega_get_video_image($url){
	if(preg_match('/youtube/', $url)) {			
		if(preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $url, $matches)) {
			return "http://img.youtube.com/vi/".$matches[1]."/default.jpg";  
		}
	}
	elseif(preg_match('/vimeo/', $url)) {			
		if(preg_match('~^http://(?:www\.)?vimeo\.com/(?:clip:)?(\d+)~', $url, $matches))	{
				$id = $matches[1];	
				if (!function_exists('curl_init')) die('CURL is not installed!');
				$url = "http://vimeo.com/api/v2/video/".$id.".php";
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, $url);
				curl_setopt($ch, CURLOPT_HEADER, 0);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($ch, CURLOPT_TIMEOUT, 10);
				$output = unserialize(curl_exec($ch));
				$output = $output[0]["thumbnail_medium"]; 
				curl_close($ch);
				return $output;
		}
	}		
}

/**
 * Retrieve YouTube/Vimeo iframe code from URL.
 */
function mega_get_video( $postid, $width = 940, $height = 308 ) {	
	$video_url = get_post_meta( $postid, 'mega_youtube_vimeo_url', true );	
	if(preg_match('/youtube/', $video_url)) {			
		if(preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $video_url, $matches)) {
			$output = '<iframe width="'. $width .'" height="'. $height .'" src="http://www.youtube.com/embed/'.$matches[1].'?wmode=transparent&showinfo=0&rel=0" frameborder="0" allowfullscreen></iframe> ';
		}
		else {
			$output = __( 'Sorry that seems to be an invalid YouTube URL.', 'mega' );
		}			
	}
	elseif(preg_match('/vimeo/', $video_url)) {			
		if(preg_match('~^http://(?:www\.)?vimeo\.com/(?:clip:)?(\d+)~', $video_url, $matches))	{				
			$output = '<iframe src="http://player.vimeo.com/video/'. $matches[1] .'?title=0&amp;byline=0&amp;portrait=0" width="'. $width .'" height="'. $height .'" frameborder="0" webkitAllowFullScreen allowFullScreen></iframe>';         	
		}
		else {
			$output = __( 'Sorry that seems to be an invalid Vimeo URL.', 'mega' );
		}			
	}
	else {
		$output = __( 'Sorry that seems to be an invalid YouTube or Vimeo URL.', 'mega' );
	}	
	echo $output;	
}

/**
 * Enqueues scripts and styles for front end.
 */
/*
function my_custom_js() {
    echo '<script>window.jQuery || document.write(\'<script src=""><\/script>\')</script>';
}
add_action('wp_footer', 'my_custom_js');*/
function voyage_scripts_styles() {
	wp_deregister_script('jquery');
	wp_register_script('jquery', "//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js", false, true);
	wp_enqueue_script('jquery');
	//wp_enqueue_script( 'fangohr_dynload_script.js', get_template_directory_uri() . '/js/fangohr_dynload_script.js', array( 'jquery' ), false, true );
	if(is_home()){
		wp_enqueue_script( 'plugins_home', get_template_directory_uri() . '/js/plugins_home.js', array( 'jquery' ), false, true);
		wp_enqueue_script( 'script_home', get_template_directory_uri() . '/js/script_home.js', array( 'jquery' ), false, true);
		wp_enqueue_script( 'fangohr_dynload_script.js', get_template_directory_uri() . '/js/fangohr_dynload_script.js', array( 'jquery' ), false, true );
	}else{
		wp_enqueue_script( 'plugins_post.js', get_template_directory_uri() . '/js/plugins_post.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'script_post.js', get_template_directory_uri() . '/js/script_post.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'klass.min.js', get_template_directory_uri() . '/js/klass.min.js', array( 'jquery' ), false, true);
		wp_enqueue_script( 'code.photoswipe.jquery', get_template_directory_uri() . '/js/code.photoswipe.jquery-3.0.4.js', array( 'jquery' ), false, true);
		wp_enqueue_script( 'fangohr_dynload_script.js', get_template_directory_uri() . '/js/fangohr_dynload_script.js', array( 'jquery' ), false, true );
	}
}
add_action( 'wp_enqueue_scripts', 'voyage_scripts_styles' );
/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @package	   TGM-Plugin-Activation
 * @subpackage Example
 * @version	   2.3.6
 * @author	   Thomas Griffin <thomas@thomasgriffinmedia.com>
 * @author	   Gary Jones <gamajo@gamajo.com>
 * @copyright  Copyright (c) 2012, Thomas Griffin
 * @license	   http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/thomasgriffin/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 */
require_once dirname( __FILE__ ) . '/inc/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'voyage_theme_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register two plugins - one included with the TGMPA library
 * and one from the .org repo.
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function voyage_theme_register_required_plugins() {

	/**
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		// This is an example of how to include a plugin pre-packaged with a theme
		array(
			'name'     				=> 'ubermenu', // The plugin name
			'slug'     				=> 'ubermenu', // The plugin slug (typically the folder name)
			'source'   				=> get_stylesheet_directory() . '/inc/plugins/ubermenu.zip', // The plugin source
			'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),

		// This is an example of how to include a plugin pre-packaged with a theme
		array(
			'name'     				=> 'ubermenu sticky', // The plugin name
			'slug'     				=> 'ubermenu-sticky', // The plugin slug (typically the folder name)
			'source'   				=> get_stylesheet_directory() . '/inc/plugins/ubermenu-sticky.zip', // The plugin source
			'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),
		// This is an example of how to include a plugin from the WordPress Plugin Repository
		array(
			'name' 		=> 'WP Super Cache',
			'slug' 		=> 'wp-super-cache',
			'required' 	=> false,
		),
		array(
			'name' 		=> 'Disqus Comment System',
			'slug' 		=> 'disqus-comment-system',
			'required' 	=> true,
		),
		array(
			'name' 		=> 'Contact Form 7',
			'slug' 		=> 'contact-form-7',
			'required' 	=> false,
		),
		array(
			'name' 		=> 'WordPress SEO by Yoast',
			'slug' 		=> 'wordpress-seo',
			'required' 	=> false,
		),
		array(
			'name' 		=> 'WP Most Popular',
			'slug' 		=> 'wp-most-popular',
			'required' 	=> true,
		),
	);

	// Change this to your theme text domain, used for internationalising strings
	$theme_text_domain = 'voyage';

	/**
	 * Array of configuration settings. Amend each line as needed.
	 * If you want the default strings to be available under your own theme domain,
	 * leave the strings uncommented.
	 * Some of the strings are added into a sprintf, so see the comments at the
	 * end of each line for what each argument will be.
	 */
	$config = array(
		'domain'       		=> $theme_text_domain,         	// Text domain - likely want to be the same as your theme.
		'default_path' 		=> '',                         	// Default absolute path to pre-packaged plugins
		'parent_menu_slug' 	=> 'themes.php', 				// Default parent menu slug
		'parent_url_slug' 	=> 'themes.php', 				// Default parent URL slug
		'menu'         		=> 'install-required-plugins', 	// Menu slug
		'has_notices'      	=> true,                       	// Show admin notices or not
		'is_automatic'    	=> false,					   	// Automatically activate plugins after installation or not
		'message' 			=> '',							// Message to output right before the plugins table
		'strings'      		=> array(
			'page_title'                       			=> __( 'Install Required Plugins', $theme_text_domain ),
			'menu_title'                       			=> __( 'Install Plugins', $theme_text_domain ),
			'installing'                       			=> __( 'Installing Plugin: %s', $theme_text_domain ), // %1$s = plugin name
			'oops'                             			=> __( 'Something went wrong with the plugin API.', $theme_text_domain ),
			'notice_can_install_required'     			=> _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s)
			'notice_can_install_recommended'			=> _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_install'  					=> _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s)
			'notice_can_activate_required'    			=> _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
			'notice_can_activate_recommended'			=> _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_activate' 					=> _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s)
			'notice_ask_to_update' 						=> _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_update' 						=> _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s)
			'install_link' 					  			=> _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
			'activate_link' 				  			=> _n_noop( 'Activate installed plugin', 'Activate installed plugins' ),
			'return'                           			=> __( 'Return to Required Plugins Installer', $theme_text_domain ),
			'plugin_activated'                 			=> __( 'Plugin activated successfully.', $theme_text_domain ),
			'complete' 									=> __( 'All plugins installed and activated successfully. %s', $theme_text_domain ), // %1$s = dashboard link
			'nag_type'									=> 'updated' // Determines admin notice type - can only be 'updated' or 'error'
		)
	);

	tgmpa( $plugins, $config );

}
/**
 * Register our sidebars and widgetized areas.
 */
function voyage_widgets_init() {

	register_widget('footer_link');
	register_widget('footer_about');
	register_widget('latest_issue');
	register_sidebar( array(
		'name' => __( 'Latest Issue', 'voyage' ),
		'id' => 'latest-issue',
		'description' => __( 'An optional widget area for your page for showing latest issue', 'voyage' ),
		'before_widget' => '',
		'after_widget' => "",
		'before_title' => '',
		'after_title' => '',
	) );
	register_sidebar( array(
		'name' => __( 'Footer Left', 'voyage' ),
		'id' => 'footer-left',
		'description' => __( 'An optional widget area for your page for showing Footer left', 'voyage' ),
		'before_widget' => '',
		'after_widget' => "",
		'before_title' => '',
		'after_title' => '',
	) );
	register_sidebar( array(
		'name' => __( 'Footer Right', 'voyage' ),
		'id' => 'footer-right',
		'description' => __( 'An optional widget area for your page for showing Froter right', 'voyage' ),
		'before_widget' => '',
		'after_widget' => "",
		'before_title' => '',
		'after_title' => '',
	) );
	register_sidebar( array(
		'name' => __( 'Footer About', 'voyage' ),
		'id' => 'footer-about',
		'description' => __( 'An optional widget area for your page for showing Froter about', 'voyage' ),
		'before_widget' => '',
		'after_widget' => "",
		'before_title' => '',
		'after_title' => '',
	) );
}
add_action( 'widgets_init', 'voyage_widgets_init' );

require( get_template_directory() . '/inc/resize.php' );

function relatedpost($postid){

    $max_articles = 4;  // How many articles to display
    $cnt = 0;
    
    $article_tags = get_the_tags($postid);
    $tags_string = '';
    if ($article_tags) {
        foreach ($article_tags as $article_tag) {
            $tags_string .= $article_tag->slug . ',';
        }
    }
    $tag_related_posts = get_posts('exclude=' . $postid . '&numberposts=' . $max_articles . '&tag=' . $tags_string);
    
    if ($tag_related_posts) {
        foreach ($tag_related_posts as $related_post) {
            $cnt++;

            echo '<div  class="related-post"><div class="content">';
            echo '<div class="related-post-image-container">';
            echo '<a href="' . get_permalink($related_post->ID) . '" title="' .$related_post->post_title .'">';
            echo get_the_post_thumbnail($related_post->ID, 'thumbnail-container');
            echo '</a>';
            if(get_post_format($related_post->ID)=='video'){
	            echo  '<a href="' . get_permalink($related_post->ID) . '" title="' .$related_post->post_title .'">';
	      		echo '<div class="thumbnail-container playhover">';
	      		echo '</div>';
	   			echo '</a>';
   			}
            echo '</div>';
            echo '<h3>';
	        echo '<a href="' . get_permalink($related_post->ID) . '" title="' .$related_post->post_title .'">';
	        echo '<small>'.get_the_time( 'F j, Y', $related_post->ID ).'</small>';
	        echo $related_post->post_title;
	        echo '</a>';
	        echo '</h3>';
            echo '</div></div>';
        }
    }


    // Only if there's not enough tag related articles,
    // we add some from the same category
    
    if ($cnt < $max_articles) {
        
        $article_categories = get_the_category($postid);
        $category_string = '';
        foreach($article_categories as $category) { 
            $category_string .= $category->cat_ID . ',';
        }
        
        $cat_related_posts = get_posts('exclude=' . $postid . '&numberposts=' . $max_articles . '&category=' . $category_string);
        
        if ($cat_related_posts) {
            foreach ($cat_related_posts as $related_post) {
                $cnt++; 
                if ($cnt > $max_articles) break;
				echo '<div  class="related-post"><div class="content">';
	            echo '<div class="related-post-image-container">';
	            echo '<a href="' . get_permalink($related_post->ID) . '" title="' .$related_post->post_title .'">';
	            echo get_the_post_thumbnail($related_post->ID, 'thumbnail-container');
	            echo '</a>';
	            if(get_post_format($related_post->ID)=='video'){
	            echo  '<a href="' . get_permalink($related_post->ID) . '" title="' .$related_post->post_title .'">';
	      		echo '<div class="thumbnail-container playhover">';
	      		echo '</div>';
	   			echo '</a>';
   				}
	            echo '</div>';
	            echo '<h3>';
	            echo '<a href="' . get_permalink($related_post->ID) . '" title="' .$related_post->post_title .'">';
	            echo '<small>'.get_the_time( 'F j, Y', $related_post->ID ).'</small>';
	            echo $related_post->post_title;
	            echo '</a>';
	            echo '</h3>';
	            echo '</div></div>';
            }
        }
    }     
}
function social_share($postid){
	echo	'<div  class="meta-container clearfix">';
	echo		'<div class="dirt-thin"></div>';
	echo		'<div id="js-share-area-2" class="share-area clearfix" data-text="'.get_the_title($postid).'" data-url="'.get_permalink($postid).'" data-counturl="'.get_permalink($postid).'">';
	
	echo		'</div>';
	echo	'</div>';
}

function get_vogaye_next_link($html){
	preg_match('/<a href="(.+)" >/', $html, $match);
	$url=$match[1];
	return $url;
}
/**
 * Options Tree.
 */
 
/**
 * Optional: set 'ot_show_pages' filter to false.
 * This will hide the settings & documentation pages.
 */
add_filter( 'ot_show_pages', '__return_false' );

/**
 * Optional: set 'ot_show_new_layout' filter to false.
 * This will hide the "New Layout" section on the Theme Options page.
 */
add_filter( 'ot_show_new_layout', '__return_false' );

/**
 * Required: set 'ot_theme_mode' filter to true.
 */
add_filter( 'ot_theme_mode', '__return_true' );

/**
 * Required: include OptionTree.
 */
include_once( trailingslashit( get_template_directory() ) . 'option-tree/ot-loader.php' );

include_once( trailingslashit( get_template_directory() ) . 'inc/theme-options.php' );

function get_post_count($postid){
	global $wpdb;
	$all_time_stats = $wpdb->get_var( $wpdb->prepare( "SELECT all_time_stats FROM {$wpdb->prefix}most_popular WHERE post_id = '%d'", $postid) );
	if($all_time_stats){
		echo $all_time_stats;
	}else{
		echo '0';
	}
}


?>

