<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Trident
 */

?>

    <!-- Footer -->
	<footer class="footer" id="footer">
    <?php $footer = get_field('footer','option');?>
        <div class="container">
          <div class="row">
            <div class="col-lg-3">
              <a href="/" class="footer_logo">
                <img src="<?php echo $footer['footer_logo'] ?>" alt="">
              </a>
              <ul class="info_list">
                <li><i class="fa fa-map-marker-alt"></i><?php echo $footer['adress'] ?></li>
                <li><i class="fa fa-phone-volume"></i><a href="tel:<?php echo $footer['phone_without_white_space'] ?>"><?php echo $footer['phone'] ?></a></li>
                <li><i class="fa fa-envelope"></i><a href="mailto:<?php echo $footer['e-mail'] ?>"><?php echo $footer['e-mail'] ?></a></li>
              </ul>
            </div>
            <div class="col-lg-3 footer_menu__box">
             <?php  
             wp_nav_menu( array(
               'theme_location'  => '',
               'menu'            => 'Footer menu 1',
               'container'       => 'ul',
               'container_class' => '',
               'container_id'    => '',
               'menu_class'      => '',
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
             ) );
              ?>
            </div>
            <div class="col-lg-3 footer_menu__box">
              <?php  
             wp_nav_menu( array(
               'theme_location'  => '',
               'menu'            => 'Footer menu 2',
               'container'       => 'ul',
               'container_class' => '',
               'container_id'    => '',
               'menu_class'      => '',
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
             ) );
              ?>
            </div>
            <div class="col-lg-3 footer_menu__box">
              <?php  
             wp_nav_menu( array(
               'theme_location'  => '',
               'menu'            => 'Footer menu 3',
               'container'       => 'ul',
               'container_class' => '',
               'container_id'    => '',
               'menu_class'      => '',
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
             ) );
              ?>
            </div>
          </div>
          
          <div class="row social_row">
            <div class="col-lg-3">
                  <ul class="nav justify-content-between">
                    <li>© Trident 2023</li>
                    <li><a href="<?php echo $footer['privacy_policy_link'] ?>">Privacy Policy</a></li>
                  </ul>
            </div>
            <div class="col-lg-3 social_nav__box">
                <ul class="nav">
                  <li><a target="_blank" href="<?php echo $footer['facebook'] ?>"><i class="fab fa-facebook-f"></i></a></li>
                  <li><a target="_blank" href="<?php echo $footer['instagram'] ?>"><i class="fab fa-instagram"></i></a></li>
                  <li><a target="_blank" href="<?php echo $footer['youtube'] ?>"><i class="fab fa-youtube"></i></a></li>
                </ul>
            </div>
          </div>
        </div>
      </footer>
    <!-- end of footer -->




    <script src="<?php echo get_template_directory_uri();?>/js/jquery-3.6.3.min.js"></script>
    <script src="<?php echo get_template_directory_uri();?>/js/bootstrap.min.js"></script>
    <script src="<?php echo get_template_directory_uri();?>/js/slick.min.js"></script> 
    <script src="<?php echo get_template_directory_uri();?>/js/jquery.nice-select.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
    <script src="<?php echo get_template_directory_uri();?>/js/script.js"></script>
  </body>
</html>

<?php wp_footer(); ?>

</body>
</html>
