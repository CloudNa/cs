<?php
/**
 *shop商城系统
 */

namespace addon\supply\supply\controller;

use addon\supply\model\Supplier;
use addon\supply\model\SupplyApply;
use addon\supply\model\SupplyReopen;
use app\model\web\WebSite as WebsiteModel;
use app\model\shop\Config as ShopConfigModel;

/**
 * 店铺
 * Class Shop
 * @package addon\supply\supply\controller
 */
class Reopen extends BaseSupply
{

    protected $app_module = "supply";

    public function __construct()
    {
        //执行父类构造函数
        parent::__construct();
    }

    /*
     * 续签首页
     */
    public function index()
    {
        $site_id = $this->supply_id;//店铺ID

        //获取店铺信息
        $condition[] = ['supplier_site_id', '=', $site_id];

        $apply_model = new Supplier();
        $apply_info  = $apply_model->getSupplierInfo($condition, '*');
        $apply_data  = $apply_info['data'];

        //店铺的到期时间（0为永久授权）
        if ($apply_data != null) {
            if ($apply_data['expire_time'] == 0) {
                $apply_data['is_reopen'] = 1;//永久有效
            } elseif ($apply_data['expire_time'] > time()) {
                $cha  = $apply_data['expire_time'] - time();
                $date = ceil(($cha / 86400));
                if ($date < 30) {
                    $apply_data['is_reopen'] = 2;//离到期一月内才可以申请续签
                }
            } else {
                $apply_data['is_reopen'] = 3;
            }

            $apply_data['expire_time'] = $apply_data['expire_time'] == 0 ? '永久有效' : date("Y-m-d H:i:s", $apply_data['expire_time']);
        }
        $this->assign('apply_data', $apply_data);

        //获取续签信息
        if (request()->isAjax()) {
            $reopen = new SupplyReopen();
            $page        = input('page', 1);
            $page_size   = input('page_size', PAGE_LIST_ROWS);
            $list        = $reopen->getReopenPageList([['site_id', '=', $site_id]], $page, $page_size);
            return $list;
        } else {
            $reopen = new SupplyReopen();
            $page_size   = input('page_size', PAGE_LIST_ROWS);
            $reopen = $reopen->getReopenPageList([['site_id', '=', $site_id]], 1, $page_size);
            $this->assign('shop_reopen', $reopen);
        }

        //平台配置信息
        $website_model = new WebsiteModel();
        $website_info  = $website_model->getWebSite([['site_id', '=', 0]], 'web_qrcode,web_phone');
        $this->assign('website_info', $website_info['data']);

        //收款信息
        $config_model = new ShopConfigModel();
        $receivable_config = $config_model->getSystemBankAccount();
        $this->assign('receivable_config', $receivable_config['data']);

        return $this->fetch("reopen/index");
    }


    /**
     * 添加续签
     * @return array|mixed
     */
    public function addReopen()
    {
        if (request()->isAjax()) {
            $site_id     = $this->supply_id;
            $reopen_data = [
                'site_id'                          => $site_id,//店铺ID
                'apply_year'                       => input('apply_year', ''),//入驻年长
                'paying_money_certificate'         => input('paying_money_certificate', ''),//支付凭证
                'paying_money_certificate_explain' => input('paying_money_certificate_explain', '')//付款凭证说明
            ];

            $model       = new Supplier();
            $condition[] = ['supplier_site_id', '=', $reopen_data['site_id']];
            //获取该店分类ID
            $info = $model->getSupplierInfo($condition, 'category_id');

            $apply_model = new SupplyApply();
            //计算入驻金额
            $apply_money                  = $apply_model->getApplyMoney($reopen_data['apply_year'], $info['data']['category_id']);
            $reopen_data['paying_amount'] = $apply_money['data']['paying_amount'];

            $model  = new SupplyReopen();
            $result = $model->addReopen($reopen_data);

            return $result;
        } else {
            return $this->fetch("reopen/add_reopen");
        }
    }

    /**
     * 编辑续签
     * @return array
     */
    public function editReopen()
    {
        $model = new SupplyReopen();
        if (request()->isPost()) {
            $reopen_data = [
                'id'                               => input('id', ''),
                'paying_money_certificate'         => input('paying_money_certificate', ''),//支付凭证
                'paying_money_certificate_explain' => input('paying_money_certificate_explain', '')//付款凭证说明
            ];

            $result = $model->editReopen($reopen_data);

            return $result;
        } else {
            $id = input('id', '');
            //获取续签信息
            $result = $model->getReopenInfo([['id', '=', $id]], '*');
            return $result;
        }
    }

    /**
     * 删除续签
     * @return array
     */
    public function deleteReopen()
    {
        $id    = input('id', '');
        $model = new SupplyReopen();

        return $model->deleteReopen($id);
    }
}
