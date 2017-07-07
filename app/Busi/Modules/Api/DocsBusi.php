<?php

namespace App\Busi\Modules\Api;

use App\Busi\Modules\BaseBusi;
use App\Busi\Traits\DocTrait;
use App\Util\ClassFinderUtil;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class DocsBusi extends BaseBusi
{
    use DocTrait;

    private $apiLists = [
        \App\Http\Requests\AuthRegisterRo::class,

    ];


    /**
     * @param Request $request
     * @return array
     */
    public function handle(Request $request)
    {
        $this->apiLists = $this->getAllRequestObject();
        $simple = $request->input('simple', 1);
        $data = [
            'swagger' => '2.0',
            'info' => [
                'description' => 'Swagger',
                'version' => '1.0.0',
                'title' => 'API接口文档',
            ],
            'host' => env('APP_URL'),
            'basePath' => '/',
            'schemes' => ['http'],
            'securityDefinitions' => [
                'api_key' => [
                    'type' => 'apiKey',
                    'name' => 'Authorization',
                    'in' => 'header'
                ]
            ],
            'definitions' => [
                'ApiResponse' => [
                    'type' => 'object',
                    'properties' => [
                        'code' => [
                            'type' => 'integer',
                            'format' => 'int32',
                        ],
                        'results' => [
                            'type' => 'string'
                        ],
                        'res_info' => [
                            'type' => 'string'
                        ],
                        'data' => [
                            'type' => 'object',
                        ]
                    ]
                ],
            ]

        ];
        $data['paths'] = $this->processDoc($simple);
        return $data;
    }

    private function getAllRequestObject()
    {
        $classes = ClassFinderUtil::getClassesInNamespace('App\Http\Requests');
        return $classes;
    }

    /**
     * @param $simple
     * @return array
     */
    private function processDoc($simple)
    {
        $apis = [];

        asort($this->apiLists);

        foreach ($this->apiLists as $ro) {

            list($header, $params) = $this->parseReflectionClass($ro);

            if ($simple) {
                $this->filter($params);
            }

            $url = Arr::get($header, 'properties.url.value');
            if (!$url || !preg_match('/^\//', $url)) continue;

            $apis[$url] = $this->packet($header, $params);
        }
        return $apis;
    }


    /**
     * @param $object
     * @param $properties
     * @return array
     */
    private function packet($object, $properties)
    {
        $url = Arr::get($object, 'properties.url.value');
        $tag = Arr::get($object, 'properties.tag.value');
        $needLogin = Arr::get($object, 'properties.needLogin.value');
        $data = [
            'tags' => [$tag],
            'summary' => $object['title'],
            'operationId' => $url,
//            'security' => 'apiKey',
            'consumes' => [
                'application/x-www-form-urlencoded'
            ],
            'produces' => [
                'application/json',
            ],
            'responses' => [
                '200' => [
                    'description' => '操作成功',
                    'schema' => [
                        '$ref' => '#/definitions/ApiResponse'
                    ]
                ]
            ]
        ];
        if ($needLogin !== null) {
            $data ["security"] = [
                [
                    "api_key" => [],
                ]
            ];
        }

        foreach ($properties as $property) {
            $data['parameters'][] = $this->packParam($property);
        }

        return [
            'post' => $data
        ];
    }

    private function packParam(array $object)
    {
        $param = [
            'name' => $object['field'],
            'in' => 'formData',
            'required' => false,
            'type' => $object['type'],
            'description' => '',
//            "schema" => [
//                '$ref' => '#/definitions/ApiResponse'
//            ]
        ];
//        $param['description'] = $object['title'] ?: $object['field'];
        // 排序处理
        $sort = ['required', 'var', 'number', 'int', 'enum', 'array'];
        $properties = $object['properties'];
        uksort($properties, function ($pre, $cur) use ($sort) {
            return array_search($pre, $sort) > array_search($cur, $sort) ? 1 : -1;
        });

        foreach ($properties as $key => $v) {
            switch ($key) {
                case 'var':
//                    $param['description'] .= $v['value'];
                    break;
                case'desc':
                    $param['description'] .= $v['value'];
                    break;
                case 'int':
                    @list($min, $max) = explode(',', $v['param']);
                    $min = $min ?: 0;
                    $max = $max ?: 'max';
                    $param['description'] .= "[整型:{$min}-{$max}]";
                    $param['type'] = 'integer';
                    break;
                case 'required':
                    $param['required'] = true;
                    break;
                case 'or':
                    break;
                case 'enum':
                    $param['description'] .= "[枚举:{$v['param']}]";
                    break;
                case 'number':
                    @list($min, $max) = explode(',', $v['param']);
                    $min = $min ?: 0;
                    $max = $max ?: 'max';
                    $param['description'] .= "[数字:{$min}-{$max}]";
                    $param['type'] = 'integer';
                    break;
            }
        }
        return $param;
    }


}