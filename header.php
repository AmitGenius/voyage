<!DOCTYPE html>
<!--[if lt IE 7 ]><html dir="ltr" lang="en-US" xmlns:og="http://opengraphprotocol.org/schema/" class="no-js ie ie6 lte7 lte8 lte9"><![endif]-->
<!--[if IE 7 ]><html dir="ltr" lang="en-US" xmlns:og="http://opengraphprotocol.org/schema/" class="no-js ie ie7 lte7 lte8 lte9"><![endif]-->
<!--[if IE 8 ]><html dir="ltr" lang="en-US" xmlns:og="http://opengraphprotocol.org/schema/" class="no-js ie ie8 lte8 lte9"><![endif]-->
<!--[if IE 9 ]><html dir="ltr" lang="en-US" xmlns:og="http://opengraphprotocol.org/schema/" class="no-js ie ie9 lte9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html dir="ltr" lang="en-US" xmlns:og="http://opengraphprotocol.org/schema/" class="no-js"><!--<![endif]-->
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <title><?php wp_title( '|', true, 'right' ); ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1,user-scalable=no"> 
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  <link rel="shortcut icon" href=""  type="image/x-icon"/>
  <link rel="stylesheet" href="<?php echo THEMEROOT?>/style.css" media="(min-width:320px)">
  <!--[if (lt IE 9) & (!IEMobile)]>
    <link rel="stylesheet" href="<?php echo THEMEROOT?>/css/ie.css">
  <![endif]-->
  <script src="<?php echo THEMEROOT?>/js/modernizr-2.5.3.min.js"></script>
  <!--[if lt IE 9]>
    <script src="//html5shiv.googlecode.com/svn/trunk/html5.js" onload="window.ieshiv=true;"></script>
    <script>!window.ieshiv && document.write(unescape('%3Cscript src="<?php echo THEMEROOT?>/js/ieshiv.js"%3E%3C/script%3E'))</script>
  <![endif]-->
  <?php 
    if ( ot_get_option( 'document_header_code' )) { 
      echo ot_get_option( 'document_header_code' );
    }
  ?>
  <?php wp_head();?>
</head>
<body <?php body_class(); ?> >
  <div class="paranoma_containter">
    <div class="paranoma"
      <?php $background_image_choice=ot_get_option( 'background_image_choice' ); ?>
      <?php if ( ! empty( $background_image_choice[0] ) ) { ?>
      style="background-image:url('<?php echo ot_get_option( 'background_image' )?>');" >
      <?php }else{ ?>
        >
      <?php }?>
          <div class="paranoma_long"
            <?php $paranoma_side_image_choice=ot_get_option( 'paranoma_side_image_choice' );?>
            <?php if ( ! empty( $paranoma_side_image_choice[0] ) ) { ?>
              style="background-image:url('<?php echo ot_get_option( 'paranoma_left' )?>');" >
             <?php }else{ ?>
              >
            <?php }?>
          </div>
          <div class="paranoma_fat"
            <?php $paranoma_top_image_choice=ot_get_option( 'paranoma_top_image_choice' );?>            
            <?php if ( ! empty( $paranoma_top_image_choice[0] ) ) { ?>
              style="background-position:center center; background-repeat:no-repeat; background-image:url('<?php echo ot_get_option( 'paranoma_top' )?>');" >
             <?php }else{ ?>
              >
            <?php }?>
          </div>  
          <div class="paranoma_long"
            <?php $paranoma_side_image_choice=ot_get_option( 'paranoma_side_image_choice' );?>            
            <?php if ( ! empty( $paranoma_side_image_choice[0] ) ) { ?>
              style="background-image:url('<?php echo ot_get_option( 'paranoma_right' )?>');" >
             <?php }else{ ?>
              >
            <?php }?>
          </div> 
    </div>
  </div>
  <div id="cmn_wrap" class="">
    <!--**********************
        Header area start
    **************************-->
    <header class="masthead">
      <div class="container clearfix">
        <div class="logo">
          <a  href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home" ><img src="<?php echo IMAGES?>/logo.png"></a>
        </div>
        <nav>
          <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
        </nav> 
      </div>
    </header>
    <div class="main-container clearfix" role="main">