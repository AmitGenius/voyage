<?php
/**
 * The template for displaying single post default.
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
    <div class="posted-on clearfix"><?php _e('By ','voyage')?> <span class="author vcard"><?php the_author_posts_link() ?>
            </span> <?php _e('posted on','voyage')?>
                <time class="entry-date" pubdate><?php the_date('F j, Y')?> <?php echo get_the_time();?></time>
                <div class="dirt-thin"></div>
	  </div>
	</header>
  <div class="body entry-content">
    <div class="body">
      <div class="erb-image-wrapper">
      <?php echo get_the_post_thumbnail($post->ID, 'large'); ?>
      </div>
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