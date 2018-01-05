<?php

namespace Tests\Feature;

use App\Exceptions\ErrorCode\RoError;
use Tests\TestCase;

class ExceptionTest extends TestCase
{
	
	
	/**
	 */
    public function testIndexTest()
    {
        $response = $this->get('/sadfsadf');

        $response->assertStatus(404);
    }
	
	public function testDbFailed()
	{
		//test err http methods
		$response = $this->json('POST', '/db');
		$response->assertStatus(405);
	}

	/**
	 *
	 */
	public function testTableList()
	{
		$response = $this->json('GET', '/table/list/?db=err_db');
		$response->assertJsonStructure(
			[
				'ret', 'result', 'res_info', 'data'
			]
		);
		$response = $this->json('GET', '/table/list/?asddb=err_db');
		$response->assertJsonFragment(['ret' => -1, 'result' =>RoError::FIELD_REQUIRED]);
	}

	/**
	 * 
	 */
	public function testTableDetail()
	{
		$response = $this->json('GET', '/table/detail/?db=err&table=err');
		$response->assertJsonStructure(
			[
				'ret', 'result', 'res_info', 'data'
			]
		);
		$response = $this->json('GET', '/table/detail/?db=err');
		$response->assertJsonFragment(['ret' => -1, 'result' =>RoError::FIELD_REQUIRED]);
	}
	
}
