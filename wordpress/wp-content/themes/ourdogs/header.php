<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ) ?>" />
        <?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment_reply' ); ?>
        <?php wp_head(); ?>
    </head>
<body <?php body_class(); ?>>
  <header class="header">
    <div class="container">
    <div class="header__wrapper">
      <a href="/" class="logo"><h2>Our dogs <3</h2></a>
      <nav class="navigation">
        <?php
          wp_nav_menu( array(
              'menu'           => 9,
              'menu_id'        => 'primary-menu',
              'menu_class'	 => 'navigation-container', 
          ) );
        ?>
      </nav>
    </div>
    </div>
  </header>