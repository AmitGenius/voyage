<?php
/**
 * The Template for displaying all single posts.
 *
 */

get_header(); ?>
<section class="post-page clearfix">
  <?php /* The loop */ ?>
	<?php while ( have_posts() ) : the_post(); ?>
    <?php get_template_part( 'single-page', get_post_format() ); ?>
	<?php endwhile; ?>
	 <script type='text/javascript'>
        /* <![CDATA[ */
        var fangohr_dynload = {"postType":"post","startPage":"1","maxPages":"5163","nextLink":"<?php echo get_vogaye_next_link(get_next_posts_link( ''));?>","startPostPage":"1","nextPostPageLink":"<?php the_permalink()?>"};
        /* ]]> */
        </script>
</section>
<?php get_sidebar();?>
<?php get_footer(); ?>