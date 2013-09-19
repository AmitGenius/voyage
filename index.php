<?php
/**
 * The main template file.
 */

get_header(); ?>
      <?php
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; 
        if($paged==1){
      ?>
      <?php get_template_part('home-slider'); ?>
      <?php get_template_part('frontpage-far-right-static'); ?>
      <?php get_template_part('social-area'); ?>
      <?php get_template_part('frontpage-beneath-left'); ?>
      <?php get_template_part('frontpage-beneath-right'); ?>
      <?php if ( ot_get_option( 'top_far_right_ad' )) { ?>
      <aside class="sponsors">
        <div class="ad-space-125 clearfix">  
             <?php  echo ot_get_option( 'top_far_right_ad' );?>
        </div>
      </aside>
      <?php }?>
      <?php get_template_part('latest-issue');?>
      <?php $below_feature_big_box_ad_choice=ot_get_option( 'below_feature_big_box_ad_choice' );?>
      <?php if (empty( $below_feature_big_box_ad_choice[0] ) ) { ?>
      <div class="ad-container-box">
        <?php if ( ot_get_option( 'below_feature_left_ad' )) { ?>
          <div class="ad-container-highlight">
           <?php  echo ot_get_option( 'below_feature_left_ad' );?>
          </div>
        <?php }?>
        <?php if ( ot_get_option( 'below_feature_right_ad' )) { ?>
          <div class="ad-container-highlight">
           <?php  echo ot_get_option( 'below_feature_right_ad' );?>
          </div>
        <?php }?>
      </div>
       <?php }else{ ?>
          <?php if ( ot_get_option( 'below_feature_big_box_ad' )) { ?>
          <div class="ad-container-box">
          <?php echo ot_get_option('below_feature_big_box_ad'); ?>
          </div>
          <?php } ?>
       <?php } ?> 
      <?php } ?>
      <!--**********************
          Post Area Start
        **************************-->
      <section class="stream clearfix list">
        <?php $per_date='';$i=0;?>
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <?php if($i==0){$first_post=get_permalink();$i++;} ?>
        <?php if(get_the_date()!=$per_date):?>
        <div class="newsfeed-header clearfix">
          <div class="dirt-thick"></div>
          <div class="dirt-thin"></div>
          <div class="newsfeed">
            <h4><?php _e('News on ','voyage').the_date('l, F jS, Y')?></h4>
          </div>
        </div>
    	  <?php endif;?>
        <?php get_template_part( 'content', get_post_format() ); ?>
    	  <?php $per_date=get_the_date();endwhile;endif; ?>
        <!--**********************
          Post Area Start
        **************************-->
        <?php voyage_paging_nav()?>
        <div class="more_posts_2 more-post-container"  style="float: left;"></div>
        <aside class="ad-container-topad mobile">
          <!--ads for mobile-->  
        </aside>
        <a id='view_more_posts' class='view_more_posts' href="#" onClick="_gaq.push(['_trackEvent', 'Homepage', 'Dynamic Load Posts', 'more posts 2']);"><?php _e('+ View More Posts','voyage')?></a>
        <script type='text/javascript'>
        /* <![CDATA[ */
        var fangohr_dynload = {"postType":"post","startPage":"1","maxPages":"5163","nextLink":"<?php echo get_vogaye_next_link(get_next_posts_link( ''));?>","startPostPage":"1","nextPostPageLink":"<?php echo $first_post?>"};
        /* ]]> */
        </script>
      </section>
<?php get_sidebar();?>
<?php get_footer();?>