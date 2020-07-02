<?php
namespace api\admin;

use \server\Base;
use \server\JsonService as Json;
class Admin extends Base{
    //管理员界面的  矩形图
    public function get_chart_data(){
        return Json::success($this->get_day_order_count(10));
    }


    /**
     * 获取近 i天的订单数
     * @param  int $i 近i天
     * @return array    order数
     */
    private function get_day_order_count($i){
        $beginToday=mktime(0,0,0,date('m'),date('d'),date('Y'));
        $endToday = strtotime(date('Y-m-d'.'00:00:00',time()+3600*24));
        $one_day = 60*60*24;
        $data = [];

        $start = $beginToday - ($one_day * ($i-1));
        $end = $start + $one_day;

        while ($i) {
            $order_count = $this->table('order')->where("`add_time` > {$start} and `add_time` < {$end}")->field('COUNT(*) num')->find();
            $data[] = $order_count['num'];

            $start = $end;
            $end = $start + $one_day;
            --$i;
        }
        return $data;
    }


    /**
     * 管理员界面的  进度条图
     * @return array
     */
    public function get_chart_progress_data(){
        $now = time();
        $day = 60*60*24;
        $ten_day_ago = $now-$day * 10;
        $beginToday=mktime(0,0,0,date('m'),date('d'),date('Y'));
        $data = ['num' => [], 'stick' => []];
        // 10天订单量
        $ten_order_count = $this->table('order')->where("`add_time` > {$ten_day_ago}")->field('COUNT(*) num')->find();
        $data['num'][] = $ten_order_count['num'];
        // 总订单量
        $all_order_count = $this->table('order')->field('COUNT(*) num')->find();
        $data['num'][] = $all_order_count['num'];
        // 今日活跃用户
        $active_user_count = $this->table('user')->field('COUNT(*) num')->where("`last_time` > {$beginToday}")->find();
        $data['num'][] = $active_user_count['num'];
        // 今日新增用户
        $today_add_user_count = $this->table('user')->field('COUNT(*) num')->where("`first_time` > {$beginToday}")->find();
        $data['num'][] = $today_add_user_count['num'];
        // 总用户数
        $user_count = $this->table('user')->field('COUNT(*) num')->find();
        $data['num'][] = $user_count['num'];

        $data['stick'][] = sprintf("%.1f", $ten_order_count['num']/$all_order_count['num']);
        $data['stick'][] = sprintf("%.1f", $active_user_count['num']/$user_count['num']);
        $data['stick'][] = sprintf("%.1f", $today_add_user_count['num']/$user_count['num']);

        return Json::success($data);
    }
}
