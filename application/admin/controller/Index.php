<?php
namespace app\admin\controller;

use think\Controller;
use think\Db;
use app\admin\model\Profile;
use app\admin\model\User as UserModel;

class Index extends   Controller
{
    public function index ()
    {
        $result= Db::query("select * from user");
        $this->assign("list",$result);
        return $this->fetch();
    }
    public function  add(){
        Db::transaction(function () {
            $user           = new UserModel;
            $user->name     = 'thinkphp';
            $user->password = '123456';
            $user->nickname = '流年';
            if ($user->save()) {
                // 写入关联数据
                $profile = new Profile;
                $profile->truename = '刘晨';
                $profile->birthday = '1977-03-05';
                $profile->address = '中国上海';
                $profile->email = 'thinkphp@qq.com';
                $user->profile()->save($profile);
                return '用户新增成功';
            } else {
                return $user->getError();
            }
        });
    }

}
