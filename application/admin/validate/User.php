<?php
namespace app\admin\validate;
use think\Validate;

class User extends  Validate{
    protected $rule = [
        'username' => 'require|min:5|token',
        'email'    => 'require|email',
        'birthday' => 'dateFormat:Y-m-d',
    ];
}