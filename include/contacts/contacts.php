<section class="section">
    <div class="page__container">
        <div class="contacts" itemscope itemtype="http://schema.org/LocalBusiness">
            <div class="contacts__info">
                <div class="content">
                    <? $APPLICATION->IncludeComponent(
                        "bitrix:main.include",
                        "",
                        array(
                            "AREA_FILE_SHOW" => "file",
                            'PATH' => SITE_DIR . 'include/contacts/contacts-text.php'
                        )
                    ); ?>
                </div>
                <span style="display: none" itemprop="name">Салон эротического массажа</span>
                <div class="footer__phone contacts__block">
                    <h4 class="footer__title">Телефон</h4>
                    <a href="tel:<?= getPhoneLinkNumber() ?>" itemprop="telephone"><?= $GLOBALS['SITE_INFO']['PHONE_NUMBER']['VALUE'] ?></a>
                </div>

                <div class="footer__address contacts__block" itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
                    <h4 class="footer__title">Адрес</h4>
                    <p><span itemprop="addressLocality"><?= $GLOBALS['SITE_INFO']['CITY']['VALUE'] ?></span>, <span itemprop="streetAddress"><?= $GLOBALS['SITE_INFO']['STREET']['VALUE'] ?></span></p>
                    <? if ($GLOBALS['SITE_INFO']['ADDRESS_ADD']['VALUE']) : ?>
                        <p><?= $GLOBALS['SITE_INFO']['ADDRESS_ADD']['VALUE'] ?></p>
                    <? endif; ?>

                </div>

                <div class="footer__mode contacts__block">
                    <h4 class="footer__title">Режим работы</h4>
                    <p><time itemprop="openingHours" datetime="Mo-Su"><?= $GLOBALS['SITE_INFO']['MODE']['VALUE'] ?>
                    </time></p>
                </div>

                <hr style="border: 1px solid <?= $GLOBALS['SITE_INFO']['COLOR_THEME']['VALUE'] ?>; margin: 30px 0;">
                <div class="programms__socials socials ">
                    <? if ($GLOBALS['SITE_INFO']['WHATSAPP']['VALUE']) : ?>
                        <a class="whatsapp " target="_blank" href="https://wa.me/<?= getLinkSocial('WHATSAPP'); ?>">
                            <svg>
                                <use href="/local/assets/img/icons/icons.svg#whatsapp"></use>
                            </svg>
                            <span>WhatsApp</span>
                        </a>
                    <? endif; ?>
                    <? if ($GLOBALS['SITE_INFO']['VIBER']['VALUE']) : ?>
                        <a class="viber " target="_blank" href="viber://chat?number=%2B<?= getLinkSocial('VIBER'); ?>">
                            <svg>
                                <use href="/local/assets/img/icons/icons.svg#viber"></use>
                            </svg>
                            <span>Viber</span>
                        </a>
                    <? endif; ?>
                    <? if ($GLOBALS['SITE_INFO']['TELEGRAM']['VALUE']) : ?>
                        <a class="telegram " target="_blank" href="https://t.me/<?= getLinkSocial('TELEGRAM'); ?>">
                            <svg>
                                <use href="/local/assets/img/icons/icons.svg#telegram"></use>
                            </svg>
                            <span>Telegram</span>
                        </a>
                    <? endif; ?>
                </div>
            </div>
            <div id="map" class="contacts__map"></div>
        </div>
    </div>
</section>