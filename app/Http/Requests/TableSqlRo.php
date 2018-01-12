<?php
/**
 * Created by PhpStorm.
 * User: Me@rikyliu.com
 * Date: 2017-07-07
 * Time: 11:32
 */

namespace App\Http\Requests;


/**
 * Class TableSqlRo
 *
 * @get
 * @url /table/sql
 * @package App\Http\Requests
 */
class TableSqlRo extends BaseRo
{

	/**
	 * @var 表名
	 * @required
	 */
	public $table;

	/**
	 * @var 库名
	 * @reuired
	 */
	public $db;

}