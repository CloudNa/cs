<?php
/**
 *shop商城系统
 */

namespace app\admin\controller;

use addon\fenxiao\model\FenxiaoApply;
use addon\fenxiao\model\FenxiaoWithdraw;
use app\model\goods\Goods as GoodsModel;
use app\model\order\Complain as ComplainModel;
use app\model\order\Order as OrderModel;
use app\model\order\OrderCommon;
use app\model\order\OrderRefund as OrderRefundModel;
use app\model\shop\Shop as ShopModel;
use app\model\shop\ShopApply;
use app\model\system\Config;
use app\model\system\Stat as StatModel;
use app\model\system\Upgrade as UpgradeModel;
use app\model\system\User as UserModel;
use app\model\system\Web;
use Carbon\Carbon;

/**
 * 首页 控制器
 */
class Index extends BaseAdmin
{

    /**
     * 首页
     */
    public function index()
    {
        $config_model = new Config();
        $stat_model = new StatModel();
        $goods_model = new GoodsModel();
        $carbon = Carbon::now();

        $stat_info = $stat_model->getStatShop(0, $carbon->year, $carbon->month, $carbon->day);
        $this->assign('stat_info', $stat_info[ 'data' ]);


        //基础统计信息
        $today = Carbon::now();
        $yesterday = Carbon::yesterday();
        $stat_today = $stat_model->getStatShop(0, $today->year, $today->month, $today->day);
        $stat_yesterday = $stat_model->getStatShop(0, $yesterday->year, $yesterday->month, $yesterday->day);
        $this->assign("stat_day", $stat_today[ 'data' ]);
        $this->assign("stat_yesterday", $stat_yesterday[ 'data' ]);
        $this->assign("today", $today);
        //日同比
        $day_rate[ 'order_pay_count' ] = diff_rate($stat_today[ 'data' ][ 'order_pay_count' ], $stat_yesterday[ 'data' ][ 'order_pay_count' ]);
        $day_rate[ 'order_total' ] = diff_rate($stat_today[ 'data' ][ 'order_total' ], $stat_yesterday[ 'data' ][ 'order_total' ]);
        $day_rate[ 'member_count' ] = diff_rate($stat_today[ 'data' ][ 'member_count' ], $stat_yesterday[ 'data' ][ 'member_count' ]);

        //近十天的订单数以及销售金额
        $date_day = getweeks();
        $order_total = '';
        $order_pay_count = '';
        foreach ($date_day as $k => $day) {
            $dayarr = explode('-', $day);
            $stat_day[ $k ] = $stat_model->getStatShop(0, $dayarr[ 0 ], $dayarr[ 1 ], $dayarr[ 2 ]);
            $order_total .= $stat_day[ $k ][ 'data' ][ 'order_total' ] . ',';
            $order_pay_count .= $stat_day[ $k ][ 'data' ][ 'order_pay_count' ] . ',';
        }
        $ten_day[ 'order_total' ] = explode(',', substr($order_total, 0, strlen($order_total) - 1));
        $ten_day[ 'order_pay_count' ] = explode(',', substr($order_pay_count, 0, strlen($order_pay_count) - 1));
        $this->assign('ten_day', $ten_day);

        //数据信息统计
        $order = new OrderCommon();
        $waitpay = $order->getOrderCount([ [ 'order_status', '=', 0 ], [ 'is_delete', '=', 0 ] ]);
        $waitsend = $order->getOrderCount([ [ 'order_status', '=', 1 ], [ 'is_delete', '=', 0 ] ]);
        $order_refund_model = new OrderRefundModel();
        $refund_num = $order_refund_model->getRefundOrderGoodsCount([
            [ "refund_status", "not in", [ 0, 3 ] ]
        ]);

        $goods_total = $goods_model->getGoodsTotalCount([ [ 'goods_state', '=', 1 ], [ 'is_delete', '=', 0 ] ]);
        $warehouse_goods = $goods_model->getGoodsTotalCount([ [ 'goods_state', '=', 0 ], [ 'is_delete', '=', 0 ] ]);

        $num_data = [
            'waitpay' => $waitpay[ 'data' ],
            'waitsend' => $waitsend[ 'data' ],
            'refund' => $refund_num[ 'data' ],
            'goods_total' => $goods_total[ 'data' ],
            'warehouse_goods' => $warehouse_goods[ 'data' ]
        ];

        //分销插件是否存在
        $is_fenxiao = addon_is_exit('fenxiao');
        $this->assign('is_fenxiao', $is_fenxiao);
        if ($is_fenxiao) {
            //提现待审核
            $fenxiao_model = new FenxiaoWithdraw();
            $withdraw_count = $fenxiao_model->getFenxiaoWithdrawCount([ [ 'status', '=', 1 ] ], 'id');
            $num_data[ 'withdraw_count' ] = $withdraw_count[ 'data' ];

            //分销商申请
            $fenxiao_apply_model = new FenxiaoApply();
            $fenxiao_count = $fenxiao_apply_model->getFenxiaoApplyCount([ [ 'status', '=', 1 ] ], 'apply_id');
            $num_data[ 'apply_count' ] = $fenxiao_count[ 'data' ];
        } else {
            $waitconfirm = $order->getOrderCount([ [ 'order_status', "=", 3 ], [ 'site_id', '=', $this->site_id ], [ 'is_delete', '=', 0 ] ]);
            $complete = $order->getOrderCount([ [ 'order_status', "=", 10 ], [ 'site_id', '=', $this->site_id ], [ 'is_delete', '=', 0 ] ]);
            $num_data[ 'waitconfirm' ] = $waitconfirm[ 'data' ];
            $num_data[ 'complete' ] = $complete[ 'data' ];
        }

        //维权订单
        $complain_model = new ComplainModel();
        $complain_count = $complain_model->getComplainCount([ [ 'complain_status', '=', 1 ] ]);
        $num_data[ 'complain_count' ] = $complain_count[ 'data' ];

        $this->assign('num_data', $num_data);

        //订单总额
        $order_model = new OrderModel();
        $order_money = $order_model->getOrderMoneySum();
        $this->assign('order_money', $order_money[ 'data' ]);

        //会员总数
        $user_model = new UserModel();
        $member_count = $user_model->getMemberTotalCount();
        $this->assign('member_count', $member_count[ 'data' ]);

        //新增店铺数
        $shop_apply_model = new ShopApply();
        $today_apply_count = $shop_apply_model->getShopApplyCount([ [ 'create_time', 'between', [ date_to_time(date('Y-m-d 00:00:00')), date_to_time(date('Y-m-d 23:59:59')) ] ] ]);
        $yesterday_apply_count = $shop_apply_model->getShopApplyCount([ [ 'create_time', 'between', [ date_to_time(date('Y-m-' . $yesterday->day . ' 00:00:00')), date_to_time(date('Y-m-' . $yesterday->day . ' 23:59:59')) ] ] ]);
        $this->assign('today_apply_count', $today_apply_count[ 'data' ]);
        $this->assign('yesterday_apply_count', $yesterday_apply_count[ 'data' ]);

        $day_rate[ 'shop_count' ] = diff_rate($today_apply_count[ 'data' ], $yesterday_apply_count[ 'data' ]);
        $this->assign('day_rate', $day_rate);

        //今日申请店铺数
        $shop_model = new ShopModel();
        $shop_count = $shop_model->getShopCount([ [ 'create_time', 'between', [ date_to_time(date('Y-m-d 00:00:00')), date_to_time(date('Y-m-d 23:59:59')) ] ] ]);
        $this->assign('shop_count', $shop_count[ 'data' ]);

        //店铺总数
        $shop_total_count = $shop_model->getShopCount();
        $this->assign('shop_total_count', $shop_total_count[ 'data' ]);

        //商品总数
        $goods_count = $goods_model->getGoodsTotalCount();
        $this->assign('goods_count', $goods_count[ 'data' ]);

        //获取最新版本
        $upgrade_model = new UpgradeModel();
        $last_version = $upgrade_model->getLatestVersion();
        $last_release = $last_version[ 'data' ][ 'version_no' ] ?? 0;
        $need_upgrade = 0;
        $app_info = config('info');
        if ($app_info[ 'version_no' ] < $last_release) {
            $need_upgrade = 1;
        }

        $system_config = $config_model->getSystemConfig();
        $this->assign('need_upgrade', $need_upgrade);
        $this->assign('sys_product_name', $app_info[ 'name' ]);
        $this->assign('sys_version_no', $app_info[ 'version_no' ]);
        $this->assign('sys_version_name', $app_info[ 'version' ]);
        $this->assign('system_config', $system_config[ 'data' ]);

        $this->assign('system_config', $system_config[ 'data' ]);

        //待处理的事物
        //$this->todo();
        return $this->fetch('index/index');

    }

