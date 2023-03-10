<?php

/**
 * shop多商户商城
 */

namespace app\api\controller;

use app\model\web\AdvPosition as AdvPositionModel;
use app\model\web\Adv as AdvModel;

class Adv extends BaseApi
{

    /**
     * 详情信息
     */
    public function detail()
    {
        $keyword = isset($this->params['keyword']) ? $this->params['keyword'] : '';
        if (empty($keyword)) {
            return $this->response($this->error('', 'REQUEST_KEYWORD'));
        }
        $adv_position_model = new AdvPositionModel();
        $adv_model = new AdvModel();
        $info = $adv_position_model->getAdvPositionInfo([['keyword', '=', $keyword]]);
        $info = $info['data'];

        $res = ['adv_position' => $info];

        $list = $adv_model->getAdvList(
            [['ap_id', '=', $info['ap_id']]],
            $field = 'adv_id, adv_title, ap_id, adv_url, adv_image, slide_sort, price, background'
        );
        $list = $list['data'];

        $res['adv_list'] = $list;
        return $this->response($this->success($res));
    }
}
