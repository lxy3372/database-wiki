<?php
/**
 * Created by PhpStorm.
 * User: zhangsir <fei@zhangsir.me>
 * Date: 17-1-18
 * Time: 上午11:22
 */

namespace App\Http\Result;


class ExceptionResult extends Result
{
    protected $result;

    protected $res_info;

    public function code($code)
    {
        $this->result = $code;
        return $this;
    }

    public function info($info)
    {
        $this->res_info = $info;
        return $this;
    }

    public function toArray()
    {
        return [
            'data' => $this->data,
            'result' => $this->result,
            'res_info' => $this->res_info
        ];
    }
}