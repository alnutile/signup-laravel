<?php
$I = new WebGuy($scenario);
$I->am('Admin');
$I->wantTo('Log in to the site then logout');
$I->lookForwardTo('Home page');

$I->amOnPage('/profile');
$I->seeCurrentUrlEquals('/login');

$I->fillField('username', 'admin');
$I->fillField('password', 'welcome');
$I->click('Login');

$I->amOnPage('/logout');
$I->seeCurrentUrlEquals('/');
$I->see('Home page', 'h1');

