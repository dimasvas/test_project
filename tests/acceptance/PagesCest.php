<?php


class PagesCest
{
	public function checkPagesWorks(AcceptanceTester $I)
	{
		$I->amOnPage('/');
		$I->see('Post a success story');

		$I->amOnPage('/list');
		$I->see('List of stories');
	}

	public function addStoryWorks(AcceptanceTester $I)
	{
		$I->am('user');
		$I->wantTo('add a story');
		$I->amOnPage('/');
		$I->see('Post a success story');
	}

}
