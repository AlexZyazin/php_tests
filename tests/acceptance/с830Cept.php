<?php
$I = new AcceptanceTester($scenario);
$I->wantTo('perform actions and see result');
$I->amOnPage('goods/id27769');
$I->maximizeWindow();
$I->wait(2);
$I->click(['xpath' => '//a[contains(@href, \'/goods/manufacturer/kadila/\')]']);
$I->seeInCurrentUrl('goods/manufacturer/kadila');
$I->see('Кадила');
$I->amOnPage('goods/id27769');
$I->click(['xpath' => '//a[contains(@href, \'/goods/active_ingredient/ditsikloverin_paratsetamol/\')]']);
$I->seeInCurrentUrl('goods/active_ingredient/ditsikloverin_paratsetamol');
$I->see('Дицикловерин, Парацетамол');
$I->amOnPage('goods/id27769');
$I->click(['xpath' => '//a[contains(@href, \'/goods/drugs/pain/spasm/trigan_d_kadila_farmasyutikalz_ltd/\')]']);
$I->seeInCurrentUrl('goods/drugs/pain/spasm/trigan_d_kadila_farmasyutikalz_ltd');
$I->see('Триган-Д');
$I->wait(2);