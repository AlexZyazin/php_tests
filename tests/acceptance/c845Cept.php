<?php
use \Codeception\Util\Locator;
$I = new AcceptanceTester($scenario);
$I->wantTo('Проверить наличие информации у ПКУ-товаров');
$I->amOnPage('/');
$I->maximizeWindow();
$I->click(['link' => 'Да, я тут']);
$I->fillField("//input[@id='search']", "вакцина");
$I->click(['css' => 'button.searchbar__button.btn.btn-send']);
$I->waitForElement(['link' => 'Отпускается в аптеке строго по рецепту'],10);
$I->click(Locator::contains('div.cc-item--fields', 'Отпускается в аптеке строго по рецепту'));
$I->waitForElement(['css' => 'div.col-12.col-md-6.col-lg-8.offer-card__description.description'],10);
$I->see('Отпускается в аптеке строго по рецепту', 'div.col-12.col-md-6.col-lg-8.offer-card__description.description');
$strk=$I->grabTextFrom(['css' => 'div.info-tabs__boxes']);
if ($strk == 'Доставка и самовывоз данного товара временно недоступны') {
    $I->see('Доставка и самовывоз данного товара временно недоступны', 'div.col-12.offer-card__tabs.info-tabs');
}else{
    $I->see('Доставка для юридических', 'div.col-12.offer-card__tabs.info-tabs');
}
$I->wait(2);