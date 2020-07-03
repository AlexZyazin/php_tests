<?php
$I = new AcceptanceTester($scenario);
$I->wantTo('perform actions and see result');
$I->amOnPage('/');
$I->maximizeWindow();
$I->click(['link' => 'Да, я тут']);
$I->click(['xpath' => '//section/div[2]/div/div[2]/div']);
$I->waitForElement(['xpath' => '//div[@id=\'bitem\']/div[2]/div/div[2]/div/button'],10);
$I->click(['xpath' => '//div[@id=\'bitem\']/div[2]/div/div[2]/div/button']);
$I->see('В корзине', ['xpath' => '//div[2]/div/div']);
$item_name = $I->grabTextFrom('h1');
$I->click(['css' => 'a.header-basket.header--cart.is-active.animated']);
$I->waitForElement(['xpath' => '//div[@id=\'cart\']/div/div/div/div[2]/a'],10);
$I->see($item_name, '//div[@id=\'cart\']/div/div/div/div[2]/a');
$I->click(['css' => 'a.sec-cart__table-clean.btn.grey.showPopup']);
$I->click(['css' => 'a.btn.yellow.left.popups__close']);
$I->wait(2);
$I->see('Ваша корзина пуста');
$I->wait(2);