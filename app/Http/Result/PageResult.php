<?php
/**
 * Created by PhpStorm.
 * User: Ricky
 * Date: 16/12/23
 * Time: 下午5:30
 */

namespace App\Http\Result;


class PageResult extends Result
{
    /**
     * @var 分页号 默认从1开始
     */
    private $page_no;

    /**
     * @var 每页数据
     */
    private $page_size;

    /**
     * @var 查询总数
     */
    private $total_num;

    public function __construct($data = [], $pageNo = 1, $pageSize = 0, $totalNum = 0)
    {
        parent::__construct($data);
        $this->page_no = $pageNo;
        $this->page_size = $pageSize;
        $this->total_num = $totalNum;
    }

    public function toArray()
    {
        return array_merge(parent::toArray(), ['page_size' => $this->page_size, 'page_no' => $this->page_no, 'total_num' => $this->total_num]);
    }

}