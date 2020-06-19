<?php
namespace server;

define('ROOT', str_replace('\\', '/', dirname (__FILE__) . '/../'));

spl_autoload_register(function ($class){
    $file = str_replace('\\', '/', $class) . '.php';
    if (file_exists(ROOT.$file)){
        require_once(ROOT.$file);
    }else if(file_exists(ROOT.'api/'.$file)){
        require_once(ROOT.'api/'.$file);
    }else{
        echo "$file 不存在";
    }
});
