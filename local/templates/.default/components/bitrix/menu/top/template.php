<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<? if (!empty($arResult)) : ?>
	<ul class="menu__list">
		<? foreach ($arResult as $arItem) : ?>
			<li class="menu__item <? if (!empty($arItem['subitems'])) : ?> menu__item-dropdown<? endif ?>"><a href="<?= empty($arItem['subitems']) ? $arItem["LINK"] : '#' ?>" class="menu__link"><?= $arItem["TEXT"] ?></a>
				<? if (!empty($arItem['subitems'])) : ?>
					<div class="menu__expand">
						<ul class="menu__list-dropdown">
							<? foreach ($arItem['subitems'] as $subitem) : ?>
								<li class="menu__item-dropdown-li"><a class="menu__link-dropdown" href="<?= $subitem['LINK'] ?>"><?= $subitem['TEXT'] ?></a></li>
							<? endforeach ?>
						</ul>
					</div>
				<? endif ?>
			</li>
		<? endforeach ?>
	</ul>
<? endif ?>