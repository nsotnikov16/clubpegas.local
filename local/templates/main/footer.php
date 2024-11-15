<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
IncludeTemplateLangFile(__FILE__); ?>
</main>
<footer class="footer" itemscope itemtype="http://schema.org/LocalBusiness">
    <div class="page__container">
        <h2 class="section__title">Наши <span class="color">контакты</span></h2>
        <span style="display: none" itemprop="name">Салон эротического массажа</span>
        <div class="footer__container">
            <div class="footer__phone">
                <p class="footer__title">Телефон</p>
                <a href="tel:<?= getPhoneLinkNumber() ?>" itemprop="telephone"><?= $GLOBALS['SITE_INFO']['PHONE_NUMBER']['VALUE'] ?></a>
            </div>
            <div class="footer__address" itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
                <p class="footer__title">Адрес</p>
                <p><span itemprop="addressLocality"><?= $GLOBALS['SITE_INFO']['CITY']['VALUE'] ?></span>, <span itemprop="streetAddress"><?= $GLOBALS['SITE_INFO']['STREET']['VALUE'] ?></span></p>
                <? if ($GLOBALS['SITE_INFO']['ADDRESS_ADD']['VALUE']) : ?>
                    <p><?= $GLOBALS['SITE_INFO']['ADDRESS_ADD']['VALUE'] ?></p>
                <? endif; ?>

            </div>
            <div class="footer__mode">
                <p class="footer__title">Режим работы</p>
                <p><time itemprop="openingHours" datetime="Mo-Su"><?= $GLOBALS['SITE_INFO']['MODE']['VALUE'] ?>
                    </time> </p>
            </div>
            <? if ($GLOBALS['SITE_INFO']['WHATSAPP']['VALUE']) : ?>
                <a class="whatsapp footer__social" target="_blank" href="https://wa.me/<?= getLinkSocial('WHATSAPP'); ?>">
                    <svg>
                        <use href="/local/assets/img/icons/icons.svg#whatsapp"></use>
                    </svg>
                    <span>WhatsApp</span>
                </a>
            <? endif; ?>
            <? if ($GLOBALS['SITE_INFO']['VIBER']['VALUE']) : ?>
                <a class="viber footer__social" target="_blank" href="viber://chat?number=%2B<?= getLinkSocial('VIBER'); ?>">
                    <svg>
                        <use href="/local/assets/img/icons/icons.svg#viber"></use>
                    </svg>
                    <span>Viber</span>
                </a>
            <? endif; ?>
            <? if ($GLOBALS['SITE_INFO']['TELEGRAM']['VALUE']) : ?>
                <a class="telegram footer__social" target="_blank" href="https://t.me/<?= getLinkSocial('TELEGRAM'); ?>">
                    <svg>
                        <use href="/local/assets/img/icons/icons.svg#telegram"></use>
                    </svg>
                    <span>Telegram</span>
                </a>
            <? endif; ?>
        </div>
    </div>
</footer>
<? if ($GLOBALS['SITE_INFO']['PHONE_MOBILE']['VALUE_ENUM'] == 'Y') : ?>
    <div class="footer__mobile">
        <p>Звоните</p>
        <a href="tel:<?= getPhoneLinkNumber() ?>" class="phone">
            <div class="footer__svg-mobile">
                <svg width="17" height="17" viewBox="0 0 17 17" fill="white" xmlns="http://www.w3.org/2000/svg">
                    <path d="M14.6872 11.2402C14.216 10.7645 13.5879 10.5027 12.9183 10.5027C12.9177 10.5027 12.917 10.5027 12.9163 10.5027C12.2461 10.5032 11.6176 10.7661 11.1465 11.243L10.138 12.2641C7.71606 11.249 5.78085 9.31196 4.76716 6.89136L5.79652 5.84912C6.75988 4.87374 6.75134 3.2952 5.7775 2.33029L3.42566 0H3.2207C1.4448 0 0 1.4448 0 3.2207C0 5.08067 0.364404 6.88525 1.08302 8.58435C1.77706 10.2252 2.77053 11.6988 4.03583 12.9641C5.30113 14.2294 6.77472 15.2229 8.41558 15.9169C10.1147 16.6356 11.9193 17 13.7793 17C15.5552 17 17 15.5552 17 13.7793V13.5743L14.6872 11.2402ZM13.7793 16.0039C6.73059 16.0039 0.996092 10.2694 0.996092 3.2207C0.996092 2.06015 1.88929 1.10433 3.0244 1.00469L5.07638 3.03781C5.66069 3.61678 5.66584 4.56389 5.0878 5.14913L3.60399 6.65154L3.71831 6.95103C4.82334 9.84614 7.11236 12.1537 9.99844 13.2822L10.3838 13.4328L11.8553 11.9429C12.1378 11.6568 12.5149 11.4991 12.9171 11.4988C12.9175 11.4988 12.9179 11.4988 12.9183 11.4988C13.32 11.4988 13.6969 11.6559 13.9797 11.9412L15.9953 13.9756C15.8956 15.1107 14.9398 16.0039 13.7793 16.0039Z" />
                    <path d="M14.5104 2.48963C12.905 0.884198 10.7704 0 8.5 0V0.996092C12.6377 0.996092 16.0039 4.36232 16.0039 8.49998H17C17 6.22956 16.1158 4.09503 14.5104 2.48963Z" />
                    <path d="M8.5 2.98828V3.98437C10.9899 3.98437 13.0156 6.01006 13.0156 8.49999H14.0117C14.0117 5.46081 11.5392 2.98828 8.5 2.98828Z" />
                </svg>
            </div>
            <span><?= $GLOBALS['SITE_INFO']['PHONE_NUMBER']['VALUE'] ?></span>
        </a>
    </div>
