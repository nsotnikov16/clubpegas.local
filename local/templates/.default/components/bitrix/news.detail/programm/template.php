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

$vip = $arResult['PROPERTIES']['VIP']['VALUE'];
$hit = $arResult['PROPERTIES']['HIT']['VALUE'];
$img = Pict::getWebp($arResult['DETAIL_PICTURE'], 100);
/* foreach ($arResult['PROPERTIES']['ADDITIONALLY']['VALUE'] as $i) : */
$dop = CIBlockElement::GetList([], ['IBLOCK_ID' => 7], false, false, []);
while ($res = $dop->GetNextElement()) :
	$fields = $res->GetFields();
	$props = $res->GetProperties();
	$additionally[] = ['NAME' => $fields['NAME'], 'PRICE' => $props['PRICE']['VALUE'], 'PREVIEW_TEXT' => $fields['~PREVIEW_TEXT']];
endwhile;
/* endforeach; */

?>

<section>
	<div class="page__container">
		<div class="title-programm">
			<div class="title-programm-container">
				<h1 id="title-programm" style="max-width: 750px;" class="page__title "><?= $arResult['NAME'] ?></h1>
				<? if ($vip || $hit) : ?>
					<ul class="programms__labels page-title-label">
						<? if ($hit) : ?>
							<li class="programms__label hit">
								<svg>
									<use href="/local/assets/img/icons/icons.svg#hit"></use>
								</svg>
								<span>HIT</span>
							</li>
						<? endif; ?>
						<? if ($vip) : ?>
							<li class="programms__label vip">
								<svg>
									<use href="/local/assets/img/icons/icons.svg#vip"></use>
								</svg>
								<span>VIP</span>
							</li>
						<? endif; ?>
					</ul>
				<? endif; ?>
			</div>
		</div>
	</div>
</section>
<section class="section">
	<div class="page__container">
		<div class="detail detail_programm">
			<div class="detail__container">
				<div class="detail__left">
					<div class="detail__programm-img">
						<? if ($arResult['PROPERTIES']['LABELS']['VALUE']) : ?>
							<ul class="labels">
								<? foreach ($arResult['PROPERTIES']['LABELS']['VALUE'] as $label) : ?>
									<li class="labels__label purple">
										<div></div>
										<span><?= $label ?></span>
									</li>
								<? endforeach ?>

							</ul>
						<? endif; ?>
						<picture>
							<img data-src="<?= $img['SRC'] ?>" alt="<?= $arResult['IPROPERTY_VALUES']['ELEMENT_DETAIL_PICTURE_FILE_ALT'] ?>">
						</picture>
					</div>
				</div>
				<div class="detail__head">
					<ul class="programms__specifications">
						<? if ($arResult['PROPERTIES']['PRICE']['VALUE']) : ?>
							<li class="programms__specification price">
								<svg>
									<use href="/local/assets/img/icons/icons.svg#price"></use>
								</svg>
								<span><?= $arResult['PROPERTIES']['PRICE']['VALUE'] ?></span>
							</li>
						<? endif; ?>
						<? if ($arResult['PROPERTIES']['DURATION']['VALUE']) : ?>
							<li class="programms__specification duration">
								<svg>
									<use href="/local/assets/img/icons/icons.svg#clock"></use>
								</svg>
								<span><?= $arResult['PROPERTIES']['DURATION']['VALUE'] ?></span>
							</li>
						<? endif; ?>
					</ul>
				</div>
				<div class="detail__description">
					<div class="programms__socials socials ">
						<? if ($GLOBALS['SITE_INFO']['WHATSAPP']['VALUE']) : ?>
							<a class="whatsapp" target="_blank" href="https://wa.me/<?= getLinkSocial('WHATSAPP'); ?>">
								<svg>
									<use href="/local/assets/img/icons/icons.svg#whatsapp"></use>
								</svg>
								<span>WhatsApp</span>
							</a>
						<? endif; ?>
						<? if ($GLOBALS['SITE_INFO']['VIBER']['VALUE']) : ?>
							<a class="viber" target="_blank" href="viber://chat?number=%2B<?= getLinkSocial('VIBER'); ?>">
								<svg>
									<use href="/local/assets/img/icons/icons.svg#viber"></use>
								</svg>
								<span>Viber</span>
							</a>
						<? endif; ?>
						<? if ($GLOBALS['SITE_INFO']['TELEGRAM']['VALUE']) : ?>
							<a class="telegram" target="_blank" href="https://t.me/<?= getLinkSocial('TELEGRAM'); ?>">
								<svg>
									<use href="/local/assets/img/icons/icons.svg#telegram"></use>
								</svg>
								<span>Telegram</span>
							</a>
						<? endif; ?>
					</div>
					<div class="content">
						<?= $arResult['~DETAIL_TEXT'] ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<? if (count($additionally) > 0) : ?>
	<section class="section">
		<div class="page__container">
			<div class="design2">
				<h2 class="section__title">Дополнительные <span class="color">шалости <br>к программе
					</span>
				</h2>
			</div>
			<ul class="additionally">
				<? foreach ($additionally as $add) : ?>
					<li class="additionally__item">
						<p class="additionally__name txt"><?= $add['NAME'] ?></p>
						<div class="additionally__points"></div>
						<div class="programms__specification price">
							<svg>
								<use href="/local/assets/img/icons/icons.svg#price"></use>
							</svg>
							<span><?= $add['PRICE'] ?></span>
						</div>
						<div class="additionally__description">
							<div class="content">
								<?= $add['PREVIEW_TEXT'] ?>
							</div>
						</div>
					</li>
				<? endforeach ?>
			</ul>
		</div>
	</section>
<? endif; ?>
<script>
	document.querySelector('.titleTxtColor').remove()
	<? if ($arResult['PROPERTIES']['NAME_COLOR']['VALUE']) : ?>
		const titleProgramm = document.querySelector('#title-programm')
		const colorTxt = '<?= $arResult['PROPERTIES']['NAME_COLOR']['VALUE'] ?>'
		titleProgramm.innerHTML = titleProgramm.innerHTML.toLowerCase().replace(`${colorTxt.toLowerCase()}`, `<span class="color">${colorTxt}</span>`)
	<? endif; ?>
</script>