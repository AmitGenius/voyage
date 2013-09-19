<?php

/**
 * Makes a custom Widget for displaying Recent Twitter Updates available with Voyage
 *
 * @package WordPress
 * @subpackage Voyage
 * @since Voyage 1.0
 */
class footer_link extends WP_Widget {

	function footer_link() {
		$widget_ops = array( 'classname' => 'widget_footer_link', 'description' => __( 'Use this widget to display your footer link.', 'Voyage' ) );
		$control_ops = array( 'width' => 200, 'height' => 350, 'id_base' => 'widget_footer_link' );
		$this->WP_Widget( 'widget_footer_link', __('Voyage Footer Link', 'Voyage'), $widget_ops, $control_ops );
	}

	function widget( $args, $instance ) {
 		extract($args);

		$title = apply_filters('widget_title', empty($instance['title']) ? __('', 'Voyage') : $instance['title'], $instance, $this->id_base);
		$link = empty( $instance['link'] ) ? '' : $instance['link'];
		
?>
		<?php // Initialize Tweetable Plugin ?>
		<?php echo $before_widget; ?>
		<?php if ( $title && $link) : ?>
		<li class="network-post">
            <a href="<?php echo $link?>" title="<?php echo $title?>" class="network-post-link"><?php echo $title?></a> 
        </li>
        <?php endif;?>
		<?php echo $after_widget; ?>

<?php

	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['link'] = strip_tags( $new_instance['link'] );
		return $instance;
	}

	function form( $instance ) {
		//Defaults
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'link' => '' ) );
		$title = esc_attr( $instance['title'] );
		$link = esc_attr( $instance['link'] );
?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'Voyage'); ?></label> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>

		<p><label for="<?php echo $this->get_field_id('link'); ?>"><?php _e('Link:', 'Voyage'); ?></label> <input class="widefat" id="<?php echo $this->get_field_id('link'); ?>" name="<?php echo $this->get_field_name('link'); ?>" type="text" value="<?php echo $link; ?>" />
	 
<?php } 
}
        
class footer_about extends WP_Widget {

	function footer_about() {
		$widget_ops = array( 'classname' => 'widget_footer_about', 'description' => __( 'Use this widget to display your footer about and important links.', 'Voyage' ) );
		$control_ops = array( 'width' => 200, 'height' => 350, 'id_base' => 'widget_footer_about' );
		$this->WP_Widget( 'widget_footer_about', __('Voyage Footer About', 'Voyage'), $widget_ops, $control_ops );
	}

	function widget( $args, $instance ) {
 		extract($args);

		$title = apply_filters('widget_title', empty($instance['title']) ? __('', 'Voyage') : $instance['title'], $instance, $this->id_base);
		$about = empty( $instance['about'] ) ? '' : $instance['about'];
		$title_link_1 = empty( $instance['title_link_1'] ) ? '' : $instance['title_link_1'];
		$link1 = empty( $instance['link1'] ) ? '' : $instance['link1'];
		$title_link_2 = empty( $instance['title_link_2'] ) ? '' : $instance['title_link_2'];
		$link2 = empty( $instance['link2'] ) ? '' : $instance['link2'];
		$title_link_3 = empty( $instance['title_link_3'] ) ? '' : $instance['title_link_3'];
		$link3 = empty( $instance['link3'] ) ? '' : $instance['link3'];
		$title_link_4 = empty( $instance['title_link_4'] ) ? '' : $instance['title_link_4'];
		$link4 = empty( $instance['link4'] ) ? '' : $instance['link4'];
		$title_link_5 = empty( $instance['title_link_5'] ) ? '' : $instance['title_link_5'];
		$link5 = empty( $instance['link5'] ) ? '' : $instance['link5'];
?>
		<?php // Initialize Tweetable Plugin ?>
		<?php echo $before_widget; ?>
		<?php if ( $title) : ?>
		<h4 class="about-hl"><?php echo $title?></h4>
        <div class="about-body"><?php echo $about?></div>
        <ol class="footer-static-list clearfix">
          <?php if($title_link_1):?>
          <li class="footer-static-item">
            <a href="<?php $link1;?>" target="_blank" class="footer-static-link"><?php echo $title_link_1;?></a>
          </li>
          <?php endif;?>
          <?php if($title_link_2):?>
          <li class="footer-static-item">
            <a href="<?php $link2;?>" target="_blank" class="footer-static-link"><?php echo $title_link_2;?></a>
          </li>
          <?php endif;?>
          <?php if($title_link_3):?>
          <li class="footer-static-item">
            <a href="<?php $link3;?>" target="_blank" class="footer-static-link"><?php echo $title_link_3;?></a>
          </li>
          <?php endif;?>
          <?php if($title_link_4):?>
          <li class="footer-static-item">
            <a href="<?php $link4;?>" target="_blank" class="footer-static-link"><?php echo $title_link_4;?></a>
          </li>
          <?php endif;?>
          <?php if($title_link_5):?>
          <li class="footer-static-item">
            <a href="<?php $link5;?>" target="_blank" class="footer-static-link"><?php echo $title_link_5;?></a>
          </li>
          <?php endif;?>
        </ol>
        <?php endif;?>
		<?php echo $after_widget; ?>

<?php

	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['about'] = strip_tags( $new_instance['about'] );
		$instance['title_link_1'] = strip_tags( $new_instance['title_link_1'] );
		$instance['link1'] = strip_tags( $new_instance['link1'] );
		$instance['title_link_2'] = strip_tags( $new_instance['title_link_2'] );
		$instance['link2'] = strip_tags( $new_instance['link2'] );
		$instance['title_link_3'] = strip_tags( $new_instance['title_link_3'] );
		$instance['link3'] = strip_tags( $new_instance['link3'] );
		$instance['title_link_4'] = strip_tags( $new_instance['title_link_4'] );
		$instance['link4'] = strip_tags( $new_instance['link4'] );
		$instance['title_link_5'] = strip_tags( $new_instance['title_link_5'] );
		$instance['link5'] = strip_tags( $new_instance['link5'] );
		return $instance;
	}

