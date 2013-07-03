<?php
$I = new WebGuy($scenario);
$I->wantTo('I should see the home page welcome type message');
$I->amOnPage('/');
$I->see('Home page');
