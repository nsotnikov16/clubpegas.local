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


$strReturn .= '
<script type="application/ld+json">
[{
  "@context": "https://schema.org",
  "@type": "BreadcrumbList",
  "itemListElement": [{
    "@type": "ListItem",
    "position": 1,
    "name": "Эротический массаж",
    "item": "http://' . $_SERVER['SERVER_NAME'] . '"
  },';

$itemSize = count($arResult);
for ($index = 0; $index < $itemSize; $index++) {
    $title = htmlspecialcharsex($arResult[$index]["TITLE"]);
    $arrow = ($index > 0 ? '<i class="fa fa-angle-right"></i>' : '');

    if ($arResult[$index]["LINK"] <> "" && $index != $itemSize - 1) {
        $strReturn .= '{
            "@type": "ListItem",
            "position":' . ($index + 2) . ',
            "name": "' . $title . '",
            "item": "http://' . $_SERVER['SERVER_NAME'] . $arResult[$index]["LINK"] . '"
          },';
    } else {
        $strReturn .= '{
            "@type": "ListItem",
            "position": ' . ($index + 2) . ',
            "name": "' . $title . '"
          }';
    }
}

$strReturn .= ']}]</script>';

return $strReturn;
