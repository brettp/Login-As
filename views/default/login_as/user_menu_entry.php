<?php
/**
 * User hover menu entry
 */

$link = elgg_view('output/url', array(
	'href' => "{$vars['url']}action/login_as?user_guid={$vars['entity']->guid}",
	'text' => elgg_echo('login_as:login_as'),
	'is_action' => TRUE
));

echo $link;
