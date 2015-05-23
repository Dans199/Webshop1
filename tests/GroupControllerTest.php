<?php
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;

class GrupasControllerTest extends TestCase {


	public function testadmingroups()
	{

		$response = $this->action('GET', 'Admin\GrupasController@showGroups');
		$this->assertEquals(200, $response->getStatusCode());
	}





}
