<?php
/**
 *shop商城系统
 */

namespace app\shopapi\controller;

use app\model\order\LocalOrder as LocalOrderModel;

/**
 * 外卖订单
 * Class Order
 * @package app\shop\controller
 */
class Localorder extends BaseApi
{

    public function __construct()
    {
        //执行父类构造函数
        parent::__construct();
        $token = $this->checkToken();
        if ($token[ 'code' ] < 0) {
            echo $this->response($token);
            exit;
        }
    }

    /**
     * 发货
     * @return false|string
     */
    public function delivery()
    {
        $order_id = isset($this->params[ 'order_id' ]) ? $this->params[ 'order_id' ] : 0;
        $deliverer = isset($this->params[ 'deliverer' ]) ? $this->params[ 'deliverer' ] : '';
        $deliverer_mobile = isset($this->params[ 'deliverer_mobile' ]) ? $this->params[ 'deliverer_mobile' ] : '';
        $local_order_model = new LocalOrderModel();
        $data = [
            'order_id' => $order_id,
            'deliverer' => $deliverer,
            'deliverer_mobile' => $deliverer_mobile,
            'site_id' => $this->site_id
        ];
        $result = $local_order_model->orderGoodsDelivery($data);
        return $this->response($result);
    }

}