    /**
     * 待处理项
     */
    public function todo()
    {
        //待审核商品
        $goods_model = new \app\model\goods\Goods();
        $goods_count_result = $goods_model->getGoodsTotalCount([ [ "verify_state", "=", 0 ], [ "is_delete", "=", 0 ] ]);
        $this->assign("verify_goods_count", $goods_count_result[ "data" ]);
        //举报商品
        $inform_model = new \app\model\goods\Inform();
        $inform_count_result = $inform_model->getInformCount([ [ "state", "=", 0 ] ]);
        $this->assign("inform_count", $inform_count_result[ "data" ]);

        //查询平台维权数量
        $complain_model = new \app\model\order\Complain();
        $complain_count_result = $complain_model->getComplainCount([ [ "complain_status", "=", 1 ] ]);
        $this->assign("complain_count_result", $complain_count_result[ "data" ]);

        //店铺入驻申请
        $shop_apply_model = new \app\model\shop\ShopApply();
        $shop_apply_count_result = $shop_apply_model->getShopApplyCount([ [ "apply_state", "in", [ 1, 2 ] ] ]);
        $this->assign("shop_apply_count", $shop_apply_count_result[ "data" ]);
        //店铺续签申请

        $shop_reopen_model = new \app\model\shop\ShopReopen();
        $shop_reopen_count_result = $shop_reopen_model->getApplyReopenCount([ [ "apply_state", "=", 1 ] ]);
        $this->assign("shop_reopen_count", $shop_reopen_count_result[ "data" ]);

    }

