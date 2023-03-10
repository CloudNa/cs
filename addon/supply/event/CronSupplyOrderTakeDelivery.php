<?php
/**
 * shop多商户商城
 */


namespace addon\supply\event;

use addon\supply\model\order\OrderCommon;
/**
 * 订单自动收货
 */
class CronSupplyOrderTakeDelivery
{
	// 行为扩展的执行入口必须是run
	public function handle($data)
	{

        $order = new OrderCommon();
        $order_info_result = $order->getOrderInfo([["order_id", "=", $data["relate_id"]]], "order_status");
        if(!empty($order_info_result) && $order_info_result["data"]["order_status"] != 10) {

            $result = $order->orderCommonTakeDelivery($data["relate_id"]);//订单自动收货
            return $result;
        }
	}
	
}