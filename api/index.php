<?php
namespace api;
require_once('../server/BootStrap.php');
// use server\JsonService as Json;
// use server\Sql;
// use server\Base;
// use api\user\User as User;

$pathinfo = array_values(array_filter(explode('/', $_SERVER['PATH_INFO'])));
$preController = array_shift($pathinfo);
$controller = 'api\\'.$preController.'\\'.ucfirst($preController);
$action = array_shift($pathinfo);
$params = [];
for ($i=0; $i<count($pathinfo); $i+=2) {//遍历数组
    // 检查当前pathinfo变量是否有值
    if (isset($pathinfo[$i+1])){
        $params[$pathinfo[$i]] = $pathinfo[$i+1];
    }
}

$controller = new $controller();
echo $controller->$action(...array_values($params));
