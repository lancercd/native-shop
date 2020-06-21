<?php
namespace server;
use server\JsonService as Json;

class Route{
    // public static function boot(){
    //     return (new self)->init();
    // }
    public function __construct(){
        $this->init();
    }
    public function init(){
        $this->isRequest()? $this->buildPath():$this->reject();
        // $this->instantiation();
    }
    public function instantiation(){
        if(class_exists($this->controller)) return new $this->controller;
        else Json::fail('类不存在');
        // return $class;
    }
    public function method(){
        return $this->action;
    }

    private function reject(){
        return Json::fail('Illegal request!');
    }

    private function isRequest(){
        if($_SERVER['PATH_INFO']) return true;
        else return false;
    }


    private function buildPath(){

        $pathinfo = array_values(array_filter(explode('/', $_SERVER['PATH_INFO'])));
        $preController = array_shift($pathinfo);
        $this->controller = 'api\\'.$preController.'\\'.ucfirst($preController);
        $this->action = array_shift($pathinfo);
    }

}

// $pathinfo = array_values(array_filter(explode('/', $_SERVER['PATH_INFO'])));
// $preController = array_shift($pathinfo);
// $controller = 'api\\'.$preController.'\\'.ucfirst($preController);
// $action = array_shift($pathinfo);
// $params = [];
// for ($i=0; $i<count($pathinfo); $i+=2) {//遍历数组
//     // 检查当前pathinfo变量是否有值
//     if (isset($pathinfo[$i+1])){
//         $params[$pathinfo[$i]] = $pathinfo[$i+1];
//     }
// }
// $controller = new $controller();
// echo $controller->$action(...array_values($params));
