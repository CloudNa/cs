<?php

/**
 *shop商城系统
 */

return [
    'bind'      => [],

    'listen'    => [
        //展示活动
        'ShowPromotion' => [
            'addon\servicer\event\ShowPromotion',
        ],
        'PromotionType' => [
//            'addon\servicer\event\PromotionType',
        ],
    ],

    'subscribe' => [],
];
