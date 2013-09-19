<?php
/**
 * The template for displaying Search Results pages.
 */

get_header(); ?>
<section class="stream list clearfix">
	<article>
		<div class="topbar clearfix">
			<div class="dirt-thick"></div>
			<div class="dirt-thin"></div>   
			<div class="topbar-body-large">               
			    <h1><?php printf( __( 'You\'ve searched for: %s', 'voyage' ), get_search_query() ); ?></h1>             
			</div>
			<div class="dirt-thin"></div>
		</div>
	</article>
	<?php $per_date='';$i=0;?>
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <?php if($i==0){$first_post=get_permalink();$i++;} ?>
    <?php if(get_the_date()!=$per_date):?>
	<div class="newsfeed-header clearfix">
    	<div class="dirt-thick"></div>
    	<div class="dirt-thin"></div>
		<div class="newsfeed"><h4><?php _e('News on ','voyage').the_date('l, F jS, Y')?></h4></div>
    </div>
    <?php endif;?>
    <?php get_template_part( 'content', get_post_format() ); ?>
	<?php $per_date=get_the_date();endwhile;endif; ?>
	<?php voyage_paging_nav()?>
	<a href="#" class="view_more_posts" id="view_more_posts"><?php _e('+ View More Posts','voyage')?></a>
	<script type='text/javascript'>
	/* <![CDATA[ */
	var fangohr_dynload = {"postType":"post","startPage":"1","maxPages":"5163","nextLink":"<?php echo get_vogaye_next_link(get_next_posts_link( ''));?>","startPostPage":"1","nextPostPageLink":"<?php echo $first_post?>"};
	/* ]]> */
	</script>	
</section>
<?php get_sidebar();?>
<?php get_footer(); ?>