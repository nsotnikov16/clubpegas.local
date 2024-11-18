<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?

use Bitrix\Main\Page\Asset;

$asset = Asset::getInstance();
$isMobilePhp = preg_match('/Mobile|webOS|BlackBerry|IEMobile|MeeGo|mini|Fennec|Windows Phone|Android|iP(ad|od|hone)/i', $_SERVER['HTTP_USER_AGENT']);
$video = $isMobilePhp ? $GLOBALS['SITE_INFO']['VIDEO_MOBILE']['VALUE'] : $GLOBALS['SITE_INFO']['VIDEO']['VALUE'];
if ($isMobilePhp && !$video) $video = $GLOBALS['SITE_INFO']['VIDEO']['VALUE'];
IncludeTemplateLangFile(__FILE__);
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><? $APPLICATION->ShowTitle() ?></title>
    <!-- Обязательный (и достаточный) тег для браузеров -->
    <link type="image/x-icon" rel="shortcut icon" href="<?= SITE_TEMPLATE_PATH ?>/favicon.ico">
    <!-- Дополнительные иконки для десктопных браузеров -->
    <link type="image/png" sizes="16x16" rel="icon" href="<?= SITE_TEMPLATE_PATH ?>/favicon-16x16.png">
    <link type="image/png" sizes="32x32" rel="icon" href="<?= SITE_TEMPLATE_PATH ?>/favicon-32x32.png">
    <link type="image/png" sizes="96x96" rel="icon" href="<?= SITE_TEMPLATE_PATH ?>/favicon-96x96.png">
    <link type="image/png" sizes="120x120" rel="icon" href="<?= SITE_TEMPLATE_PATH ?>n/favicon-120x120.png">
    <?
    $asset->addCss('/local/assets/css/swiper-bundle.min.css');
    $asset->addCss('/local/assets/css/style.css');
    $asset->addCss('/local/assets/css/custom.css');
    if ($APPLICATION->GetCurDir() == '/contacts/') :
        $asset->addString('<script src="https://api-maps.yandex.ru/2.1/?apikey=613b8b9b-619b-4e88-88da-82b9980c3fee&lang=ru_RU&_v=20220224231012"
        type="text/javascript"></script>');
    endif;
    $asset->addString('<link rel="canonical" href="'. getCanonical() . '">');
    $APPLICATION->ShowHead();
    ?>
    <script>
        const isMobile = /Mobile|webOS|BlackBerry|IEMobile|MeeGo|mini|Fennec|Windows Phone|Android|iP(ad|od|hone)/i.test(navigator.userAgent);
        isMobile ? document.cookie = 'isMobile=true' : document.cookie = 'isMobile=false'
        <? if ($GLOBALS['SITE_INFO']['COORDINATES']['VALUE'] != '') : ?>
            const coordinatesSalon = [<?= $GLOBALS['SITE_INFO']['COORDINATES']['VALUE'] ?>]
        <? endif; ?>
    </script>

    <? $APPLICATION->IncludeComponent(
        "bitrix:breadcrumb",
        "BreadcrumbList",
        array(
            "PATH" => "",    // Путь, для которого будет построена навигационная цепочка (по умолчанию, текущий путь)
            "SITE_ID" => "s1",    // Cайт (устанавливается в случае многосайтовой версии, когда DOCUMENT_ROOT у сайтов разный)
            "START_FROM" => "1",    // Номер пункта, начиная с которого будет построена навигационная цепочка
        ),
        false
    ); ?>
    <!-- Yandex.Metrika counter -->
    <script type="text/javascript">
        (function(m, e, t, r, i, k, a) {
            m[i] = m[i] || function() {
                (m[i].a = m[i].a || []).push(arguments)
            };
            m[i].l = 1 * new Date();
            for (var j = 0; j < document.scripts.length; j++) {
                if (document.scripts[j].src === r) {
                    return;
                }
            }
            k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(k, a)
        })
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

        ym(85690511, "init", {
            clickmap: true,
            trackLinks: true,
            accurateTrackBounce: true,
            webvisor: true
        });
    </script>
    <noscript>
        <div><img src="https://mc.yandex.ru/watch/85690511" style="position:absolute; left:-9999px;" alt="" /></div>
    </noscript>
    <!-- /Yandex.Metrika counter -->
<!-- calltouch -->
<script>
(function(w,d,n,c){w.CalltouchDataObject=n;w[n]=function(){w[n]["callbacks"].push(arguments)};if(!w[n]["callbacks"]){w[n]["callbacks"]=[]}w[n]["loaded"]=false;if(typeof c!=="object"){c=[c]}w[n]["counters"]=c;for(var i=0;i<c.length;i+=1){p(c[i])}function p(cId){var a=d.getElementsByTagName("script")[0],s=d.createElement("script"),i=function(){a.parentNode.insertBefore(s,a)},m=typeof Array.prototype.find === 'function',n=m?"init-min.js":"init.js";s.async=true;s.src="https://mod.calltouch.ru/"+n+"?id="+cId;if(w.opera=="[object Opera]"){d.addEventListener("DOMContentLoaded",i,false)}else{i()}}})(window,document,"ct","5qgeu8wo");
</script>
<!-- calltouch -->

</head>

<body>
    <? // Стили по цвету темы из настроек сайта
    require_once($_SERVER["DOCUMENT_ROOT"] . '/local/include/styles.php');
    ?>

    <div id="panel"><? $APPLICATION->ShowPanel(); ?></div>
    <div class="page">
        <? if ($APPLICATION->GetCurPage(false) == SITE_DIR) : ?>
            <div style="background:linear-gradient(180deg, rgba(6, 6, 6, 0.4) 80%, <?= $GLOBALS['SITE_INFO']['COLOR_BACKGROUND']['VALUE'] ?> 100%), url('<?= !$video ? getSiteImgSrc('BANNER', 'webp') : "" ?>');" class="cover">
            <? endif ?>

            <header class="header">
                <div class="page__container">
                    <div class="header__container">
                        <div class="header__left">
                            <a href="/" class="header__logo">
                                <picture>
                                    <img class="header__logo-img" src="<?= getSiteImgSrc('LOGO') ?>">
                                </picture>
                            </a>
                            <p class="header__address"><?= $GLOBALS['SITE_INFO']['CITY']['VALUE'] . ', ' . $GLOBALS['SITE_INFO']['STREET']['VALUE'] ?></p>
                        </div>
                        <nav class="menu">
                            <div class="menu__burger">
                                <span></span><span></span><span></span>
                            </div>
                            <? $APPLICATION->IncludeComponent(
                                "bitrix:menu",
                                "top",
                                array(
                                    "ALLOW_MULTI_SELECT" => "N",
                                    "CHILD_MENU_TYPE" => "subtop",
                                    "DELAY" => "N",
                                    "MAX_LEVEL" => "2",
                                    "MENU_CACHE_GET_VARS" => array(0 => "",),
                                    "MENU_CACHE_TIME" => "3600",
                                    "MENU_CACHE_TYPE" => "N",
                                    "MENU_CACHE_USE_GROUPS" => "Y",
                                    "ROOT_MENU_TYPE" => "top",
                                    "USE_EXT" => "N"
                                )
                            ); ?>

                        </nav>
                        <div class="header__right">
                            <a href="tel:<?= getPhoneLinkNumber() ?>" class="phone">
                                <svg width="17" height="17" viewBox="0 0 17 17" fill="white" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M14.6872 11.2402C14.216 10.7645 13.5879 10.5027 12.9183 10.5027C12.9177 10.5027 12.917 10.5027 12.9163 10.5027C12.2461 10.5032 11.6176 10.7661 11.1465 11.243L10.138 12.2641C7.71606 11.249 5.78085 9.31196 4.76716 6.89136L5.79652 5.84912C6.75988 4.87374 6.75134 3.2952 5.7775 2.33029L3.42566 0H3.2207C1.4448 0 0 1.4448 0 3.2207C0 5.08067 0.364404 6.88525 1.08302 8.58435C1.77706 10.2252 2.77053 11.6988 4.03583 12.9641C5.30113 14.2294 6.77472 15.2229 8.41558 15.9169C10.1147 16.6356 11.9193 17 13.7793 17C15.5552 17 17 15.5552 17 13.7793V13.5743L14.6872 11.2402ZM13.7793 16.0039C6.73059 16.0039 0.996092 10.2694 0.996092 3.2207C0.996092 2.06015 1.88929 1.10433 3.0244 1.00469L5.07638 3.03781C5.66069 3.61678 5.66584 4.56389 5.0878 5.14913L3.60399 6.65154L3.71831 6.95103C4.82334 9.84614 7.11236 12.1537 9.99844 13.2822L10.3838 13.4328L11.8553 11.9429C12.1378 11.6568 12.5149 11.4991 12.9171 11.4988C12.9175 11.4988 12.9179 11.4988 12.9183 11.4988C13.32 11.4988 13.6969 11.6559 13.9797 11.9412L15.9953 13.9756C15.8956 15.1107 14.9398 16.0039 13.7793 16.0039Z" />
                                    <path d="M14.5104 2.48963C12.905 0.884198 10.7704 0 8.5 0V0.996092C12.6377 0.996092 16.0039 4.36232 16.0039 8.49998H17C17 6.22956 16.1158 4.09503 14.5104 2.48963Z" />
                                    <path d="M8.5 2.98828V3.98437C10.9899 3.98437 13.0156 6.01006 13.0156 8.49999H14.0117C14.0117 5.46081 11.5392 2.98828 8.5 2.98828Z" />
                                </svg>
                                <span><?= $GLOBALS['SITE_INFO']['PHONE_NUMBER']['VALUE'] ?></span>
                            </a>
                            <div class="socials">
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
                                <? endif ?>
                            </div>
                            <button data-pointer="signup" class="btn header__btn">Записаться</button>
                        </div>
                        <div class="header__mobile">
                        </div>
                    </div>

                </div>
            </header>
            <? if ($APPLICATION->GetCurPage(false) !== SITE_DIR) : ?>
                <? $APPLICATION->IncludeComponent(
                    "bitrix:breadcrumb",
                    "breadcrumbs",
                    array(
                        "PATH" => "",    // Путь, для которого будет построена навигационная цепочка (по умолчанию, текущий путь)
                        "SITE_ID" => "s1",    // Cайт (устанавливается в случае многосайтовой версии, когда DOCUMENT_ROOT у сайтов разный)
                        "START_FROM" => "1",    // Номер пункта, начиная с которого будет построена навигационная цепочка
                    ),
                    false
                ); ?>
            <? endif; ?>

            <? if ($APPLICATION->GetCurPage(false) == SITE_DIR) : ?>
                <div class="banner">
                    <div class="page__container">
                        <h1 class="banner__title titleTxtColor _anim-items _anim-no-hide"><? $APPLICATION->ShowTitle(false, false); ?></h1>
                        <? if ($GLOBALS['SITE_INFO']['SUBTITLE_BANNER']['VALUE']) : ?>
                            <h2 class="banner__subtitle txt _anim-items _anim-no-hide"><?= $GLOBALS['SITE_INFO']['SUBTITLE_BANNER']['VALUE'] ?></h2>
                        <? endif; ?>
                        <div class="banner__bottom ">
                            <a href="/masters/" class="btn banner__btn _anim-items _anim-no-hide">Выбрать мастера</a>
                            <? if ($GLOBALS['SITE_INFO']['PRICE_FROM']['VALUE']) : ?>
                                <div class="banner__prices _anim-items _anim-no-hide">
                                    <p>Цены от</p>
                                    <p class="color"><?= $GLOBALS['SITE_INFO']['PRICE_FROM']['VALUE'] ?></p>
                                </div>
                            <? endif; ?>
                        </div>
                    </div>
                </div>
                <? if ($video) : ?>
                    <div class="video-block">
                        <video data-src="<?= CFile::GetPath($video) ?>" autoplay muted loop playsinline></video>
                    </div>
                <? endif; ?>
            </div>
        <? endif ?>
        <main>
            <? $APPLICATION->IncludeComponent(
                "bitrix:news.list",
                "promotions",
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
                    "CACHE_TYPE" => "N",
                    "CHECK_DATES" => "Y",
                    "DETAIL_URL" => "",
                    "DISPLAY_BOTTOM_PAGER" => "N",
                    "DISPLAY_DATE" => "N",
                    "DISPLAY_NAME" => "N",
                    "DISPLAY_PICTURE" => "N",
                    "DISPLAY_PREVIEW_TEXT" => "N",
                    "DISPLAY_TOP_PAGER" => "N",
                    "FIELD_CODE" => array(
                        0 => "NAME",
                        1 => "PREVIEW_TEXT",
                        2 => "PREVIEW_PICTURE",
                        3 => "",
                    ),
                    "FILTER_NAME" => "",
                    "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                    "IBLOCK_ID" => "4",
                    "IBLOCK_TYPE" => "content",
                    "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                    "INCLUDE_SUBSECTIONS" => "N",
                    "MESSAGE_404" => "",
                    "NEWS_COUNT" => "50",
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
                        0 => "PREVIEW",
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
                    "COMPONENT_TEMPLATE" => "promotions"
                ),
                false
            ); ?>
            <? if ($APPLICATION->GetCurPage(false) !== SITE_DIR) : ?>

                <section>
                    <div class="page__container">
                        <h1 class="page__title titleTxtColor"><? $APPLICATION->ShowTitle(false, false); ?></h1>
                        <p style="max-width: 750px;" class="section__subtitle txt page-subtitle"><? $APPLICATION->ShowProperty('subtitle');?>
                        </p>
                    </div>
                </section>

            <? endif; ?>