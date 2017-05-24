<?php

/**
 * Class PagesCest
 */
class PagesCest
{
	/**
	 * @param AcceptanceTester $I
	 */
	public function checkPagesWorks(AcceptanceTester $I)
	{
		$I->amOnPage('/');
		$I->see('Post a success story');

		$I->amOnPage('/list');
		$I->see('List of stories');
	}

	/**
	 * @param AcceptanceTester $I
	 */
	public function addStoryWorks(AcceptanceTester $I)
	{
		$I->am('user');
		$I->wantTo('add a story');
		$I->amOnPage('/');
		$I->fillField('#story', 'Just a test story');
		$I->click('#success-msg');
		$I->see('success');
	}
}
