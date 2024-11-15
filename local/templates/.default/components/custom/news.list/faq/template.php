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
	<ul class="faq">
		<? foreach ($arResult["ITEMS"] as $arItem) : ?>
			<? //dump($arItem['WEBP_DETAIL_SRC']);
			?>
			<? ?>
			<?
			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
			?>
			<li class="faq__item" id="<?= $this->GetEditAreaId($arItem['ID']); ?>" itemscope itemtype="http://schema.org/Question">
				<div class="spoiler">
					<div class="spoiler__top">
						<div class="spoiler__top-left">
							<h3 class="faq__question color" itemprop="name"><?= $arItem['NAME'] ?></h3>
						</div>
						<div class="spoiler__top-right"><span></span><span></span></div>
					</div>
					<div class="spoiler__bottom">
						<div class="spoiler__bottom-content" itemprop="acceptedAnswer" itemscope itemtype="http://schema.org/Answer">
							<div class="content" itemprop="text">
								<?= $arItem['PROPERTIES']['ANSWER']['~VALUE']['TEXT'] ?>
							</div>
						</div>
					</div>
				</div>
			</li>

		<? endforeach; ?>
	</ul>

	<? if ($arParams['TITLE_BLOCK'] != '') : ?>
		<script>
			const title_<?= $arParams['HIDE_BLOCK_ID'] ?> = document.querySelector('#<?= $arParams['HIDE_BLOCK_ID'] ?> .section__title')
			if (title_<?= $arParams['HIDE_BLOCK_ID'] ?>) title_<?= $arParams['HIDE_BLOCK_ID'] ?>.innerHTML = '<?= $arParams['~TITLE_BLOCK'] ?>'
		</script>
	<? endif; ?>
	<? if ($arParams['SUBTITLE_BLOCK'] != '') : ?>
		<script>
			const subtitle_<?= $arParams['HIDE_BLOCK_ID'] ?> = document.querySelector('#<?= $arParams['HIDE_BLOCK_ID'] ?> .section__subtitle')
			if (subtitle_<?= $arParams['HIDE_BLOCK_ID'] ?>) subtitle_<?= $arParams['HIDE_BLOCK_ID'] ?>.innerHTML = '<?= $arParams['~SUBTITLE_BLOCK'] ?>'
		</script>
	<? endif; ?>

<? else : ?>
	<script>
		const block_<?= $arParams['HIDE_BLOCK_ID'] ?> = document.querySelector('#<?= $arParams['HIDE_BLOCK_ID'] ?>')
		if (block_<?= $arParams['HIDE_BLOCK_ID'] ?>) block_<?= $arParams['HIDE_BLOCK_ID'] ?>.remove()
	</script>
<? endif ?>