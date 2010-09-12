<?php
/**
 * Logout and optionally log back in as original user.
 */

$return = get_input('return', FALSE);
$original_user_guid = isset($_SESSION['login_as_original_user_guid']) ? $_SESSION['login_as_original_user_guid'] : NULL;

// return to original admin
if ($return) {
	$user = get_entity($original_user_guid);

	if (!$user) {
		register_error(elgg_echo('login_as:unknown_user_guid'));
	} else {
		logout();
		if (login($user)) {
			unset($_SESSION['login_as_original_user_guid']);
			system_message(sprintf(elgg_echo('login_as:logged_in_as_user'), $user->username));
		} else {
			register_error(sprintf(elgg_echo('login_as:could_not_login_as_user'), $user->username));
		}
	}
} else {
	$result = logout();
	if ($result) {
		system_message(elgg_echo('logoutok'));
	} else {
		register_error(elgg_echo('logouterror'));
	}
}

forward(REFERER);