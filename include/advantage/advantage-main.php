<? $photos = getPhotosSalon(); ?>
<section class="section">
    <div class="page__container">
        <h2 class="section__title">Преимущества <span class="color">эротического массажа</span> <br>в нашем салоне</h2>
        <div class="advantage">
            <div class="advantage__container">
                <div class="advantage__swiper">
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper advantage-swiper">
                        <div class="swiper-wrapper">
                            <? foreach ($photos as $photo) : ?>
                                <div class="swiper-slide">
                                    <picture onclick="openImage(this)">
                                        <img data-src="<?= $photo['SRC'] ?>">
                                    </picture>
                                </div>
                            <? endforeach; ?>
                        </div>
                    </div>
                    <div thumbsSlider="" class="swiper advantage-swiper-thumbs">
                        <div class="swiper-wrapper">
                            <? foreach ($photos as $photo) : ?>
                                <div class="swiper-slide">
                                    <picture>
                                        <img data-src="<?= $photo['SRC'] ?>">
                                    </picture>
                                </div>
                            <? endforeach; ?>
                        </div>
                    </div>
                </div>
                <div class="advantage__description">
                    <h3 class="color">
                        <? $APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "",
                            array(
                                "AREA_FILE_SHOW" => "file",
                                'PATH' => SITE_DIR . 'include/advantage/advantage-title.php'
                            )
                        ); ?>
                    </h3>
                    <br>
                    <p style="font-weight: 400;">
                        <? $APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "",
                            array(
                                "AREA_FILE_SHOW" => "file",
                                'PATH' => SITE_DIR . 'include/advantage/advantage-text1.php'
                            )
                        ); ?>
                    </p>
                    <br>
                    <p style="font-weight: 600; opacity: 1;">
                        <? $APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "",
                            array(
                                "AREA_FILE_SHOW" => "file",
                                'PATH' => SITE_DIR . 'include/advantage/advantage-text2.php'
                            )
                        ); ?>
                    </p>
                </div>
            </div>
            <hr>
            <? require_once($_SERVER["DOCUMENT_ROOT"] . '/include/advantage/advantage-cards.php') ?>
        </div>

    </div>
</section>