<?php
/**
 * Result Details
 *
 * @author 		ThemeBoy
 * @category 	Admin
 * @package 	SportsPress/Admin/Meta Boxes
 * @version     0.7
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * SP_Meta_Box_Result_Details
 */
class SP_Meta_Box_Result_Details {

	/**
	 * Output the metabox
	 */
	public static function output( $post ) {
		wp_nonce_field( 'sportspress_save_data', 'sportspress_meta_nonce' );
		?>
		<p><strong><?php _e( 'Variable', 'sportspress' ); ?></strong></p>
		<p>
			<input name="sp_default_variable" type="hidden" id="sp_default_variable" value="<?php echo $post->post_name; ?>">
			<input name="sp_variable" type="text" id="sp_variable" value="<?php echo $post->post_name; ?>">
		</p>
		<?php
	}

	/**
	 * Save meta box data
	 */
	public static function save( $post_id, $post ) {
		sp_delete_duplicate_post( $_POST );
	}
}