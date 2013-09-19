<?php
/**
 * The template for displaying single post gallery.
 */
?>
<article id="post-<?php the_ID(); ?>" class="post-page" data-attcount="5">
  <header class="post-header clearfix">
    <div class="topbar">
	    <div class="dirt-thick"></div>
			<div class="dirt-thin"></div>
			<div class="topbar-body-large">
	      <div class="topbar-header">
	      	<?php $category = get_the_category();?>
          <?php if($category[0]):?>
          <a href="<?php echo get_category_link($category[0]->term_id )?>" title="<?php echo $category[0]->cat_name;?>" rel="category tag"><?php echo $category[0]->cat_name?></a>
          <?php endif;?> 
        </div>         	
	    </div>
      <div class="dirt-thin"></div>
    </div>
    <h1 class="post-headline"><a href="<?php echo get_permalink(); ?>" title="<?php echo get_the_title(); ?> "><?php echo get_the_title(); ?></a></h1>
    <div class="posted-on clearfix"><?php _e('By ','voyage')?><span class="author vcard"><?php the_author_posts_link() ?>
            </span> <?php _e('posted on','voyage')?>
                <time class="entry-date" pubdate><?php the_date('F j, Y')?> <?php echo get_the_time();?></time>
                <div class="dirt-thin"></div>
	  </div>
	</header>
  <div class="body entry-content">
    <?php               
          global $post;

          if ( metadata_exists( 'post', $post->ID, '_post_image_gallery' ) ) {
            $page_image_gallery = get_post_meta( $post->ID, '_post_image_gallery', true );
          } else {
            // Backwards compat
            $attachment_ids = array_filter( array_diff( get_posts( 'post_parent=' . $post->ID . '&numberposts=-1&post_type=attachment&orderby=menu_order&order=ASC&post_mime_type=image&fields=ids' ), array( get_post_thumbnail_id() ) ) );
            $page_image_gallery = implode( ',', $attachment_ids );
          }
                
          $attachments = array_filter( explode( ',', $page_image_gallery ) );
          $thumbs = array();
          if ( $attachments ) { ?>
            <div class="post-slider-container landscape">
             <div id="js-post-slider-wrap" class="post-slider-wrap" style="overflow:hidden;height:px;">
              <ul id="js-post-slider" class="post-slider">
              <?php $i=1;foreach ( $attachments as $attachment_id ) { ?>
                <?php $gallery_image_src = wp_get_attachment_image_src( $attachment_id, 'full' ); ?>
                <?php $gallery_image_thumb = wp_get_attachment_image_src( $attachment_id, 'thumbnail' ); ?>
                <?php $attachment = get_post( $attachment_id ); ?>
                <?php $attachment_caption=$attachment->post_excerpt;?>
                <?php $attachment_description=$attachment->post_content;?>
                <?php $attachment_alt=get_post_meta( $attachment_id, '_wp_attachment_image_alt', true );?>
                <?php $attachment_title = apply_filters( 'the_title', $attachment->post_title ); ?>
                <?php $attachment_permalink=get_permalink( $attachment_id )?>
                <li class=" post-slide " data-index="<?php echo $i?>">
                  <a class="swipelink hidden" href="<?php echo $gallery_image_src[0]; ?>">
                  <img src="<?php echo $gallery_image_src[0]; ?>" class="attachment-medium" title="<?php echo $attachment_title; ?>" alt="<?php echo $attachment_alt; ?>" data-description="<?php echo $attachment_description;?>" data-index="<?php echo $i?>" data-permalink="<?php echo $attachment_permalink;?>"  />
                </a>
                <div class="post-slide-content">
                  <img src="<?php echo $gallery_image_src[0]; ?>" class="attachment-medium" title="<?php echo $attachment_title; ?>" alt="<?php echo $attachment_alt; ?>" data-description="<?php echo $attachment_description;?>" data-index="<?php echo $i?>" data-permalink="<?php echo $attachment_permalink;?>"  />
                  <p class="post-slide-caption"><?php echo $attachment_caption;?></p>
                </div>
                </li>
              <?php $i++;} ?>
              </ul>
            </div><!-- #post-gallery-slider -->
            <div class="post-slider-meta">
              <div class="count-container">
                <span class="count-label"><?php _e('No.','voyage')?></span> 
                <span class="count-numbers"><span id="js-post-slide-current-count"><?php _e('01','voyage')?></span><?php _e(' / ','voyage')?> <?php echo str_pad(sizeof($attachments), 2, '0', STR_PAD_LEFT); ?></span>
                <div class="fullscreen-label"><?php _e('Browse Gallery','voyage')?></div>
              </div>
              <div class="fullscreen-container"><a href="#" id="js-post-slide-fullscreen" class="fullscreen"></a>Fullscreen</div>                 
            </div>
          </div>      
          <?php } else { ?>
            <p class="no-found"><?php _e( 'No images found, please add some images.', 'mega' ); ?></p>
          <?php } // end if ( $attachments ) ?>
    <div class="body">
	    <?php the_content();?>
    </div>
	</div>
  <footer class="entry-utility">
		<div  class="meta-container clearfix">
	      <div class="dirt-thin"></div>
	      <?php
      		if(get_the_tag_list()) {
      			echo get_the_tag_list('<ol class="tag-list clearfix"><li>','</li><li class="tag">','</li></ol>');
      		}
      	?>
    </div>
    <?php social_share($post->ID) ?>
    <?php comments_template(); ?>
    <?php voyage_post_nav()?>
    <div class="topbar clearfix">
      <div class="dirt-thin"></div>   
      <div class="topbar">               
        <div class="topbar-header"><?php _e('Related Posts','voyage');?></div>             
      </div>
      <div class="dirt-thin"></div>
    </div>
    <div class="related-posts clearfix">
    <?php relatedpost($post->ID); ?>
    </div>
	</footer>
</article>