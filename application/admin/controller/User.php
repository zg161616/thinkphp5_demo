<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
use app\admin\model\User as UserModel;
use think\Request;

class User extends  Controller{
    public function  insert(){
        Db::execute("insert into user (username,pwd) values ('admin','admin')");
    }
    public function  add(){
        return view("user/add");
    }
    public function doAdd(Request $request){
        $list = UserModel::all(function($query){
            $query->where('id', '<', 3)->order('id', 'desc');
        });
        $name=$request->param('username');
        $password=$request->param('password');
        $user = new UserModel;
        $user->username=$name;
        $user->pwd=$password;
        $user->email=input("email");
        $user->birthday=input("birthday");
        if($user->allowField(true)->validate(true)->save(input("post."))){
        }
        else{
          return $user->getError();
        }
    }
}