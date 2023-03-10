<?php
/**
 * shop多商户商城
 */


namespace addon\pointexchange\event;

use addon\pointexchange\model\Order;
/**
 * 积分兑换订单关闭
 */
class CronExchangeOrderClose
{
    
	// 行为扩展的执行入口必须是run
	public function handle($data)
	{
        $order = new Order();
        $condition = array(
            ['order_id', '=', $data['relate_id']]
        );
        $result = $order->closeOrder($condition);
        return $result;
	}
	
}