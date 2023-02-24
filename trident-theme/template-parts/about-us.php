<?php

/**

 * Template Name: About Us Template

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



<!-- about us section-1 -->

<section class="aboutus_section_01" id="aboutus_section_01">

  <div class="container">

    <div class="row">

      <div class="col-lg-6">

        <?php the_content(); ?>

      </div>

      <div class="col-lg-6 pr-0">

        <img class="image_about_us" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="" />

      </div>

    </div>

  </div>

</section>

<!-- end of about us section-1 -->



<!-- advantages section -->

<?php $small_boxes = get_field('smallboxes');?>

<section class="adv_section" id="adv_section">

  <div class="container">

    <div class="row">

      <?php foreach($small_boxes as $adv_box): ?>

      <div class="col-lg-3">

        <div class="advantages_box">

          <img src="<?php echo $adv_box["smal_boxes_image"] ?>" alt="" />

          <?php echo $adv_box["smal_boxes_content"] ?>

        </div>

      </div>

      <?php endforeach; ?>

    </div>

  </div>

</section>

<!-- end of advantages section -->



<!-- faq section -->

<?php $small_boxes = get_field('faqbox'); ?>

<section class="faq_section" id="faq_section">

  <div class="container">

    <div class="row align-items-center">

      <div class="col-lg-4 faq_image_box">

        <img src="<?php echo $small_boxes['faq_image']; ?>" alt="" class="faq_img" />

      </div>

      <div class="col-lg-8 faq_side">

        <h2>FAQ</h2>

        <div class="accordion" id="accordionExample">

        <?php foreach($small_boxes["faq_item"] as $faq_itm): ?>

          <div class="accordion-item">

            <div class="faq_title collapsed" class="accordion-button" type="button" data-bs-toggle="collapse"

              data-bs-target="#collapse<?php echo $faq_itm['faqid'] ?>" aria-expanded="true" aria-controls="collapseOne">

              <?php echo $faq_itm['faq_question'] ?>

            </div>

            <div id="collapse<?php echo $faq_itm['faqid'] ?>" class="accordion-collapse collapse" aria-labelledby="headingOne"

              data-bs-parent="#accordionExample">

              <div class="accordion-body"><?php echo $faq_itm['faq_answer'] ?></div>

            </div>

          </div>

          <?php endforeach; ?>

        </div>

      </div>

    </div>

  </div>

</section>

<!-- end of faq section -->



<!-- download section -->

<?php $download_block = get_field('download_block', 'option'); ?>

<section class="download_section" id="download_section">

  <div class="container">

    <div class="row">

      <div class="col-lg-5">

        <?php echo $download_block['download_text'] ?>

        <a href="<?php echo $download_block['download_link_order'] ?>" class="read_more">Order now <img

            src="<?php echo get_template_directory_uri(); ?>/img/arrow_white.svg" alt=""></a>

      </div>

      <div class="col-lg-7 d-flex align-items-center justify-content-center">

        <a href="<?php echo $download_block['download_file'] ?>" class="download" download><img

            src="<?php echo get_template_directory_uri(); ?>/img/download_icon.svg" alt=""></a>

        <img class="download_image" src="<?php echo get_template_directory_uri(); ?>/img/download_image.png" alt="">

      </div>

    </div>

  </div>

</section>

<!-- end of download section -->



<?php get_footer(); ?>