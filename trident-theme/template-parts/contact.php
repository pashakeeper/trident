<?php

/**

 * Template Name: Contact Us Template

 *

 * Description: A page template that provides a key component of WordPress as a CMS

 * by meeting the need for a carefully crafted introductory page. The front page template

 * in Twenty Twelve consists of a page content area for adding text, images, video --

 * anything you'd like -- followed by front-page-only widgets in one or two columns.

 *

 * @package WordPress

 */

?>

<?php get_header(); ?>



<!-- Map section -->

<section class="map_section" id="map_section">

  <iframe

  src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d20309.075323923767!2d30.4721233!3d50.4851493!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sru!2sua!4v1675958291324!5m2!1sru!2sua"

  width="600"

  height="450"

  style="border: 0"
  allowfullscreen=""
  loading="lazy"
  referrerpolicy="no-referrer-when-downgrade"

  ></iframe>

  <div class="container">

    <div class="row align-items-center">

      <div class="col-lg-7 ml-auto pr-0">

        <div class="map_box">

          <?php the_content(); ?>

          <a href="#" class="read_more"

          >Get request <img src="<?php echo get_template_directory_uri();?>/img/arrow_white.svg" alt=""

          /></a>

        </div>

      </div>

    </div>

  </div>

</section>

<!-- end of map section -->



<!-- form  -->

<section class="form_section" id="form_section">

  <div class="container">

    <div class="row">

      <div class="col-lg-9 ml-auto mr-auto order_form__box">

        <div class="form_header">

          <h2>Leave a request and we will contact you</h2>

          <p>

            A Trident garden room can transform your garden into a place

            that you <br />

            will use all year round, also adding

          </p>

        </div>  

        <div class="form_container">

          <?php echo do_shortcode('[contact-form-7 id="56" title="Contact us"]') ?>

          <a href="#" class="privacy_policy">You can read our Privacy Policy here</a>

        </div>  

      </div>

    </div>

  </div>

</section>

<!-- end of form  -->



<?php get_footer(); ?>