<?php

use http\Params;
use think\exception\Handle;
use think\Log;
use think\Request;

class Z_Exception extends  Handle{
    private $code;
    private $msg;
    private $errorcode;
    public function  render(Exception $e)
    {
        if($e instanceof  BaseException){
            $this->code=$e->code;
            $this->msg=$e->msg;
            $this->errorcode=$e->errorcode;
        }
        else{
            $this->code=500;
            $this->msg="服务器内部错误";
            $this->errorcode=999;
            $this->recordErrorLog($e);
        }
        $request=Request::instance();
        $params=$request->param();

        $result=$this->check($params);
        if(!$result){
            throw new Exception($this->error);
        }
        return true;
    }

    private function  recordErrorLog(Exception $e){
        Log::init([
            'type' => 'File',
            'path' => LOG_PATH,
            'level' => ['error']
        ]);
        Log::record($e->getMessage(),'error');
    }

}