<?php
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase {

	/**
	 * A basic functional test example.
	 *
	 * @return void
	 */


	public function testmainpage()
	{
		$response = $this->call('GET', '/');

		$this->assertEquals(200, $response->getStatusCode());
	}

	public function testshop()
	{
		$response = $this->call('GET', '/veikals');

		$this->assertEquals(200, $response->getStatusCode());
	}

	public function testcontacts()
	{
		$response = $this->call('GET', '/kontakti');

		$this->assertEquals(200, $response->getStatusCode());
	}

	public function testDelivery()
	{
		$response = $this->call('GET', '/piegade');

		$this->assertEquals(200, $response->getStatusCode());
	}

	public function testservice()
	{
		$response = $this->call('GET', '/serviss');

		$this->assertEquals(200, $response->getStatusCode());
	}

		public function testsregister()
	{
		$response = $this->call('GET', '/auth/register');

		$this->assertEquals(200, $response->getStatusCode());
	}

		public function testslogin()
	{
		
		$response = $this->call('GET', '/auth/login');

		$this->assertEquals(200, $response->getStatusCode());
	}


}
