<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content-aa">
 *
 * @package Township Lite
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width">
  <link rel="profile" href="<?php echo esc_url( __( 'http://gmpg.org/xfn/11', 'township-lite' ) ); ?>">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?> class="main-bodybox">
  <?php if ( function_exists( 'wp_body_open' ) ) {
    wp_body_open();
  } else {
    do_action( 'wp_body_open' );
  }?>

  <?php if(get_theme_mod('township_lite_preloader_hide',false)!= '' || get_theme_mod('township_lite_responsive_preloader_hide',false) != ''){ ?>
    <?php if(get_theme_mod( 'township_lite_preloader_type','center-square') == 'center-square'){ ?>
      <div class='preloader'>
        <div class='preloader-squares'>
          <div class='square'></div>
          <div class='square'></div>
          <div class='square'></div>
          <div class='square'></div>
        </div>
      </div>
    <?php }else if(get_theme_mod( 'township_lite_preloader_type') == 'chasing-square') {?>
      <div class='preloader'>
        <div class='preloader-chasing-squares'>
          <div class='square'></div>
          <div class='square'></div>
          <div class='square'></div>
          <div class='square'></div>
        </div>
      </div>
    <?php }?>
  <?php }?>
  
  <header role="banner" id="header">
    <a class="screen-reader-text skip-link" href="#main"><?php esc_html_e( 'Skip to content', 'township-lite' ); ?><span class="screen-reader-text"><?php esc_html_e( 'Skip to content', 'township-lite' );?></span></a>
    <div class="container">
      <div class="row">
        <div class="logo col-lg-6 col-md-6 py-3 align-self-center">
          <?php if ( has_custom_logo() ) : ?>
            <div class="site-logo"><?php the_custom_logo(); ?></div>
          <?php endif; ?>
          <?php if( get_theme_mod( 'township_lite_site_title',true) != '') { ?>
            <?php $blog_info = get_bloginfo( 'name' ); ?>
            <?php if ( ! empty( $blog_info ) ) : ?>
              <?php if ( is_front_page() && is_home() ) : ?>
                <h1 class="site-title p-0"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
              <?php else : ?>
                <p class="site-title m-0"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
              <?php endif; ?>
            <?php endif; ?>
          <?php }?>
          <?php if( get_theme_mod( 'township_lite_site_tagline',true) != '') { ?>
            <?php
            $description = get_bloginfo( 'description', 'display' );
            if ( $description || is_customize_preview() ) :?>
              <p class="site-description m-0">
                <?php echo esc_html($description); ?>
              </p>
            <?php endif; ?>
          <?php }?>
        </div>
        <div class="col-lg-6 col-md-6 align-self-center">
          <div class="top-contact pt-3 align-self-center">
            <?php if( get_theme_mod( 'township_lite_contact','' ) != '') { ?>
              <span class="call ms-2"><a href="tel:<?php echo esc_attr( get_theme_mod('township_lite_contact')); ?>"><i class="fa fa-phone me-1" aria-hidden="true"></i><?php echo esc_html( get_theme_mod('township_lite_contact','' )); ?></a></span>
             <?php } ?>
             <?php if( get_theme_mod( 'township_lite_email','' ) != '') { ?>
              <span class="email_corporate ms-2"><a href="mailto:<?php echo esc_attr( get_theme_mod('township_lite_email')); ?>"><i class="fa fa-envelope me-1" aria-hidden="true"></i><?php echo esc_html( get_theme_mod('township_lite_email','') ); ?></a></span>
            <?php } ?>
          </div>
          <div class="social-media my-2 align-self-center">
            <?php if( get_theme_mod( 'township_lite_youtube_url' ) != '') { ?>
              <a href="<?php echo esc_url( get_theme_mod( 'township_lite_youtube_url','' ) ); ?>"><i class="fab fa-youtube ms-3" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_html_e( 'Youtube', 'township-lite' );?></span></a>
            <?php } ?>
            <?php if( get_theme_mod( 'township_lite_facebook_url' ) != '') { ?>
              <a href="<?php echo esc_url( get_theme_mod( 'township_lite_facebook_url','' ) ); ?>"><i class="fab fa-facebook-f ms-3" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_html_e( 'Facebook', 'township-lite' );?></span></a>
            <?php } ?>
            <?php if( get_theme_mod( 'township_lite_twitter_url' ) != '') { ?>
              <a href="<?php echo esc_url( get_theme_mod( 'township_lite_twitter_url','' ) ); ?>"><i class="fab fa-twitter ms-3" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_html_e( 'Twitter', 'township-lite' );?></span></a>
            <?php } ?>
            <?php if( get_theme_mod( 'township_lite_rss_url' ) != '') { ?>
              <a href="<?php echo esc_url( get_theme_mod( 'township_lite_rss_url','' ) ); ?>"><i class="fas fa-rss ms-3" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_html_e( 'RSS', 'township-lite' );?></span></a>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
    <div class="menubox nav <?php if( get_theme_mod( 'township_lite_sticky_header') != '') { ?> sticky-header"<?php } else { ?>close-sticky <?php } ?>">
      <div class="container">
        <div class="mainmenu">
		      <div class="toggle-menu responsive-menu p-1">
            <button role="tab" onclick="township_lite_menu_open()"><i class="<?php echo esc_html(get_theme_mod('township_lite_responsive_open_menu_icon','fas fa-bars')); ?> py-1 px-2"></i><span class="screen-reader-text"><?php esc_html_e('Open Menu','township-lite'); ?></span></button>
          </div>
          <div id="menu-sidebar" class="nav side-menu">
            <nav id="primary-site-navigation" class="primary-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'township-lite' ); ?>">
              <?php 
                wp_nav_menu( array( 
                  'theme_location' => 'primary',
                  'container_class' => 'main-menu-navigation clearfix' ,
                  'menu_class' => 'clearfix',
                  'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
                  'fallback_cb' => 'wp_page_menu',
                ) ); 
              ?>
              <a href="javascript:void(0)" class="closebtn responsive-menu" onclick="township_lite_menu_close()"><i class="<?php echo esc_html(get_theme_mod('township_lite_responsive_close_menu_icon','fas fa-times'));?>"></i><span class="screen-reader-text"><?php esc_html_e('Close Menu','township-lite'); ?></span></a>
            </nav>
          </div>
        </div>
      </div>
    </div>
    <div class="clear"></div>
  </header>