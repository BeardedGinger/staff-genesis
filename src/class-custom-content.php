<?php
/**
 * Registers the custom post type and taxonomies for our plugin.
 *
 * @package staff-genesis
 */

// We always namespace with our company name.
namespace LimeCuda\Staff_Genesis;

/**
 * Registers the CPTs and Taxonomies for our plugin.
 */
class Custom_Content {

	/**
	 * The Staff CPT Singular.
	 *
	 * @var string
	 */
	protected $cpt_singular;

	/**
	 * The Staff CPT Plural.
	 *
	 * @var string
	 */
	protected $cpt_plural;

	/**
	 * The Staff CPT slug.
	 *
	 * @var string
	 */
	protected $cpt_slug;

	/**
	 * The Department Taxonomy Singular.
	 *
	 * @var string
	 */
	protected $tax_singular;

	/**
	 * The Department Taxonomy Plural.
	 *
	 * @var string
	 */
	protected $tax_plural;

	/**
	 * The Department Taxonomy slug.
	 *
	 * @var string
	 */
	protected $tax_slug;

	/**
	 * Register the CPTs and Taxonomies
	 */
	public function register_custom_content() {

		$this->set_cpt_variables();
		$this->set_tax_variables();

		register_via_cpt_core(

		);

	}

	/**
	 * Set the Staff CPT variables.
	 */
	private function set_cpt_variables() {

		$this->cpt_singular = apply_filters( 'staff_genesis_cpt_singular', 'Staff' );
		$this->cpt_plural   = apply_filters( 'staff_genesis_cpt_plural', 'Staff Members' );
		$this->cpt_slug     = apply_filters( 'staff_genesis_cpt_slug', 'lc-staff' );

	}

	/**
	 * Set the Departments Taxonomy variables.
	 */
	private function set_tax_variables() {

		$this->tax_singular = apply_filters( 'staff_genesis_tax_singular', 'Department' );
		$this->tax_plural   = apply_filters( 'staff_genesis_tax_plural', 'Departments' );
		$this->tax_slug     = apply_filters( 'staff_genesis_tax_slug', 'lc-department' );

	}
}
