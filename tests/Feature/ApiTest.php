<?php

namespace Tests\Feature;

use Tests\TestCase;

class ApiTest extends TestCase
{
	
	
	/**
	 */
    public function testIndexTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
	
	public function testDbSuc()
	{
		$response = $this->json('GET', '/db');
		$response->assertStatus(200);
		$response->assertJsonStructure(
			[
				'ret', 'result', 'res_info', 'data' => [
				[
					'schema_name', 'character', 
				]
			]
			]
		);
		return $response->json();
	}

	/**
	 * @depends testDbSuc
	 *
	 * @param $db_ret
	 *
	 * @return array
	 */
	public function testTableList($db_ret)
	{
		$datalist = $db_ret['data'];
		$this->assertNotEmpty($datalist);
		$db_info = array_pop($datalist);
		$response = $this->json('GET', '/table/list/?db='.$db_info['schema_name']);
		$response->assertJsonStructure(
			[
				'ret', 'result', 'res_info', 'data' => [
				[
					'table_schema', 'table_name', 'table_type',
					'engine', 'table_rows', 'data_length', 'auto_increment',
					'create_time', 'table_comment'
				]
			]
			]
		);
		return $response->json();
	}

	/**
	 * @depends testTableList
	 * 
	 * @param $table_ret
	 */
	public function testTableDetail($table_ret)
	{
		$table = $table_ret['data'];
		$this->assertNotEmpty($table);
		foreach ($table as $db_info) {
			$response = $this->json('GET', '/table/detail/?db='.$db_info['table_schema'].'&table='.$db_info['table_name']);
			$response->assertJsonStructure(
				[
					'ret', 'result', 'res_info', 'data' => [
					[
						'table_schema', 'table_name', 'column_name',
						'column_default', 'is_nullable', 'data_type', 'column_type',
						'column_key', 'column_comment'
					]
				]
				]
			);
		}
	}
	
}
