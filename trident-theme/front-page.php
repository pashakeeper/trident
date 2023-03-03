<?php

/**
* Template Name: Front Page Template
* 
* Description: A page template that provides a key component of WordPress as a CMS
* by meeting the need for a carefully crafted introductory page. The front page template
* in Twenty Twelve consists of a page content area for adding text, images, video --
* anything you'd like -- followed by front-page-only widgets in one or two columns.
*
* @package WordPress
*/

?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css" />

<?php get_header(); ?>





<?php $main_slider = get_field('main_slider', 'option'); ?>



<!-- slider section -->

<section class="slider_section" id="slider_section">

  <div class="container">

    <div class="row">

      <div class="col-lg-12 p-0">

        <div class="slider">

          <?php foreach ($main_slider as $main_slide): ?>

            <div class="slide">
              <div class="main_slider_image__box">
                <img data-lazy="<?php echo $main_slide['main_slider_image']; ?>"
                src="<?php echo $main_slide['main_slider_image']; ?>" alt="Slide1">
              </div>
              <p class="slide_text">
                <?php echo $main_slide['main_slider_text']; ?>
                <img src="<?php echo get_template_directory_uri(); ?>/img/arrow_white.svg" alt="">
              </p>
              <a href="<?php echo $main_slide['main_slider_link']; ?>" class="read_more">Read more <img src="<?php echo get_template_directory_uri(); ?>/img/arrow_white.svg" alt=""></a>
            </div>

          <?php endforeach; ?>

        </div>

      </div>

      <div class="col-lg-12 p-0 position-relative">

        <div class="slider_nav">

          <div class="prev custom_nav"><i class="fa fa-angle-left"></i></div>

          <div class="next custom_nav"><i class="fa fa-angle-right"></i></div>

        </div>

      </div>

    </div>

  </div>

</section>

<!-- end of slider section -->



<!-- Houses slider tabs -->

