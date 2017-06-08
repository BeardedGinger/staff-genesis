<?php
/**
 * Helper functions for our plugins.
 *
 * @package staff-genesis
 */

/**
 * Get our department terms for select box options.
 *
 * @since 0.1.0
 */
function lc_staff_department_select_options() {

	$taxonomy = LimeCuda\Staff_Genesis\Custom_Content::instance()->get_tax_slug();

	$departments = get_terms( array(
		'taxonomy' => $taxonomy,
	) );

	$department_options = array(
		'all' => __( 'All Staff', 'lc_staff_genesis' ),
	);

	if ( $departments ) {
		foreach ( $departments as $department ) {
			$department_options[ $department->term_id ] = $department->name;
		}
	}

	return apply_filters( 'lc_staff_department_select_options', $department_options );
}
