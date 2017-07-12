<?php
/**
 * Frontend display for our staff Beaver Builder module.
 *
 * @package staff-genesis
 */

$args = array(
	'post_type'      => LimeCuda\Staff_Genesis\Custom_Content::instance()->get_cpt_slug(),
	'posts_per_page' => $settings->count,
	'order'          => 'ASC',
	'orderby'        => 'menu_order',
);

if ( 'all' !== $settings->department ) {
	$args['tax_query'] = array(
		array(
			'taxonomy' => LimeCuda\Staff_Genesis\Custom_Content::instance()->get_tax_slug(),
			'field'    => 'term_id',
			'terms'    => $settings->department,
		),
	);
}

$args = apply_filters( 'lc_sg_bb_frontend_query_args', $args );

$staff = new WP_Query( $args );

if ( $staff->have_posts() ) :
	while ( $staff->have_posts() ) : $staff->the_post();

		include $module->dir . 'includes/' . $settings->layout . '.php';

	endwhile;
endif;
