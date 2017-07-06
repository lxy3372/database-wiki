<?php

namespace App\Busi\Traits;
use App\Models\Schemata;

/**
 * Created by PhpStorm.
 * User: Ricky.liu@huolala.cn
 * Date: 2017-07-06
 * Time: 16:21
 */

trait DBTrait
{

	/**
	 * 获取db列表
	 *
	 * @param array $fields
	 *
	 * @param array $dbs
	 *
	 * @return \Illuminate\Support\Collection
	 */
	protected function getDbList($fields = ['schema_name', 'default_character_set_name'], $dbs=[])
	{
		$not_db = ['information_schema', 'mysql','performance_schema'];
		$list = Schemata::whereNotIn('schema_name', $not_db)->when($dbs ,function($query) use ($dbs) {
			return $query->whereIn('schema_name', $dbs);
		})->get($fields);
		return $list;
	}
	
}
