<?php
/**
 * shop多商户商城
 */


namespace addon\pointexchange\event;

use addon\pointexchange\model\Order;
/**
 * 积分兑换订单异步回调执行
 */
class PointexchangeOrderPayNotify
{
    
	// 行为扩展的执行入口必须是run
	public function handle($data)
	{
        $order = new Order();
        $result = $order->orderPay($data);
        return $result;
	}
	
}