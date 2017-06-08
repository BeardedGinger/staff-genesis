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
	 * Instance of this class.
	 *
	 * @var object
	 */
	protected static $instance;

	/**
	 * Used for getting an instance of this class
	 *
	 * @since 0.1.0
	 */
	public static function instance() {
		if ( empty( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Register the CPTs and Taxonomies
	 */
	public function __construct() {

		$this->set_cpt_variables();
		$this->set_tax_variables();

		register_via_cpt_core(
			array(
				$this->cpt_singular,
				$this->cpt_plural,
				$this->cpt_slug,
			),
			array(
				'menu_icon'          => 'dashicons-groups',
				'publicly_queryable' => true,
				'hierarchical'       => false,
				'rewrite'            => array( 'slug' => 'staff' ),
				'supports'           => array( 'title', 'editor', 'thumbnail', 'genesis-cpt-archives-settings' ),
			)
		);

		register_via_taxonomy_core(
			array(
				$this->tax_singular,
				$this->tax_plural,
				$this->tax_slug,
			),
			array(),
			array(
				$this->cpt_slug,
			)
		);

	}

	/**
	 * Set the Staff CPT variables.
	 */
	private function set_cpt_variables() {

		$this->cpt_singular = apply_filters( 'staff_genesis_cpt_singular', 'Staff Member' );
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

	/**
	 * Getter for the CPT slug.
	 */
	public function get_cpt_slug() {
		return $this->cpt_slug;
	}

	/**
	 * Getter for the Tax Singular.
	 */
	public function get_tax_singular() {
		return $this->tax_singular;
	}

	/**
	 * Getter for the Tax slug.
	 */
	public function get_tax_slug() {
		 return $this->tax_slug;
	}
}

new Custom_Content();
