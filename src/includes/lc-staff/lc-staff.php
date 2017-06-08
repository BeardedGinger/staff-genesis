<?php
/**
 * A Module for displaying staff members.
 *
 * @package staff-genesis
 */

/**
 * Define our module.
 */
class LimeCuda_Staff extends FLBuilderModule {

	/**
	 * Constructor function for the module. You must pass the
	 * name, description, dir and url in an array to the parent class.
	 */
	public function __construct() {

		parent::__construct( array(
			'name'          => 'Staff',
			'description'   => 'Display Staff members.',
			'category'		  => 'LimeCuda Modules',
			'dir'           => LIMECUDA_STAFF_GENESIS_PLUGIN_DIR . 'src/includes/lc-staff',
			'url'           => LIMECUDA_STAFF_GENESIS_PLUGIN_URL . 'src/includes/lc-staff',
		) );
	}
}

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module( 'LimeCuda_Staff', array(
	'content' => array(
		'title'    => __( 'Content', 'lc_staff_genesis' ),
		'sections' => array(
			'source' => array(
				'title'  => __( 'Content Source', 'lc_staff_genesis' ),
				'fields' => array(
					'department' => array(
						'label'   => LimeCuda\Staff_Genesis\Custom_Content::instance()->get_tax_singular(),
						'type'    => 'select',
						'options' => lc_staff_department_select_options(),
					),
				),
			),
			'posts' => array(
				'title' => __( 'How Many Staff Members to Display?', 'lc_staff_genesis' ),
				'fields' => array(
					'count' => array(
						'label' => __( 'Number of Staff Members', 'lc_staff_genesis' ),
						'type'  => 'unit',
						'default' => 8,
					),
				),
			),
		),
	),
	'layout' => array(
		'title'    => __( 'Layout', 'lc_staff_genesis' ),
		'sections' => array(
			'layout' => array(
				'title' => __( 'Select Layout', 'lc_staff_genesis' ),
				'fields' => array(
					'layout' => array(
						'type'    => 'select',
						'options' => array(
							'grid' => __( 'Grid', 'lc_staff_genesis' ),
							'carousel' => __( 'Carousel', 'lc_staff_genesis' ),
						),
					),
					'columns' => array(
						'label'   => __( 'Number of Columns', 'lc_staff_genesis' ),
						'type'    => 'unit',
						'default' => 3,
					),
				),
			),
		),
	),
) );
