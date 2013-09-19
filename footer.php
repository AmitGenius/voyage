      <?php $above_footer_big_box_ad_choice=ot_get_option( 'above_footer_big_box_ad_choice' );?>            
      <?php if (empty( $above_footer_big_box_ad_choice[0] ) ) { ?>
        <div class="ad-container-box">
          <?php if ( ot_get_option( 'above_footer_left_ad' )) { ?>
            <div class="ad-container-highlight">
             <?php  echo ot_get_option( 'above_footer_left_ad' );?>
            </div>
          <?php }?>
          <?php if ( ot_get_option( 'above_footer_right_ad' )) { ?>
            <div class="ad-container-highlight">
             <?php  echo ot_get_option( 'above_footer_right_ad' );?>
            </div>
          <?php }?>
        </div>
       <?php }else{ ?>
          <?php if ( ot_get_option( 'above_footer_big_box_ad' )) { ?>
          <div class="ad-container-box">
          <?php echo ot_get_option('above_footer_big_box_ad'); ?>
          </div>
          <?php } ?>
       <?php } ?> 
    </div>
    <!--**********************
        Footer Area Start
    **************************-->
    <footer class="global clearfix"  role="contentinfo">
      <div class="container">
        <ol class="footer-network clearfix">
          <li class="network-item">
            <a href="#" class="network-link ir highsnob">Home</a>
            <ul class="network-posts">
              <?php dynamic_sidebar( 'footer-left' ); ?>
            </ul>
          </li>
          <li class="network-item">
            <a href="#" class="network-link selectism ir">Selectism</a>
            <ul class="network-posts">
              <?php dynamic_sidebar( 'footer-right' ); ?>
            </ul>
          </li>         
        </ol>
        <div class="divider clearfix">
          <div class="line"></div>
          <div class="tm-logo"></div>
          <div class="line"></div>
        </div>
        <?php dynamic_sidebar( 'footer-about' ); ?>
      </div>
    </footer><!-- footer -->
     <!--**********************
        Footer Area End
    **************************-->
    <?php wp_footer();?>
  </div> 
</body>
</html>