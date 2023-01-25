<?php
/**
 *shop商城系统
 */
namespace addon\bargain\event;

use addon\bargain\model\Bargain;

class BargainLaunchClose
{
    public function handle($params){
        $bargain = new Bargain();
        $res = $bargain->cronCloseBargainLaunch($params['relate_id']);
        return $res;
    }
}