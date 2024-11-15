<?

use \Bas\Pict;

if (!empty($arResult['ITEMS'])) :
     $arResult['ITEMS'] = toWebpImgElements($arResult['ITEMS']);
    /* foreach ($arResult['ITEMS'] as $key => $item) :
        $imgDetail = CFile::GetFileArray($item['DETAIL_PICTURE']);

        $webpDetail = Pict::getResizeWebp($imgDetail, 270, 270, true, 100, false);
        $arResult['ITEMS'][$key]['WEBP_DETAIL_SRC'] = $webpDetail['WEBP_SRC'];
    endforeach; */
endif;
