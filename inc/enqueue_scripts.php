<?php

/**
 * Enqueue scripts and styles.
 */
function mountaviary_scripts()
{

	// enqueue tailwind css 
	wp_register_style('tailwind_css', get_template_directory_uri() . '/dist/output.css', array(), time());
	wp_enqueue_style('tailwind_css');

	// enqueue font-awesome
	wp_register_style('font-awesome-all', get_template_directory_uri() . '/inc/fontawesome-css/all.min.css', array(), '6.5.1');
	wp_enqueue_style('font-awesome-all');

	// enqueue theme stylesheet
	wp_enqueue_style('mountaviary-style', get_stylesheet_uri(), array(), _S_VERSION);

	// Register Montserrat font
	wp_register_style('montserrat_font', 'https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900&display=swap');

	// Register Poppins font
	wp_register_style('poppins_font', 'https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

	// Register Roboto Condensed font
	wp_register_style('roboto_condensed_font', 'https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,100..900&display=swap');

	// Enqueue registered styles
	wp_enqueue_style('montserrat_font');
	wp_enqueue_style('poppins_font');
	wp_enqueue_style('roboto_condensed_font');

	// enqueue dashicons 
	wp_enqueue_style('dashicons');

	wp_enqueue_script('mountaviary_script', get_template_directory_uri() . '/src/scripts.js', array(), _S_VERSION, true);

	if (is_singular() && comments_open() && (get_option('thread_comments'))) {
		wp_enqueue_script('comment-reply');
	}

	// enqueue masonry js
	wp_enqueue_script('imagesloaded', 'https://unpkg.com/imagesloaded@5/imagesloaded.pkgd.min.js', array('custom-masonry'), '5.0.0', true);

	wp_enqueue_script('custom-masonry', 'https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js', array(), '4.2.2', true);


}
add_action('wp_enqueue_scripts', 'mountaviary_scripts');