<section class="houses_tabs" id="houses_tabs">

  <div class="container">

    <div class="row front_page__row">

      <div class="col-lg-12">
        <?php $catTitle = get_cat_name(22); ?>
        <h2><?php echo $catTitle; ?></h2>

        <ul class="nav house_tab" id="myTab" role="tablist">
          <?php  $terms = get_categories( array( 'parent' => 22, 'hide_empty' => 0 ) );
          ?>
          <?php if( $terms && ! is_wp_error($terms) ): ?>
            <?php foreach($terms as $term): ?>
              <li class="nav-item" role="presentation">

                <a class="nav-link" data-bs-toggle="tab" data-bs-target="#<?php echo $term->slug; ?>" type="button"
                  role="tab" aria-controls="home" aria-selected="true"><?php echo $term->name; ?></a>

                </li>
              <?php endforeach; wp_reset_postdata(); ?>
            <?php endif; ?>

          </ul>



          <div class="tab-content" id="houseTabs">

           <?php foreach ($terms as $termcat): ?>

            <div class="tab-pane fade " id="<?php echo $termcat->slug; ?>" role="tabpanel" aria-labelledby="home-tab">

              <div class="house_slider garden">

                <?php

                $args = array(
                  'posts_per_page' => -1, 
                  'category' => $termcat->term_id,
                  'post_type' => 'product'
                );
                $myposts = get_posts($args); foreach ($myposts as $post):
                setup_postdata($post);
                $price = get_field('item_price');
                $area = get_field('item_info');
                $area_quant = $area['item_technical_details'];
                ?>

                <div class="slide">
                  <a class="front_image__box" href="<?php the_permalink(); ?>">
                    <span class="square_label"><?php echo $area_quant['usable_area']; ?> FT²</span>
                    <img data-lazy="<?php echo get_the_post_thumbnail_url(); ?>"
                    src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
                    <span class="price_label">£<?php echo $price;  ?></span>
                  </a>

                  <h3 class="house_name">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                  </h3>

                  <div class="house_description">
                    <?php the_excerpt(); ?>
                  </div>

                </div>

              <?php endforeach;

              wp_reset_postdata(); ?>

            </div>

            <div class="col-lg-12 position-relative">

              <div class="slider_nav">

                <div class=" house_prev_garden custom_nav"><i class="fa fa-angle-left"></i></div>

                <div class=" house_next_garden custom_nav"><i class="fa fa-angle-right"></i></div>

              </div>

            </div>

          </div>
        <?php endforeach; ?>
      </div>

    </div>

  </div>
  <div class="row front_page__row">

    <div class="col-lg-12">
      <?php $catTitle = get_cat_name(25); ?>
      <h2><?php echo $catTitle; ?></h2>

      <ul class="nav house_tab" id="myTab" role="tablist">
        <?php  $terms = get_categories( array( 'parent' => 25, 'hide_empty' => 0 ) );
        ?>
        <?php if( $terms && ! is_wp_error($terms) ): ?>
          <?php foreach($terms as $term): ?>
            <li class="nav-item" role="presentation">

              <a class="nav-link" data-bs-toggle="tab" data-bs-target="#<?php echo $term->slug; ?>" type="button"
                role="tab" aria-controls="home" aria-selected="true"><?php echo $term->name; ?></a>

              </li>
            <?php endforeach; wp_reset_postdata(); ?>
          <?php endif; ?>

        </ul>



        <div class="tab-content" id="houseTabs">

         <?php foreach ($terms as $termcat): ?>

          <div class="tab-pane fade " id="<?php echo $termcat->slug; ?>" role="tabpanel" aria-labelledby="home-tab">

            <div class="house_slider modular">

              <?php

              $args = array(
                'posts_per_page' => -1, 
                'category' => $termcat->term_id,
                'post_type' => 'product'
              );
              $myposts = get_posts($args); foreach ($myposts as $post):
              setup_postdata($post); 
              $price = get_field('item_price');
              $area = get_field('item_info');
              $area_quant = $area['item_technical_details'];
              ?>

              <div class="slide">
                <a class="front_image__box" href="<?php the_permalink(); ?>">
                  <span class="square_label"><?php echo $area_quant['usable_area']; ?> FT²</span>
                  <img data-lazy="<?php echo get_the_post_thumbnail_url(); ?>"
                  src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
                  <span class="price_label">£<?php echo $price;  ?></span>
                </a>

                <h3 class="house_name">
                  <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h3>

                <div class="house_description">
                  <?php the_excerpt(); ?>
                </div>

              </div>

            <?php endforeach;

            wp_reset_postdata(); ?>

          </div>

          <div class="col-lg-12 position-relative">

            <div class="slider_nav">

              <div class=" house_prev custom_nav"><i class="fa fa-angle-left"></i></div>

              <div class=" house_next custom_nav"><i class="fa fa-angle-right"></i></div>

            </div>

          </div>

        </div>
      <?php endforeach; ?>
    </div>

  </div>

</div>
<div class="row front_page__row">

  <div class="col-lg-12">
    <?php $catTitle = get_cat_name(1); ?>
    <h2><?php echo $catTitle; ?></h2>

    <ul class="nav house_tab" id="myTab" role="tablist">
      <?php  $terms = get_categories( array( 'parent' => 1, 'hide_empty' => 0 ) );
      ?>
      <?php if( $terms && ! is_wp_error($terms) ): ?>
        <?php foreach($terms as $term): ?>
          <li class="nav-item" role="presentation">

            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#<?php echo $term->slug; ?>" type="button"
              role="tab" aria-controls="home" aria-selected="true"><?php echo $term->name; ?></a>

            </li>
          <?php endforeach; wp_reset_postdata(); ?>
        <?php endif; ?>

      </ul>



      <div class="tab-content" id="houseTabs">

       <?php foreach ($terms as $termcat): ?>

        <div class="tab-pane fade " id="<?php echo $termcat->slug; ?>" role="tabpanel" aria-labelledby="home-tab">

          <div class="house_slider third">

            <?php

            $args = array(
              'posts_per_page' => -1, 
              'category' => $termcat->term_id,
              'post_type' => 'product'
            );
            $myposts = get_posts($args); foreach ($myposts as $post):
            setup_postdata($post); 
            $price = get_field('item_price');
            $area = get_field('item_info');
            $area_quant = $area['item_technical_details'];
            ?>

            <div class="slide">
              <a class="front_image__box" href="<?php the_permalink(); ?>">
                <span class="square_label"><?php echo $area_quant['usable_area']; ?> FT²</span>
                <img data-lazy="<?php echo get_the_post_thumbnail_url(); ?>"
                src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
                <span class="price_label">£<?php echo $price;  ?></span>
              </a>

              <h3 class="house_name">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
              </h3>

              <div class="house_description">
                <?php the_excerpt(); ?>
              </div>

            </div>

          <?php endforeach;

          wp_reset_postdata(); ?>

        </div>

        <div class="col-lg-12 position-relative">

          <div class="slider_nav">

            <div class=" third_prev custom_nav"><i class="fa fa-angle-left"></i></div>

            <div class=" third_next custom_nav"><i class="fa fa-angle-right"></i></div>

          </div>

        </div>

      </div>
    <?php endforeach; ?>
  </div>

