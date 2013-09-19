<?php if(have_posts()): ?>
<!--**********************
  Featured Post Right Area Start
**************************-->
<aside class="highlight-feature">
  <?php while ( have_posts() ) : the_post(); ?>
  <?php 
    $post_static = get_post_meta( $post->ID,'mega_post_static','Yes');
    if($post_static=='Yes'){
  ?> 
  <?php if(get_post_format()=='gallery'){?>
  <div class="thumbnail-container">
    <a href="<?php echo get_permalink(); ?>" title="<?php echo get_the_title(); ?>" rel="bookmark">
      <?php echo get_the_post_thumbnail($post->ID, 'thumbnail-container'); ?>        
    </a>
  </div>
  <?php }elseif(get_post_format()=='video'){?>
  <div class="thumbnail-container">
    <a href="<?php echo get_permalink(); ?>" title="<?php echo get_the_title(); ?>" rel="bookmark">
      <?php echo get_the_post_thumbnail($post->ID, 'thumbnail-container'); ?>        
    </a>
    <a href="<?php echo get_permalink(); ?>" title="<?php echo get_the_title(); ?>" rel="bookmark">
      <div class="thumbnail-container playhover">
      </div>
  </a>
  </div>
   
  <?php }else{?>
  <div class="thumbnail-container">
    <a href="<?php echo get_permalink(); ?>" title="<?php echo get_the_title(); ?>" rel="bookmark">
      <?php echo get_the_post_thumbnail($post->ID, 'thumbnail-container'); ?>        
    </a>
  </div>
  <?php } ?>
  <h2 class="temp-headline">
    <a href="<?php echo get_permalink(); ?>" >
      <div class="ellipsis"><?php echo get_the_title(); ?></div>
    </a>
  </h2>
  <footer class="temp-footer clearfix"></footer>
  <div class="dirt-thin"></div>
  <?php }?>
  <?php endwhile;?> 
</aside>
<!--**********************
    Featured Post Right Area End
**************************-->
<?php endif;?>