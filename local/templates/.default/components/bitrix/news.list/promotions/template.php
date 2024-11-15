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
	<div <?= $APPLICATION->GetCurPage(false) !== SITE_DIR ? 'style="display: none;"' : '' ?> class="to-stories">
		<div class="page__container">
			<ul class="to-stories__list">
				<? foreach ($arResult["ITEMS"] as $key => $arItem) : ?>
					<?
					$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
					$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
					?>
					<li id="<?= $this->GetEditAreaId($arItem['ID']); ?>" data-pointer="stories" onclick="stories.onActiveSlide(<?= $key ?>)" class="to-stories__item <?= $key == 0 ? 'for-fixed' : '' ?>">

						<div class="to-stories__img">
							<picture>
								<img src="<?= $arItem['PREVIEW_PICTURE']['SRC'] ? $arItem['PREVIEW_PICTURE']['SRC'] : $muteSrc ?>">
							</picture>
						</div>
						<p class="to-stories__title">
							<?= $arItem['NAME'] ?>
						</p>
					</li>
				<? endforeach; ?>
			</ul>
		</div>
	</div>


	<div id="stories" class="popup">
		<div class="popup__container">
			<div class="popup__content">
				<div class="stories">
					<div class="stories__container">
						<div class="swiper-button-next"></div>
						<div class="swiper-button-prev"></div>
						<div class="stories__progress">
							<? foreach ($arResult["ITEMS"] as $key => $arItem) : ?>
								<div class="stories__progress-block-<?= $key + 1 ?>">
									<span></span>
								</div>
							<? endforeach; ?>
						</div>
						<div class="swiper stories__swiper">
							<div class="swiper-wrapper">
								<? foreach ($arResult["ITEMS"] as $key => $arItem) : ?>
									<div class="swiper-slide" id="<?= $key + 1 ?>">
										<div class="stories__slide-container">
											<div class="stories__preview-img">

												<picture>
													<img src="<?= $arItem['PREVIEW_PICTURE']['SRC'] ? $arItem['PREVIEW_PICTURE']['SRC'] :  $muteSrc ?>">
												</picture>
											</div>
											<h3 class="stories__title color"><?= $arItem['NAME'] ?></h3>
											<p class="stories__subtitle">
												<?= $arItem['PROPERTIES']['PREVIEW']['VALUE'] ?>
											</p>
										</div>
										<a href="tel:<?= getPhoneLinkNumber() ?>" class="btn stories__btn">Позвонить</a>
									</div>
								<? endforeach; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<button class="popup__close"><span>&#10006;</span></button>
		</div>
	</div>





<? endif; ?>