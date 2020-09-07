<?php

namespace Pages\Acceptance;

use AcceptanceTester;

class HomePage
{
    public static $URL = '/';
    private const ITEM_FIELD = "//input[@id='search']";
    private const SUBMIT_BUTTON = "button.searchbar__button.btn.btn-send";
    public static function getElement($name){
        return self::$elements[$name];
    }
    public function searchNurofen(AcceptanceTester $I){
        $I->waitForElement(['xpath' => self::ITEM_FIELD],10);
        $I->fillField(self::ITEM_FIELD, "нурофен");
        $I->click(self::SUBMIT_BUTTON);
    }
}
