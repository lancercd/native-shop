<?php

use server\JsonService as Json;
use server\Sql;
spl_autoload_register(function ($class){
    echo "$class" .  '<br>';
    $prefix = '../';
    // $tmp = explode('\\', $class);
    // if($tmp[0] !== 'server'){
    //
    // }
    // var_dump($tmp);die;
    $file = $prefix . str_replace('\\', '/', $class) . '.php';
    echo $file;
    // $path = '../server/';
    // $map = [
    //    'server\\JsonService'=>$path.'JsonService.php',
    //    'server\\FileUpload'=>$path.'FileUpload.php',
    //    'server\\Sql'=>$path.'Sql.php',
    //    'server\\JsonService'=>$path.'JsonService.php',
    // ];
    // $file = $map[$class];
    if (file_exists($file))
       require_once($file);
});
echo "开始<br/>";
$test = new Json();
// new Sql('123');
$test->success('成功');
