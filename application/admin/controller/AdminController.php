<?php

use think\Controller;

class AdminController extends  Controller{
    public function  index(){
        return $this->fetch();
    }
}