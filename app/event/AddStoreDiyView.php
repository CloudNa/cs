<?php
/**
 * shop多商户商城
 */

namespace app\event;

use app\model\web\DiyView as DiyViewModel;


/**
 * 增加默认自定义数据：网站主页
 */
class AddStoreDiyView
{

    public function handle($param)
    {
        if (!empty($param[ 'site_id' ])) {

            $diy_view_model = new DiyViewModel();

            // 添加自定义主页装修
            $value = json_encode([
                "global" => [
                    "title" => "门店主页",
                    "openBottomNav" => false,
                    "bgColor" => "#ffffff",
                    "bgUrl" => "",
                    "moreLink" => [
                        "name" => ""
                    ],
                    "mpCollect" => false,
                    "navStyle" => 1,
                    "popWindow" => [
                        "imageUrl" => "",
                        "count" => -1,
                        "link" => [
                            "name" => ""
                        ],
                        "imgWidth" => "",
                        "imgHeight" => ""
                    ],
                    "textImgPosLink" => "left",
                    "textImgStyleLink" => "1",
                    "textNavColor" => "#333333",
                    "topNavColor" => "#ffffff",
                    "topNavImg" => "",
                    "topNavbg" => false
                ],
                "value" => [
                    [
                        "addon_name" => "store",
                        "type" => "STORE_INFO",
                        "name" => "门店信息",
                        "controller" => "StoreInfo"
                    ]
                ]
            ]);

            // 门店主页
            $data = [
                'site_id' => $param[ 'site_id' ],
                'title' => '门店主页',
                'name' => 'DIY_STORE_' . $param[ 'store_id' ],
                'type' => 'store',
                'value' => $value
            ];
            $res = $diy_view_model->addSiteDiyView($data);

            return $res;

        }

    }

}