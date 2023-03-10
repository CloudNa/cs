<?php
/**
 * shop多商户商城
 */

namespace addon\goodsgrab\shop\controller;

use addon\goodsgrab\model\Grab as GrabModel;
use app\shop\controller\BaseShop;
use addon\goodsgrab\model\GoodsGrab as GoodsGrabModel;

/**
 * 商品采集
 */
class Grab extends BaseShop
{

    /**
     * 生成采集记录
     */
    public function startGrab()
    {
        if(request()->isAjax()){

            //判断是否进行采集配置
            $config_model = new GoodsGrabModel();
            $config = $config_model->getGoodsGrabConfig($this->site_id);
            $config = $config['data'];
            if($config['is_use'] != 1){
                return error('','请先进行商品采集配置');
            }

            $category_id = input("category_id", 0);// 分类id
            $category_id = ',' . implode(',', $category_id) . ',';

            $data = [
                'site_id' => $this->site_id,
                'is_virtual' => input('is_virtual',''),
                'category_id' => $category_id,
                'category_name' => input('category_name','')
            ];

            $model = new GrabModel();
            $res = $model->addGoodsGrab($data);
            return $res;
        }
    }


    /**
     * 商品采集
     */
    public function grab()
    {
        if(request()->isAjax()){

            $grab_id = input('grab_id','');
            $url = input('url','');

            $category_id = input("category_id", 0);// 分类id
            $category_json = json_encode($category_id);//分类字符串
            $category_id = ',' . implode(',', $category_id) . ',';
            $is_virtual = input('is_virtual','');

            $data = [
                'site_id' => $this->site_id,
                'category_id' => $category_id,
                'category_json' => $category_json,
                'grab_id' => $grab_id,
                'is_virtual' => $is_virtual
            ];
            $model = new GrabModel();
            $res = $model->goodsGrab($data,$url);
            return $res;
        }
    }


}