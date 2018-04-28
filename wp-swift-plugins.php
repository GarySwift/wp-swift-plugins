<?php
/*
Plugin Name:  WP Swift: Plugins
Description: Description
Plugin URI: http://#
Author: Gary Swift
Author URI: https://github.com/wp-swift-wordpress-plugins
Version: 1.0
License: GPL2
Text Domain: Text Domain
Domain Path: Domain Path
*/

require_once plugin_dir_path( __FILE__ ) . 'repos.php';
require_once plugin_dir_path( __FILE__ ) . 'thickbox.php';
 

class WPSwiftPlugins {
	private $wp_swift_plugins_options;
	private $plugin_name = 'wp-swift-plugins';

	public function __construct() {
		add_action( 'admin_menu', array( $this, 'wp_swift_plugins_add_plugin_page' ) );
		add_action( 'admin_init', array( $this, 'enqueue_styles' ) );
		add_action( 'admin_init', array( $this, 'enqueue_scripts' ) );
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		$css_version = filemtime( plugin_dir_path( __FILE__ ) . 'admin/css/wp-swift-plugins.css' );	
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'admin/css/wp-swift-plugins.css', array(), $css_version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		$js_version = filemtime( plugin_dir_path( __FILE__ ) . 'admin/js/wp-swift-plugins.js' );
		echo wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'admin/js/wp-swift-plugins.js', array( 'jquery' ), $js_version, false );
		wp_enqueue_script( $handle='wp-swift-syntax-prettify', 'https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js', $deps=null, $ver=null, $in_footer=true );

	}	

	/**
	 * Register the top level memu page
	 *
	 * @since    1.0.0
	 */
	public function wp_swift_plugins_add_plugin_page() {
		$icon = 'admin/images/icon.png';//plugin_dir_path( __FILE__ ) . 
		add_menu_page(
			'WP Swift Plugins', // page_title
			'WP Swift', // menu_title
			'manage_options', // capability
			'wp-swift-plugins', // menu_slug
			array( $this, 'wp_swift_plugins_create_admin_page' ), // function
			plugins_url( $icon, __FILE__ ),//'dashicons-admin-generic', // icon_url
			100 // Position range of 5-100
		);
		add_submenu_page( 
			'plugins.php',
			'WP Swift Plugins', // page_title
			'WP Swift', // menu_title
			'manage_options', 
			'wp-swift-plugins',
			array( $this, 'wp_swift_plugins_create_admin_page' ) // function
		);
	}

	public function wp_swift_plugins_create_admin_page() {
		$repos = wp_swift_get_repos();
		$action = admin_url( 'admin.php?page=wp-swift-plugins' );
		$plugin_dir = plugin_dir_path(dirname(__FILE__));
		add_thickbox();
		if (isset($_POST["wp-swift-git-repo"])) {
			foreach ($_POST["wp-swift-git-repo"] as $key => $repo) {
				$this->download_plugin( $repo );
			}
		}
		?>

		<div class="wrap">
			<h2>WP Swift Plugins</h2>
			<p>All of the pluins listed below are available on github at the <a href="https://github.com/wp-swift-wordpress-plugins" target="_blank">WP Swift WordPress Plugins</a> account.</p>

			<div id="count-repos"><?php echo count($repos) ?> Items</div>

			<form method="post" name="wp-swift-git-repo-form" id="wp-swift-git-repo-form" action="<?php echo $action; ?>">
				<table class="wp-swift-plugins">

					<thead>
						<tr>
							<th class="checkbox"><input type="checkbox" id="wp-swift-plugins-select-all"></th>
							<th class="plugin">Plugin</th>
							<th class="description">Description</th>
						</tr>			
					</thead>

					<tbody>

					<?php foreach ($repos as $key => $repo): ?>
						<?php $installed = file_exists( $plugin_dir.$key); ?>

						<tr class="<?php echo $installed ? 'installed':'not-installed'; ?>">
							<td class="checkbox">
								<?php if ( !$installed ): ?>
									<input type="checkbox" name="wp-swift-git-repo[]" value="<?php echo $key ?>" class="wp-swift-git-repo-checkbox">
								<?php else: ?>
									<input type="checkbox" disabled>
								<?php endif ?>
							</td>
							<td class="plugin"><?php echo $repo["title"] ?>
								<?php if ($installed): ?>
									<br>
									<small class="installed">Installed</small>
								<?php endif ?>
							</td>
							<td class="description"><?php echo $repo["description"] ?>
								<br>
								<span class="by">By </span><a href="#">Gary Swift</a>						
								<?php if (isset($repo["url"])): ?>
 									&#x7c; <a href="<?php echo $repo["url"] ?>" target="_blank">Plugin Page</a>								
								<?php endif;
								if (isset($repo["thickbox"])):
									wp_swift_thickbox( $repo );
								endif ?>
							</td>
						</tr>
						
					 <?php endforeach ?>

				 	</tbody>
				</table>
			</form>

			<button type="submit" class="button button-primary" form="wp-swift-git-repo-form" value="Submit">Download Plugins</button>
			<p>Activate plugins on the <a href="<?php echo admin_url('plugins.php'); ?>">plugin page</a>.</p>

		</div>
	<?php }
}
if ( is_admin() )
	$wp_swift_plugins = new WPSwiftPlugins();

/* 
 * Retrieve this value with:
 * $wp_swift_plugins_options = get_option( 'wp_swift_plugins_option_name' ); // Array of All Options
 * $input_0 = $wp_swift_plugins_options['input_0']; // Input
 */
