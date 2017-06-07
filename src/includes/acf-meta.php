<?php
/**
 * The default ACF powered Meta fields.
 *
 * @package staff-genesis
 */

namespace LimeCuda\Staff_Genesis;

$fields = array(
	array(
		'key' => 'field_59381a28e707f',
		'label' => 'Job Title / Position',
		'name' => 'position',
		'type' => 'text',
		'default_value' => '',
		'placeholder' => '',
		'prepend' => '',
		'append' => '',
		'formatting' => 'html',
		'maxlength' => '',
	),
	array(
		'key' => 'field_59381a40e7080',
		'label' => 'Email',
		'name' => 'email',
		'type' => 'email',
		'default_value' => '',
		'placeholder' => '',
		'prepend' => '',
		'append' => '',
	),
	array(
		'key' => 'field_59381a4be7081',
		'label' => 'Phone Number',
		'name' => 'phone_number',
		'type' => 'text',
		'default_value' => '',
		'placeholder' => '',
		'prepend' => '',
		'append' => '',
		'formatting' => 'html',
		'maxlength' => '',
	),
);

$fields = apply_filters( 'lc_sg_meta_fields', $fields );

if ( function_exists( 'register_field_group' ) ) {

	register_field_group( array(
		'id' => 'acf_staff-information',
		'title' => 'Staff Information',
		'fields' => $fields,
		'location' => array(
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => Custom_Content::instance()->get_cpt_slug(),
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array(
			'position' => 'normal',
			'layout' => 'box',
			'hide_on_screen' => array(
			),
		),
		'menu_order' => 0,
	) );

}
