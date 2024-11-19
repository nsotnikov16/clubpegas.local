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
			<h2 class="section__title">Другие популярные услуги</h2>
			<ul class="popular">
				<? foreach ($arResult["ITEMS"] as $arItem) : ?>
					<?
					$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
					$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
					?>
					<li class="popular__item" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
						<a href="<?= $arItem['DETAIL_PAGE_URL'] ?>" class="popular__item-link color">
							<?= $arItem['NAME'] ?>
						</a>
					</li>
				<? endforeach; ?>
			</ul>
			<? if ($arParams['LIST_URL'] && ($arParams['PAGER_SHOW_ALL'] == 'Y') && ($arResult['NAV_RESULT']->NavPageNomer < $arResult['NAV_RESULT']->NavPageCount)): ?>
				<a href="<?= $arParams['LIST_URL'] ?>" class="btn btn_programms">Показать все</a>
			<? endif; ?>
		</div>
	</section>
<? endif; ?>