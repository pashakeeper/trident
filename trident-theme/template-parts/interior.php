<?php

/**

 * Template Name: Interior Page Template

 *

 * Description: A page template that provides a key component of WordPress as a CMS

 * by meeting the need for a carefully crafted introductory page. The front page template

 * in Twenty Twelve consists of a page content area for adding text, images, video --

 * anything you'd like -- followed by front-page-only widgets in one or two columns.

 *

 * @package WordPress

 */

?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css"/>
<?php get_header(); ?>



<!-- choose section  -->

<section class="choose_section" id="choose_section">

  <div class="container">

    <div class="row">

      <div class="col-lg-12 d-flex flex-wrap align-items-center pre_header">

        <h2>Interior</h2>

        <p>You can choose design that you like</p>

      </div>

      <?php $interior_box = get_field('interior_box');?>

      <div class="col-lg-12">

        <ul class="nav house_tab" id="myTab" role="tablist">

          <?php foreach($interior_box as $interior_cat): ?>

          <li class="nav-item" role="presentation">

            <a class="nav-link" id="home-tab" data-bs-toggle="tab" data-bs-target="#tab<?php echo $interior_cat['interior_id']; ?>" type="button"

              role="tab" aria-controls="home" aria-selected="true"><?php echo $interior_cat['interior_category']; ?></a>

          </li>

          <?php endforeach; ?>

        </ul>

      </div>

      <div class="col-lg-12">

        <div class="tab-content" id="houseTabs">

        <?php foreach($interior_box as $interior_cont): ?>

          <div class="tab-pane fade" id="tab<?php echo $interior_cont['interior_id']; ?>" role="tabpanel" aria-labelledby="home-tab">

            <div class="row">

              <div class="col-lg-6">

              <?php echo $interior_cont['interior_content']; ?>

              </div>

              <div class="col-lg-6">

                <div class="interior_slider">

                  <?php $interior_slider = $interior_cont['interior_images']; ?>

                  <?php foreach($interior_slider as $interior_slide): ?>

                    <div class="slide">

                      <img data-fancybox="<?php echo $interior_slide['interior_img']; ?>" src="<?php echo $interior_slide['interior_img']; ?>" alt="">

                    </div>

                  <?php endforeach; ?>

                </div>

                <div class="interior_slider_thumb">

                <?php $interior_slider = $interior_cont['interior_images']; ?>

                <?php foreach($interior_slider as $interior_slide): ?>

                    <div class="slide">

                      <img  src="<?php echo $interior_slide['interior_img']; ?>" alt="">

                    </div>

                <?php endforeach; ?>

                </div>

              </div>

            </div>

          </div>

          <?php endforeach; ?>

        </div>

      </div>

    </div>

  </div>

</section>

<!-- end of choose section -->



<?php get_footer(); ?>