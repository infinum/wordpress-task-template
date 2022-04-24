<?php

/**
 * Template for the Lists Component.
 *
 * @package PetarBjelicaInfinum
 */

use PetarBjelicaInfinumVendor\EightshiftLibs\Helpers\Components;

$globalManifest = Components::getManifest(dirname(__DIR__, 2));
$manifest = Components::getManifest(__DIR__);

$listsUse = Components::checkAttr('listsUse', $attributes, $manifest);
if (!$listsUse) {
	return;
}

$unique = Components::getUnique();

$componentClass = $manifest['componentClass'] ?? '';
$additionalClass = $attributes['additionalClass'] ?? '';
$blockClass = $attributes['blockClass'] ?? '';
$selectorClass = $attributes['selectorClass'] ?? $componentClass;

$listsContent = Components::checkAttr('listsContent', $attributes, $manifest);
$listsOrdered = Components::checkAttr('listsOrdered', $attributes, $manifest);

$listsOrderedOptions = array_map(function ($option) {
	return $option['value'];
}, $manifest['options']['listsOrdered'] ?? []);

if (!in_array($listsOrdered, $listsOrderedOptions, true)) {
	return;
}

$listsClass = Components::classnames([
	Components::selector($componentClass, $componentClass),
	Components::selector($blockClass, $blockClass, $selectorClass),
	Components::selector($additionalClass, $additionalClass),
]);

?>

<<?php echo esc_attr($listsOrdered); ?> class="<?php echo esc_attr($listsClass); ?>" data-id="<?php echo esc_attr($unique); ?>">
	<?php
		echo Components::outputCssVariables($attributes, $manifest, $unique, $globalManifest); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

		echo wp_kses_post($listsContent);
	?>
</<?php echo esc_attr($listsOrdered); ?>>
