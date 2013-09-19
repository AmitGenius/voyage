<?php
/**
 * The template for displaying Author archive pages.
 */

get_header(); ?>
<section class="stream archive clearfix">
	<?php if ( have_posts() ) : ?>
	<?php
				/* Queue the first post, that way we know
				 * what author we're dealing with (if that is the case).
				 *
				 * We reset this later so we can run the loop
				 * properly with a call to rewind_posts().
				 */
				the_post();
			?>
	<article>
		<div class="topbar clearfix">
			<div class="dirt-thick"></div>
			<div class="dirt-thin"></div>   
			<div class="topbar-body-large">               
			    <div class="topbar-header"><?php _e('Authors','voyage'); ?></div> 
			</div>
			<div class="dirt-thin"></div>
		</div>
		<h1><a class="url fn n author-headline" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) )?>" title="<?php echo esc_attr( get_the_author() ) ?>" rel="me"><?php echo get_the_author() ?></a> </h1>
	</article>
	<?php endif; ?>
	<?php
				/* Since we called the_post() above, we need to
				 * rewind the loop back to the beginning that way
				 * we can run the loop properly, in full.
				 */
				rewind_posts();
	?>
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