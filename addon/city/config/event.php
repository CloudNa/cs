<?php
/**
 *shop商城系统
 */
return [
    'bind' => [

    ],

    'listen' => [

        //店铺周期结算
        'WebsiteSettlement' => [
            'addon\city\event\WebsiteSettlement'
        ],
        'LinkDict' => [
            'addon\city\event\LinkDict'
        ]
    ],

    'subscribe' => [
    ],
];
