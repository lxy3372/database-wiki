<?php

namespace App\Http\Controllers;

use App\Busi\Modules\Api\DocsBusi;
use Illuminate\Http\Request;

class DocsController extends Controller
{

	/**
	 * @SWG\Swagger(
	 *     schemes={"http"},
	 *     host="wiki.com",
	 *     @SWG\Info(
	 *         title="Wiki接口测试地址",
	 *         version="1.0.0",
	 *     )
	 * )
	 */
	public function index(Request $request, DocsBusi $docs)
	{
		$apis = $docs->response()->getData();
		return $apis;
	}
}
