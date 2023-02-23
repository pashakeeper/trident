<?php
/**
 * Template Name: Card Template
 * Template Post Type: post, page, product
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
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/nice-select.min.css">
<?php get_header(); ?>

<!-- Item section -->
<section class="item_section" id="item_section">
    <div class="container">
        <div class="row main_row">
            <div class="col-lg-6">
                <h2>
                    <?php the_title(); ?>
                </h2>
                <?php the_content(); ?>
            </div>
            <div class="col-lg-6">
                <h2 class="mobile_title">
                    <?php the_title(); ?>
                </h2>
                <div class="interior_slider">
                    <?php $item_slider = get_field('item_slider'); ?>
                    <?php foreach ($item_slider as $item_slide): ?>
                        <div class="slide">
                            <img data-fancybox="<?php echo $item_slide['item_slider_image']; ?>" src="<?php echo $item_slide['item_slider_image']; ?>" alt="" />
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="interior_slider_thumb">
                    <?php foreach ($item_slider as $item_slide): ?>
                        <div class="slide">
                            <img data-fancybox="<?php echo $item_slide['item_slider_image']; ?>"     src="<?php echo $item_slide['item_slider_image']; ?>" alt="" />
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <div class="row video_row">
            <?php $price = get_field('item_price');
            $order_link = get_field('item_order_link');
            ?>
            <div class="col-lg-6 price_box">
                <p class="price">Price: <span>£
                    <?php echo $price; ?>
                </span></p>
                <a href="<?php echo $order_link; ?>" class="read_more_yellow">Order now <img
                    src="<?php echo get_template_directory_uri(); ?>/img/arrow_black.svg" alt="" /></a>
                </div>
                <div class="col-lg-6 video_box">
                    <?php $video_src = get_field('item_video'); ?>
                    <div class="video">
                        <img src="<?php echo $video_src['item_video_image_placeholder'] ?>"
                        data-video="<?php echo $video_src['item_video_source'] ?>" />
                        <div class="play"><img src="<?php echo get_template_directory_uri(); ?>/img/play.svg" alt="" />
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 ">
                    <div class="interior_box">
                        <p class="interior_box__title">Interiors</p>
                        <p class="interior_box__text">
                            Get inspired by our proposals for finishing and interior design
                        </p>
                        <ul class="nav">
                            <?php $interior = get_field('interiors');
                            $interior_photo = $interior['interior_photo']; foreach ($interior_photo as $photo):
                            ?>
                            <li><img data-fancybox="<?php echo $photo['interior_images'] ?>" src="<?php echo $photo['interior_images'] ?>" alt="" /></li>
                        <?php endforeach; ?>
                    </ul>
                    <a href="<?php echo $interior['interior_link']; ?>" class="read_more">See more photos <img
                        src="<?php echo get_template_directory_uri(); ?>/img/arrow_white.svg" alt="" /></a>
                    </div>
                </div>
                <div class="col-lg-6 document_container">
                    <div class="document_box">
                        <h4>Documents</h4>
                        <div class="dwnd_btn__box">
                            <a href="<?php echo $interior['interior_document_floorplans']; ?>" download><img
                                src="<?php echo get_template_directory_uri(); ?>/img/dwnd.svg" alt="" />FLOORPLANS</a>
                                <a href="<?php echo $interior['interior_document_scope_of_works']; ?>" download><img
                                    src="<?php echo get_template_directory_uri(); ?>/img/dwnd.svg" alt="" />SCOPE OF
                                WORKS</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row technical_row">
                    <?php $item_info = get_field('item_info');
                    $technical = $item_info['item_technical_details'];
                    $florplans = $item_info['item_floorplans'];
                    ?>
                    <div class="col-lg-6">
                        <h4>Technical details</h4>
                        <table>
                            <tbody>
                                <tr>
                                    <td>
                                        <img src="<?php echo get_template_directory_uri(); ?>/img/icon_tech1.svg" alt="">
                                        Usable area
                                    </td>
                                    <td>
                                        <?php echo $technical['usable_area'] ?> FT² (86.67 M²)
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <img src="<?php echo get_template_directory_uri(); ?>/img/icon_tech2.svg" alt="">
                                        Number of floors
                                    </td>
                                    <td>
                                        <?php echo $technical['_number_of_floors'] ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <img src="<?php echo get_template_directory_uri(); ?>/img/icon_tech3.svg" alt="">
                                        Number of bedrooms
                                    </td>
                                    <td>
                                        <?php echo $technical['number_of_bedrooms'] ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <img src="<?php echo get_template_directory_uri(); ?>/img/icon_tech4.svg" alt="">
                                        Number of bathrooms
                                    </td>
                                    <td>
                                        <?php echo $technical['number_of_bathrooms'] ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <img src="<?php echo get_template_directory_uri(); ?>/img/icon_tech5.svg" alt="">
                                        Angle of roof pitch
                                    </td>
                                    <td>
                                        <?php echo $technical['angle_of_roof_pitch'] ?>°
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <img src="<?php echo get_template_directory_uri(); ?>/img/icon_tech6.svg" alt="">
                                        Garage
                                    </td>
                                    <td>
                                        <?php echo $technical['garage'] ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-6 document_container__mobile">
                        <div class="document_box">
                            <h4>Documents</h4>
                            <div class="dwnd_btn__box">
                                <a href="<?php echo $interior['interior_document_floorplans']; ?>" download><img
                                    src="<?php echo get_template_directory_uri(); ?>/img/dwnd.svg" alt="" />FLOORPLANS</a>
                                    <a href="<?php echo $interior['interior_document_scope_of_works']; ?>" download><img
                                        src="<?php echo get_template_directory_uri(); ?>/img/dwnd.svg" alt="" />SCOPE OF
                                    WORKS</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <h4>Floorplans</h4>
                            <div class="plans_box">
                                <?php foreach ($florplans as $img): ?>
                                    <div class="plan_box__image">
                                        <img data-fancybox="<?php echo $img['item_floorplans_image'] ?>" src="<?php echo $img['item_floorplans_image'] ?>" alt="">
                                        <img class="plus_icon" src="<?php echo get_template_directory_uri(); ?>/img/plus.svg" alt="">
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="popup">
                    <div class="close"><img src="<?php echo get_template_directory_uri(); ?>/img/close_burger.svg" alt=""></div>
                    <div class="popup_image_box">
                        <img src="" alt="">
                    </div>
                </div>

                <div id="overlay"></div>
            </section>
            <!-- end of item section -->

            <!-- advantages section -->
            <section class="adv_section" id="adv_section">
                <div class="container">

                    <div class="row">
                        <?php $adv_box = get_field('item_advantages_block'); foreach ($adv_box as $adv_item):
                        ?>
                        <div class="col-lg-3">
                            <div class="advantages_box">
                                <img src="<?php echo $adv_item['item_advantages_image'] ?>" alt="" />
                                <?php echo $adv_item['item_advantages_content'] ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <!-- end of advantages section -->

        <!-- options sections -->
        <section class="options_section" id="options_section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <ul class="nav house_tab" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#basicmodel"
                                type="button" role="tab" aria-controls="home" aria-selected="true">Basic Model</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#premiummodel"
                                type="button" role="tab" aria-controls="profile" aria-selected="false">Premium Model</a>
                            </li>
                        </ul>
                        <?php $option_box = get_field('item_models');
                        $basic_model = $option_box['basic_model_info'];
                        $premium_model = $option_box['premium_model_info'];
                        ?>
                        <div class="tab-content" id="houseTabs">
                            <div class="tab-pane fade show active" id="basicmodel" role="tabpanel" aria-labelledby="home-tab">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <table cellpadding="0" cellspacing="0" border="0">
                                            <thead>
                                                <tr>
                                                    <th>Series</th>
                                                    <th>Dimensions, <br> L x W x H (mm)</th>
                                                    <th>External sq.m/Internal <br> sq.m/Terrace sq.m</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <?php echo $basic_model['model_series'] ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $basic_model['model_dimensions_l_x_w_x_h_mm'] ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $basic_model['model_external_sqminternal_sqmterrace_sqm'] ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-lg-4">
                                        <img src="<?php echo $option_box['basic_model_image'] ?>" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="premiummodel" role="tabpanel" aria-labelledby="home-tab">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <table cellpadding="0" cellspacing="0" border="0">
                                            <thead>
                                                <tr>
                                                    <th>Series</th>
                                                    <th>Dimensions, <br> L x W x H (mm)</th>
                                                    <th>External sq.m/Internal <br> sq.m/Terrace sq.m</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <?php echo $premium_model['model_series'] ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $premium_model['model_dimensions_l_x_w_x_h_mm'] ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $premium_model['model_external_sqminternal_sqmterrace_sqm'] ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-lg-4">
                                        <img src="<?php echo $option_box['premium_model_image'] ?>" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end of options section -->



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
                                <img class="download_image" src="<?php echo get_template_directory_uri(); ?>/img/download_image.png"
                                alt="">
                            </div>
                        </div>
                    </div>
                </section>
                <!-- end of download section -->
                <?php
                if (get_post_type($post->ID) == 'product')
                    update_post_meta($post->ID, '_last_viewed', current_time('mysql'));
                ?>
                <?php
                $args = array(
                    'post_type' => 'product',
                    'posts_per_page' => 10,
                    'meta_key' => '_last_viewed',
                    'orderby' => 'meta_value',
                    'order' => 'DESC'
                );
                query_posts($args);
                ?>
                <!-- recently section  -->
                <section class="recently_section" id="recently_section">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <h2>You recently viewed</h2>
                            </div>
                            <div class="col-lg-12 position-relative">

                                <div class="house_slider garden recent">
                                    <?php if (have_posts()): ?>
                                        <?php while (have_posts()):
                                            the_post(); ?>
                                            <div class="slide">
                                                <img data-lazy="<?php echo the_post_thumbnail_url(); ?>"
                                                src="<?php echo the_post_thumbnail_url(); ?>" alt="">
                                                <h3 class="house_name">
                                                    <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
                                                </h3>
                                                <div class="house_description">
                                                    <?php the_excerpt(); ?>
                                                </div>
                                            </div>
                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                    <?php wp_reset_query(); ?>
                                </div>
                                <div class="col-lg-12 position-relative">
                                    <div class="slider_nav">
                                        <div class=" house_prev_garden custom_nav"><i class="fa fa-angle-left"></i></div>
                                        <div class=" house_next_garden custom_nav"><i class="fa fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- end of recently section -->

                <!-- recomendet section -->
                <?php
                $args = array(
                    'post_type' => 'product',
                    'posts_per_page' => 1,
                    'meta_key' => '_last_viewed',
                    'orderby' => 'rand',
                    'order' => 'DESC'
                );
                query_posts($args);
                ?>
                <section class="recomend_section" id="recomend_section">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <h2>We recommended</h2>
                            </div>
                            <div class="col-lg-12 position-relative">
                                <div class="recomend">
                                    <?php if (have_posts()): ?>
                                        <?php while (have_posts()):
                                            the_post(); ?>
                                            <div class="slide">
                                                <img data-lazy="<?php echo the_post_thumbnail_url(); ?>"
                                                src="<?php echo the_post_thumbnail_url(); ?>" alt="">
                                                <h3 class="house_name">
                                                    <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
                                                </h3>
                                                <div class="house_description">
                                                    <?php the_excerpt(); ?>
                                                </div>
                                            </div>
                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                    <?php wp_reset_query(); ?>
                                </div>
                                <div class="col-lg-12 position-relative">
                                    <div class="slider_nav">
                                        <div class=" house_prev_garden_recomend custom_nav"><i class="fa fa-angle-left"></i></div>
                                        <div class=" house_next_garden_recomend custom_nav"><i class="fa fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- end of recomendet section -->

                <?php get_footer(); ?>