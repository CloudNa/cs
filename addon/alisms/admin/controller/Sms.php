<?php
/**
 *shop商城系统
 */

namespace addon\alisms\admin\controller;

use addon\alisms\model\Config as ConfigModel;
use app\admin\controller\BaseAdmin;

/**
 * 阿里云短信 控制器
 */
class Sms extends BaseAdmin
{
    public function config()
    {
        $config_model = new ConfigModel();
        if (request()->isAjax()) {
            $access_key_id = input("access_key_id", "");//access_key_id
            $access_key_secret = input("access_key_secret", "");//access_key_secret
            $smssign = input("smssign", '');//短信签名

            $status = input("status", 0);//启用状态
            $data = array (
                "access_key_id" => $access_key_id,
                "access_key_secret" => $access_key_secret,
                "smssign" => $smssign
            );
            $result = $config_model->setSmsConfig($data, $status);
            return $result;
        } else {
            $info_result = $config_model->getSmsConfig();
            $info = $info_result[ "data" ];
            $this->assign("info", $info);
            return $this->fetch("sms/config");
        }
    }
}