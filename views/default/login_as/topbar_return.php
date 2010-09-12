<?php
/**
 * A topbar link to return to original user.
 */

$original_user_guid = isset($_SESSION['login_as_original_user_guid']) ? $_SESSION['login_as_original_user_guid'] : NULL;

// short circuit view if not logged in as someone else.
if (!$original_user_guid || (!$original_user = get_entity($original_user_guid))) {
	return;
}

$logged_in_user = get_loggedin_user();

$text = sprintf(elgg_echo('login_as:return_to_user'), $logged_in_user->username, $original_user->username);
$url = elgg_add_action_tokens_to_url($vars['url'] . '/action/logout?return=1');

?>
<span class="login_as_return">
<a title="<?php echo $text; ?>" class="login_as_icon" href="<?php echo $url; ?>"><img class="user_mini_avatar" src="<?php echo $logged_in_user->getIcon('topbar'); ?>" alt="<?php echo $text; ?>" /></a>
<a title="<?php echo $text; ?>" class="login_as_arrow" href="<?php echo $url; ?>">&rarr;</a>
<a title="<?php echo $text; ?>" class="login_as_icon" href="<?php echo $url; ?>"><img class="user_mini_avatar" src="<?php echo $original_user->getIcon('topbar'); ?>" alt="<?php echo $text; ?>" /></a>
</span>