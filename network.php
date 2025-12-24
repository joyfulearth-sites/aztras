<?php
function network_before_render() {
	$vars = [];
	$vars['cdn'] = subVariable('site-vars', 'live-url') . 'assets/cdn/';
	$allLinks = false;

	if (SITENAME == 'real-estate') {
		$vars['email'] = 'vra@aurrra.in';
		$vars['mediakit'] = '?themecolor=00725B&heading=FEDA15';
		$allLinks = true;
	}

	variables($vars);
	if ($allLinks) variables([
		'link-to-section-home' => true,
		'link-to-node-home' => true,
		'link-to-sub-node-home' => true,
	]);
}

function is_page_secure() {
	return variable('local') && !getQueryParameter('insecure');
}

function network_before_file() {
	echo variableOr('before_file_html', '');
}

function before_footer_assets() { //before as color needs to be overridden in mediakit
	if (SITENAME == 'real-estate') {
		includeThemeManager();
		echo implode('	', CanvasTheme::HeadCssFor('real-estate')) . NEWLINE;
	}
}

function enrichThemeVars($vars, $what) {
	if ($what == 'header') {
		if (SITENAME == 'real-estate' && nodeIs(SITEHOME))
			$vars['optional-slider'] = getSnippet('home-slider');

		if ($vars['optional-slider'])
			variable('before_file_html', '<div class="m-4"></div>' . NEWLINE); //spacer
	}
	return $vars;
}

variables([
	'email' => 'contact+' . SITENAME . '@aurrrah.com',
	'phone'  =>  '91-91766-86867',
	'whatsapp'  => '919176686867',
	'phone2' =>  '+91-8148165952',
	'whatsapp2' => '918148165952',

	'dont-show-current-menu' => true,
	'link-to-site-home' => true,

	'social' => [
		[ 'type' => 'linkedin', 'url' => 'https://www.linkedin.com/in/raveendar/', 'name' => 'Raveendar' ],
	],
]);
