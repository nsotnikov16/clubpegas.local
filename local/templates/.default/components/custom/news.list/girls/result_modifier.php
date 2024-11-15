<?

use \Bas\Pict;
if (!empty($arResult['ITEMS'])) :

    foreach ($arResult['ITEMS'] as $key => $item) :


        $images = [];
        foreach ($item['PROPERTIES']['PHOTOS']['VALUE'] as $photo) {
            $images[] = Pict::getResizeWebp(CFile::GetFileArray($photo), 550, 662, true, 100, getWaterMarkArray());
        };
        $arResult['ITEMS'][$key]['PROPERTIES']['PHOTOS']['IMAGES'] = $images;
    endforeach;

endif;
