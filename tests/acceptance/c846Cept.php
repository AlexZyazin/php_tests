<?php
use \Codeception\Util\Locator;
$I = new AcceptanceTester($scenario);
$I->wantTo('Проверить даты у товаров "под заказ"');
$I->amOnPage('/');
$I->maximizeWindow();
$I->click(['link' => 'Да, я тут']);
$I->fillField("//input[@id='search']", "антибиотик");
$I->click(['css' => 'button.searchbar__button.btn.btn-send']);
$I->waitForElement('//div[@id=\'section_nav_top\']/ul', 10);
$I->click(Locator::elementAt('//div[@id=\'section_nav_top\']/ul/li', -1));
$I->waitForElement(Locator::contains('p.cc-item--field.cc-item--field_warn.pt-2.text-description', 'Под заказ'), 10);
//$txt=$I->grabTextFrom(['css' => 'p.cc-item--field.cc-item--field_warn.pt-2.text-description']);
//print_r($txt);
//$I->wait(2);
//if ($txt == 'Под заказ') {
//    $I->click(Locator::contains('p.cc-item--field.cc-item--field_warn.pt-2.text-description', 'Под заказ'));
//}else{
//    $I->click(Locator::elementAt('//div[@id=\'section_nav_top\']/ul/li', -2));
//}
//$I->waitForElement('p.cc-item--field.cc-item--field_warn.pt-2.text-description', 10);
$I->click(Locator::contains('p.cc-item--field.cc-item--field_warn.pt-2.text-description', 'Под заказ'));
$I->waitForElement('p.offer-tools__status.offer-tools__status_warn', 10);
$I->see('Под заказ', ['css' => 'p.offer-tools__status.offer-tools__status_warn']);
//$data1 = $I->grabTextFrom('div.sec-item__delivery-info-item.left-part');
//preg_match_all('/[0-9]*[0-9]*[0-9]/', $data1,$m1);
//$data2 = $I->grabTextFrom('div.sec-item__delivery-info-item.right-part');
//preg_match_all('/[0-9]*[0-9]*[0-9]/', $data2,$m2);
//print_r($m1);
//print_r($m2);
$date_today = date("j");
//print_r($date_today);
$I->dontSee($date_today, ['css' => 'div.sec-item__delivery-info-item.left-part']);
$I->dontSee($date_today, ['css' => 'div.sec-item__delivery-info-item.right-part']);
$I->wait(3);


/**
class SearchCest
{
private $HomePage;
private $SearchPage;
public function _before (FunctionalTester $I){
$this->HomePage = new HomePage();
$this->SearchPage = new SearchPage();
}
public function SearchCest(FunctionalTester $I)
{
$I->amOnPage('/');
$I->fillField(HomePage::ITEM_FIELD, "нурофен");
$I->click(HomePage::SUBMIT_BUTTON);
$I->wait(2);
$title=$I->grabTextFrom(SearchPage::SEARCH_TITLE);
preg_match_all('/[0-9]*[0-9]/', $title,$m);
$I->seeNumberOfElements(SearchPage::SEARCH_ITEM, $m[0][0]);
}
}

use Page\Functional\HomePage;
use Page\Functional\SearchPage;

$I = new FunctionalTester($scenario);
$I->wantTo('Найти нурофен и проверить количество найденныйх товаров');
$I->amOnPage(HomePage::$URL);
$I->fillField(HomePage::$itemField, "нурофен");
$I->click(HomePage::$submitButton);
$I->wait(2);
preg_match_all('/[0-9]/', SearchPage::$searchTitle,$m);
$I->seeNumberOfElements(SearchPage::$buyButton, $m[0][0]);
 */