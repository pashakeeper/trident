<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Trident
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/assets/normalize.min.css">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/assets/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/style.css">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
  <div id="page" class="site">
	<!-- header -->
  <?php $header = get_field('header','option');?>
  <header class="header" id="header">
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-lg-2 col-sm-6 col-6">
          <a href="/" class="logo">
            <img src="<?php echo $header['logo']; ?>" alt="Logo">
          </a>
        </div>
        <div class="col-lg-8 menu_box">
          <?php wp_nav_menu( array(
            'theme_location'  => '',
            'menu'            => 'Main Menu',
            'container'       => 'ul',
            'container_class' => 'menu-{menu-slug}-container',
            'container_id'    => '',
            'menu_class'      => 'nav',
            'menu_id'         => '',
            'echo'            => true,
            'fallback_cb'     => 'wp_page_menu',
            'before'          => '',
            'after'           => '',
            'link_before'     => '',
            'link_after'      => '',
            'items_wrap'      => '<ul id = "%1$s" class = "%2$s">%3$s</ul>',
            'depth'           => 0,
            'walker'          => '',
          ) ); ?>
        </div>
        
        <div class="col-lg-2 col-sm-6 col-6 position-relative">
          <a href="#" class="burger example5"><span></span></a>

          <div class="yellow_box">
            <a href="<?php echo $header['order_header_link']; ?>">
              <b>Order</b> 
              <p>Catalogue</p>
            </a>
          </div>
        </div>
      </div>
    </div>
    <div class="container mobile_container">
      <div class="row">
        <div class="mobile_yellow__box">
          
          <a href="<?php echo $header['order_header_link']; ?>">
            Order trident Catalogue
            <img src="<?php echo get_template_directory_uri();?>/img/arrow-right.svg" alt="Arrow">
          </a>
        </div>
      </div>
    </div>
  </header>
  <!-- end of header -->