    /**
     * 官网资讯
     */
    public function news()
    {
        $web_model = new Web();
        $result = $web_model->news();
        return $result;
    }
    /**
     * 账号及安全
     */
//	public function security()
//	{
//		$user_model = new UserModel();
//		$bind_mobile_info = $user_model->getUserBindMobileInfo(UID);
//		$this->assign('bind_mobile_info', $bind_mobile_info);
//		$this->assign('uid', UID);
//		$user_info = $user_model->getUserInfo([ 'uid' => UID ]);
//		$this->assign('user_info', $user_info['data']);
//		return $this->fetch('index/security');
//	}

    /**
     * 校验当前域名
     */
//	public function checkSiteDomain()
//	{
//		$site_model = new Site();
//		//查询所有站点绑定域名
//		$domains = cache('domains');
//		if (!$domains) {
//
//			$domains = $site_model->getSiteDomains();
//			cache('domains', $domains['data']);
//		}
//		//获取当前域名用于检测当前域名是否是站点绑定域名
//		$domain = request()->domain();
//		//检测是否存在绑定站点域名
//		if (array_key_exists($domain, $domains)) {
//			request()->siteid($domains[ $domain ]);
//			$site_info = $site_model->getSiteInfo([ 'site_id' => $domains[ $domain ] ]);
//			if (!empty($site_info)) {
//				$this->error("当前站点域名已配置！", $domain . "/admin/index");
//			}
//		}
//	}

