<?php
/**
 * shop多商户商城
 */

namespace addon\memberrecharge\api\controller;

use app\api\controller\BaseApi;
use addon\memberrecharge\model\MemberrechargeOrderCreate as OrderCreateModel;

/**
 * 订单创建
 * @author Administrator
 *
 */
class Ordercreate extends BaseApi
{
    /**
     * 创建订单
     * @return string
     */
    public function create()
    {
        $token = $this->checkToken();
        if ($token['code'] < 0) return $this->response($token);
        $order_create = new OrderCreateModel();
        $data = [
            'recharge_id' => isset($this->params['recharge_id']) ? $this->params['recharge_id'] : '',//套餐id
            'member_id' => $this->member_id,
            'order_from' => $this->params['app_type'],
            'order_from_name' => $this->params['app_type_name'],
            'face_value'      => isset($this->params['face_value']) ? $this->params['face_value'] : 0,//自定义充值面额
        ];

        if ($data['recharge_id'] == 0 && $data['face_value'] == 0) {
            return $this->response($this->error('', '缺少必填参数商品数据'));
        }
        $res = $order_create->create($data);
        return $this->response($res);
    }

}