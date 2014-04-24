<?php
/**
 * Admin functions for the performance post type
 *
 * @author 		ThemeBoy
 * @category 	Admin
 * @package 	SportsPress/Admin/Post Types
 * @version     0.8
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( ! class_exists( 'SP_Admin_CPT' ) )
	include( 'class-sp-admin-cpt.php' );

if ( ! class_exists( 'SP_Admin_CPT_Performance' ) ) :

/**
 * SP_Admin_CPT_Performance Class
 */
class SP_Admin_CPT_Performance extends SP_Admin_CPT {

	/**
	 * Constructor
	 */
	public function __construct() {
		$this->type = 'sp_performance';

		// Admin Columns
		add_filter( 'manage_edit-sp_performance_columns', array( $this, 'edit_columns' ) );
		add_action( 'manage_sp_performance_posts_custom_column', array( $this, 'custom_columns' ), 2, 2 );
		
		// Call SP_Admin_CPT constructor
		parent::__construct();
	}

	/**
	 * Change the columns shown in admin.
	 */
	public function edit_columns( $existing_columns ) {
		$columns = array(
			'cb' => '<input type="checkbox" />',
			'title' => __( 'Label', 'sportspress' ),
			'sp_variable' => __( 'Variable', 'sportspress' ),
		);
		return $columns;
	}

	/**
	 * Define our custom columns shown in admin.
	 * @param  string $column
	 */
	public function custom_columns( $column, $post_id ) {
		switch ( $column ):
			case 'sp_variable':
				global $post;
				echo $post->post_name;
			break;
		endswitch;
	}
}

endif;

return new SP_Admin_CPT_Performance();
