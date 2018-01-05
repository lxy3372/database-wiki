<?php
/**
 * Created by PhpStorm.
 * User: liuxiaoyi
 * Date: 2018/1/4
 * Time: 10:30
 */

namespace app\Listeners;


use Illuminate\Database\Events\QueryExecuted;
use Log;

class SqlListener {
	/**
	 * Create the event listener.
	 *
	 */
	public function __construct() {
		//
	}

	/**
	 * Handle the event.
	 *
	 * @param QueryExecuted $event
	 *
	 * @internal param $ =QueryExecuted  $event
	 */
	public function handle(QueryExecuted $event) {

		$sql = str_replace("?", "'%s'", $event->sql);

		$log = vsprintf($sql, $event->bindings);

		Log::info("execute sql::".$log);
	}
}