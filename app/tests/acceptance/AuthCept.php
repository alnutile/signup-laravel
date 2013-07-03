<?php
$I = new WebGuy($scenario);
$I->am('Admin');
$I->wantTo('Log in to the site and see my profile');
$I->lookForwardTo('Your Profile');

$I->amOnPage('/profile');
$I->seeCurrentUrlEquals('/login');

$I->fillField('username', 'admin');
$I->fillField('password', 'welcome');
$I->click('Login');

$I->seeCurrentUrlEquals('/profile');
$I->see('Your Profile', 'h1');
