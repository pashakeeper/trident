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
        <h2>
          <?php the_title(); ?>
        </h2>

        <?php $categories2 = get_categories([
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
        </form>
      </div>
    </div>
    <div class="row galery_row">
      <div class="loader">
        <div class="spinner-border" role="status">
          <span class="sr-only">Loading...</span>
        </div>
      </div>
      <?php
      $args = array(
        'posts_per_page' => -1,
        'post_type' => 'product',
        'category_name' => '',
      );

      $all_posts = array();

      $the_query = new WP_Query($args);

      if ($the_query->have_posts()):

        while ($the_query->have_posts()):
          $the_query->the_post();
          ?>
          <?php
          $fields = get_field('galery_images'); foreach ($fields as $field): ?>
            <div class="col-lg-4">
              <div class="galery_box">
                <img data-fancybox="<?php echo $field['galery_image']; ?>" src="<?php echo $field['galery_image']; ?>" alt="">
              </div>
            </div>

          <?php endforeach; ?>

          <?php array_push($all_posts, $fields); endwhile;
        wp_reset_postdata();
      endif; ?>
    </div>
  </div>
</section>
<!-- end of galery section -->






<?php get_footer(); ?>