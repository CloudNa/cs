<?php
/**
 *
 */

namespace app\api\controller;

use app\model\member\Config;
use app\model\member\Register as RegisterModel;
use app\model\message\Message;
use app\model\web\Config as CaptchaModel;
use think\facade\Cache;

class Register extends BaseApi
{
    /**
     * 注册设置
     */
    public function config()
    {
        $register = new Config();
        $info = $register->getRegisterConfig();
        return $this->response($info);
    }

    /**
     * 注册协议
     */
    public function aggrement()
    {
        $register = new Config();
        $info = $register->getRegisterDocument();
        return $this->response($info);
    }

    /**
     * 用户名密码注册
     */
    public function username()
    {
        $config = new Config();
        $config_info = $config->getRegisterConfig();
        if (strstr($config_info[ 'data' ][ 'value' ][ 'register' ], 'username') === false)
            return $this->response($this->error("", "REGISTER_REFUND"));

        $register = new RegisterModel();
        $exist = $register->usernameExist($this->params[ 'username' ]);
        if ($exist) {
            return $this->response($this->error("", "用户名已存在"));
        } else {
            $captcha_model = new CaptchaModel();
            $config_info = $captcha_model->getCaptchaConfig();
            $config_info = $config_info[ 'data' ][ 'value' ];
            // 校验验证码
            if(!empty($config_info['shop_reception_login']) && $config_info['shop_reception_login'] == 1){
                $captcha = new Captcha();
                $check_res = $captcha->checkCaptcha();
                if ($check_res[ 'code' ] < 0) {
                    return $this->response($check_res);
                }
            }
            $res = $register->usernameRegister($this->params);
            //生成access_token
            if ($res[ 'code' ] >= 0) {
                $token = $this->createToken($res[ 'data' ]);
                return $this->response($this->success([ 'token' => $token ]));
            }
            return $this->response($res);
        }

    }

    /**
     * 手机号注册
     * @return false|string
     */
    public function mobile()
    {
        $config = new Config();
        $config_info = $config->getRegisterConfig();
        if (strstr($config_info[ 'data' ][ 'value' ][ 'register' ], 'mobile') === false) return $this->response($this->error("", "REGISTER_REFUND"));

        $register = new RegisterModel();
        $exist = $register->mobileExist($this->params[ 'mobile' ]);
        if ($exist) {
            return $this->response($this->error("", "手机号已存在"));
        } else {
            $key = $this->params[ 'key' ];
            $verify_data = Cache::get($key);
            if ($verify_data[ "mobile" ] == $this->params[ "mobile" ] && $verify_data[ "code" ] == $this->params[ "code" ]) {
                $res = $register->mobileRegister($this->params);
                if ($res[ 'code' ] >= 0) {
                    $token = $this->createToken($res[ 'data' ]);
                    $res = $this->success([ 'token' => $token ]);
                }
            } else {
                $res = $this->error("", "手机动态码不正确");
            }
            return $this->response($res);
        }
    }

    /**
     * 检测存在性
     */
    public function exist()
    {
        $type = $this->params[ 'type' ];
        $register = new RegisterModel();
        switch ( $type ) {
            case "username" :
                $res = $register->usernameExist($this->params[ 'username' ]);
                break;
            case "email" :
                $res = $register->emailExist($this->params[ 'email' ]);
                break;
            case "mobile" :
                $res = $register->mobileExist($this->params[ 'mobile' ]);
                break;
            default:
                $res = 0;
                break;
        }
        if ($res) {
            return $this->response($this->error("", "账户已存在"));
        } else {
            return $this->response($this->success());
        }
    }


    /**
     * 短信验证码
     * @return false|string
     * @throws Exception
     */
    public function mobileCode()
    {
        // 校验验证码
        $captcha = new Captcha();
        $check_res = $captcha->checkCaptcha(false);
        if ($check_res[ 'code' ] < 0) return $this->response($check_res);

        $mobile = $this->params[ 'mobile' ];//注册手机号
        $register = new RegisterModel();
        $exist = $register->mobileExist($mobile);
        if ($exist) {
            return $this->response($this->error("", "手机号已存在"));
        } else {
            $code = str_pad(random_int(1, 9999), 4, 0, STR_PAD_LEFT);// 生成4位随机数，左侧补0
            $message_model = new Message();
            $res = $message_model->sendMessage([ "mobile" => $mobile, "code" => $code, "support_type" => [ "sms" ], "keywords" => "REGISTER_CODE" ]);
            if ($res[ "code" ] >= 0) {
                //将验证码存入缓存
                $key = 'register_mobile_code_' . md5(uniqid(null, true));
                Cache::tag("register_mobile_code")->set($key, [ 'mobile' => $mobile, 'code' => $code ], 600);
                return $this->response($this->success([ "key" => $key ]));
            } else {
                return $this->response($res);
            }
        }
    }
}