    /**
     * 用户绑定手机操作
     * @return mixed
     */
//	public function bindMobile()
//	{
//		if (IS_AJAX) {
//			$mobile = input('mobile', '');
//            $sms_code = input('sms_code', '');
//			if(empty($mobile)){
//			    return error(-1, "手机号不可以为空");
//            }
//            $key = md5("bind_mobile_code_" . 0 . "_" . $mobile);
//            $code = Cache::get($key);
//            if (empty($code)) {
//                return error(-1, "短信动态码已失效");
//            }
//            if ($sms_code != $code) {
//                return error(-1, "短信动态码错误");
//            }
//
//			$user_model = new UserModel();
//			$res = $user_model->bindMobile($mobile, UID);
//			return $res;
//		}
//	}

    /**
     * 更改绑定手机号
     * @return \multitype
     */
//	public function updateMobile(){
//        if (IS_AJAX) {
//            $mobile = input('mobile', '');
//            $sms_code = input('sms_code', '');
//            if(empty($mobile)){
//                return error(-1, "手机号不可以为空");
//            }
//            //验证当前手机号
//            $key = md5("bind_mobile_code_" . 0 . "_" . $mobile);
//            $code = Cache::get($key);
//            if (empty($code)) {
//                return error(-1, "短信动态码已失效");
//            }
//            if ($sms_code != $code) {
//                return error(-1, "短信动态码错误");
//            }
//
//            $user_model = new UserModel();
//            $res = $user_model->bindMobile($mobile, UID);
////	        $user_model->refreshUserInfoSession(UID);
//            return $res;
//        }
//    }

    /**
     * 检测手机号是否存在
     */
//	public function checkMobileIsExist()
//	{
//		if (IS_AJAX) {
//			$mobile = input('mobile', '');
//			$user_model = new UserModel();
//			$res = $user_model->checkMobileIsExist($mobile, UID);
//			return $res;
//		}
//	}

    /**
     * 绑死手机发送验证码
     */
//	public function sendSmsCode(){
//        $mobile = input("mobile", '');
//        if (empty($mobile)) {
//            return error(-1, "手机号不可以为空!");
//        }
//
//        $user_model = new User();
//        $exist_result = $user_model->checkMobileIsExist($mobile);
//        $exist_count = $exist_result["data"];
//        if($exist_count > 0){
//            return error(-1, "当前手机号已存在!");
//        }
//
//       $code = rand(100000, 999999);
//       $data = [ "keyword" => "BIND_MOBILE", "site_id" => 0, 'code' => $code, 'support_type' => "Sms", 'mobile' => $mobile ];//仅支持短信发送
//       $res = hook("SendMessage", $data);
//       if($res[0]["code"] == 0){
//           $key = md5("bind_mobile_code_" . 0 . "_" . $mobile);
//           Cache::set($key, $code, 3600);
//       }
//       return $res[0];
//    }

//    public function test(){
//        $addon = new Addon();
//        $data = $addon->getAddons();
//        $event = include 'app/event.php';
//         foreach ($data['addon_path'] as $k => $v)
//        {
//            $addon_event = require_once $v.'config/event.php';
//            $event['bind'] = array_merge($event['bind'], $addon_event['bind']);
//            $event['listen'] = array_merge($event['listen'], $addon_event['listen']);
//
//        }
//
//    }


    public function test(){
        $code = str_pad(random_int(1, 9999), 4, 0, STR_PAD_LEFT); // 生成4位随机数，左侧补0
        $message_model = new \app\model\message\Message();
        $res = $message_model->sendMessage([ "mobile" => 13994852554, "code" => $code, "support_type" => [ "sms" ], "keywords" => "MEMBER_BIND" ]);
        dump($res);
    }

}
