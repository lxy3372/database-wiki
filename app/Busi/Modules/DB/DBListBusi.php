<?php
/**
 * Created by PhpStorm.
 * User: Ricky.liu@huolala.cn
 * Date: 2017-07-06
 * Time: 14:03
 */

namespace App\Busi\Modules\DB;
use App\Busi\Modules\BaseBusi;
use App\Busi\Traits\DBTrait;
use App\Http\Requests\DBListRo;
use App\Models\Schemata;
use App\Models\Tables;
use Illuminate\Database\Eloquent\Model;

class DBListBusi extends BaseBusi
{
	use DBTrait;
	
	public function handle(DBListRo $req)
	{
		$list = $this->getDbList(['schema_name', 'default_character_set_name'], ['test']);
		return $list->toArray();
	}

}