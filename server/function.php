<?php
/***
*  自定义php函数
*/

require_once('sql.php');
require_once('FileUpload.php');
date_default_timezone_set('Asia/Chongqing');

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


function is_logged(){
    if(!lc_get_current_user()){
        header("Location: login.php");
    }
}
function ad_is_logged(){
    session_start();
    if(empty($_SESSION['id'])){
        header("Location: admin_login.php");
    }
}


function saveUploadImage($files){

}

function smile($info=''){
    echo '<div style="margin: 0 auto;text-align:center;"> <div style="font-size: 250px;">:)</div>' . $info .' </div>';
    die;
}
header('content-type:text/html;charset=utf8');
function lc_toArray($str=''){
    if(empty($str) || $str == '[]') return array();
    $str=trim($str,'[]');
    $str = explode(',', $str);
    foreach ($str as &$v) {
        $v = trim($v, '\'');
    }
    return $str;
}




function tidyMenus(&$parents, $children=null){
    foreach ($parents as $k => &$p)
        foreach ($children as $k => $c)
            if($p['id'] == $c['pid'])
                // echo $p['id'] . '->' . $c['pid'].'<br>';
                $p['ch'][] = $c;
}


//
function tidyPost(&$posts, $opt=true){
    foreach ($posts as &$v) {
        $v['label'] = lc_toArray($v['label']);
        $v['images'] = lc_toArray($v['images']);
        $v['publish_time'] = date('m-d H:i', $v['publish_time']);
        // $v['publish_time'] = '1-1 18:20';
        if($opt){
            $v['content'] = mb_substr($v['content'], 0, 100, 'utf-8');
        }
        // p($v);
    }
}
function lc_time($time){
    return date('m-d H:i', $time);
}
// ->join('user')



function tidyComment(&$comments, &$replys=null){
    foreach ($comments as $k => &$c){
        $c['ch'] = array();
        $c['add_time']  = lc_time($c['add_time']);
        foreach ($replys as $k => $r)
            if($c['id'] == $r['p_id']){
                $r['add_time'] = lc_time($r['add_time']);
                $c['ch'][] = $r;

            }


    }
    unset($replys);
}
