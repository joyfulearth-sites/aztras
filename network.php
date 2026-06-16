<?php
function network_before_render() {
	$vars = [];
	//TODO: sync mechanism / beycomp training
	$vars['cdn'] = subVariable('site-vars', 'live-url') . 'assets/cdn/';
	$allLinks = false;

	if (SITENAME == 'real-estate') {
		$vars[VAREmail] = 'vra@aurrra.in';
		$vars[VARMediakit] = '?themecolor=00725B&heading=FEDA15';
		$allLinks = true;
	}

	variables($vars);
	if ($allLinks) variables([
		VARLinkToSectionHome => true,
		'link-to-node-home' => true,
		'link-to-sub-node-home' => true,
	]);
}

function is_page_secure() {
	return variable(VARLocal) && !getQueryParameter('insecure');
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
	VAREmail => plus_email('raveendar1960@gmail.com', 'aztras-' . SITENAME),
	VARPhone  =>  $ph = '+91-91766-86867',
	VARWhatsapp  => whatsapp_clean($ph),
	VARPhone2 =>  $ph = '+91-8148165952',
	VARWhatsapp2 => whatsapp_clean($ph),

	'dont-show-current-menu' => true,
	VARLinkToSiteHome => true,

	'live-cdn' => true, //TODO: HI: find the folder...

	socialBuilder::variableName => socialBuilder::create()
		->addLinkedIn('#todo-raveendar/', 'Raveendar')
		->addGithubGroup()->addUtilityGroup()->getItems()
]);
