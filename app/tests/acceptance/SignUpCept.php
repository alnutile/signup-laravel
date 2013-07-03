<?php
$I = new WebGuy($scenario);
$I->am('New Customer');
$I->wantTo('Sign Up on the Site for 1 Step Setup');
$I->lookForwardTo('Your Profile');

$I->amOnPage('/signup');

$I->fillField('username', 'admin');
$I->fillField('email', 'admin@example.com');
$I->fillField('company', 'Test Company');
$I->fillField('firstname', 'Test First Name');
$I->fillField('lastname', 'Test Last Name');
$I->fillField('password', 'welcome');
$I->fillField('password_confirmation', 'welcome');
$I->click('Sign Up');

$I->seeCurrentUrlEquals('/signup');
$I->see('The username has already been taken', '#flash_error');


$I->wantTo('Test a bad password combination');
$I->fillField('username', 'test101');
$I->fillField('email', 'test101@example.com');
$I->fillField('password', 'welcome');
$I->fillField('password_confirmation', 'test');
$I->click('Sign Up');

$I->seeCurrentUrlEquals('/signup');
$I->see('The password confirmation does not match', '.error');


$I->wantTo('All fields are valid and account made');
$I->fillField('username', 'test101');
$I->fillField('email', 'test101@example.com');
$I->fillField('password', 'welcome');
$I->fillField('password_confirmation', 'welcome');
$I->click('Sign Up');

/**
 * @todo pending some feedback on loading Config Class
 */
/*
$I->seeCurrentUrlEquals('/profile');
$I->see('Your Profile', 'h1');
*/

$I->see('Step 2: Enter your credit card info', 'h1');
