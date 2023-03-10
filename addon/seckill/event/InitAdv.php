<?php
/**
 *shop商城系统
 */

namespace addon\seckill\event;

use app\model\web\Adv as AdvModel;
use app\model\web\AdvPosition;

/**
 * 广告
 * @author Administrator
 *
 */
class InitAdv
{
    public function handle($data)
    {
        $adv_position_model = new AdvPosition();
        $res = $adv_position_model->addAdvPosition([
            'ap_name' => '秒杀专区',
            'keyword' => 'NS_SECKILL',
            'ap_intro' => '',
            'ap_height' => '400',
            'ap_width' => '1920',
            'default_content' => '',
            'ap_background_color' => '#FFFFFF',
            'type' => 2,
        ]);


        $adv_model = new AdvModel();
        $adv_model->addAdv([
            'ap_id' => $res[ 'data' ],
            'adv_title' => '秒杀专区',
            'adv_url' => '',
            'adv_image' => 'upload/default/diy_view/index_seckill_gg.png',
            'slide_sort' => 0,
            'price' => 0,
            'background' => '#FFFFFF'
        ]);

    }
}