	function form( $instance ) {
		//Defaults
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 
			'about' => '',
			'title_link_1' => '', 
			'link1' => '',
			'title_link_2' => '', 
			'link2' => '',
			'title_link_3' => '', 
			'link3' => '',
			'title_link_4' => '', 
			'link4' => '',
			'title_link_5' => '', 
			'link5' => '',
			) );
		$title = esc_attr( $instance['title'] );
		$about = esc_attr( $instance['about'] );
		$title_link_1 = esc_attr( $instance['title_link_1'] );
		$link1 = esc_attr( $instance['link1'] );
		$title_link_2 = esc_attr( $instance['title_link_2'] );
		$link2 = esc_attr( $instance['link2'] );
		$title_link_3 = esc_attr( $instance['title_link_3'] );
		$link3 = esc_attr( $instance['link3'] );
		$title_link_4 = esc_attr( $instance['title_link_4'] );
		$link4 = esc_attr( $instance['link4'] );
		$title_link_5 = esc_attr( $instance['title_link_5'] );
		$link5 = esc_attr( $instance['link5'] );

?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'Voyage'); ?></label> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>
		<p><label for="<?php echo $this->get_field_id('about'); ?>"><?php _e('About:', 'Voyage'); ?></label> <textarea class="widefat" id="<?php echo $this->get_field_id('about'); ?>" name="<?php echo $this->get_field_name('about'); ?>" ><?php echo $about;?></textarea>
		<p><label for="<?php echo $this->get_field_id('title_link_1'); ?>"><?php _e('Title Link 1:', 'Voyage'); ?></label> <input class="widefat" id="<?php echo $this->get_field_id('title_link_1'); ?>" name="<?php echo $this->get_field_name('title_link_1'); ?>" type="text" value="<?php echo $title_link_1; ?>" />
		<p><label for="<?php echo $this->get_field_id('link1'); ?>"><?php _e('Link 1:', 'Voyage'); ?></label> <input class="widefat" id="<?php echo $this->get_field_id('link1'); ?>" name="<?php echo $this->get_field_name('link1'); ?>" type="text" value="<?php echo $link1; ?>" />
	 	<p><label for="<?php echo $this->get_field_id('title_link_2'); ?>"><?php _e('Title Link 2:', 'Voyage'); ?></label> <input class="widefat" id="<?php echo $this->get_field_id('title_link_2'); ?>" name="<?php echo $this->get_field_name('title_link_2'); ?>" type="text" value="<?php echo $title_link_2; ?>" />
		<p><label for="<?php echo $this->get_field_id('link2'); ?>"><?php _e('Link 2:', 'Voyage'); ?></label> <input class="widefat" id="<?php echo $this->get_field_id('link2'); ?>" name="<?php echo $this->get_field_name('link2'); ?>" type="text" value="<?php echo $link2; ?>" />
		<p><label for="<?php echo $this->get_field_id('title_link_3'); ?>"><?php _e('Title Link 3:', 'Voyage'); ?></label> <input class="widefat" id="<?php echo $this->get_field_id('title_link_3'); ?>" name="<?php echo $this->get_field_name('title_link_3'); ?>" type="text" value="<?php echo $title_link_3; ?>" />
		<p><label for="<?php echo $this->get_field_id('link3'); ?>"><?php _e('Link 3:', 'Voyage'); ?></label> <input class="widefat" id="<?php echo $this->get_field_id('link3'); ?>" name="<?php echo $this->get_field_name('link3'); ?>" type="text" value="<?php echo $link3; ?>" />
		<p><label for="<?php echo $this->get_field_id('title_link_4'); ?>"><?php _e('Title Link 4:', 'Voyage'); ?></label> <input class="widefat" id="<?php echo $this->get_field_id('title_link_4'); ?>" name="<?php echo $this->get_field_name('title_link_4'); ?>" type="text" value="<?php echo $title_link_4; ?>" />
		<p><label for="<?php echo $this->get_field_id('link4'); ?>"><?php _e('Link 4:', 'Voyage'); ?></label> <input class="widefat" id="<?php echo $this->get_field_id('link4'); ?>" name="<?php echo $this->get_field_name('link4'); ?>" type="text" value="<?php echo $link4; ?>" />
		<p><label for="<?php echo $this->get_field_id('title_link_5'); ?>"><?php _e('Title Link 5:', 'Voyage'); ?></label> <input class="widefat" id="<?php echo $this->get_field_id('title_link_5'); ?>" name="<?php echo $this->get_field_name('title_link_5'); ?>" type="text" value="<?php echo $title_link_5; ?>" />
		<p><label for="<?php echo $this->get_field_id('link5'); ?>"><?php _e('Link 5:', 'Voyage'); ?></label> <input class="widefat" id="<?php echo $this->get_field_id('link5'); ?>" name="<?php echo $this->get_field_name('link5'); ?>" type="text" value="<?php echo $link5; ?>" />
