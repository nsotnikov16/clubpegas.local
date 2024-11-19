<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Более 20 программ эротического массажа на любой вкус. Хочешь расслабиться? -Выбирай классику. Нужно доп. эмоции? -Выбери эксклюзивные программы. Ждём Вас круглосуточно!");
$APPLICATION->SetPageProperty("title", "Программы эротического массажа на Братиславской | Салон «Пегас»");
$APPLICATION->SetPageProperty("subtitle", "Вы можете выбрать любую и многочисленных программ, которые были тщательно разработаны нашим СПА-салоном. Мы постарались сделать их максимально разнообразными, чтобы они могли удовлетворить все желания наших клиентов. Если вы хотите внести =#пикантную перчинку#=, то можете добавить к выбранной программе несколько дополнительных опций. Наши умелые девушки готовы воплотить в жизнь =#любые ваши мечты и желания!#=");
$APPLICATION->SetPageProperty("txt_title", "эротического массажа");
$APPLICATION->SetTitle("Программы эротического массажа");
$sections = CIBlockSection::GetList(
    array('sort' => 'asc'),
    array('IBLOCK_ID' => 6, 'ACTIVE' => 'Y'),
    false,
    array(),
    false
);
while ($section = $sections->GetNext()) {
    $labels[] = ['ID' => $section['ID'], 'ID_FOR_BLOCK' => 'programms' . $section['ID'], 'NAME' => $section['NAME'], 'ELEMENTS' => CIBlockSection::GetSectionElementsCount($section['ID'])];
}
?>

<section>
    <div class="page__container">
        <div class="tabs">
            <div class="tabs__spoiler"><span></span></div>
            <div class="tabs__controls">
                <label for="all" class="tabs__label btn">
                    <input checked type="radio" name="tabs" id="all">
                    <span>Все программы</span>
                </label>
                <? foreach ($labels as $label) : ?>

                    <? if ($label['ELEMENTS']) : ?>
                        <label for="<?= $label['ID_FOR_BLOCK'] ?>" class="tabs__label btn">
                            <input type="radio" name="tabs" id="<?= $label['ID_FOR_BLOCK'] ?>">
                            <span><?= $label['NAME'] ?></span>
                        </label>
                    <? endif; ?>
                <? endforeach; ?>

            </div>
            <div class="tabs__content">
                <div id="all" class="tabs__tab">
                    <? $APPLICATION->IncludeComponent(
                        "custom:news.list",
                        "programms",
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
                                0 => "DETAIL_PICTURE",
                                1 => "",
                            ),
                            "FILTER_NAME" => "",
                            "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                            "IBLOCK_ID" => "6",
                            "IBLOCK_TYPE" => "content",
                            "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                            "INCLUDE_SUBSECTIONS" => "N",
                            "MESSAGE_404" => "",
                            "NEWS_COUNT" => "30",
                            "PAGER_BASE_LINK_ENABLE" => "N",
                            "PAGER_DESC_NUMBERING" => "N",
                            "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                            "PAGER_SHOW_ALL" => "",
                            "PAGER_SHOW_ALWAYS" => "N",
                            "PAGER_TEMPLATE" => ".default",
                            "PAGER_TITLE" => "Новости",
                            "PARENT_SECTION" => "",
                            "PARENT_SECTION_CODE" => "",
                            "PREVIEW_TRUNCATE_LEN" => "",
                            "PROPERTY_CODE" => array(
                                0 => "VIP",
                                1 => "LABELS",
                                2 => "HIT",
                                3 => "RELAX",
                                4 => "PRICE",
                                5 => "DURATION",
                                6 => 'MASTERS',
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
                            "COMPONENT_TEMPLATE" => "programms",
                            "HIDE_BLOCK_ID" => "",
                            "TITLE_BLOCK" => "",
                            "SUBTITLE_BLOCK" => "",
                            "NEWS_COUNT_MOBILE" => "30"
                        ),
                        false
                    ); ?>
                </div>
                <? foreach ($labels as $label) : ?>
                    <? if ($label['ELEMENTS']) : ?>
                        <div id="<?= $label['ID_FOR_BLOCK'] ?>" class="tabs__tab">
                            <? $APPLICATION->IncludeComponent(
                                "custom:news.list",
                                "programms",
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
                                        0 => "DETAIL_PICTURE",
                                        1 => "",
                                    ),
                                    "FILTER_NAME" => "arrSect",
                                    "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                                    "IBLOCK_ID" => "6",
                                    "IBLOCK_TYPE" => "content",
                                    "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                                    "INCLUDE_SUBSECTIONS" => "N",
                                    "MESSAGE_404" => "",
                                    "NEWS_COUNT" => "30",
                                    "PAGER_BASE_LINK_ENABLE" => "N",
                                    "PAGER_DESC_NUMBERING" => "N",
                                    "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                                    "PAGER_SHOW_ALL" => "",
                                    "PAGER_SHOW_ALWAYS" => "N",
                                    "PAGER_TEMPLATE" => ".default",
                                    "PAGER_TITLE" => "Новости",
                                    "PARENT_SECTION_CODE" => "",
                                    "PREVIEW_TRUNCATE_LEN" => "",
                                    "PROPERTY_CODE" => array(
                                        0 => "VIP",
                                        1 => "LABELS",
                                        2 => "HIT",
                                        3 => "RELAX",
                                        4 => "PRICE",
                                        5 => "DURATION",
                                        6 => 'MASTERS',
                                    ),
                                    "SET_BROWSER_TITLE" => "N",
                                    "SET_LAST_MODIFIED" => "N",
                                    "SET_META_DESCRIPTION" => "N",
                                    "SET_META_KEYWORDS" => "N",
                                    "SET_STATUS_404" => "N",
                                    "SET_TITLE" => "N",
                                    'PARENT_SECTION' => $label['ID'],
                                    "SHOW_404" => "N",
                                    "SORT_BY1" => "ACTIVE_FROM",
                                    "SORT_BY2" => "SORT",
                                    "SORT_ORDER1" => "DESC",
                                    "SORT_ORDER2" => "ASC",
                                    "STRICT_SECTION_CHECK" => "N",
                                    "COMPONENT_TEMPLATE" => "programms",
                                    "HIDE_BLOCK_ID" => "",
                                    "TITLE_BLOCK" => "",
                                    "SUBTITLE_BLOCK" => "",
                                    "NEWS_COUNT_MOBILE" => "30"
                                ),
                                false
                            ); ?>
                        </div>
                    <? endif; ?>
                <? endforeach; ?>

            </div>
        </div>
    </div>
</section>
<section class="section">
	<div class="page__container">
		<div class="content">
			<? $APPLICATION->IncludeComponent(
				"bitrix:main.include",
				"",
				array(
					"AREA_FILE_SHOW" => "file",
					'PATH' => SITE_DIR . 'include/programms/bottom-text.php'
				)
			); ?>
		</div></div>
</section>
<script>
    const titlePage = document.querySelector('.page__title')
    if (titlePage) {
        titlePage.classList.remove('page__title')
        titlePage.classList.add('section__title')
        titlePage.innerHTML = titlePage.innerHTML.toLowerCase().replace('программы', 'программы <br>')
    }

    if (document.querySelectorAll('.tabs__label').length == 1) {
        document.querySelector('.tabs__controls').remove()
        document.querySelector('#all.tabs__tab').classList.add('active')
    }
</script>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>