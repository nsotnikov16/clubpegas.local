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
//dump($arResult);
?>
<? if (!empty($arResult['ITEMS'])) : ?>
	<ul class="girls">
		<? foreach ($arResult["ITEMS"] as $arItem) : ?>
			<? //dump($arItem); 
			?>
			<? $age = $arItem['PROPERTIES']['AGE']['VALUE'];
			$size_breast = $arItem['PROPERTIES']['SIZE_BREAST']['VALUE'];
			$height = $arItem['PROPERTIES']['HEIGHT']['VALUE'];
			$labels = $arItem['PROPERTIES']['LABELS']['VALUE'];
			?>
			<?
			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
			?>
			<li class="girls__girl" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
				<div class="girls__top">
					<a href="<?= $arItem['DETAIL_PAGE_URL'] ?>" class="girls__name"><?= $arItem['NAME'] ?></a>
					<? if ($arItem['PROPERTIES']['NOW']['VALUE'] === 'Y') : ?>
						<p class="girls__now color">сейчас в салоне</p>
					<? endif; ?>
				</div>
				<div class="swiper girls__swiper">
					<? if (is_array($labels) && count($labels) > 0) : ?>
						<ul class="labels">
							<? foreach ($labels as $label) : ?>
								<li class="labels__label purple">
									<div></div>
									<span><?= $label ?></span>
								</li>
							<? endforeach; ?>
						</ul>
					<? endif; ?>
					<div class="swiper-wrapper">
						<? foreach ($arItem['PROPERTIES']['PHOTOS']['VALUE'] as $key => $image) : ?>
							<? if ($key <= 4) : ?>
								<div class="swiper-slide">

									<a href="<?= $arItem['DETAIL_PAGE_URL'] ?>" class="girls__photo">
										<picture>
											<img data-src="<?= CFile::GetPath($image) ?> ">
										</picture>
									</a>
								</div>
							<? endif; ?>
							<? if ($key == 5) : ?>
								<div class="swiper-slide">
									<a href="<?= $arItem['DETAIL_PAGE_URL'] ?>" class="girls__photo">
										<picture>
											<img data-src="<?= CFile::GetPath($image) ?>">
										</picture>
									</a>
									<? if ((count($arItem['PROPERTIES']['PHOTOS']['IMAGES']) - 6) > 0) : ?>
										<a href="<?= $arItem['DETAIL_PAGE_URL'] ?>" class="girls__more">
											<div class="girls__camera"></div>
											<p>Еще <?= count($arItem['PROPERTIES']['PHOTOS']['IMAGES']) - 6 ?> фото</p>
										</a>
									<? endif; ?>
								</div>
							<? endif; ?>
						<? endforeach; ?>
					</div>
					<div onclick="location.assign('<?= $arItem['DETAIL_PAGE_URL'] ?>')" class="swiper-pagination"></div>
				</div>
				<? if ($age || $size_breast || $height) : ?>
					<div class="girls__bottom">
						<? if ($age) : ?>
							<p>Возраст: <?= $age ?></p>
						<? endif; ?>
						<? if ($size_breast) : ?>
							<p>Грудь: <?= $size_breast ?></p>
						<? endif; ?>
						<? if ($height) : ?>
							<p>Рост: <?= $height ?></p>
						<? endif; ?>
					</div>
				<? endif; ?>
			</li>
		<? endforeach; ?>
	</ul>

	<? if ($arParams['PAGER_SHOW_ALL'] == 'Y' && (($_COOKIE['isMobile'] == 'true' ? intval($arParams['NEWS_COUNT_MOBILE']) : intval($arParams['NEWS_COUNT'])) == count($arResult['ITEMS']))) : ?>
		<a href="/<?= $arResult['CODE'] ?>/" class="btn btn_girls">Все мастера салона</a>
	<? endif; ?>

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
	<? if ($arParams['HIDE_BLOCK_ID'] != '') : ?>
		<script>
			const block_<?= $arParams['HIDE_BLOCK_ID'] ?> = document.querySelector('#<?= $arParams['HIDE_BLOCK_ID'] ?>')
			if (block_<?= $arParams['HIDE_BLOCK_ID'] ?>) block_<?= $arParams['HIDE_BLOCK_ID'] ?>.remove()
		</script>
	<? endif; ?>
<? endif ?>