<?php

/**

 * Template Name: Galery Page Template

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

<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/nice-select.min.css">

<?php get_header(); ?>



<!-- Galery section  -->

<section class="galery_section">

  <div class="container">

    <div class="row">

      <div class="col-lg-12 d-flex flex-wrap align-items-center">

        <h1><?php the_title(); ?></h1>
        <div class="breadcrumbs w-100 mt-4 mb-0">
          <?php wp_breadcrumbs(); ?>
        </div>



        <!-- <?php $categories2 = get_categories([

          'taxonomy' => 'category',

          'parent' => '3',

          'hide_empty' => false,

          'orderby' => 'ASD',

        ]); ?>

        <form method="post" class="d-flex m-0" action="" id="categoryfilter">

          <div class="model_filter">

            <select name="model" id="model_filter">

              <option name="model" value="0">Chose model</option>

              <?php foreach ($categories2 as $category2): ?>+

                <option value="<?php echo $category2->slug ?>"><?php echo $category2->name ?></option>

              <?php endforeach; ?>

            </select>

          </div>

          <?php $categories1 = get_categories([

            'taxonomy' => 'category',

            'parent' => '4',

            'orderby' => 'name',

            'order' => 'ASC',

            'hide_empty' => 0,

          ]); ?>

          <div class="interior_filter">

            <select name="interior" id="interior_filter">

              <option name="interior" value="0">Choose interior</option>

              <?php foreach ($categories1 as $category1): ?>

                <option value="<?php echo $category1->slug ?>"><?php echo $category1->name ?></option>

              <?php endforeach; ?>

            </select>

          </div>

        </form> -->

      </div>

    </div>
    <h2>Model</h2>
    
    <div class="galery_slider">

      <?php

      $args = array(

        'posts_per_page' => -1,

        'post_type' => 'product',

        'category_name' => 'model',

      );



      $all_posts = array();



      $the_query = new WP_Query($args);



      if ($the_query->have_posts()):



        while ($the_query->have_posts()):

          $the_query->the_post();

          
          ?>
          <div class="row galery_row">
            <?php

            $fields = get_field('galery_images'); 

            foreach ($fields as $field['galery_image']): 
              foreach ($field['galery_image'] as $galery_img):
                ?>
                <div class="col-lg-4">

                  <div class="galery_box">

                    <img data-fancybox="gallery" data-caption="<?php echo $galery_img['description']; ?>" src="<?php echo $galery_img['url']; ?>" alt="">

                  </div>

                </div>
              <?php endforeach; ?>
            <?php endforeach; ?>


          </div>

        <?php  endwhile;

        wp_reset_postdata();

      endif; ?>
    </div>
    <h2 class="mt-5">Interior</h2>
    
    <div class="galery_slider">

      <?php

      $args = array(

        'posts_per_page' => -1,

        'post_type' => 'product',

        'category_name' => 'interior',

      );



      $all_posts = array();



      $the_query = new WP_Query($args);



      if ($the_query->have_posts()):



        while ($the_query->have_posts()):

          $the_query->the_post();

          
          ?>
          <div class="row galery_row">
            <?php

            $fields = get_field('galery_images'); 

            foreach ($fields as $field['galery_image']): 
              foreach ($field['galery_image'] as $galery_img):
                ?>
                <div class="col-lg-4 col-sm-6">

                  <div class="galery_box">

                    <img data-fancybox="gallery" data-caption="<?php echo $galery_img['description']; ?>" src="<?php echo $galery_img['url']; ?>" alt="">

                  </div>

                </div>
              <?php endforeach; ?>
            <?php endforeach; ?>


          </div>

        <?php  endwhile;

        wp_reset_postdata();

      endif; ?>
    </div>


  </div>

</section>

<!-- end of galery section -->













<?php get_footer(); ?>