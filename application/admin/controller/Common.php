<?php
namespace app\admin\controller;


use think\Controller;

class Common extends  Controller{
    public function left(){
        return $this->fetch();
    }
    public function header(){
        return $this->fetch();
    }
}