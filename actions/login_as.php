<?php
/**
 * Login as the specified user
 *
 * Sets a flag in the session to let us know who the originally logged in user is.
 */

$user_guid = get_input('user_guid', 0);
$original_user_guid = get_loggedin_userid();

if (!$user = get_entity($user_guid)) {
	register_error(elgg_echo('login_as:unknown_user_guid'));
	forward(REFERER);
}

if (login($user)) {
	$_SESSION['login_as_original_user_guid'] = $original_user_guid;
	system_message(sprintf(elgg_echo('login_as:logged_in_as_user'), $user->username));
} else {
	register_error(sprintf(elgg_echo('login_as:could_not_login_as_user'), $user->username));
}

forward(REFERER);