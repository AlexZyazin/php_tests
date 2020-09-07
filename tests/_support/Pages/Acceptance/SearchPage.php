<?php

namespace Pages\Acceptance;

use AcceptanceTester;

class SearchPage
{
    public static $URL = '/search';
    const SEARCH_TITLE = "h1";
    const SEARCH_ITEM = "div.cc-item--info";
    public function countResults(AcceptanceTester $I){
        $I->waitForElement(['css' => self::SEARCH_TITLE],10);
        $title=$I->grabTextFrom(self::SEARCH_TITLE);
        preg_match_all('/[0-9]*[0-9]/', $title,$m);
        $I->waitForElement(['css' => self::SEARCH_ITEM],10);
        $I->seeNumberOfElements(self::SEARCH_ITEM, $m[0][0]);
    }
}
