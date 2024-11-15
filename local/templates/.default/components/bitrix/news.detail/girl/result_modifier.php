<?

use \Bas\Pict;


$images = [];
foreach ($arResult['PROPERTIES']['PHOTOS']['VALUE'] as $photo) {
	//$images[] = Pict::getResizeWebp(CFile::GetFileArray($photo), 550, 662, true, 100, getWaterMarkArray());
$images[] = CFile::ResizeImageGet(CFile::GetFileArray($photo), array('width' => 550, 'height' => 662), BX_RESIZE_IMAGE_PROPORTIONAL, true, getWaterMarkArray());
};
$arResult['PROPERTIES']['PHOTOS']['IMAGES'] = $images;
