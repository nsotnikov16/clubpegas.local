<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);

use \Bas\Pict;

$muteSrc = Pict::getWebp(CFile::GetFileArray($GLOBALS['SITE_INFO']['MUTE_PROMOTION']['VALUE']), 100)['SRC'];
$muteWebpSrc = Pict::getWebp(CFile::GetFileArray($GLOBALS['SITE_INFO']['MUTE_PROMOTION']['VALUE']), 100)['WEBP_SRC'];
?>
<? if (!empty($arResult['ITEMS'])) : ?>
	<section class="section">
		<div class="page__container">
			<ul class="stocks">
				<? foreach ($arResult["ITEMS"] as $arItem) : ?>
					<? //dump($arItem['WEBP_DETAIL_SRC']);
					?>
					<? ?>
					<?
					$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
					$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
					?>
					<li class="stocks__item" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
					
						<div class="stocks__img">
							<picture>
								<img data-src="<?= $arItem['PREVIEW_PICTURE']['SRC'] ? $arItem['PREVIEW_PICTURE']['SRC'] : $muteSrc ?>">
							</picture>
						</div>
						<h4 class="stocks__title"><?= $arItem['NAME'] ?></h4>
						<p class="stocks__subtitle">
							<?= $arItem['PROPERTIES']['PREVIEW']['VALUE'] ?>
						</p>
					</li>

				<? endforeach; ?>
			</ul>
		</div>
	</section>
<? else : ?>
	<section class="section">
		<div class="page__container">
			<h2 class="section__title"><span class="color">Акции отсутствуют</span></h2>
		</div>
	</section>
<? endif; ?>