<?php
/**
 * Trident functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Trident
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function trident_setup()
{
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Trident, use a find and replace
	 * to change 'trident' to the name of your theme in all the template files.
	 */
	load_theme_textdomain('trident', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support('title-tag');

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__('Primary', 'trident'),
		)
	);

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'trident_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height' => 250,
			'width' => 250,
			'flex-width' => true,
			'flex-height' => true,
		)
	);
}
add_action('after_setup_theme', 'trident_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function trident_content_width()
{
	$GLOBALS['content_width'] = apply_filters('trident_content_width', 640);
}
add_action('after_setup_theme', 'trident_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function trident_widgets_init()
{
	register_sidebar(
		array(
			'name' => esc_html__('Sidebar', 'trident'),
			'id' => 'sidebar-1',
			'description' => esc_html__('Add widgets here.', 'trident'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		)
	);
}
add_action('widgets_init', 'trident_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function trident_scripts()
{
	wp_enqueue_style('trident-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_style_add_data('trident-style', 'rtl', 'replace');

	wp_enqueue_script('trident-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'trident_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

add_action('acf/init', 'my_acf_op_init');
function my_acf_op_init()
{

	// Check function exists.
	if (function_exists('acf_add_options_page')) {

		// Register options page.
		$option_page = acf_add_options_page(
			array(
				'page_title' => __('Main Page Settings'),
				'menu_title' => __('Main Page Settings'),
				'menu_slug' => 'theme-general-settings',
				'capability' => 'edit_posts',
				'redirect' => false,
				'icon_url' => 'dashicons-format-aside',
			)
		);
	}
}
add_action('wp_ajax_filterposts', 'ajax_filterposts_handler');
add_action('wp_ajax_nopriv_filterposts', 'ajax_filterposts_handler');

function ajax_filterposts_handler()
{
	$category = esc_attr($_POST['category_name']);

	$args = array(
		'post_type' => 'product',
		'post_status' => 'publish',
		'posts_per_page' => -1,
	);
	if ($category != '0') {
		$args['category_name'] = $category;
	}

	$posts = 'No posts found.';
	
	$the_query = new WP_Query($args);
	if ($the_query->have_posts()):
		while ($the_query->have_posts()):
			$the_query->the_post(); ?>

			<?php
			$fields = get_field('galery_images');
			foreach ($fields as $field): ?>
				<div class="col-lg-4">
					<div class="galery_box">
						<img data-fancybox="<?php echo $field['galery_image']; ?>" src="<?php echo $field['galery_image']; ?>" alt="">
					</div>
				</div>

			<?php endforeach; ?>
			<?php array_push($all_posts, $fields); endwhile;
			wp_reset_postdata();
		else:
			echo 'No posts found';
		endif;

		die();
	}

	add_action('wp_ajax_filtercatalog', 'ajax_filtercatalog_handler');
	add_action('wp_ajax_nopriv_filtercatalog', 'ajax_filtercatalog_handler');

	function ajax_filtercatalog_handler()
	{
		$category = esc_attr($_POST['category_name']);
		$garage = esc_attr($_POST['garage']);
		$area_from = esc_attr($_POST['area_from']);
		$area_to = esc_attr($_POST['area_to']);
		$number_rooms_from = esc_attr($_POST['number_rooms_from']);
		$number_rooms_to = esc_attr($_POST['number_rooms_to']);
		$number_of_bathrooms = esc_attr($_POST['number_of_bathrooms']);
		$currentPage = (get_query_var("paged")) ? get_query_var("paged") : 1;
		$args = array(
			'post_type' => 'product',
			'post_status' => 'publish',
			'paged'          => $currentPage,
			'posts_per_page' => -1,
			'meta_query' => array(
				'relation' => 'AND',
			)
		);	
		

		if ($garage) {
			$args['meta_query'] = array(
				array(
					'key' => 'item_info_item_technical_details_garage',
					'value' => $garage,
					'compare' => '==',
				)	);
		}
		if ($area_from) {
			array_push($args['meta_query'], array(
				array(
					'key' => 'item_info_item_technical_details_usable_area',
					'value' => $area_from,
					'type' => 'numeric',
					'compare' => '>=',
				)
			));
		}
		if ($area_to) {
			array_push($args['meta_query'], array(
				array(
					'key' => 'item_info_item_technical_details_usable_area',
					'value' => $area_to,
					'type' => 'numeric',
					'compare' => '<=',
				)
			));
		}
		if ($number_rooms_from) {
			array_push($args['meta_query'], array(
				array(
					'key' => 'item_info_item_technical_details_number_of_bedrooms',
					'value' => $number_rooms_from,
					'type' => 'numeric',
					'compare' => '>=',
				)
			));
		}
		if ($number_rooms_to) {
			array_push($args['meta_query'], array(
				array(
					'key' => 'item_info_item_technical_details_number_of_bedrooms',
					'value' => $number_rooms_to,
					'type' => 'numeric',
					'compare' => '<=',
				)
			));
		}
		if ($number_of_bathrooms) {
			array_push($args['meta_query'], array(
				array(
					'key' => 'item_info_item_technical_details_number_of_bathrooms',
					'value' => $number_of_bathrooms,
					'type' => 'numeric',
					'compare' => '==',
				)
			));
		}
		if ($category != null) {
			$args['category_name'] = $category;
		}
		$posts = 'No posts found.';

		$the_query = new WP_Query($args);
		$my_post_count = $the_query->post_count;
		if ($the_query->have_posts()):
			while ($the_query->have_posts()):
				$the_query->the_post(); ?>

				<div class="col-lg-6 item_box">
					<img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
					<h3 class="house_name"> <a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a></h3>
					<p class="house_description">
						<?php the_excerpt(); ?>
					</p>
				</div>

			<?php  endwhile;?>
			<?php if ($my_post_count > 1): ?>
			<!-- <div class="pagination">
				<?php
				$pagenum_link = html_entity_decode( get_pagenum_link() );
				$url_parts    = explode( '?', $pagenum_link );
				$pagenum_link = trailingslashit( $url_parts[0] ) . '%_%';



				$big = 999999999;
				echo paginate_links( array(
					'base'               => $pagenum_link,
					'format' => '?paged=%#%',
					'current' => max( 1, get_query_var('paged') ),
					'total' => $the_query->max_num_pages,
					'mid_size'           => 1,
					'end_size'           => 0,
					'prev_text' => '<i class="fa fa-angle-left"></i>',
					'next_text' => '<i class="fa fa-angle-right"></i>'
				) );
				?>
			</div> -->
		<?php endif; 
		wp_reset_postdata(); ?> 
		<?php else:
			echo 'No posts found';
		endif;

		die();
	}


	add_action('wp_ajax_sortbyprice', 'ajax_sortbyprice_handler');
	add_action('wp_ajax_nopriv_sortbyprice', 'ajax_sortbyprice_handler');

	function ajax_sortbyprice_handler()
	{
		$sortbyprice = esc_attr($_POST['sortbyprice']);
		$args = array(
			'post_type' => 'product',
			'post_status' => 'publish',
			'posts_per_page' => -1,
			'order' => 'ASC',
			'orderby' => 'item_price',
			'meta_query' => array(
				'relation' => 'AND',
			)
		);
		array_push($args['meta_query'], array(
			array(
				'key' => 'item_price',
				'value' => array(1, 999999999),
				'type' => 'numeric',
				'compare' => 'BETWEEN',
			)
		));
		// array_push($args['meta_query'], array(
		// 	array(
		// 		'key' => 'item_price',
		// 		'value' => '10000000000',
		// 		'type' => 'numeric',
		// 		'compare' => '<=',
		// 	)
		// ));
		if ($category != null) {
			$args['category_name'] = $category;
		}
		$posts = 'No posts found.';

		$the_query = new WP_Query($args);
		if ($the_query->have_posts()):
			while ($the_query->have_posts()):
				$the_query->the_post(); ?>

				<div class="col-lg-6 item_box">
					<img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
					<h3 class="house_name"> <a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a></h3>
					<p class="house_description">
						<?php the_excerpt(); ?>
					</p>
				</div>

			<?php  endwhile;
			wp_reset_postdata();
		else:
			echo 'No posts found';
		endif;

		die();
	}
