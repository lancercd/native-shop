<?php
namespace server;

use server\Route;
use server\JsonService as Json;
class BootStrap{
    public static function boot(){
        spl_autoload_register([new self, 'autoload']);
    }
    private function autoload($class){
        $file = str_replace('\\', '/', $class) . '.php';
        if (file_exists(__ROOT__.$file)){
            require_once(__ROOT__.$file);
        }else if(file_exists(__ROOT__.'api/'.$file)){
            require_once(__ROOT__.'api/'.$file);
        }else{
            // echo "$file 不存在";
        }
    }

}

BootStrap::boot();

$route  = new Route;


$app = $route->instantiation();
$method = $route->method();
if(method_exists($app, $method)) $app->$method();
else Json::fail('方法不存在');




// spl_autoload_register(function ($class){
//     $file = str_replace('\\', '/', $class) . '.php';
//     if (file_exists(__ROOT__.$file)){
//         require_once(__ROOT__.$file);
//     }else if(file_exists(__ROOT__.'api/'.$file)){
//         require_once(__ROOT__.'api/'.$file);
//     }else{
//         echo "$file 不存在";
//     }
// });
