<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template.
 */

get_header(); ?>
<section class="stream clearfix list">
	<?php /* The loop */ ?>
	<?php while ( have_posts() ) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="topbar clearfix">
            <div class="dirt-thick"></div>
            <div class="dirt-thin"></div>   
            <div class="topbar-body-large">               
              <h1><?php the_title(); ?></h1>             
            </div>
            <div class="dirt-thin"></div>
        </div>
        <div class="body">
            <?php the_content(); ?>
        </div>
    </article>
    <?php endwhile; ?>
         <script type='text/javascript'>
        /* <![CDATA[ */
        var fangohr_dynload = {"postType":"post","startPage":"1","maxPages":"5163","nextLink":"<?php echo get_vogaye_next_link(get_next_posts_link( ''));?>","startPostPage":"1","nextPostPageLink":"<?php the_permalink()?>"};
        /* ]]> */
        </script>
</section>
<?php get_sidebar();?>
<?php get_footer(); ?>