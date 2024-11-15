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

use \Bas\Pict;

$this->setFrameMode(true);
$girlsArticle = $arResult['PROPERTIES']['GIRLS']['VALUE'];
$programmsArticle = $arResult['PROPERTIES']['PROGRAMMS']['VALUE'];
//dump($arResult);
?>
<section class="section">
	<div class="page__container">
		<div style="max-width: 980px" class="content">
			<?= $arResult['PROPERTIES']['SEO_1']['~VALUE']['TEXT'] ?>
		</div>
		<? //dump(count($girlsArticle));
		?>
		<? if (is_array($girlsArticle) && count($girlsArticle) > 0) : ?>
			<ul class="girls">
				<?
				foreach ($girlsArticle as $itemGirl) :
					$girl = CIBlockElement::GetList([], ['IBLOCK_ID' => 5, 'ID' => $itemGirl, 'ACTIVE' => 'Y'], false, false, [])->GetNextElement();
					if (!$girl) continue;
					$propsGirl = $girl->GetProperties();
					$fieldsGirl = $girl->GetFields();

					$images = [];
					foreach ($propsGirl['PHOTOS']['VALUE'] as $photo) {
						$images[] = ['SRC' => CFile::GetPath($photo)];
					};
					$propsGirl['PHOTOS']['IMAGES'] = $images;

					$age = $propsGirl['AGE']['VALUE'];
					$size_breast = $propsGirl['SIZE_BREAST']['VALUE'];
					$height = $propsGirl['HEIGHT']['VALUE'];
					$labels = $propsGirl['LABELS']['VALUE'];
					?>

					<li class="girls__girl">
						<div class="girls__top">
							<a href="<?= $fieldsGirl['DETAIL_PAGE_URL'] ?>" class="girls__name"><?=$fieldsGirl['NAME']?></a>
							<? if ($propsGirl['NOW']['VALUE'] === 'Y') : ?>
								<p class="girls__now color">сейчас в салоне</p>
							<? endif; ?>
						</div>
						<div class="swiper girls__swiper">
							<? if (is_array($labels) && count($labels) > 0) : ?>
								<ul class="labels">
									<? foreach ($propsGirl['LABELS']['VALUE'] as $label) : ?>
										<li class="labels__label purple">
											<div></div>
											<span><?= $label ?></span>
										</li>
									<? endforeach; ?>
								</ul>
							<? endif; ?>
							<div class="swiper-wrapper">
								<? foreach ($propsGirl['PHOTOS']['IMAGES'] as $key => $image) : ?>
									<? if ($key <= 4) : ?>
										<div class="swiper-slide">

											<a href="<?= $fieldsGirl['DETAIL_PAGE_URL'] ?>" class="girls__photo">
												<picture>
													<img data-src="<?= $image['SRC'] ?>">
												</picture>
											</a>
										</div>
									<? endif; ?>
									<? if ($key == 5) : ?>
										<div class="swiper-slide">
											<a href="<?= $fieldsGirl['DETAIL_PAGE_URL'] ?>" class="girls__photo">
												<picture>
													<img data-src="<?= $image['SRC'] ?>">
												</picture>
											</a>
											<? if ((count($propsGirl['PHOTOS']['IMAGES']) - 6) > 0) : ?>
												<a href="<?= $fieldsGirl['DETAIL_PAGE_URL'] ?>" class="girls__more">
													<div class="girls__camera"></div>
													<p>Еще <?= count($propsGirl['PHOTOS']['IMAGES']) - 6 ?> фото</p>
												</a>
											<? endif; ?>
										</div>
									<? endif; ?>
								<? endforeach; ?>
							</div>
							<div onclick="location.assign('<?= $fieldsGirl['DETAIL_PAGE_URL'] ?>')" class="swiper-pagination"></div>
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
				<? endforeach;
				?>
			</ul>
		<? endif; ?>
		<div style="margin-top: 20px; max-width: 980px" class="content">
			<?= $arResult['PROPERTIES']['SEO_2']['~VALUE']['TEXT'] ?>
		</div>
		<? if (is_array($programmsArticle) && count($programmsArticle) > 0) : ?>
			<ul class="programms">
				<? foreach ($programmsArticle as $itemProgramm) :
					$programm = CIBlockElement::GetList([], ['IBLOCK_ID' => 6, 'ID' => $itemProgramm, 'ACTIVE' => 'Y'], false, false, [])->GetNextElement();
					if (!$programm) continue;
					$propsProgramm = $programm->GetProperties();
					$fieldsProgramm = $programm->GetFields();
					$fieldsProgramm = toWebpImgElement($fieldsProgramm);
				?>

					<li class="programms__programm">
						<div class="spoiler">
							<div class="spoiler__top no-preview-img<? //= mb_strlen($fieldsProgramm['NAME']) > 11 ? 'no-preview-img' : '' 
																	?>">
								<div class="spoiler__top-left spoiler__top-left_programms">
									<div class="programms__preview">
										<? /* if ($fieldsProgramm['PREVIEW_PICTURE']['SRC']) : ?>
											<div class="programms__preview-img">
												<picture>
													<source srcset="<?= $fieldsProgramm['WEBP_PREVIEW_SRC'] ?>" type="image/webp"><img src="<?= $fieldsProgramm['PREVIEW_PICTURE']['SRC'] ?>">
												</picture>
											</div>
										<? endif;  */ ?>
										<h3 class="programms__name"><?= $fieldsProgramm['NAME'] ?></h3>
										<? if ($propsProgramm['VIP']['VALUE'] || $propsProgramm['HIT']['VALUE']) : ?>
											<ul class="programms__labels">
												<? if ($propsProgramm['VIP']['VALUE']) : ?>
													<li class="programms__label vip">
														<svg>
															<use href="/local/assets/img/icons/icons.svg#vip"></use>
														</svg>
														<span>VIP</span>
													</li>
												<? endif; ?>
												<? if ($propsProgramm['HIT']['VALUE']) : ?>
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
										<? if ($propsProgramm['PRICE']['VALUE']) : ?>
											<li class="programms__specification price">
												<svg>
													<use href="/local/assets/img/icons/icons.svg#price"></use>
												</svg>
												<span><?= $propsProgramm['PRICE']['VALUE'] ?></span>
											</li>
										<? endif; ?>
										<? if ($propsProgramm['DURATION']['VALUE']) : ?>
											<li class="programms__specification duration">
												<svg>
													<use href="/local/assets/img/icons/icons.svg#clock"></use>
												</svg>
												<span><?= $propsProgramm['DURATION']['VALUE'] ?></span>
											</li>
										<? endif; ?>
										<? if ($propsProgramm['RELAX']['VALUE']) : ?>
											<li class="programms__specification relax">
												<svg>
													<use href="/local/assets/img/icons/icons.svg#relax"></use>
												</svg>
												<span><?= $propsProgramm['RELAX']['VALUE'] ?></span>
											</li>
										<? endif; ?>
										<? if ($propsProgramm['MASTERS']['VALUE']) : ?>
											<li class="programms__specification masters">
												<svg>
													<use href="/local/assets/img/icons/icons.svg#lips"></use>
												</svg>
												<span><?= $propsProgramm['MASTERS']['VALUE'] ?></span>
											</li>
										<? endif; ?>
									</ul>
								</div>
								<div class="spoiler__top-right"><span></span><span></span></div>
							</div>
							<div class="spoiler__bottom">
								<div class="spoiler__bottom-content">
									<? if (isset($fieldsProgramm['DETAIL_PICTURE']['SRC'])) : ?>
										<div class="programms__spoiler-img">
											<picture>
												<img data-src="<?= $fieldsProgramm['PREVIEW_PICTURE'] ? CFile::GetPath($fieldsProgramm['PREVIEW_PICTURE']) :  CFile::GetPath($fieldsProgramm['DETAIL_PICTURE']) ?>">
											</picture>
											<? if ($propsProgramm['LABELS']['VALUE']) : ?>
												<ul class="labels">
													<? foreach ($propsProgramm['LABELS']['VALUE'] as $label) : ?>
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
											<?= $fieldsProgramm['~PREVIEW_TEXT'] ?>
										</div>
										<div class="programms__more-detailed">
											<div class="programms__socials socials ">
												<? if ($GLOBALS['SITE_INFO']['WHATSAPP']['VALUE']) : ?>
													<a class="whatsapp" target="_blank" href="https://wa.me/<?= getLinkSocial('WHATSAPP'); ?>">
														<svg>
															<use href="/local/assets/img/icons/icons.svg#whatsapp"></use>
														</svg>
														<span>WhatsApp</span>
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
												<? if ($GLOBALS['SITE_INFO']['VIBER']['VALUE']) : ?>
													<a class="viber" target="_blank" href="viber://chat?number=%2B<?= getLinkSocial('VIBER'); ?>">
														<svg>
															<use href="/local/assets/img/icons/icons.svg#viber"></use>
														</svg>
														<span>Viber</span>
													</a>
												<? endif; ?>


											</div>
											<a class="programms__more-link" href="<?= $fieldsProgramm['DETAIL_PAGE_URL'] ?>">Страница программы</a>
										</div>
									</div>
								</div>

							</div>
						</div>
					</li>

				<? endforeach; ?>
			</ul>
		<? endif; ?>
		<div style="margin: 20px 0; max-width: 980px" class="content">
			<?= $arResult['PROPERTIES']['SEO_3']['~VALUE']['TEXT'] ?>
		</div>
		<a style="padding-top: 25px; display:block;" href="tel:<?= getPhoneLinkNumber() ?>" class="phone big">
			<span><?= $GLOBALS['SITE_INFO']['PHONE_NUMBER']['VALUE'] ?></span>
		</a>
		<div style="margin-top: 30px;" class="programms__socials socials ">
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
	</div>
</section>