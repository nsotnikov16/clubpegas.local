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
?>
<? if (!empty($arResult['ITEMS'])) : ?>
	<section class="section">
		<div class="page__container">


			<ul class="articles">
				<? foreach ($arResult["ITEMS"] as $arItem) : ?>
					<?
					$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
					$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
					?>
					<li class="articles__item" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
						<a href="<?= $arItem['DETAIL_PAGE_URL'] ?>" class="articles__img">
							<picture>
								<img data-src="<?= $arItem['PREVIEW_PICTURE']['SRC'] ?>">
							</picture>
						</a>
						<div class="articles__text">
							<a href="<?= $arItem['DETAIL_PAGE_URL'] ?>" class="articles__name"><?= $arItem['NAME'] ?></a>
							<? if ($arItem['PREVIEW_TEXT']) : ?>
								<p class="articles__preview-txt">
									<?= $arItem['PREVIEW_TEXT'] ?>
								</p>
							<? endif; ?>

							<a href="<?= $arItem['DETAIL_PAGE_URL'] ?>" class="articles__more">Читать статью полностью</a>
						</div>
					</li>
				<? endforeach; ?>
			</ul>
		</div>
	</section>
<? endif; ?>