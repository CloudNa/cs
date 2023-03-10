<?php
/**
 *shop商城系统
 */

namespace addon\city\city\controller;

use app\model\store\Store as StoreModel;

/**
 * 门店管理 控制器
 */
class Store extends BaseCity
{
    /******************************* 门店列表及相关操作 ***************************/

    /**
     * 门店列表
     */
    public function lists()
    {
        if (request()->isAjax()) {
            $page = input('page', 1);
            $page_size = input('page_size', PAGE_LIST_ROWS);
            $search_text = input('search_text', '');
            $status = input('status', '');
            $site_id = input('site_id', '');
            $condition = [];
            $condition[] = [ 'store_name', 'like', '%' . $search_text . '%' ];

            //门店状态
            if ($status != '') {
                $condition[] = [ 'status', '=', $status ];
            }
            if ($site_id != '') {
                $condition[] = [ 'site_id', '=', $site_id ];
            }
            $order = 'store_id desc';
            $field = '*';

            $store_model = new StoreModel();

            return $store_model->getStorePageList($condition, $page, $page_size, $order, $field);

        } else {
            return $this->fetch('store/lists');
        }
    }
}