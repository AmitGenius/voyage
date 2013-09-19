<?php 
if(!is_home()){
	?>
	<aside class="sidebar-lead">
      	<div class="topbar clearfix">
      		<div class="dirt-thick"></div> 
      	    <div class="dirt-thin"></div>   
      	    <div class="topbar-body-large">               
      	      <div class="topbar-header"><?php _e('Connect','voyage')?></div>             
      	    </div>
      	   	<div class="dirt-thin"></div>
      	</div>
    </aside>
	<?php
	get_template_part('social-area');?>
  <?php if ( ot_get_option( 'top_far_right_ad' )) { ?>
    <aside class="sponsors">
      <div class="ad-space-125 clearfix">  
           <?php  echo ot_get_option( 'top_far_right_ad' );?>
      </div>
    </aside>
    <?php }?>
<?php }else{  
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; 
    if($paged>1){
    	?>
    	<aside class="sidebar-lead">
	      	<div class="topbar clearfix">
	      		<div class="dirt-thick"></div> 
	      	    <div class="dirt-thin"></div>   
	      	    <div class="topbar-body-large">               
	      	      <div class="topbar-header"><?php _e('Connect','voyage')?></div>             
	      	    </div>
	      	   	<div class="dirt-thin"></div>
	      	</div>
	    </aside>
    	<?php
 		get_template_part('social-area');?>
      <?php if ( ot_get_option( 'top_far_right_ad' )) { ?>
    <aside class="sponsors">
      <div class="ad-space-125 clearfix">  
           <?php  echo ot_get_option( 'top_far_right_ad' );?>
      </div>
    </aside>
    <?php }?>
    <?php    
 	}
}
?>
<?php get_template_part('most-popular');?>
<?php if ( ot_get_option( 'bottom_far_right_ad' )) { ?>
<aside class="sponsors">
  <div class="ad-space-125 clearfix">  
       <?php  echo ot_get_option( 'bottom_far_right_ad' );?>
  </div>
</aside>
<?php }?>