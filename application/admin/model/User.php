<?php
namespace app\admin\model;

use think\Model;

class User extends  Model{
    protected $autoWriteTimestamp = true;

    // 定义自动完成的属性
    protected $insert = ['status' => 1];

    // 定义关联方法
    public function profile()
    {
        // 用户HAS ONE档案关联
        return $this->hasOne('Profile');
    }
}