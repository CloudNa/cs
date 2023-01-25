<?php
/**
 *shop商城系统
 */


namespace addon\memberconsume\event;

use addon\memberconsume\model\Consume as ConsumeModel;

/**
 * 订单支付事件
 */
class OrderPay
{

	public function handle($data)
	{
 		$consume_model = new ConsumeModel();
		$res = $consume_model->memberConsume(['order_id' => $data['order_id'], 'status' => 'pay']);
		return $res; 
	}
}