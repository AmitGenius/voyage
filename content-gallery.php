<?php
/**
 * The template for displaying posts in the Gallery post format.
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> data-attcount="4">
  <header class="article-header clearfix">
    <div class="topbar">
      <div class="dirt-thick"></div>
      <div class="topbar-body">
        <div class="topbar-header">
         <?php $category = get_the_category();?>
         <?php if($category[0]):?>
          <a href="<?php echo get_category_link($category[0]->term_id )?>" title="<?php echo $category[0]->cat_name;?>" rel="category tag"><?php echo $category[0]->cat_name?></a>
         <?php endif;?> 
        </div> 
        <span class="human-time"><?php echo get_the_time();?></span>
      </div>
      <div class="dirt-thin"></div>
    </div>
    <h2>
      <a href="<?php echo get_permalink(); ?>" title="<?php echo get_the_title(); ?> " rel="bookmark" class="article-headline"><?php echo get_the_title(); ?> </a>
    </h2>
  </header>
  <div class="entry-content clearfix">          
    <div class="thumbnail-container teaser-img">
      <a href="<?php echo get_permalink(); ?>" title="<?php echo get_the_title(); ?>" rel="bookmark">
        <?php echo get_the_post_thumbnail($post->ID, 'thumbnail-container'); ?>
      </a>       
    </div>
    <div class="teaser-copy">
      <div id="" class="ellipsis">
        <?php the_excerpt(); ?> 
      </div>
    </div>
    <span class="socialbar">
      <span class="socialitem">
        <a class="social-link views" href="<?php echo get_permalink(); ?>"><?php get_post_count( $post->ID ); ?></a>
      </span>
      <span class="socialitem">
        <a class="social-link comments" href="<?php echo get_permalink(); ?>"><?php echo get_comments_number( $post->ID);?></a>
      </span>
      <span class="socialitem tm-tweet-wrapper">
        <a href="" class="twitter-share-button" data-text="" data-url="<?php echo get_permalink(); ?>" data-counturl="<?php echo get_permalink(); ?>" data-via="<?php echo ot_get_option( 'twitter_handler' )?>" data-lang="en"></a>
      </span>
      <span class="socialitem tm-fb-like-wrapper">
        <div class="fb-like" data-href="<?php echo get_permalink(); ?>" data-width="100" data-layout="button_count" data-show-faces="false" data-send="false"></div>
      </span>
    </span>
    <a href="<?php echo get_permalink(); ?>" class="more-link"><?php _e('Read more','voyage')?></a>    
  </div><!-- .entry-content -->
</article><!-- #post-## -->