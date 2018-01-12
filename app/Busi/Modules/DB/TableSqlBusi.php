<?php
/**
 * Created by PhpStorm.
 * User: Me@rikyliu.com
 * Date: 2017-07-07
 * Time: 17:16
 */

namespace App\Busi\Modules\DB;


use App\Busi\Modules\BaseBusi;
use App\Http\Requests\TableSqlRo;
use Illuminate\Support\Facades\DB;

/**
 * Class TableSqlBusi
 *
 * @package App\Busi\Modules\DB
 */
class TableSqlBusi extends BaseBusi
{

	/**
	 *
	 * @param TableSqlRo $ro 请求object
	 *
	 * @return array
	 */
	public function handle(TableSqlRo $ro)
	{
		$sql = "SHOW CREATE TABLE ".$ro->db.'.'.$ro->table;
		$ret = DB::selectOne($sql);
		$ret = (array)$ret;
		$ret['sql'] = $ret['Create Table'];
		unset($ret['Create Table']);
		return $ret;
	}

}