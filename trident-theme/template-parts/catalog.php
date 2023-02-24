<?php

/**

 * Template Name: Catalog Page Template

 *

 * Description: A page template that provides a key component of WordPress as a CMS

 * by meeting the need for a carefully crafted introductory page. The front page template

 * in Twenty Twelve consists of a page content area for adding text, images, video --

 * anything you'd like -- followed by front-page-only widgets in one or two columns.

 *

 * @package WordPress

 */

?>

<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/nice-select.min.css">

<?php get_header(); ?>



<!-- catalog section  -->

<section class="catalog_section" id="catalog_section">

  <div class="container">

    <div class="row">

      <div class="col-lg-12 d-flex flex-wrap align-items-center pre_header">

        <h2>Catalog</h2>

        <p>You can choose design that you like</p>

        <div class="moblie_triger">

          <div class="mob_filter">FILTER</div>

          <div class="sort">
            Sort by price <div class="fa fa-angle-down"></div>
          </div>

        </div>

      </div>

      <div class="col-lg-3 filter_box">

        <div class="filter_head">Search </div>

        <div class="filter_close"><img src="<?php echo get_template_directory_uri(); ?>/img/close_burger.svg"></div>

        <form method="POST">

          <div class="fiter_header">House type</div>

          <div class="form_box checkboxes">

            <?php $house_type = get_categories([

              'taxonomy' => 'category',

              'parent' => '11',

              'hide_empty' => false,

              'orderby' =>   'ASD',



            ]);

            ?>

            <?php 
            $args = [
              'parent'         => 11,
              'order' => 'ASC',
              'hide_empty' => false,
            ];
            $terms = get_categories($args);?>

            <?php foreach ($terms as $term): ?>             

              <input class="house_type" type="checkbox" id="<?php echo $term->slug ?>" value="<?php echo $term->name ?>" name="<?php echo $term->name ?>">

              <label for="<?php echo $term->slug ?>"><?php echo $term->name ?></label>
            <?php endforeach; ?>

          </div>

          <!-- <div class="fiter_header">Special house designs</div>

          <div class="form_box">

           <?php 
            $args = [
            'parent'         => 12,
            'order' => 'ASC',
            'hide_empty' => false,
            ];
            $terms = get_categories($args);?>

            <?php foreach ($terms as $term): ?>             

            <input class="house_type" type="checkbox" id="<?php echo $term->slug ?>" value="<?php echo $term->name ?>" name="<?php echo $term->name ?>">

            <label for="<?php echo $term->slug ?>"><?php echo $term->name ?></label>
            <?php endforeach; ?>

          </div> -->

          <div class="fiter_header">Usable area</div>

          <div class="form_box range">

            <input type="number" placeholder="From" id="area_from" min="1" max="10000"> - <input id="area_to" type="number" placeholder="To" min="1"

            max="10000">

          </div>

          <div class="fiter_header">Number of rooms</div>

          <div class="form_box range">

            <input type="number" placeholder="From" min="1" id="rooms_from" max="10000"> - <input id="rooms_to" type="number" placeholder="To" min="1"

            max="10000">

          </div>

          <div class="fiter_header">Number of bathrooms</div>

          <div class="form_box num">

            <input type="number" id="number_rooms_to" placeholder="Choose number" min="1" max="100">

          </div>

          <div class="fiter_header">Garage</div>

          <div class="form_box garage">
            <input type="checkbox" id="yes" value="yes">
            <label for="yes">Yes</label>
            <input type="checkbox" id="no" value="NO">
            <label for="no">No</label>

          </div>

          <div class="action_row">

            <a href="#" class="clear">Clear</a>

            <button type="submit" class="filter">Filter</button>

          </div>

        </form>

      </div>

      <div class="col-lg-9">

        <div class="sort">
          Sort by price <div class="fa fa-angle-down"></div>
        </div>

        <div class="row">

          <?php
          $currentPage = (get_query_var("paged")) ? get_query_var("paged") : 1;
          $args = array(

            'posts_per_page' => 2,
            'post_type' => 'product',
            'category_name' => '',
            'paged'          => $currentPage,
            'meta_query' => array(
              'relation' => 'AND',
            )
          );

          $all_posts = array();


          $the_query = new WP_Query($args);
          if ($the_query->have_posts()):



            while ($the_query->have_posts()):

              $the_query->the_post();

              ?>

              <div class="col-lg-6 item_box">

                <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">

                <h3 class="house_name"> <a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a></h3>

                <p class="house_description">

                  <?php the_excerpt(); ?>

                </p>

              </div>

              <?php array_push($all_posts, $fields); endwhile;?>

              <?php wp_reset_postdata(); ?>
              <div class="pagination">
           <?php
           $big = 999999999;
           echo paginate_links( array(
            'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
            'format' => '?paged=%#%',
            'current' => max( 1, get_query_var('paged') ),
            'total' => $the_query->max_num_pages,
            'mid_size'           => 1,
            'end_size'           => 0,
            'prev_text' => '<i class="fa fa-angle-left"></i>',
            'next_text' => '<i class="fa fa-angle-right"></i>'
          ) );
          ?>
        </div>

          <?php  endif; ?>


          </div>
          
      </div>
    </div>
  </div>
</section>

<!-- end of catalog section  -->















<?php get_footer(); ?>