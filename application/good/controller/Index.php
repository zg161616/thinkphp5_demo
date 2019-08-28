<?php
namespace  app\good\controller;

use think\Controller;

class Index extends Controller {
    function index(){
        return $this->fetch();
    }
}