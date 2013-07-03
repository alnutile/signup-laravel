<?php

class AuthTest extends TestCase {

	/**
	 * A basic functional test example.
	 *
	 * @return void
	 */
	public function testProfileProtected()
	{
		$crawler = $this->client->request('GET', '/profile');

		$this->assertCount(1, $crawler->filter('h1:contains("Your Profile")'));
	}

}