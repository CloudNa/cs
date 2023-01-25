<?php
/**
 *shop商城系统
 */


namespace addon\topic\event;

/**
 * 活动类型
 */
class PromotionType
{

	/**
	 * 活动类型
	 * @return multitype:number unknown
	 */
	public function handle()
	{
	    return ["name" => "专题", "type" => "topic"];
	}
}