</div>

</div>

</div>

</section>

<!-- end of houses slider -->





<!-- label section -->

<?php $label_field = get_field('label_section', 'option'); ?>

<section class="label_section" id="label_section">

  <div class="container">

    <div class="custom_row">

      <div class="col-lg-6 p-0">

        <img class="label_image" src="<?php echo $label_field['label_image'] ?>" alt="">

      </div>

      <div class="col-lg-6 p-0">

        <?php echo $label_field['label_content'] ?>

        <a href="<?php echo $label_field['label_read_more_link'] ?>" class="read_more_yellow">Read more <img
          src="<?php echo get_template_directory_uri(); ?>/img/arrow_black.svg" alt=""></a>

        </div>

      </div>

    </div>

  </section>

  <!-- end of label section -->





  <!-- Adv section -->

  <?php $adv_section = get_field('content_section', 'option'); ?>

  <section class="advantages_section" id="advantages_section">

    <div class="container">

      <div class="row">

        <div class="col-lg-6">

          <h2>
            <?php echo $adv_section['contetnt_title'] ?>
          </h2>

          <div class="row ml-0 mr-0 adv_row">

            <?php foreach ($adv_section['content_info_bloks'] as $infoblock): ?>

              <div class="col-lg-6">

                <div class="advant__box">

                  <div class="adv_img__box">

                    <img src="<?php echo $infoblock['content_info_blocks_image'] ?>" alt="">

                  </div>

                  <div class="adv_text__box">

                    <?php echo $infoblock['content_info_blocks_content'] ?>

                  </div>

                </div>

              </div>

            <?php endforeach; ?>

          </div>

        </div>

        <div class="col-lg-6 ml-auto">

          <img class="adv_image w-100" src="<?php echo $adv_section['contetn_right_image'] ?>" alt="">

        </div>

      </div>

    </div>

  </section>



  <!-- end of adv section -->





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



      <!-- transparent section -->

      <?php $tr_slider = get_field('last_slider', 'option'); ?>



      <section class="transparent_section" id="transparent_section">

        <div class="container">

          <div class="row">

            <div class="col-lg-12">

              <div class="tranparent_slider">

                <?php foreach ($tr_slider as $tr_slide): ?>

                  <div class="slide">

                    <div class="slide_box">

                      <img data-fancybox="gallery" data-caption="This is the caption" src="<?php echo $tr_slide['last_slider_image'] ?>" alt="">

                    </div>

                  </div>

                <?php endforeach; ?>

              </div>

              <div class="tr_nav__slider">
                <div class=" tr_nav__prev custom_nav"><i class="fa fa-angle-left"></i></div>
                <div class=" tr_nav__next custom_nav"><i class="fa fa-angle-right"></i></div>
              </div>

            </div>

          </div>

        </div>

      </section>

      <!-- end of transparent section -->





      <!-- Seo Section  -->

      <?php $seo_section = get_field('seo_text', 'option'); ?>

      <section class="seo_section" id="seo_section">

        <div class="container">

          <div class="row">

            <div class="col-lg-12">

              <?php echo $seo_section['seo_content'] ?>

              <p class="hidden">
                <?php echo $seo_section['hidden_text'] ?>
              </p>

              <a href="#" class="more">Read More</a>

              <hr>

            </div>

          </div>

        </div>

      </section>

      <!-- end of seo section -->

      <?php get_footer(); ?>