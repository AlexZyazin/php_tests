<?php

namespace acceptance;

use Pages\Acceptance\HomePage;
use Pages\Acceptance\SearchPage;
use AcceptanceTester;

class SearchCest
{
    private $HomePage;
    private $SearchPage;
    public function _before (AcceptanceTester $I){
        $I->amOnPage('/');
        $this->HomePage = new HomePage();
        $this->SearchPage = new SearchPage();
    }
    public function SearchCest(AcceptanceTester $I)
    {
        $this->HomePage->searchNurofen($I);
        $this->SearchPage->countResults($I);
    }
}