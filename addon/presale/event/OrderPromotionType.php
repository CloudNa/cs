<?php
/**
 * shop多商户商城
 */

namespace addon\presale\event;

/**
 * 订单营销活动类型
 */
class OrderPromotionType
{

    /**
     * 订单营销活动类型
     * @return multitype:number unknown
     */
    public function handle()
    {
        return ["name" => "预售", "type" => "presale"];
    }
}