<?php

/**
 * Main header file
 *
 * @package PetarBjelicaInfinum
 */

use PetarBjelicaInfinumVendor\EightshiftLibs\Helpers\Components;
use PetarBjelicaInfinum\Manifest\Manifest;

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<?php
	// Head Component.
	echo Components::render( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		'head',
		[
			'icon' => apply_filters(Manifest::MANIFEST_ITEM, 'logo.svg'),
		]
	);

	wp_head();
	?>
</head>
<body <?php body_class(); ?>>

<?php
// Header Component.
echo Components::render( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	'layout-three-columns',
	[
		'layoutThreeColumnsHtmlTag' => 'nav',
		'additionalClass' => 'header',
		'layoutThreeColumnsLeft' => Components::render(
			'logo',
			[
				'parentClass' => 'header',
				'logoSrc' => apply_filters(Manifest::MANIFEST_ITEM, 'logo.svg'),
				'logoAlt' => get_bloginfo('name'),
				'logoTitle' => get_bloginfo('name'),
				'logoHref' => get_bloginfo('url'),
			]
		),
		'layoutThreeColumnsRight' => [
			Components::render(
				'menu',
				[
					'variation' => 'horizontal',
					'parentClass' => 'header',
				]
			),
			Components::render('hamburger'),
		]
	]
);

// Menu Drawer Style Component.
echo Components::render( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	'drawer',
	[
		'drawerTrigger' => 'js-hamburger',
		'drawerMenu' => Components::render(
			'menu',
			[
				'variation' => 'vertical',
				'parentClass' => 'drawer',
			]
		),
	]
);
?>

<main class="main-content" id="main-content">
