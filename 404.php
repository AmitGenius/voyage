<?php
/**
 * The template for displaying 404 pages (Not Found).
 */

get_header(); ?>
<section class="stream author-page clearfix">
	<article>
		<div class="dirt-thick"></div>
		<div class="topbar clearfix">
    		<div class="dirt-thin"></div>   
		    <div class="topbar-body-large">               
		      <div class="topbar-header">Not Found</div>             
		    </div>
    		<div class="dirt-thin"></div>
  		</div>
		<article role="main" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<h2><?php _e( 'This is somewhat embarrassing, isn&rsquo;t it?', 'voyage' ); ?></h2>
			<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'voyage' ); ?></p>
		</article>
	</article>
		 <script type='text/javascript'>
        /* <![CDATA[ */
        var fangohr_dynload = {"postType":"post","startPage":"1","maxPages":"5163","nextLink":"<?php echo get_vogaye_next_link(get_next_posts_link( ''));?>","startPostPage":"1","nextPostPageLink":"<?php the_permalink()?>"};
        /* ]]> */
        </script>
</section>
<?php get_sidebar();?>
<?php get_footer(); ?>