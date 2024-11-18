<?php

use Bitrix\Main\Loader;

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");

if (!$USER->isAdmin()) die;

Loader::includeModule('iblock');

function addPropProgramms()
{
    // Создание свойства для инфоблока "Программы"
    try {
        $iblock_id = CIBlock::GetList([], ['=CODE' => 'programms'])->Fetch()['ID'];

        if ($iblock_id) {
            $codeProp = 'TEXT_DETAIL_BTN';
            $prop = CIBlockProperty::GetList([], ['CODE' => $codeProp, 'IBLOCK_ID' => $iblock_id])->Fetch();

            if (!$prop) {
                $arFields = [
                    "NAME" => "Текст кнопки для перехода на детальную страницу программы",
                    "ACTIVE" => "Y",
                    "SORT" => "500",
                    "CODE" => $codeProp,
                    "PROPERTY_TYPE" => 'S',
                    "IBLOCK_ID" => $iblock_id,
                ];

                $ibp = new CIBlockProperty;
                $PropID = $ibp->Add($arFields);
            }

            $codeProp = 'OTHER_ARTICLES';
            $prop = CIBlockProperty::GetList([], ['CODE' => $codeProp, 'IBLOCK_ID' => $iblock_id])->Fetch();
            if (!$prop) {
                $iblock_articles_id = CIBlock::GetList([], ['=CODE' => 'articles'])->Fetch()['ID'];
                $arFields = [
                    "NAME" => "Другие популярные услуги",
                    "ACTIVE" => "Y",
                    "SORT" => "500",
                    "CODE" => $codeProp,
                    "PROPERTY_TYPE" => 'E',
                    "IBLOCK_ID" => $iblock_id,
                    "LINK_IBLOCK_ID" => $iblock_articles_id,
                    'MULTIPLE' => 'Y'
                ];

                $ibp = new CIBlockProperty;
                $PropID = $ibp->Add($arFields);
            }
        }
    } catch (\Throwable $th) {
    }
}

function addPropArticles()
{
    // Создание свойства для инфоблока "Статьи"
    try {
        $iblock_id = CIBlock::GetList([], ['=CODE' => 'articles'])->Fetch()['ID'];

        if ($iblock_id) {
            $codeProp = 'OTHER_ARTICLES';
            $prop = CIBlockProperty::GetList([], ['CODE' => $codeProp, 'IBLOCK_ID' => $iblock_id])->Fetch();

            if (!$prop) {
                $arFields = [
                    "NAME" => "Другие популярные услуги",
                    "ACTIVE" => "Y",
                    "SORT" => "500",
                    "CODE" => $codeProp,
                    "PROPERTY_TYPE" => 'E',
                    "IBLOCK_ID" => $iblock_id,
                    "LINK_IBLOCK_ID" => $iblock_id,
                    'MULTIPLE' => 'Y'
                ];

                $ibp = new CIBlockProperty;
                $PropID = $ibp->Add($arFields);
            }
        }
    } catch (\Throwable $th) {
    }
}

function changeDetailPageURLArticle()
{
    try {
        if ($iblock_id = CIBlock::GetList([], ['=CODE' => 'articles'])->Fetch()['ID']) {
            $ib = new CIBlock;
            $arFields = [
                'DETAIL_PAGE_URL' => '#SITE_DIR#/#IBLOCK_CODE#/#ELEMENT_CODE#/'
            ];
            $ib->Update($iblock_id, $arFields);
        }
    } catch (\Throwable $th) {
        //throw $th;
    }
}

addPropProgramms();
addPropArticles();
changeDetailPageURLArticle();
