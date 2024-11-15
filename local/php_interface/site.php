<?

use \Bas\Pict;

function changeSvgFill($fileName)
{
    global $GLOBALS;
    $file = $_SERVER["DOCUMENT_ROOT"] . '/local/assets/svgColorTheme/' . $fileName . '.svg';
    if (filesize($file) > 0) {
        $a = file_get_contents($file);
        $a = preg_replace('/fill="(.*?)"/', 'fill="' . $GLOBALS['SITE_INFO']['COLOR_THEME']['VALUE'] . '"', $a);
        file_put_contents($file, $a);
    } else {
        $b = file_get_contents($_SERVER["DOCUMENT_ROOT"] . '/local/assets/img/svgReserve/' . $fileName . '.svg');
        $a = preg_replace('/fill="(.*?)"/', 'fill="' . $GLOBALS['SITE_INFO']['COLOR_THEME']['VALUE'] . '"', $b);
        file_put_contents($file, $a);
    }
}

function getInfoSite()
{
    CModule::IncludeModule("iblock");
    $info = [];
    $element = CIBlockElement::GetProperty(3, 7, [], []);

    while ($prop = $element->Fetch()) :
        //echo '<pre>'; var_dump($prop); echo '</pre>';
        $info[$prop['CODE']] = ['VALUE' => $prop['VALUE']/* , '~VALUE' => $prop['VALUE']['TEXT'] */, 'VALUE_ENUM' => $prop['VALUE_ENUM'], 'VALUE_XML_ID' => $prop['VALUE_XML_ID']];
    endwhile;
    global $GLOBALS;
    $GLOBALS['SITE_INFO'] = $info;
    changeSvgFill('design1_left');
    changeSvgFill('design2_left');
    changeSvgFill('design1_right');
    changeSvgFill('design2_right');
}


function getLinkSocial($social)
{
    global $GLOBALS;
    if ($social === 'TELEGRAM') {
        return $GLOBALS['SITE_INFO'][$social]['VALUE'];
    } else {
        return str_replace(array('(', ')', '-', '+', ' '), '', $GLOBALS['SITE_INFO'][$social]['VALUE']);
    }
}

function getPhoneLinkNumber()
{
    global $GLOBALS;
    return str_replace(array('(', ')', '-', ' '), '', $GLOBALS['SITE_INFO']['PHONE_NUMBER']['VALUE']);
}


function getSiteImgSrc($name, $type = 'src')
{
    global $GLOBALS;

    $img = CFile::GetFileArray($GLOBALS['SITE_INFO'][$name]['VALUE']);
    if (!$img) return;
    $webp = Pict::getWebp($img, 100);
    if ($type == 'webp') {
        return $webp['WEBP_SRC'];
    } else {
        return $webp['SRC'];
    }
}

function toWebpImgElements($array)
{
    foreach ($array as $key => $item) :

        $imgPreview = $item['PREVIEW_PICTURE'];
        $webpPreview = Pict::getWebp($imgPreview, 100);
        $imgDetail = $item['DETAIL_PICTURE'];

        $webpDetail = Pict::getWebp($imgDetail, 100);
        $array[$key]['WEBP_DETAIL_SRC'] = $webpDetail['WEBP_SRC'];
        $array[$key]['WEBP_PREVIEW_SRC'] = $webpPreview['WEBP_SRC'];
    endforeach;
    return $array;
}

function toWebpImgElement($fields)
{

    $imgPreview = CFile::GetFileArray($fields['PREVIEW_PICTURE']);
    $webpPreview = Pict::getWebp($imgPreview, 100);
    $imgDetail = CFile::GetFileArray($fields['DETAIL_PICTURE']);

    $webpDetail = Pict::getWebp($imgDetail, 100);
    $fields['WEBP_DETAIL_SRC'] = $webpDetail['WEBP_SRC'];
    $fields['WEBP_PREVIEW_SRC'] = $webpPreview['WEBP_SRC'];
    return $fields;
}



function getPhotosSalon()
{
    CModule::IncludeModule("iblock");
    $element = CIblockElement::GetProperty(3, 7, [], ['CODE' => 'PHOTOS_SALON']);
    while ($prop = $element->GetNext()) {
        $photos[] = $prop['VALUE'];
    }
    foreach ($photos as $key => $photo) :
        /* $img = CFile::GetFileArray($photo);
        if (!$img) return;
        $webp = Pict::getWebp($img, 100);
        $photosSRC[] = ['WEBP_SRC' => $webp['WEBP_SRC'], 'SRC' => $webp['SRC']]; */
        $src = CFile::GetPath($photo);
        if (!$src) return;
        $photosSRC[] = ['SRC' => $src];
    endforeach;
    return $photosSRC;
}

function getWaterMarkArray()
{
    if ($GLOBALS['SITE_INFO']['WATERMARK']['VALUE_ENUM'] == 'Y') {
        $arWaterMark = array(
            array(
                "name" => "watermark",
                "position" => "center", // Положение
                "type" => "image",
                "size" => "real",
                'alpha_level' => $GLOBALS['SITE_INFO']['WATERMARK_OPACITY']['VALUE'] ? $GLOBALS['SITE_INFO']['WATERMARK_OPACITY']['VALUE'] : 50,
                "file" => $_SERVER["DOCUMENT_ROOT"] . CFile::GetPath($GLOBALS['SITE_INFO']['WATERMARK_IMG']['VALUE']), // Путь к картинке
                "fill" => "resize",
            )
        );
        return $arWaterMark;
    } else {
        return false;
    }
}
