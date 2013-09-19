<!--**********************
    Social Share Right Area Start
**************************-->
<aside class='follow-us'>
  <div>
    <ul id='follow-us-tab' class="follow-us-tabs">
      <li class="active"><a href="#facebook" class="follow-us-link fb" data-toggle="tab"></a></li>
      <li><a href="#twitter" class="follow-us-link twitter" data-toggle="tab"></a></li>
      <li><a href="#pinterest" class="follow-us-link pinterest" data-toggle="tab"></a></li>
      <li><a href="#tumblr2" class="follow-us-link tumblr" data-toggle="tab"></a></li>
      <li><a href="#news" class="follow-us-link news" data-toggle="tab"></a></li>
      <li><a href="#rss" class="follow-us-link rss"data-toggle="tab"></a></li>
    </ul>
  </div>
  <div class="follow-us-content">
    <div class="dirt-thin"></div>
    <div class="follow-us-pane fb active" id="facebook">
      <div id="js-follow-us-fb" data-url="<?php echo ot_get_option( 'facebook_url' )?>"  data-text="<?php echo ot_get_option( 'facebook_name' );?>"></div>
    </div>
    <div class="follow-us-pane twitter " id="twitter">
      <a href="<?php echo ot_get_option( 'twitter_url' )?>" class="twitter-follow-button" data-show-count="true" data-show-screen-name="true" data-lang="en" data-size="large"><?php echo 'Follow'.' @'.ot_get_option( 'twitter_handler' );?></a>
    </div>
    <div class="follow-us-pane pinterest " id="pinterest">
      <a href="<?php echo ot_get_option( 'pinterest_url' )?>"><img src="http://passets-ec.pinterest.com/images/about/buttons/follow-me-on-pinterest-button.png" width="169" height="28" alt="Follow Me on Pinterest" /></a>
    </div>
    <div class="follow-us-pane tumblr2 " id="tumblr2">
      <a href="<?php echo ot_get_option( 'tumblr_url' )?>" title="Share on Tumblr" class=""></a>
    </div>
    <div class="follow-us-pane news" id="news">
      <!-- Begin MailChimp Signup Form -->
      <div id="mc_embed_signup">
        <form action="<?php echo ot_get_option('mailchimp_action_url')?>" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank">
          <div class="mc-field-group">
            <input type="email" value="" placeholder="Email Address" name="EMAIL" class="required email" id="mce-EMAIL">
          </div>
          <div class="mail_submit"><input type="submit" class="more-link" value="Subscribe" name="subscribe" id="mc-embedded-subscribe"></div>
          <div id="mce-responses" class="clear">
            <div class="response" id="mce-error-response" style="display:none"></div>
            <div class="response" id="mce-success-response" style="display:none"></div>
          </div>  
        </form>
      </div>
        <!--End mc_embed_signup-->
    </div> 
    <div class="follow-us-pane rss" id="rss">
      <a href="<?php echo ot_get_option('feed_url')?>" title="Selectism RSS feed" class="rss-feed" target="_blank">RSS Feed</a>
    </div>
    <div class="dirt-thin"></div>
  </div>
</aside>
<!--**********************
    Social Share Right Area End
**************************-->