<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

/**
 * @global CMain $APPLICATION
 */

global $APPLICATION;

//delayed function must return a string
if (empty($arResult))
	return "";

$strReturn = '';

//we can't use $APPLICATION->SetAdditionalCSS() here because we are inside the buffered function GetNavChain()


$strReturn .= '<div class="breadcrumbs">
<hr>
<div class="page__container">
	<ul class="breadcrumbs__list"><li class="breadcrumbs__item">
	<a href="/" class="breadcrumbs__link">Эротический массаж</a>
</li>';

$itemSize = count($arResult);
for ($index = 0; $index < $itemSize; $index++) {
	$title = htmlspecialcharsex($arResult[$index]["TITLE"]);
	$arrow = ($index > 0 ? '<i class="fa fa-angle-right"></i>' : '');

	if ($arResult[$index]["LINK"] <> "" && $index != $itemSize - 1) {
		$strReturn .= '
		<li class="breadcrumbs__item">
			<a href="' . $arResult[$index]["LINK"] . '" class="breadcrumbs__link">' . $title . '</a>
		</li>
			';
	} else {
		$strReturn .= '
		<li class="breadcrumbs__item">
			<p class="breadcrumbs__last">' . $title . '</p>
		</li>
			';
	}
}

$strReturn .= '</ul>
</div>
</div>';

return $strReturn;
