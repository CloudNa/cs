<?php
/**
 *shop商城系统
 */


namespace addon\membersignin\event;

use addon\membersignin\model\Signin;

/**
 * 会员账户变化规则
 */
class MemberAccountRule
{

    public function handle($data)
    {
        $config = new Signin();
        $info   = $config->getConfig();
        $return = '';
        if ($data['account'] == 'point') {
            if ($info['data']['is_use'] == 1) {
                foreach ($info['data']['value']['reward'] as $v) {

                    $return .= "会员签到" . $v['day'] . "天，赠送" . $v['point'] . "积分；";
                }
            }
        }
        if ($data['account'] == 'growth') {
            if ($info['data']['is_use'] == 1) {
                foreach ($info['data']['value']['reward'] as $v) {

                    $return .= "会员签到" . $v['day'] . "天，赠送" . $v['growth'] . "成长值；";
                }
            }
        }
        return isset($return) ? $return : '';

    }
}