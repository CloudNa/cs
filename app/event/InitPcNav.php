<?php
/**
 *shop商城系统
 */


namespace app\event;

use addon\pc\model\Pc;

/**
 * PC端导航
 * @author Administrator
 *
 */
class InitPcNav
{
    public function handle($data)
    {
        $link = [
            [
                'title' => '首页',
                'url' => '/index',
                'sort' => 1,
            ],
            [
                'title' => '品牌专区',
                'url' => '/brand',
                'sort' => 2,
            ],
            [
                'title' => '店铺街',
                'url' => '/street',
                'sort' => 3,
            ]
        ];
        if(addon_is_exit('pc')){
            $pc_model = new Pc();
            foreach ($link as $k => $v) {
                $pc_model->deleteNav([ [ 'nav_title', '=', $v[ 'title' ] ] ]);
                $sort = $v[ 'sort' ];
                unset($v[ 'sort' ]);
                $add_data = [
                    'nav_title' => $v[ 'title' ],
                    'nav_url' => json_encode($v, 320),
                    'sort' => $sort,
                    'is_blank' => 0,
                    'create_time' => time(),
                    'is_show' => 1
                ];
                $pc_model->addNav($add_data);
            }
        }


        return 1;
    }
}
