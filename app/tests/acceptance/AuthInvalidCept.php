<?php
    $I = new WebGuy($scenario);
    $I->am('Admin');
    $I->wantTo('Invalid password should show the Error Message');
    $I->lookForwardTo('combination was incorrect');

    $I->amOnPage('/login');

    $I->fillField('username', 'admin');
    $I->fillField('password', 'blah');
    $I->click('Login');

    $I->seeCurrentUrlEquals('/login');
    $I->see('combination was incorrect', '#flash_error');
