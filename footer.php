<?php

/**
 * Display footer
 *
 * @package PetarBjelicaInfinum
 */

use PetarBjelicaInfinumVendor\EightshiftLibs\Helpers\Components;

?>

</main>

<?php
echo Components::render( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	'layout-three-columns',
	[
		'layoutThreeColumnsAriaRole' => 'contentinfo',
		'additionalClass' => 'footer',
		'layoutThreeColumnsLeft' => Components::render(
			'copyright',
			[
				'copyrightBy' => esc_html__('Eightshift', 'petar-bjelica-infinum'),
				'copyrightYear' => gmdate('Y'),
				'copyrightContent' => esc_html__('Made with 🧡  by Team Eightshift', 'petar-bjelica-infinum'),
			]
		),
		'layoutThreeColumnsRight' => Components::render(
			'menu',
			[
				'variation' => 'horizontal'
			]
		),
	]
);

wp_footer();
?>
</body>
</html>
