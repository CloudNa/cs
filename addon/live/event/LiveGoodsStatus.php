<?php
/**
 *shop商城系统
 */


namespace addon\live\event;

use addon\live\model\Goods;

/**
 * 获取商品审核状态
 */
class LiveGoodsStatus
{

    /**
     * 获取商品审核状态
     * 
     * @return multitype:number unknown
     */
	public function handle($param)
	{
        $goods = new Goods();
        $goods->getGoodsAuditStatus();
	}
}