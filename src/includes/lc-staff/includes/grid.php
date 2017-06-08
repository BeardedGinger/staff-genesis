<?php
/**
 * The Staff Grid front-end template.
 *
 * @package staff-genesis
 */

$position = false;

if ( function_exists( 'get_field' ) ) {
	$position = get_field( 'position' );
}
?>

<div class="staff-member">

	<div class="staff-member__headshot">
		<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'lc-sg-headshot' ); ?></a>
	</div>

	<div class="staff-member__info">
		<a class="staff-member__info__name" href="<?php the_permalink(); ?>">
			<?php the_title(); ?>
		</a>
		<?php
		if ( $position ) {
			echo '<span class="staff-member__info__position">' . esc_attr( $position ) . '</span>';
		}
		?>
	</div>

</div>
