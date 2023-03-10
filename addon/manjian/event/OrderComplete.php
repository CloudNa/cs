<?php
/**
 *shop商城系统
 */


namespace addon\manjian\event;

use addon\manjian\model\Order;

/**
 * 订单完成
 */
class OrderComplete
{

	public function handle($params)
	{
	    if (isset($params['order_id'])) {
            $order = new Order();
            $result = $order->orderComplete($params['order_id']);
            return $result;
        }
	}
}