<?php
namespace app\admin\controller;

use think\Controller;
use think\Db;
use app\admin\model\Profile;
use app\admin\model\User as UserModel;
use app\admin\model\Book;

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


    public function addBook()
    {
        $user               = UserModel::get(1);
        $book               = new Book;
        $book->title        = 'ThinkPHP5快速入门';
        $book->publish_time = '2016-05- 06';
        $user->books()->save($book);
        return '添加Book成功';
    }
    public function addBooks()
    {
        $user  = UserModel::get(1);
        $books = [
            ['title' => 'ThinkPHP5快速入门', 'publish_time' => '2016-05-06'],
            ['title' => 'ThinkPHP5开发手册', 'publish_time' => '2016-03-06'],
        ];
        $user->books()->saveAll($books);
        return '添加Book成功';
    }

    public function read()
    {
        $user  = UserModel::get(1);
        $books = $user->books;
        dump($books);
    }

    public function readA()
    {
        $user  = UserModel::get(1,'books');
        $books = $user->books;
        dump($books);
    }

    public function readB()
    {
        $user  = UserModel::get(1);
        // 获取状态为1的关联数据
        $books = $user->books()->where('status',1)->select();
        dump($books);
        // 获取作者写的某本书
        $book  = $user->books()->getByTitle('ThinkPHP5快速入门');
        dump($book);
    }
    public function update($id)
    {
        $user        = UserModel::get($id);
        $book        = $user->books()->getByTitle ('ThinkPHP5开发手册');
        $book->title = 'ThinkPHP5快速入门';
        $book->save();
    }

}
