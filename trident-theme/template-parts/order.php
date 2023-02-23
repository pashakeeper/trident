<?php
/**
 * Template Name: Order Page Template
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

<!-- Order first section -->
<section class="order_first" id="order_first">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h1>Order catalogue</h1>
        <p>
          office at home. The new hybrid model of working may have impacted
          <br />
          your home life and the desire to have a dedicated space, away from
          <br />
          home-life distractions, is no
        </p>
      </div>
    </div>
  </div>
</section>
<!-- end of first section -->

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
          <?php echo do_shortcode('[contact-form-7 id="181" title="Order Form"]') ?>
          <a href="#" class="privacy_policy"
          >You can read our Privacy Policy here</a
          >
        </div>
      </div>
    </div>
  </div>
</section>
<!-- end of form  -->
<?php get_footer(); ?>
