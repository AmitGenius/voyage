<?php
$posts = wmp_get_popular( array( 'limit' => 10, 'post_type' => 'post', 'range' => 'all_time' ) );
global $post;
if ( count( $posts ) > 0 ) :
    setup_postdata( $post );
?>
<!--**********************
    Most Popular Post Area Start
**************************-->
<aside id="js-top-links" class="top-links"> 
  <div class="topbar clearfix">
    <div class="dirt-thin"></div>   
    <div class="topbar">               
      <div class="topbar-header"><?php _e('Most Popular','voyage');?></div>             
    </div>
    <div class="dirt-thin"></div>
  </div>
  <ol class="slats">
  <?php foreach ( $posts as $post ):?>
    <?php if(get_post_format()=='gallery') {?>
    <li class="group">
      <h3>
        <a href="<?php the_permalink() ?>" title="<?php echo get_the_title(); ?>">
          <small><?php echo get_the_time();?> <?php _e('-','voyage')?> <?php get_post_count($post->ID); ?> views</small>
          <div class="top-links-image">
            <?php echo get_the_post_thumbnail($post->ID, 'large'); ?>
          </div>
         <?php echo get_the_title(); ?>      
        </a>
      </h3>
      <div class="dirt-thin"></div>
    </li>
    <?php }elseif(get_post_format()=='video') {?>
    <li class="group">
      <h3>
        <a href="<?php the_permalink() ?>" title="<?php echo get_the_title(); ?>">
          <small><?php echo get_the_time();?> <?php _e('-','voyage')?> <?php get_post_count($post->ID); ?> views</small>
          <div class="top-links-image">
            <?php echo get_the_post_thumbnail($post->ID, 'large'); ?>
          </div>
         <?php echo get_the_title(); ?>      
        </a>
      </h3>
      <div class="dirt-thin"></div>
    </li>
    <?php }else{ ?>
    <li class="group">
      <h3>
        <a href="<?php the_permalink() ?>" title="<?php echo get_the_title(); ?>">
          <small><?php echo get_the_time();?> <?php _e('-','voyage')?> <?php get_post_count($post->ID); ?> views</small>
          <div class="top-links-image">
           <?php echo get_the_post_thumbnail($post->ID, 'large'); ?>
          </div>
         <?php echo get_the_title(); ?>      
        </a>
      </h3>
      <div class="dirt-thin"></div>
    </li>
    <?php } ?>
    <?php endforeach;?>  
  </ol>
</aside>
<!--**********************
    Most Popular Post Area End
**************************-->
<?php endif;?>
