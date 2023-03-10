<?php
/**
 *shop商城系统
 */

namespace addon\memberconsume\admin\controller;

use app\admin\controller\BaseAdmin;
use addon\memberconsume\model\Consume;

/**
 * 会员消费
 */
class Config extends BaseAdmin
{
    /**
     * 消费返积分
     */
    public function index()
    {
        $config_model = new Consume();
        if (request()->isAjax()) {

            //订单消费返积分及优惠券设置数据
            $data = [
                'return_point_status' => input('return_point_status', 'complete'),//返积分事件 pay 订单付款 receive 订单收货 complete 订单完成 单选或下拉
                'return_point_rate' => input('return_point_rate', 0),//返积分比率 0-100 不取小数
                'return_growth_rate' => input('return_growth_rate', 0),//成长值返还比例0-100 不取小数
                'return_coupon' => input('coupon', ''),//优惠券
            ];
            $this->addLog("设置会员消费奖励");
            $is_use = input("is_use", 0);//是否启用
            $res = $config_model->setConfig($data, $is_use);
            return $res;
        } else {
            $event_list = array (
                [ "name" => "receive", "title" => "订单收货" ],
                [ "name" => "pay", "title" => "订单付款" ],
                [ "name" => "complete", "title" => "订单完成" ],
            );
            $this->assign("event_list", $event_list);
            //订单返积分设置
            $config_result = $config_model->getConfig();
            $this->assign('config', $config_result[ 'data' ]);
            return $this->fetch('config/index');
        }
    }

}