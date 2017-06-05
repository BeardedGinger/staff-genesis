<?php
/**
 * Template adjustments to modify the defaults created by Genesis for our CPT.
 *
 * @package staff-genesis
 */

// We always namespace with our company name.
namespace LimeCuda\Staff_Genesis;

/**
 * Modifications to Staff CPT.
 */
class Template_Adjustments {

	/**
	 * Make our adjustments.
	 */
	public function adjust_it() {

		$custom_content = new Custom_Content();

		if ( is_singular( $custom_content->get_cpt_slug() ) ) {
			add_filter( 'genesis_attr_entry', array( $this, 'attr_entry' ) );
			add_filter( 'genesis_attr_entry_title', array( $this, 'attr_entry_title' ) );
		}

	}

	/**
	 * Schema - modify the object type..
	 *
	 * @param array $attributes The existing attributes for the section.
	 */
	public function attr_entry( $attributes ) {

		$attributes['itemtype'] = 'http://schema.org/Person';
		return $attributes;

	}

	/**
	 * Schema - modify the title property.
	 *
	 * @param array $attributes The existing attributes for the section.
	 */
	public function attr_entry_title( $attributes ) {

		$attributes['itemprop'] = 'name';
		return $attributes;

	}
}
