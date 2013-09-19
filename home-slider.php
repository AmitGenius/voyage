<?php if ( have_posts() ) : ?>
<!--**********************
  Slider area end
**************************-->
<div class="home-lead-slider-container">
  <div id="js-home-lead-slider-wrap" class="home-lead-slider-wrap">
    <ul class="home-lead-slider" id="home-lead-slider">
    <?php while ( have_posts() ) : the_post(); ?>
      <?php 
        $post_static = get_post_meta( $post->ID,'mega_post_slider','Yes');
        $i=0;
        if($post_static=='Yes'){
          if ( metadata_exists( 'post', $post->ID, '_post_image_gallery' ) ) {
            $page_image_gallery = get_post_meta( $post->ID, '_post_image_gallery', true );
          } else {
            // Backwards compat
            $attachment_ids = array_filter( array_diff( get_posts( 'post_parent=' . $post->ID . '&numberposts=-1&post_type=attachment&orderby=menu_order&order=ASC&post_mime_type=image&fields=ids' ), array( get_post_thumbnail_id() ) ) );
            $page_image_gallery = implode( ',', $attachment_ids );
          }
                
          $attachments = array_filter( explode( ',', $page_image_gallery ) );
          $thumbs = array();
      ?>           
      <li class="home-lead-slide" data-index="<?php echo $i;?>">
        <div id="" class="home-lead-slider-img-container">
          <a href="<?php echo get_permalink(); ?>" title="<?php echo get_the_title(); ?>" rel="bookmark">
            <?php echo get_the_post_thumbnail($post->ID, 'large'); ?>
          </a>
        </div>
        <h2>
          <a href="<?php echo get_permalink(); ?>" class="home-lead-slider-headline">
            <div class="ellipsis"><?php echo get_the_title(); ?></div>
          </a>
        </h2>
        <div class="dirt-thin"></div>
        <?php if($attachments && sizeof($attachments)>1){ ?>
            <div class='caption'><?php echo sizeof($attachments).' IMAGES';?></div> 
          <?php } ?>
      </li>
      <?php $i++;}?>
      <?php endwhile; ?>  
    </ul>    
    <span class="home-lead-slide-indicator">
    <?php for($count=0;$count<$i;$count++){?>
      <em class="home-lead-slide-indicator-bullet <?php echo $count==0 ? 'on':''; ?>">•</em>
    <?php } ?>
    </span>
  </div> 
</div> 
<!--**********************
    Slider area end
**************************-->
<?php endif;?>
