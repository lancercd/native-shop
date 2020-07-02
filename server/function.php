<?php
/***
*  自定义php函数
*/


date_default_timezone_set('Asia/Chongqing');
header('content-type:text/html;charset=utf8');

function p($v, $flag=false){
    echo '<pre style="font-size:20px; font-weight:800;">';
    if(is_bool($v)) var_dump($v);
    else if(is_null($v)) var_dump(null);
    else{
        if($flag) var_dump($v);
        else echo "<div>" . print_r($v, true) . '</div>';
    }
    echo '</pre>';
}



function lc_get_current_user(){
    session_start();
    return empty($_SESSION['uid'])? false:$_SESSION['uid'];
}

//若没有登录  返回首页   显示登录框
function is_logged(){
    if(!lc_get_current_user()){
        header("Location: index.php?need_log=true");
    }
}
function ad_is_logged(){
    session_start();
    if(empty($_SESSION['id'])){
        header("Location: login.php");
    }
}

function smile($info=''){
    echo '<div style="margin: 0 auto;text-align:center;"> <div style="font-size: 250px;">:)</div>' . $info .' </div>';
    die;
}

function lc_toArray($str=''){
    if(empty($str) || $str == '[]') return array();
    $str=trim($str,'[]');
    $str = explode(',', $str);
    foreach ($str as &$v) {
        $v = trim($v, '\'');
    }
    return $str;
}


function lc_time($time){
    return date('m-d H:i', $time);
}
