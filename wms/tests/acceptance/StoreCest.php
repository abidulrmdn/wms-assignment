<?php 

class StoreCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function forntPageTest(AcceptanceTester $I)
    {
    	$I->amOnPage('/');
        $I->see('Sell / Remove');
    }
}
