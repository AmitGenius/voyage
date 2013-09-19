<?php
/**
 * Initialize the custom theme options.
 */
add_action( 'admin_init', 'custom_theme_options' );

/**
 * Build the custom settings & update OptionTree.
 */
function custom_theme_options() {
  /**
   * Get a copy of the saved settings array. 
   */
  $saved_settings = get_option( 'option_tree_settings', array() );
  
  /**
   * Custom settings array that will eventually be 
   * passes to the OptionTree Settings API Class.
   */
  $custom_settings = array( 
    'contextual_help' => array( 
      'sidebar'       => ''
    ),
    'sections'        => array(
      array(
        'id'          => 'social',
        'title'       => 'Social Accounts'
      ),
      array(
        'id'          => 'background',
        'title'       => 'Background'
      ),
      array(
        'id'          => 'ads',
        'title'       => 'Ads'
      ), 
    ),
    'settings'        => array( 
      array(
        'id'          => 'facebook_name',
        'label'       => 'Facebook Name',
        'desc'        => '',
        'std'         => 'voyage',
        'type'        => 'text',
        'section'     => 'social',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'facebook_url',
        'label'       => 'Facebook Address (URL)',
        'desc'        => '',
        'std'         => 'http://www.facebook.com/',
        'type'        => 'text',
        'section'     => 'social',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'twitter_handler',
        'label'       => 'Twitter Handler',
        'desc'        => '',
        'std'         => 'voyage',
        'type'        => 'text',
        'section'     => 'social',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'twitter_url',
        'label'       => 'Twitter Address (URL)',
        'desc'        => '',
        'std'         => 'https://twitter.com/',
        'type'        => 'text',
        'section'     => 'social',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'gplus_url',
        'label'       => 'Google Plus Address (URL)',
        'desc'        => '',
        'std'         => 'https://plus.google.com/',
        'type'        => 'text',
        'section'     => 'social',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'pinterest_url',
        'label'       => 'Pinterest Address (URL)',
        'desc'        => '',
        'std'         => 'http://pinterest.com/',
        'type'        => 'text',
        'section'     => 'social',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'tumblr_url',
        'label'       => 'Tumblr Address (URL)',
        'desc'        => '',
        'std'         => 'https://www.tumblr.com/',
        'type'        => 'text',
        'section'     => 'social',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'mailchimp_action_url',
        'label'       => 'MailChimp Action (URL)',
        'desc'        => '',
        'std'         => '#',
        'type'        => 'text',
        'section'     => 'social',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'feed_url',
        'label'       => 'RSS Address (URL)',
        'desc'        => '',
        'std'         => '#',
        'type'        => 'text',
        'section'     => 'social',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'disqus_shortname',
        'label'       => 'Disqus Shortname',
        'desc'        => '',
        'std'         => '<example>',
        'type'        => 'text',
        'section'     => 'social',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'background_image_choice',
        'label'       => 'Background Image Enable',
        'desc'        => '<p>Would you like to display?</p>',
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'background',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'yes',
            'label'       => 'Enable',
            'src'         => ''
          ),
        ),
      ),
      array(
        'id'          => 'background_image',
        'label'       => 'Background Image (1640x2000)',
        'desc'        => 'Upload a Background Image for your site.',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'background',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'paranoma_top_image_choice',
        'label'       => 'Paranoma Top Image Enable',
        'desc'        => '<p>Would you like to display?</p>',
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'background',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'yes',
            'label'       => 'Enable',
            'src'         => ''
          ),
        ),
      ),
      array(
        'id'          => 'paranoma_top',
        'label'       => 'Paranoma Top (960x230)',
        'desc'        => 'Upload a Paranoma Top Image for your site.',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'background',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'paranoma_side_image_choice',
        'label'       => 'Paranoma Sides Image Enable',
        'desc'        => '<p>Would you like to display?</p>',
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'background',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'yes',
            'label'       => 'Enable',
            'src'         => ''
          ),
        ),
      ),
      array(
        'id'          => 'paranoma_left',
        'label'       => 'Paranoma Left (300x 2000)',
        'desc'        => 'Upload a Paranoma Left Image for your site.',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'background',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'paranoma_right',
        'label'       => 'Paranoma Right (300x 2000)',
        'desc'        => 'Upload a Paranoma Right Image for your site.',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'background',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'document_header_code',
        'label'       => 'Document Header Code',
        'desc'        => 'Insert Google Double Click Document Header code into your site.',
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'ads',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'top_far_right_ad',
        'label'       => 'Top Far Right Ad',
        'desc'        => 'Insert Google Double Click Document Body Code Into Top Far Right your site.',
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'ads',
        'rows'        => '5',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'bottom_far_right_ad',
        'label'       => 'Bottom Far Right Ad',
        'desc'        => 'Insert Google Double Click Document Body Code Into Bottom Far Right your site.',
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'ads',
        'rows'        => '5',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'below_feature_big_box_ad_choice',
        'label'       => 'Bellow Feature Big Box Ad Enable',
        'desc'        => '<p>Would you like to display?</p>',
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'ads',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'yes',
            'label'       => 'Enable',
            'src'         => ''
          ),
        ),
      ),
      array(
        'id'          => 'below_feature_big_box_ad',
        'label'       => 'Bellow Feature Big Box Ad',
        'desc'        => 'Insert Google Double Click Document Body Code Into Bellow Feature Big Box your site.',
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'ads',
        'rows'        => '5',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'below_feature_left_ad',
        'label'       => 'Bellow Feature Left Ad',
        'desc'        => 'Insert Google Double Click Document Body Code Into Bellow Feature Left your site.',
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'ads',
        'rows'        => '5',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'below_feature_right_ad',
        'label'       => 'Bellow Feature Right Ad',
        'desc'        => 'Insert Google Double Click Document Body Code Into Bellow Feature Right your site.',
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'ads',
        'rows'        => '5',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'above_footer_big_box_ad_choice',
        'label'       => 'Above Footer Big Box Ad Enable',
        'desc'        => '<p>Would you like to display?</p>',
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'ads',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'yes',
            'label'       => 'Enable',
            'src'         => ''
          ),
        ),
      ),
      array(
        'id'          => 'above_footer_big_box_ad',
        'label'       => 'Above Footer Big Box Ad',
        'desc'        => 'Insert Google Double Click Document Body Code Into Above Footer Big Box your site.',
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'ads',
        'rows'        => '5',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'above_footer_left_ad',
        'label'       => 'Above Footer Left Ad',
        'desc'        => 'Insert Google Double Click Document Body Code Into Above Footer Left your site.',
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'ads',
        'rows'        => '5',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'above_footer_right_ad',
        'label'       => 'Above Footer Right Ad',
        'desc'        => 'Insert Google Double Click Document Body Code Into Above Footer Right your site.',
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'ads',
        'rows'        => '5',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),        
    )
  );
  
  /* allow settings to be filtered before saving */
  $custom_settings = apply_filters( 'option_tree_settings_args', $custom_settings );
  
  /* settings are not the same update the DB */
  if ( $saved_settings !== $custom_settings ) {
    update_option( 'option_tree_settings', $custom_settings ); 
  }
  
}