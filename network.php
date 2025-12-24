<?php
function network_before_render() {
	variables([
		'cdn' => $cdn = subVariable('site-vars', 'live-url') . 'assets/cdn/',
	]);
}

function enrichThemeVars($vars, $what) {
	if (SITENAME == 'real-estate' && nodeIs(SITEHOME))
		$vars['optional-slider'] = getSnippet('home-slider');

	return $vars;
}

variables([
	'email' => 'contact+' . SITENAME . '@aurrrah.com',
	'phone' => '91-91766-86867',
	'whatsapp' => '919176686867',

	'dont-show-current-menu' => true,
	'link-to-site-home' => true,

	'social' => [
		[ 'type' => 'linkedin', 'url' => 'https://www.linkedin.com/in/raveendar/', 'name' => 'Raveendar' ],
	],
]);
