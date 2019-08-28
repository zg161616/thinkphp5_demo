<?php
use think\Route;
use think\Url;

// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
Route::rule('index/:name', 'admin/index');

return [
    '__pattern__' => [
        'name' => '\w+',
    ],
    '[hello]'     => [
        ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
        ':name' => ['index/hello', ['method' => 'post']],
    ],
    '/' => 'admin/index/',
    'login' => 'admin/index/login',
    'insert'=>'admin/user/insert',
    'add'=>'admin/user/add',
    'doAdd'=>'admin/user/doAdd',
    'good'=>'good/index/index',
    'doRelatedAdd'=>'admin/index/add'

];
