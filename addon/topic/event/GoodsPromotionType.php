<?php
/**
 *shop商城系统
 */

namespace addon\topic\event;

/**
 * 活动类型
 */
class GoodsPromotionType
{

    /**
     * 活动类型
     * @return multitype:number unknown
     */
    public function handle()
    {
        return ["name" => "专题活动", "short" => "专", "type" => "topic", "color" => "#F1A750", 'shop_url' => 'topic://shop/topic/goodslist', 'admin_url' => 'topic://admin/topic/goodslist'];
    }
}