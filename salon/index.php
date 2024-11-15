<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "СПА для мужчин 💋 - это 20+ эротических программ, 10+ красивых мастеров, дополнения к программам на любой вкус. Ещё не пробовали? Записывайтесь, и вы не разочаруетесь!");
$APPLICATION->SetPageProperty("title", "СПА салон для мужчин в Москве - мужской СПА клуб «Пегас»");
$APPLICATION->SetPageProperty("subtitle", "Мы рады приветствовать вас в самом роскошном SPA-салоне для мужчин. Это место, в котором вы можете реализовать все свои сокровенные желания и самые дерзкие мечты. Здесь вам не нужно думать о стеснении или порицании. Наш СПА-салон создан для того, чтобы каждый гость мог полностью раскрепоститься и получить максимальное удовольствие и наслаждение. У нас вы сможете забыть обо всех проблемах, побаловать свое тело профессиональным массажем и эротическими ласками от сногсшибательных молодых красавиц. Разнообразные волнующие программы подарят яркие эмоции, которые вы не сможете забыть. Посетите салон «Пегас» в рабочий или выходной день, чтобы снять напряжение и запастись новыми силами для будущих свершений!");
$APPLICATION->SetTitle("СПА <span class=\"color\">салон для мужчин</span> «Пегас»");
?>
<div class="page__container">
	<hr style="border: 1px solid <?= $GLOBALS['SITE_INFO']['COLOR_THEME']['VALUE'] ?>; margin: 30px 0 50px; opacity: 0.5;">
</div>
<section class="section">
	<div class="page__container">
		<div class="swiper swiper-about swiper-about-original">
			<div class="swiper-button-next"></div>
			<div class="swiper-button-prev"></div>
			<div class="swiper-wrapper">
				<? foreach (getPhotosSalon() as $photo) : ?>
					<div class="swiper-slide">
						<picture onclick="openImage(this)">
							<source srcset="<?= $photo['WEBP_SRC'] ?>" type="image/webp"><img src="<?= $photo['SRC'] ?>">
						</picture>
					</div>
				<? endforeach; ?>
			</div>
			<div class="swiper-pagination"></div>
		</div>
	</div>
</section>
<section id="girls" class="section">
	<div class="page__container">
		<div class="design1">
			<h2 style="max-width: 500px;" class="section__title txt">
			</h2>
		</div>
		<p style="max-width: 500px;" class="section__subtitle txt"></p>
		<? $APPLICATION->IncludeComponent(
			"custom:news.list",
			"girls",
			array(
				"ACTIVE_DATE_FORMAT" => "d.m.Y",
				"ADD_SECTIONS_CHAIN" => "N",
				"AJAX_MODE" => "N",
				"AJAX_OPTION_ADDITIONAL" => "",
				"AJAX_OPTION_HISTORY" => "N",
				"AJAX_OPTION_JUMP" => "N",
				"AJAX_OPTION_STYLE" => "Y",
				"CACHE_FILTER" => "N",
				"CACHE_GROUPS" => "Y",
				"CACHE_TIME" => "36000000",
				"CACHE_TYPE" => "A",
				"CHECK_DATES" => "Y",
				"DETAIL_URL" => "",
				"DISPLAY_BOTTOM_PAGER" => "N",
				"DISPLAY_DATE" => "N",
				"DISPLAY_NAME" => "N",
				"DISPLAY_PICTURE" => "N",
				"DISPLAY_PREVIEW_TEXT" => "N",
				"DISPLAY_TOP_PAGER" => "N",
				"FIELD_CODE" => array(
					0 => "",
					1 => "",
				),
				"FILTER_NAME" => "",
				"HIDE_LINK_WHEN_NO_DETAIL" => "N",
				"IBLOCK_ID" => "5",
				"IBLOCK_TYPE" => "content",
				"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
				"INCLUDE_SUBSECTIONS" => "N",
				"MESSAGE_404" => "",
				"NEWS_COUNT" => "6",
				"PAGER_BASE_LINK_ENABLE" => "N",
				"PAGER_DESC_NUMBERING" => "N",
				"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
				"PAGER_SHOW_ALL" => "Y",
				"PAGER_SHOW_ALWAYS" => "N",
				"PAGER_TEMPLATE" => ".default",
				"PAGER_TITLE" => "Новости",
				"PARENT_SECTION" => "",
				"PARENT_SECTION_CODE" => "",
				"PREVIEW_TRUNCATE_LEN" => "",
				"PROPERTY_CODE" => array(
					0 => "AGE",
					1 => "LABELS",
					2 => "SIZE_BREAST",
					3 => "HEIGHT",
					4 => "NOW",
					5 => "",
				),
				"SET_BROWSER_TITLE" => "N",
				"SET_LAST_MODIFIED" => "N",
				"SET_META_DESCRIPTION" => "N",
				"SET_META_KEYWORDS" => "N",
				"SET_STATUS_404" => "N",
				"SET_TITLE" => "N",
				"SHOW_404" => "N",
				"SORT_BY1" => "ACTIVE_FROM",
				"SORT_BY2" => "SORT",
				"SORT_ORDER1" => "DESC",
				"SORT_ORDER2" => "ASC",
				"STRICT_SECTION_CHECK" => "N",
				"COMPONENT_TEMPLATE" => "girls",
				"HIDE_BLOCK_ID" => "girls",
				"TITLE_BLOCK" => "Наши =#девушки#=",
				"SUBTITLE_BLOCK" => "Мы очень тщательно отбираем девушек, чтобы вы могли выбрать самую сексуальную и привлекательную для себя. Любая из наших массажисток готова скрасить ваш досуг и подарить наслаждение в любое удобное для Вас время.",
				"NEWS_COUNT_MOBILE" => "6"
			),
			false
		); ?>
	</div>
</section>
<section class="section">
	<div class="page__container">
		<h2 class="section__title">Преимущества <span class="color">нашего салона</span></h2>
		<? $APPLICATION->IncludeFile(SITE_DIR . 'include/advantage/advantage-cards.php') ?>
	</div>
</section>
<div class="page__container">
	<hr style="border: 1px solid <?= $GLOBALS['SITE_INFO']['COLOR_THEME']['VALUE'] ?>; margin: 30px 0; opacity: 0.5;">
</div>
<section class="section">
	<div class="page__container">
		<div class="content">
			<? $APPLICATION->IncludeComponent(
				"bitrix:main.include",
				"",
				array(
					"AREA_FILE_SHOW" => "file",
					'PATH' => SITE_DIR . 'include/about/about-text.php'
				)
			); ?>
		</div></div>
</section>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>