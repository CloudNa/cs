<?php
/**
 *shop商城系统
 */


namespace addon\bargain\event;

/**
 * 订单营销活动类型
 */
class OrderPromotionType
{
	
	/**
	 * 活动类型
	 * @return multitype:number unknown
	 */
	public function handle()
	{
		return [ "name" => "砍价", "type" => "bargain"];
	}
}