<?php } 
}

class latest_issue extends WP_Widget {

	function latest_issue() {
		$widget_ops = array( 'classname' => 'widget_latest_issue', 'description' => __( 'Use this widget to display your latest issue.', 'Voyage' ) );
		$control_ops = array( 'width' => 200, 'height' => 350, 'id_base' => 'widget_latest_issue' );
		$this->WP_Widget( 'widget_latest_issue', __('Voyage Latest Issue', 'Voyage'), $widget_ops, $control_ops );
	}

	function widget( $args, $instance ) {
 		extract($args);

		$title = apply_filters('widget_title', empty($instance['title']) ? __('', 'Voyage') : $instance['title'], $instance, $this->id_base);
		$image_url = empty( $instance['image_url'] ) ? '' : $instance['image_url'];
		$link = empty( $instance['link'] ) ? '' : $instance['link'];
?>
		<?php // Initialize Tweetable Plugin ?>
		<?php echo $before_widget; ?>
		<?php if ( $title) : ?>
            <a href="<?php $link;?>" target="_blank"><img src="<?php echo $image_url;?>"></a>
          <?php endif;?>
		<?php echo $after_widget; ?>

<?php

	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['image_url'] = strip_tags( $new_instance['image_url'] );
		$instance['link'] = strip_tags( $new_instance['link'] );
		return $instance;
	}

	function form( $instance ) {
		//Defaults
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 
			'image_url' => '',
			'link' => '', 
			) );
		$title = esc_attr( $instance['title'] );
		$image_url = esc_attr( $instance['image_url'] );
		$link = esc_attr( $instance['link'] );
?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'Voyage'); ?></label> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>
		<p><label for="<?php echo $this->get_field_id('image_url'); ?>"><?php _e('Image Url:', 'Voyage'); ?></label> <input class="widefat" id="<?php echo $this->get_field_id('image_url'); ?>" name="<?php echo $this->get_field_name('image_url'); ?>" type="text" value="<?php echo $image_url; ?>" /></p>
		<p><label for="<?php echo $this->get_field_id('link'); ?>"><?php _e('Link:', 'Voyage'); ?></label> <input class="widefat" id="<?php echo $this->get_field_id('link'); ?>" name="<?php echo $this->get_field_name('link'); ?>" type="text" value="<?php echo $link; ?>" /></p>
		
<?php } 
}