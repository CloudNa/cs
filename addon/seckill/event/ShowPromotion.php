<?php
/**
 *shop商城系统
 */


namespace addon\seckill\event;

/**
 * 活动展示
 */
class ShowPromotion
{

    /**
     * 活动展示
     * 
     * @return multitype:number unknown
     */
	public function handle()
	{
        $data = [
            'admin' => [
                [
                    //插件名称
                    'name' => 'seckill',
                    //展示分类（根据平台端设置，admin（平台营销），shop：店铺营销，member:会员营销, tool:应用工具）
                    'show_type' => 'admin',
                    //展示主题
                    'title' => '限时秒杀',
                    //展示介绍
                    'description' => '限时秒杀功能',
                    //展示图标
                    'icon' => 'addon/seckill/icon.png',
                    //跳转链接
                    'url' => 'seckill://admin/seckill/lists',
                ]
            ],
            'shop' => [
                [
                    //插件名称
                    'name' => 'seckill',
                    //展示分类（根据平台端设置，admin（平台营销），shop：店铺营销，member:会员营销, tool:应用工具）
                    'show_type' => 'admin',
                    //展示主题
                    'title' => '限时秒杀',
                    //展示介绍
                    'description' => '限时秒杀功能',
                    //展示图标
                    'icon' => 'addon/seckill/icon.png',
                    //跳转链接
                    'url' => 'seckill://shop/seckill/lists',
                ]
            ]

        ];
	    return $data;
	}
}