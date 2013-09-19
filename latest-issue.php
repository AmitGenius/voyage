<!--**********************
    Latest Issue Post Area Start
**************************-->
<?php if ( is_active_sidebar( 'latest-issue' ) ) : ?>
<aside class="latest-issue"> 
  <div class="topbar clearfix">
    <div class="dirt-thin"></div>   
    <div class="topbar">               
      <div class="topbar-header"><?php _e('LATEST ISSUE','voyage');?></div>             
    </div>
    <div class="dirt-thin"></div>
    <div class="latest-container">
      <?php dynamic_sidebar( 'latest-issue' ); ?>
    </div>
  </div>
</aside>
<?php endif; ?>
<!--**********************
    Latest Issue Post Area End
**************************-->