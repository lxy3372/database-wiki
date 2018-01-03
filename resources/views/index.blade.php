<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ env('APP_NAME') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href="/css/app.css" rel="stylesheet">
</head>
<style >
.second-menu
{
    position: relative;
    padding: 0px 15px;
    margin-bottom: -2px;
    background-color: #f9f9f9;
    border: 1px solid #d3e0e9;
    overflow:hidden;
}
.second-menu li
{
    border-bottom: 1px solid #d3e0e9;
}
.second-menu li a
{
    text-decoration:none;
}
</style>
<body>
<nav class="navbar navbar-default navbar-static-top">
    <a class="navbar-brand" href="#">{{ env('APP_NAME')  }}</a>
    <form class="navbar-form navbar-right" role="search">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Search">
        </div>
    </form>
</nav>
<div class="main">
    <div class="container pull-left" style="width:25%;height:100%;min-height:300px;border-right:thin solid #ddd;">
        <div class="list-group">
            <a class="list-group-item collapsed" role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                <span class="badge">14</span>
                Cras justo odio
            </a>
            <ul id="collapseExample" class="nav nav-list second-menu collapse">
                <li><a href="#"><i class="icon-user"></i> 增加用户</a></li>
                <li><a href="#"><i class="icon-edit"></i> 修改用户</a></li>
                <li><a href="#"><i class="icon-trash"></i> 删除用户</a></li>
                <li><a href="#"><i class="icon-list"></i> 用户列表</a></li>
            </ul>
            <a href="#" class="list-group-item">Dapibus ac facilisis in</a>
            <a href="#" class="list-group-item">Morbi leo risus</a>
            <a href="#" class="list-group-item">Porta ac consectetur ac</a>
            <a href="#" class="list-group-item">Vestibulum at eros</a>
        </div>

    </div>

    <div class="container-fluid pull-left" style="width:75%; padding:0px  50px">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title text-left">
                        Panel title
                    </h3>
                </div>
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                    <tr>
                        <th class="">...</th>
                        <th class="">...</th>
                        <th class="">...</th>
                        <th class="">...</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="">...</td>
                        <td class="">...</td>
                        <td class="">...</td>
                        <td class="">...</td>
                    </tr>
                    <tr>
                        <td class="">...</td>
                        <td class="">...</td>
                        <td class="">...</td>
                        <td class="">...</td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title text-left">
                        Panel title
                    </h3>
                </div>
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                    <tr>
                        <th class="">...</th>
                        <th class="">...</th>
                        <th class="">...</th>
                        <th class="">...</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="">...</td>
                        <td class="">...</td>
                        <td class="">...</td>
                        <td class="">...</td>
                    </tr>
                    <tr>
                        <td class="">...</td>
                        <td class="">...</td>
                        <td class="">...</td>
                        <td class="">...</td>
                    </tr>
                    </tbody>
                </table>
            </div>

            </div>
        </div>
    </div>
<nav class="navbar navbar-fixed-bottom">
    <div class="container text-center">
        &copy; riyliu.com {{ date('Y') }}
    </div>
</nav>
</div>
</body>
<script src="/js/app.js"></script>
</html>
