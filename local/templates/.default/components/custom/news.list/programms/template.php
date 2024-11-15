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
	<ul class="programms">
		<? foreach ($arResult["ITEMS"] as $arItem) : ?>
			<? //dump($arItem['WEBP_DETAIL_SRC']);
			?>
			<? ?>
			<?
			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
			?>
			<li class="programms__programm" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
				<div class="spoiler">
					<div class="spoiler__top no-preview-img <? //= mb_strlen($arItem['NAME']) > 11 ? 'no-preview-img' : '' 
															?>">
						<div class="spoiler__top-left spoiler__top-left_programms">
							<div class="programms__preview">
								<? /* if ($arItem['PREVIEW_PICTURE']['SRC']) : ?>
									<div class="programms__preview-img">
										<picture>
											<source srcset="<?= $arItem['WEBP_PREVIEW_SRC'] ?>" type="image/webp"><img src="<?= $arItem['PREVIEW_PICTURE']['SRC'] ?>">
										</picture>
									</div>
								<? endif;  */ ?>
								<h3 class="programms__name"><?= $arItem['NAME'] ?></h3>
								<? if ($arItem['PROPERTIES']['VIP']['VALUE'] || $arItem['PROPERTIES']['HIT']['VALUE']) : ?>
									<ul class="programms__labels">
										<? if ($arItem['PROPERTIES']['VIP']['VALUE']) : ?>
											<li class="programms__label vip">
												<svg>
													<use href="/local/assets/img/icons/icons.svg#vip"></use>
												</svg>
												<span>VIP</span>
											</li>
										<? endif; ?>
										<? if ($arItem['PROPERTIES']['HIT']['VALUE']) : ?>
											<li class="programms__label hit">
												<svg>
													<use href="/local/assets/img/icons/icons.svg#hit"></use>
												</svg>
												<span>HIT</span>
											</li>
										<? endif; ?>
									</ul>
								<? endif; ?>
							</div>
							<ul class="programms__specifications">
								<? if ($arItem['PROPERTIES']['PRICE']['VALUE']) : ?>
									<li class="programms__specification price">
										<svg>
											<use href="/local/assets/img/icons/icons.svg#price"></use>
										</svg>
										<span><?= $arItem['PROPERTIES']['PRICE']['VALUE'] ?></span>
									</li>
								<? endif; ?>
								<? if ($arItem['PROPERTIES']['DURATION']['VALUE']) : ?>
									<li class="programms__specification duration">
										<svg>
											<use href="/local/assets/img/icons/icons.svg#clock"></use>
										</svg>
										<span><?= $arItem['PROPERTIES']['DURATION']['VALUE'] ?></span>
									</li>
								<? endif; ?>
								<? if ($arItem['PROPERTIES']['RELAX']['VALUE']) : ?>
									<li class="programms__specification relax">
										<svg>
											<use href="/local/assets/img/icons/icons.svg#relax"></use>
										</svg>
										<span><?= $arItem['PROPERTIES']['RELAX']['VALUE'] ?></span>
									</li>
								<? endif; ?>
								<? if ($arItem['PROPERTIES']['MASTERS']['VALUE']) : ?>
									<li class="programms__specification masters">
										<svg>
											<use href="/local/assets/img/icons/icons.svg#lips"></use>
										</svg>
										<span><?= $arItem['PROPERTIES']['MASTERS']['VALUE'] ?></span>
									</li>
								<? endif; ?>
							</ul>
						</div>
						<div class="spoiler__top-right"><span></span><span></span></div>
					</div>
					<div class="spoiler__bottom">
						<div class="spoiler__bottom-content">
							<? if ($arItem['DETAIL_PICTURE']['SRC']) : ?>
								<div class="programms__spoiler-img">
									<picture>
										<img data-src="<?= $arItem['PREVIEW_PICTURE']['SRC'] ? $arItem['PREVIEW_PICTURE']['SRC'] :  $arItem['DETAIL_PICTURE']['SRC'] ?>">
									</picture>
									<? if ($arItem['PROPERTIES']['LABELS']['VALUE']) : ?>
										<ul class="labels">
											<? foreach ($arItem['PROPERTIES']['LABELS']['VALUE'] as $label) : ?>
												<li class="labels__label purple">
													<div></div>
													<span><?= $label ?></span>
												</li>
											<? endforeach; ?>
										</ul>
									<? endif; ?>
								</div>
							<? endif; ?>

							<div class="programms__spoiler-detailed">
								<div class="content">
									<?= $arItem['~PREVIEW_TEXT'] ?>
								</div>
								<div class="programms__more-detailed">
									<div class="programms__socials socials ">
										<? if ($GLOBALS['SITE_INFO']['WHATSAPP']['VALUE']) : ?>
											<a class="whatsapp" target="_blank" href="https://wa.me/<?= getLinkSocial('WHATSAPP'); ?>">
												<svg>
													<use href="/local/assets/img/icons/icons.svg#whatsapp"></use>
												</svg>
											</a>
										<? endif; ?>
										<? if ($GLOBALS['SITE_INFO']['TELEGRAM']['VALUE']) : ?>
											<a class="telegram" target="_blank" href="https://t.me/<?= getLinkSocial('TELEGRAM'); ?>">
												<svg>
													<use href="/local/assets/img/icons/icons.svg#telegram"></use>
												</svg>
											</a>
										<? endif; ?>
										<? if ($GLOBALS['SITE_INFO']['VIBER']['VALUE']) : ?>
											<a class="viber" target="_blank" href="viber://chat?number=%2B<?= getLinkSocial('VIBER'); ?>">
												<svg>
													<use href="/local/assets/img/icons/icons.svg#viber"></use>
												</svg>
											</a>
										<? endif; ?>


									</div>
									<a class="programms__more-link" href="<?= $arItem['DETAIL_PAGE_URL'] ?>"><?= $arItem['PROPERTIES']['TEXT_DETAIL_BTN']['VALUE'] ?: 'Программа эротического массажа' ?></a>
								</div>
							</div>
						</div>

					</div>
				</div>
			</li>

		<? endforeach; ?>
	</ul>

	<? if ($arParams['PAGER_SHOW_ALL'] == 'Y' && (($_COOKIE['isMobile'] == 'true' ? intval($arParams['NEWS_COUNT_MOBILE']) : intval($arParams['NEWS_COUNT'])) == count($arResult['ITEMS']))) : ?>
		<a href="/<?= $arResult['CODE'] ?>/" class="btn btn_programms">Все программы</a>
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