<?php

/**
 *shop商城系统
 */

namespace addon\servicer\event;

/**
 * 活动类型
 */
class PromotionType
{
    /**
     * 活动类型
     * @return array
     */
    public function handle()
    {
        return [ "name" => "客服", "type" => "servicer" ];
    }
}
