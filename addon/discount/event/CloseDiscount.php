<?php
/**
 *shop商城系统
 */


namespace addon\discount\event; 

use addon\discount\model\Discount;
/**
 * 关闭活动
 */
class CloseDiscount
{

	public function handle($params)
	{
	    $discount = new Discount();
	    $res = $discount->cronCloseDiscount($params['relate_id']);
        return $res;
	}
}