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

		add_filter( 'genesis_attr_entry', array( $this, 'attr_entry' ) );
		add_filter( 'genesis_attr_entry_title', array( $this, 'attr_entry_title' ) );

		add_action( 'genesis_entry_header', array( $this, 'template_defaults' ), 0 );

	}

	/**
	 * Schema - modify the object type..
	 *
	 * @param array $attributes The existing attributes for the section.
	 */
	public function attr_entry( $attributes ) {

		if ( ! is_singular( Custom_Content::instance()->get_cpt_slug() ) )
			return $attributes;

		$attributes['itemtype'] = 'http://schema.org/Person';
		return $attributes;

	}

	/**
	 * Schema - modify the title property.
	 *
	 * @param array $attributes The existing attributes for the section.
	 */
	public function attr_entry_title( $attributes ) {

		if ( ! is_singular( Custom_Content::instance()->get_cpt_slug() ) )
			return $attributes;

		$attributes['itemprop'] = 'name';
		return $attributes;

	}

	/**
	 * Handle the setup/remove of genesis defaults for our page template.
	 */
	public function template_defaults() {

		if ( ! is_singular( Custom_Content::instance()->get_cpt_slug() ) )
			return;

		remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );

		add_action( 'genesis_entry_header',  array( $this, 'headshot'      ), 3 );
		add_action( 'genesis_entry_header',  array( $this, 'position'      ) );
		add_action( 'lc_sg_after_headshot',  array( $this, 'meta'          ) );
		add_action( 'genesis_entry_content', array( $this, 'close_content' ) );

	}

	/**
	 * Output the staff memeber headshot and include markup for controlling layout.
	 */
	public function headshot() {
		?>

			<div class="one-third first">

				<?php
				if ( has_post_thumbnail() ) { ?>

					<div class="headshot">
						<?php the_post_thumbnail(); ?>
					</div>

				<?php
				} ?>

				<?php do_action( 'lc_sg_after_headshot' ); ?>

			</div>

			<div class="two-thirds">

		<?php
		do_action( 'lc_sg_before_bio' );

	}

	/**
	 * Add the position / job title below the staff members name.
	 */
	public function position() {

		if ( ! function_exists( 'get_field' ) )
			return;

		$position = get_field( 'position' );

		if ( $position ) {
			echo '<span class="position" itemprop="jobTitle">' . esc_attr( $position ) . '</span>';
		}
	}

	/**
	 * Add the meta below the staff member image.
	 */
	public function meta() {

		if ( ! function_exists( 'get_field' ) )
			return;

		if ( $email = get_field( 'email' ) ) {
			echo '<span class="email" itemprop="email"><a href="mailto:' . esc_attr( $email ) . '"><i class="fa fa-envelope"></i> ' . esc_attr( $email ) . '</a></span>';
		}

		if ( $phone = get_field( 'phone_number' ) ) {
			echo '<span class="phone" itemprop="telephone"><a href="tel:' . esc_attr( $phone ) . '"><i class="fa fa-phone"></i> ' . esc_attr( $phone ) . '</a></span>';
		}

		do_action( 'lc_sg_after_meta' );
	}

	/**
	 * Close content if we opened if for the headshot.
	 */
	public function close_content() {

		do_action( 'lc_sg_after_bio' );

		if ( has_post_thumbnail() ) {
		?>

			</div>

		<?php
		}

		do_action( 'lc_sg_after_content' );

	}
}
