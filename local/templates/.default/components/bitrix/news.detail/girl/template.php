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
$age = $arResult['PROPERTIES']['AGE']['VALUE'];
$size_breast = $arResult['PROPERTIES']['SIZE_BREAST']['VALUE'];
$height = $arResult['PROPERTIES']['HEIGHT']['VALUE'];

$videoFile = CFile::GetByID($arResult['PROPERTIES']['VIDEO']['VALUE']);
$vFile = $videoFile->Fetch();

/* dump($vFile); */

if ($vFile["FILE_NAME"]) {
	$videoPath = $vFile['SRC'];
	$posterFile = CFile::GetByID($arResult['PROPERTIES']['VIDEO_POSTER']['VALUE']);
	$pFile = $posterFile->Fetch();
	$posterPath = $pFile['SRC'] ?? SITE_DIR . 'local/assets/img/girl1.png';
}
?>

<section class="section">
	<div class="page__container">
		<div class="detail">
			<div class="detail__container">
				<div class="detail__left girl__swiper">
					<div class="swiper swiper-girl">
						<!-- <div class="swiper-button-next"></div>
                		<div class="swiper-button-prev"></div> -->
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

						<div class="swiper-wrapper">
							<? foreach ($arResult['PROPERTIES']['PHOTOS']['VALUE'] as $photo) : ?>
								<div class="swiper-slide">
									<picture>
										<img src="<?= CFile::GetPath($photo); ?>" alt="<?= $arResult['IPROPERTY_VALUES']['ELEMENT_DETAIL_PICTURE_FILE_ALT'] ?>">
									</picture>
								</div>
							<? endforeach; ?>
							<? if ($videoPath) : ?>
								<div class="swiper-slide video__poster js-poster">

								</div>
							<? endif; ?>
						</div>
						<div class="swiper-pagination"></div>
					</div>
					<div class="video__hidden">
						<video class="swiper__video js-video" controls>
							<source src="<?= $videoPath  ?>">
						</video>
					</div>
					<div class="girl__thumbs">
						<div class="swiper-button-next"></div>
						<div class="swiper-button-prev"></div>
						<div thumbsSlider="" class="swiper swiper-girl-thumbs">
							<div class="swiper-wrapper">
								<? foreach ($arResult['PROPERTIES']['PHOTOS']['VALUE'] as $photo) : ?>
									<div class="swiper-slide">
										<picture>
											<img src="<?= CFile::GetPath($photo); ?>">
										</picture>
									</div>
								<? endforeach; ?>
								<? if ($videoPath) : ?>
									<div class="swiper-slide poster__icon">
										<svg>
											<use xlink:href="/local/assets/img/icons/playerSprite.svg#playIcon"></use>
										</svg>
										<picture>
											<source srcset="<?= $posterPath ?>" type="image/webp"><img src="<?= $posterPath ?>">
										</picture>
									</div>
								<? endif; ?>
							</div>
						</div>
					</div>

				</div>
				<div class="detail__head">
					<div class="girls__top">
						<h1 class="girls__name"><?= $arResult['NAME'] ?></h1>
						<? if ($arResult['PROPERTIES']['NOW']['VALUE'] == 'Y') : ?>
							<p class="girls__now color">сейчас в салоне</p>
						<? endif; ?>
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
						<?php
						$rsFile = CFile::GetByID($arResult['PROPERTIES']['AUDIO']['VALUE']);
						$arFile = $rsFile->Fetch();
						?>

						<? 
							if (!empty($arFile)) :
								$audio_path = "/upload/" . $arFile["SUBDIR"] . '/' . $arFile["FILE_NAME"];
						?>
								<div class="detail__audio spoiler__top">
									<p class="audio__name">
										Голос мастера
										<span>
											<?= $arResult['NAME'] ?>
										</span>
									</p>
									<div class='video-container'>
										<audio src="/upload/<?= $arFile["SUBDIR"] . '/' . $arFile["FILE_NAME"] ?>" type="<?= $arFile["CONTENT_TYPE"] ?>" class='video-player' id='video-player' preload='metadata'></audio>
										<div class='video-hud'>
											<div class='video-hud__element video-hud__curr-time' id='video-hud__curr-time'>00:00</div>
											<progress value='0' max='100' class='video-hud__element video-hud__progress-bar' id='video-hud__progress-bar'></progress>
											<div class='video-hud__element video-hud__duration' id='video-hud__duration'>00:00</div>
										</div>
										<div class="adudio__controls">
											<div class='video-hud__element video-hud__action video-hud__action_pause' id='video-hud__action'>
												<svg>
													<use xlink:href="/local/assets/img/icons/playerSprite.svg#start"></use>
												</svg>
											</div>
											<div class='video-hud__element video-hud__action video-hud__action_reset' id='video-hud__reset'>
												<svg>
													<use xlink:href="/local/assets/img/icons/playerSprite.svg#stop"></use>
												</svg>
											</div>
										</div>
									</div>
								</div>
						<? endif;
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<? if (!empty($arResult['PROPERTIES']['INTERVIEW']['~VALUE']['TEXT'])) : ?>
	<section class="section section_interview">
		<div class="page__container">
			<div style="max-width: 80%;" class="design2">
				<h2 style="max-width: 750px;" class="section__title">Интервью с <span class="color">Мастером</span></h2>
			</div>
			<div class="interview__container js-hidden">
				<?= $arResult['PROPERTIES']['INTERVIEW']['~VALUE']['TEXT'] ?>
			</div>
		</div>
		<button class="interview__more">
			Показать полностью
		</button>
	</section>
	<script src="<?= $templateFolder ?>/interview.js"></script>
<? endif; ?>

<? if ($arFile) : ?>
	<script src="<?= $templateFolder ?>/player.js"></script>
<? endif; ?>

<? if ($vFile) : ?>
	<script src="<?= $templateFolder ?>/playVideo.js"></script>
<? endif; ?>


<script>
	document.querySelector('.titleTxtColor').remove()
</script>