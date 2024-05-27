<?php 
/*
* Display Logo and contact details
*/
?>

<div class="top-home">
  <div class="container">
    <div class="top-header py-3 px-2">  
      <div class="row">
        <div class="col-lg-4 col-md-4 align-self-center">
          <div class="media-links">
            <?php                 
            $film_maker_lite_header_fb_new_tab = esc_attr(get_theme_mod('film_maker_lite_header_fb_new_tab','true'));
            $film_maker_lite_header_twt_new_tab = esc_attr(get_theme_mod('film_maker_lite_header_twt_new_tab','true'));
            $film_maker_lite_header_ins_new_tab = esc_attr(get_theme_mod('film_maker_lite_header_ins_new_tab','true'));
            $film_maker_lite_header_ut_new_tab = esc_attr(get_theme_mod('film_maker_lite_header_ut_new_tab','true'));
            $film_maker_lite_header_pint_new_tab = esc_attr(get_theme_mod('film_maker_lite_header_pint_new_tab','true'));
            ?>
          <?php if( get_theme_mod( 'film_maker_lite_facebook_url' ) != '' || get_theme_mod( 'film_maker_lite_twitter_url' ) != '' || get_theme_mod( 'film_maker_lite_instagram_url' ) != '' || get_theme_mod( 'film_maker_lite_youtube_url' ) != '' || get_theme_mod( 'film_maker_lite_pint_url' ) != '') { ?>
            <span class="pe-md-5 pe-2"><?php esc_html_e('CONNECT WITH US','cinema-theater'); ?></span>
            <?php if( get_theme_mod( 'film_maker_lite_facebook_url' ) != '') { ?>
              <a <?php if($film_maker_lite_header_fb_new_tab != false ) { ?>target="_blank" <?php } ?>href="<?php echo esc_url( get_theme_mod( 'film_maker_lite_facebook_url','' ) ); ?>"><i class="<?php echo esc_attr(get_theme_mod('film_maker_lite_facebook_icon','fab fa-facebook-f')); ?> me-2"></i></a>
            <?php } ?>
            <?php if( get_theme_mod( 'film_maker_lite_twitter_url' ) != '') { ?>
              <a <?php if($film_maker_lite_header_twt_new_tab != false ) { ?>target="_blank" <?php } ?>href="<?php echo esc_url( get_theme_mod( 'film_maker_lite_twitter_url','' ) ); ?>"><i class="<?php echo esc_attr(get_theme_mod('film_maker_lite_twitter_icon','fab fa-twitter')); ?> me-2"></i></a>
            <?php } ?>
            <?php if( get_theme_mod( 'film_maker_lite_instagram_url' ) != '') { ?>
              <a <?php if($film_maker_lite_header_ins_new_tab != false ) { ?>target="_blank" <?php } ?>href="<?php echo esc_url( get_theme_mod( 'film_maker_lite_instagram_url','' ) ); ?>"><i class="<?php echo esc_attr(get_theme_mod('film_maker_lite_instagram_icon','fab fa-instagram')); ?> me-2"></i></a>
            <?php } ?>
            <?php if( get_theme_mod( 'film_maker_lite_youtube_url' ) != '') { ?>
              <a <?php if($film_maker_lite_header_ut_new_tab != false ) { ?>target="_blank" <?php } ?>href="<?php echo esc_url( get_theme_mod( 'film_maker_lite_youtube_url','' ) ); ?>"><i class="<?php echo esc_attr(get_theme_mod('film_maker_lite_youtube_icon','fab fa-youtube')); ?> me-2"></i></a>
            <?php } ?>
            <?php if( get_theme_mod( 'film_maker_lite_pint_url' ) != '') { ?>
              <a <?php if($film_maker_lite_header_pint_new_tab != false ) { ?>target="_blank" <?php } ?>href="<?php echo esc_url( get_theme_mod( 'film_maker_lite_pint_url','' ) ); ?>"><i class="<?php echo esc_attr(get_theme_mod('film_maker_lite_pinterest_icon','fab fa-pinterest')); ?> me-2"></i></a>
            <?php } ?>
          <?php } ?>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 text-center text-md-end align-self-center">
          <?php if( get_theme_mod( 'film_maker_lite_email_address' ) != '') { ?>
            <span class="call-text pe-md-5 pe-2"><?php esc_html_e('EMAIL US','cinema-theater'); ?></span><span><i class="fas fa-envelope me-2"></i><?php echo esc_html( get_theme_mod('film_maker_lite_email_address','')); ?></span>
          <?php } ?>
        </div>
        <div class="col-lg-4 col-md-4 text-center text-md-end align-self-center">
          <?php if( get_theme_mod( 'film_maker_lite_phone_number' ) != '') { ?>
            <span class="call-text pe-md-5 pe-2"><?php esc_html_e('CALL','cinema-theater'); ?></span><span><i class="fas fa-phone-volume me-2"></i><?php echo esc_html( get_theme_mod('film_maker_lite_phone_number','')); ?></span>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</div>