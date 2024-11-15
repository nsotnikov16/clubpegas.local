<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Устала работать за копейки? Мы предлагаем высокооплачиваемую, безопасную работу в салоне эротического массажа без интима. Еженедельные выплаты, возможно обучение. Пишите!");
$APPLICATION->SetPageProperty("title", "Работа для девушек с оплатой от 200 000₽ - салон «Пегас»");
$APPLICATION->SetTitle("Вакансии для девушек");
?>
<section>
	<div class="page__container">
		<div class="content">
			<? $APPLICATION->IncludeComponent(
				"bitrix:main.include",
				"",
				array(
					"AREA_FILE_SHOW" => "file",
					'PATH' => SITE_DIR . 'include/vacancies/top.php'
				)
			); ?>
		</div>

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
		<hr style="border: 1px solid <?= $GLOBALS['SITE_INFO']['COLOR_THEME']['VALUE'] ?>; margin: 30px 0; opacity: 0.6;">
		<? $APPLICATION->IncludeComponent(
			"bitrix:news.list",
			"vacancies",
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
				"IBLOCK_ID" => "11",
				"IBLOCK_TYPE" => "content",
				"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
				"INCLUDE_SUBSECTIONS" => "N",
				"MESSAGE_404" => "",
				"NEWS_COUNT" => "20",
				"PAGER_BASE_LINK_ENABLE" => "N",
				"PAGER_DESC_NUMBERING" => "N",
				"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
				"PAGER_SHOW_ALL" => "N",
				"PAGER_SHOW_ALWAYS" => "N",
				"PAGER_TEMPLATE" => ".default",
				"PAGER_TITLE" => "Новости",
				"PARENT_SECTION" => "",
				"PARENT_SECTION_CODE" => "",
				"PREVIEW_TRUNCATE_LEN" => "",
				"PROPERTY_CODE" => array(
					0 => "",
					1 => "",
				),
				"SET_BROWSER_TITLE" => "N",
				"SET_LAST_MODIFIED" => "N",
				"SET_META_DESCRIPTION" => "N",
				"SET_META_KEYWORDS" => "N",
				"SET_STATUS_404" => "N",
				"SET_TITLE" => "N",
				"SHOW_404" => "N",
				"SORT_BY1" => "SORT",
				"SORT_BY2" => "SORT",
				"SORT_ORDER1" => "DESC",
				"SORT_ORDER2" => "ASC",
				"STRICT_SECTION_CHECK" => "N",
				"COMPONENT_TEMPLATE" => "vacancies"
			),
			false
		); ?>
	</div>
</section>

<? $APPLICATION->IncludeFile(SITE_DIR . 'include/vacancies/earning/earning.php'); ?>
<? $APPLICATION->IncludeFile(SITE_DIR . 'include/vacancies/why.php'); ?>

<section id="faqVacancies" class="section">
	<div class="page__container">
		<h2 class="section__title txt"></h2>
		<? $APPLICATION->IncludeComponent(
			"custom:news.list",
			"faq",
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
				),
				"FILTER_NAME" => "",
				"HIDE_LINK_WHEN_NO_DETAIL" => "N",
				"IBLOCK_ID" => "9",
				"IBLOCK_TYPE" => "content",
				"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
				"INCLUDE_SUBSECTIONS" => "N",
				"MESSAGE_404" => "",
				"NEWS_COUNT" => "20",
				"PAGER_BASE_LINK_ENABLE" => "N",
				"PAGER_DESC_NUMBERING" => "N",
				"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
				"PAGER_SHOW_ALL" => "N",
				"PAGER_SHOW_ALWAYS" => "N",
				"PAGER_TEMPLATE" => ".default",
				"PAGER_TITLE" => "Новости",
				"PARENT_SECTION" => "",
				"PARENT_SECTION_CODE" => "",
				"PREVIEW_TRUNCATE_LEN" => "",
				"PROPERTY_CODE" => array(
					0 => "ANSWER",
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
				"COMPONENT_TEMPLATE" => "faq",
				"HIDE_BLOCK_ID" => "faqVacancies",
				"TITLE_BLOCK" => "ВОПРОС =#ОТВЕТ#=",
				"SUBTITLE_BLOCK" => "",
				"NEWS_COUNT_MOBILE" => "20"
			),
			false
		); ?>
	</div>
</section>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>