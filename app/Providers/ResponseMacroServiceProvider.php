<?php

namespace App\Providers;


use Illuminate\Support\Facades\Response;
use Illuminate\Support\ServiceProvider;

class ResponseMacroServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Response::macro('packet', function ($value = null) {
            $ret = app()->make(\App\Http\Response::class, [$value]);
	        return $ret;
        });
    }
}