<?php

/**
 * Template for the Icon Component.
 *
 * @package PetarBjelicaInfinum
 */

use PetarBjelicaInfinumVendor\EightshiftLibs\Helpers\Components;

$manifest = Components::getManifest(__DIR__);
$iconUse = Components::checkAttr('iconUse', $attributes, $manifest);

if (!$iconUse) {
	return;
}

$componentClass = $manifest['componentClass'] ?? '';
$additionalClass = $attributes['additionalClass'] ?? '';
$blockClass = $attributes['blockClass'] ?? '';
$selectorClass = $attributes['selectorClass'] ?? $componentClass;

$iconName = Components::checkAttr('iconName', $attributes, $manifest);

$iconClass = Components::classnames([
	Components::selector($componentClass, $componentClass),
	Components::selector($blockClass, $blockClass, $selectorClass),
	Components::selector($additionalClass, $additionalClass),
]);

?>
<i class="<?php echo esc_attr($iconClass); ?>">
	<?php echo $manifest['icons'][$iconName]; // phpcs:ignore Eightshift.Security.ComponentsEscape.OutputNotEscaped ?>
</i>
