<?php
// +----------------------------------------------------------------------
// | 平台端菜单设置
// +----------------------------------------------------------------------
return [
    [
        'name' => 'PROMOTION_TOPIC',
        'title' => '专题活动',
        'url' => 'topic://shop/topic/lists',
        'parent' => 'PROMOTION_CENTER',
        'is_show' => 0,
        'is_control' => 1,
        'is_icon' => 0,
        'picture' => '',
        'picture_select' => '',
        'sort' => 100,
        'child_list' => [
            [
                'name' => 'PROMOTION_TOPIC_LIST',
                'title' => '活动列表',
                'url' => 'topic://shop/topic/lists',
                'parent' => 'PROMOTION_CENTER',
                'is_show' => 1,
                'is_control' => 1,
                'is_icon' => 0,
                'picture' => '',
                'picture_select' => '',
                'sort' => 100,
                'child_list' => [
                    [
                        'name' => 'PROMOTION_TOPIC_GOODS_LIST',
                        'title' => '商品管理',
                        'url' => 'topic://shop/topic/goodslist',
                        'sort'    => 1,
                        'is_show' => 0
                    ],
                    [
                        'name' => 'PROMOTION_TOPIC_GOODS_TOPIC_ADD',
                        'title' => '添加活动商品',
                        'url' => 'topic://shop/topic/add',
                        'sort'    => 1,
                        'is_show' => 0
                    ],
                    [
                        'name' => 'PROMOTION_TOPIC_GOODS_TOPIC_EDIT',
                        'title' => '编辑活动商品',
                        'url' => 'topic://shop/topic/edit',
                        'sort'    => 1,
                        'is_show' => 0
                    ],
                    [
                        'name' => 'PROMOTION_TOPIC_GOODS_DELETE',
                        'title' => '删除活动商品',
                        'url' => 'topic://shop/topic/delete',
                        'sort'    => 1,
                        'is_show' => 0
                    ]
                ],
            ] ,

        ]
    ],
];
