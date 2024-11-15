<?

use \Bas\Pict;

if (!empty($arResult['ITEMS'])) :
    $arResult['ITEMS'] = toWebpImgElements($arResult['ITEMS']);
endif;
