<?php
/**
 * Created by PhpStorm.
 * Author: chengfeng
 * Date: 2016/12/26
 * Time: 20:30
 * Email: chengfeng@wisdomtmt.com
 */

namespace App\Http\Result;


class CustomizeResult extends Result
{
    private $customize = [];

    public function __construct(array $customize = [],array $data=[])
    {
        $this->customize = $customize;
        parent::__construct($data);
    }

    public function setCustomize(array $customize)
    {
        $this->customize = $customize;
    }

    public function toArray()
    {
        return $this->customize + ['data' => $this->data ];
    }
}