<? endif; ?>
<div id="signup" class="popup">
    <div class="popup__container">
        <div class="popup__content">
            <div class="signup">

                <p>Для записи позвоните нам по номеру телефона
                    и назовите выбранную программу
                </p>

                <a href="tel:<?= getPhoneLinkNumber() ?>" class="phone">
                    <svg width="17" height="17" viewBox="0 0 17 17" fill="white" xmlns="http://www.w3.org/2000/svg">
                        <path d="M14.6872 11.2402C14.216 10.7645 13.5879 10.5027 12.9183 10.5027C12.9177 10.5027 12.917 10.5027 12.9163 10.5027C12.2461 10.5032 11.6176 10.7661 11.1465 11.243L10.138 12.2641C7.71606 11.249 5.78085 9.31196 4.76716 6.89136L5.79652 5.84912C6.75988 4.87374 6.75134 3.2952 5.7775 2.33029L3.42566 0H3.2207C1.4448 0 0 1.4448 0 3.2207C0 5.08067 0.364404 6.88525 1.08302 8.58435C1.77706 10.2252 2.77053 11.6988 4.03583 12.9641C5.30113 14.2294 6.77472 15.2229 8.41558 15.9169C10.1147 16.6356 11.9193 17 13.7793 17C15.5552 17 17 15.5552 17 13.7793V13.5743L14.6872 11.2402ZM13.7793 16.0039C6.73059 16.0039 0.996092 10.2694 0.996092 3.2207C0.996092 2.06015 1.88929 1.10433 3.0244 1.00469L5.07638 3.03781C5.66069 3.61678 5.66584 4.56389 5.0878 5.14913L3.60399 6.65154L3.71831 6.95103C4.82334 9.84614 7.11236 12.1537 9.99844 13.2822L10.3838 13.4328L11.8553 11.9429C12.1378 11.6568 12.5149 11.4991 12.9171 11.4988C12.9175 11.4988 12.9179 11.4988 12.9183 11.4988C13.32 11.4988 13.6969 11.6559 13.9797 11.9412L15.9953 13.9756C15.8956 15.1107 14.9398 16.0039 13.7793 16.0039Z" />
                        <path d="M14.5104 2.48963C12.905 0.884198 10.7704 0 8.5 0V0.996092C12.6377 0.996092 16.0039 4.36232 16.0039 8.49998H17C17 6.22956 16.1158 4.09503 14.5104 2.48963Z" />
                        <path d="M8.5 2.98828V3.98437C10.9899 3.98437 13.0156 6.01006 13.0156 8.49999H14.0117C14.0117 5.46081 11.5392 2.98828 8.5 2.98828Z" />
                    </svg>
                    <span><?= $GLOBALS['SITE_INFO']['PHONE_NUMBER']['VALUE'] ?></span>
                </a>
            </div>
        </div>
        <button class="popup__close"><span>&#10006;</span></button>
    </div>
</div>

<div id="image" class="popup">
    <div class="popup__container">
        <div class="popup__content">
            <picture>
                <source srcset="" type="image/webp"><img src="">
            </picture>
        </div>
        <button class="popup__close"><span>&#10006;</span></button>
    </div>
</div>

<script>
    function openImage(el) {
        if (window.innerWidth > 1024) {
            arrPopups.image.open(el)
        }
    }
</script>

</div>
<script src="/local/assets/js/jquery-3.6.0.min.js?_v=20220224231012"></script>
<script src="/local/assets/js/swiper-bundle.min.js?_v=20220224231012"></script>
<script src="/local/assets/js/app.js?_v=20220224231012"></script>

<!-- Акция слева -->
<? if ($GLOBALS['SITE_INFO']['ACTION_LEFT']['VALUE_ENUM'] == 'Y') : ?>
    <script>
        setLeftPromotion(<?= $APPLICATION->GetCurPage(false) !== SITE_DIR ? '' : 'true' ?>)
    </script>
<? endif; ?>
<link rel="stylesheet" href='https://cdn.envybox.io/widget/cbk.css'>
<script type="text/javascript" src='https://cdn.envybox.io/widget/cbk.js?wcb_code=55a382d621e38c807daf99ed629b8086' charset='UTF-8' async></script>
<!-- Roistat Counter Start -->
<script>
(function(w, d, s, h, id) {
    w.roistatProjectId = id; w.roistatHost = h;
    var p = d.location.protocol == "https:" ? "https://" : "http://";
    var u = /^.*roistat_visit=[^;]+(.*)?$/.test(d.cookie) ? "/dist/module.js" : "/api/site/1.0/"+id+"/init?referrer="+encodeURIComponent(d.location.href);
    var js = d.createElement(s); js.charset="UTF-8"; js.async = 1; js.src = p+h+u; var js2 = d.getElementsByTagName(s)[0]; js2.parentNode.insertBefore(js, js2);
})(window, document, 'script', 'cloud.roistat.com', '4f793e916b18bf37d19c80e8c0e80d49');
</script>
<!-- Roistat Counter End -->
<!--<script src="//cdn.callibri.ru/callibri.js" type="text/javascript" charset="utf-8"></script>-->
</body>

</html>