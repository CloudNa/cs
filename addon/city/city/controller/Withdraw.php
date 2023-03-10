<?php
/**
 *shop商城系统
 */

namespace addon\city\city\controller;

use addon\city\model\CityWithdraw;

class Withdraw extends BaseCity
{

    /**
     * 获取提现记录
     */
    public function lists()
    {

        if (request()->isAjax()) {

            $page = input('page', 1);
            $page_size = input('page_size', PAGE_LIST_ROWS);

            $condition[] = [ 'website_id', '=', $this->site_id ];

            $start_time = input('start_time', '');
            $end_time = input('end_time', '');
            if (!empty($start_time) && empty($end_time)) {
                $condition[] = [ 'apply_time', '>=', $start_time ];
            } elseif (empty($start_time) && !empty($end_time)) {
                $condition[] = [ 'apply_time', '<=', $end_time ];
            } elseif (!empty($start_time) && !empty($end_time)) {
                $condition[] = [ 'apply_time', 'between', [ $start_time, $end_time ] ];
            }

            $order = "id desc";

            $model = new CityWithdraw();
            $list = $model->getCityWithdrawPageList($condition, $page, $page_size, $order);

            return $list;
        }

        return $this->fetch('withdraw/lists', [], $this->replace);
    }

}