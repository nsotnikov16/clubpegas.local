<?
$color = $GLOBALS['SITE_INFO']['COLOR_THEME']['VALUE'];
$colorRGB = sscanf($color, "#%02x%02x%02x");

foreach ($colorRGB as $key => $i) :
    if ($key == 0) $colorToRGB[$key] = $i - 28;
    if ($key == 1) $colorToRGB[$key] = $i - 5;
    if ($key == 2) $colorToRGB[$key] = $i - 1;
endforeach;


foreach ($colorRGB as $key => $i) :
    if ($key == 0) $colorToRGB_hover[$key] = $i - 12;
    if ($key == 1) $colorToRGB_hover[$key] = $i - 6;
    if ($key == 2) $colorToRGB_hover[$key] = $i + 4;
endforeach;

$colorToRGB = 'rgba(' . implode(', ', $colorToRGB) . ', 0.25)';
$colorToRGB_hover = 'rgba(' . implode(', ', $colorToRGB_hover) . ', 0.4)';
$colorBackground = $GLOBALS['SITE_INFO']['COLOR_BACKGROUND']['VALUE'];
?>
<style>
    .page {
        background-color: <?= $colorBackground ?>;
    }

    .color {
        color: <?= $color ?>;
    }

    .btn {
        background: <?= $color ?>;
    }

    .btn {
        box-shadow: 0px 0px 7px 6px <?= $colorToRGB ?>;
    }

    .btn:hover:not(.tabs__label) {
        box-shadow: 0px 0px 11px 9px <?= $colorToRGB_hover ?>;
    }

    .menu__item:hover .menu__link,
    .menu__link-dropdown:hover,
    .header.open-menu .header__mobile .phone span,
    .to-stories__item:hover,
    .header__mobile .menu__item-dropdown.open .menu__link,
    .programms__label.vip,
    .programms__specification.masters,
    .programms__more-link:hover,
    .footer__phone a:hover,
    a.phone:hover,
    .popup__close:hover span,
    .breadcrumbs__link:hover,
    .phone.big span {
        color: <?= $color ?>;
    }

    .menu__item:hover::after,
    .menu__item:hover::before,
    .menu__burger span,
    .header__mobile .menu__item-dropdown.open::before,
    .header__mobile .menu__item-dropdown.open::after,
    .content li::before,
    .programms__more-link:hover::after,
    .programms__more-link:hover::before {
        background-color: <?= $color ?>;
    }

    .header.open-menu .header__mobile .phone svg,
    .programms__label.vip svg,
    .programms__specification.masters svg,
    .phone:hover svg,
    .signup .phone svg {
        fill: <?= $color ?>;
    }

    .footer__mobile .footer__svg-mobile,
    .to-stories__item:hover .to-stories__img,
    .advantage hr,
    .tabs__label,
    .breadcrumbs hr,
    .tabs.with_spoiler.open .tabs__label,
    .detail .girl__thumbs .swiper-slide-thumb-active::after {
        border: 1px solid <?= $color ?>;
    }

    .content hr {
        background-color: <?= $color ?>;
        color: <?= $color ?>;
        border: 1px solid <?= $color ?>;
    }

    .tabs__label.active,
    .tabs__spoiler {
        background: <?= $color ?>;
        -webkit-box-shadow: 0px 0px 7px 6px <?= $colorToRGB ?>;
        box-shadow: 0px 0px 7px 6px <?= $colorToRGB ?>;
    }

    .tabs__label,
    .header.open-menu {
        background: <?= $colorBackground ?>;
    }

    .tabs.with_spoiler.open .tabs__label,
    .menu__list-dropdown:not(.header__mobile .menu__list-dropdown) {
        background-color: <?= $colorBackground ?>;
    }

    .articles__name {
        color: <?= $color ?>;
        border-bottom: 1px solid <?= $color ?>;
    }

    .articles__more {
        color: <?= $color ?>;
        border-bottom: 1px dotted <?= $color ?>;
    }

    .footer__mobile {
        border-top: 1px solid <?= $color ?>;
    }

    .additionally .price svg,
    .detail .programms__specifications svg {
        fill: <?= $color ?> !important;
    }

    .detail__head {
        border-bottom: 1px solid <?= $color ?>;
    }

    .video-block::after {
        content: '';
        position: absolute;
        z-index: 2;
        left: 0;
        top: 0;
        height: 100%;
        display: block;
        width: 100%;
        background: linear-gradient(180deg, rgba(6, 6, 6, 0.4) 80%, <?= $colorBackground ?> 100%);
        z-index: 0;
    }

    /* Новые стили */

    .audio__name span {
        color: <?= $color ?>;
    }

    .interview__container p:nth-child(2n -1) {
        color: <?= $color ?>;
    }

    .interview__container:before {
        background-image: linear-gradient(to bottom, rgba(255, 255, 255, 0), <?= $colorBackground ?> 91%)
    }

    .video-hud__element {
        font-family: 'Gilroy', sans-serif;
        font-style: normal;
        font-weight: 400;
        font-size: 16px;
        line-height: 24px;
        color: <?= $color ?>;
    }

    .video-hud__action_pause svg {
        width: 22px;
        height: 20px;
        fill: <?= $color ?>;
    }

    .video-hud__action_play svg {
        height: 22px;
        width: 22px;
        fill: <?= $color ?>;
    }

    progress::-webkit-progress-bar {
        background: <?= $color . 66 ?>;
        border-radius: 3px;
    }

    progress::-moz-progress-bar {
        background: <?= $color . 66 ?>;
        border-radius: 3px;
    }

    progress {
        background: <?= $color . 66 ?>;
        border-radius: 3px;
    }

    .video-hud__progress-bar::-moz-progress-bar {
        background: <?= $color . 66 ?>;
        border-radius: 3px;
        border: none !important;
    }

    .video-hud__progress-bar {
        background: <?= $color . 66 ?>;
        border-radius: 3px;
        border: none !important;
    }

    .video-hud__action_reset svg {
        width: 17px;
        height: 17px;
        fill: <?= $color ?>;
    }

    progress::-webkit-progress-value {
        background: <?= $color ?>;
        border-radius: 3px;
    }

    .video-hud__action_reset svg {
        width: 17px;
        height: 17px;
        fill: <?= $color ?>;
    }

    .interview__more {
        color: <?= $color ?>;
        border-bottom: 1px dashed <?= $color ?>
    }

    .poster__icon svg {
        fill: <?= $color ?>;
    }

    .video__poster svg {
        fill: <?= $color ?>;
    }
</style>