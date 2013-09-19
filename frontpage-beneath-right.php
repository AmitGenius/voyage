<?php if ( have_posts() ):?>
<!--**********************
Featured Post Right Area Start
**************************-->
<div class="highlight-right">
  <?php while ( have_posts() ) : the_post(); ?>
  <?php 
    $post_static = get_post_meta( $post->ID,'mega_post_right','Yes');
    if($post_static=='Yes'){
  ?> 
  <?php if(get_post_format()=='gallery'){?>
  <div class="thumbnail-container">
    <a href="<?php echo get_permalink(); ?>" title="<?php echo get_the_title(); ?>" rel="bookmark">
      <?php echo get_the_post_thumbnail($post->ID, 'thumbnail-container'); ?>
    </a>
  </div>
  <?php }elseif (get_post_format()=='video') {?>
  <div class="thumbnail-container">
    <a href="<?php echo get_permalink(); ?>" title="<?php echo get_the_title(); ?>" rel="bookmark">
      <?php echo get_the_post_thumbnail($post->ID, 'thumbnail-container'); ?>
    </a>
    <a href="<?php echo get_permalink(); ?>" title="<?php echo get_the_title(); ?>" rel="bookmark">
      <div class="thumbnail-container playhover"></div>
    </a>
  </div>
  <?php }else{ ?>
  <div class="thumbnail-container">
    <a href="<?php echo get_permalink(); ?>" title="<?php echo get_the_title(); ?>" rel="bookmark">
      <?php echo get_the_post_thumbnail($post->ID, 'thumbnail-container'); ?>
    </a>
  </div>
  <?php } ?>
  <h2>
    <a href="<?php echo get_permalink(); ?>" class="hightlight-headline">
      <div class="ellipsis"><?php echo get_the_title(); ?></div>
    </a>
  </h2>
  <footer class="footer-hero clearfix"></footer>
  <?php }?>
  <?php endwhile;?> 
</div>
<!--**********************
Featured Post Right Area End
**************************-->
<?php endif;?>