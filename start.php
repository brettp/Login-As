<?php
/**
 * Provides an entry in the user hover menu for admins to login as the user.
 */

register_elgg_event_handler('init', 'system', 'login_as_init');

/**
 * Init
 */
function login_as_init() {
	global $CONFIG;

	// user hover menu and topbar links.
	elgg_extend_view('profile/menu/adminlinks', 'login_as/user_menu_entry');
	elgg_extend_view('elgg_topbar/extend', 'login_as/topbar_return');
	elgg_extend_view('css', 'login_as/css');

	$action_path = dirname(__FILE__) . '/actions/';
	register_action('login_as', FALSE, $action_path . 'login_as.php', TRUE);

	// override the logout action to allow us to logout to the original user.
	register_action('logout', FALSE, $action_path . 'logout.php', FALSE);
}