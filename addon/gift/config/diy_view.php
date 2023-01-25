<?php
/**
 *shop商城系统
 */
return [

    'template' => [],
    'util' => [],
    'link' => [
        [
            'name' => 'GIFT',
            'title' => '礼品',
            'parent' => 'MARKETING_LINK',
            'wap_url' => '',
            'web_url' => '',
            'sort' => 0,
            'child_list' => [
                [
                    'name' => 'MY_GIFT',
                    'title' => '我的礼品',
                    'parent' => '',
                    'wap_url' => '/otherpages/member/gift/gift',
                    'web_url' => '',
                    'sort' => 0
                ],
            ]
        ]
    ],

];