<?php
/**
 *shop商城系统
 */

namespace addon\supply\admin\controller;

use addon\supply\model\SupplyCategory as SupplyCategoryModel;
use app\admin\controller\BaseAdmin;

/**
 * 商家主营行业管理 控制器
 */
class Supplycategory extends BaseAdmin
{
    /**
     * 主营行业列表
     */
    public function lists()
    {
        if (request()->isAjax()) {
            $page = input('page', 1);
            $page_size = input('page_size', PAGE_LIST_ROWS);
            $search_text = input('search_text', '');

            $condition = [];
            if (!empty($search_text)) {
                $condition[] = [ 'category_name', 'like', '%' . $search_text . '%' ];
            }
            $order = 'category_id asc';
            $field = '*';

            $supply_category_model = new SupplyCategoryModel();
            return $supply_category_model->getCategoryPageList($condition, $page, $page_size, $order, $field);
        } else {
            return $this->fetch('supplycategory/lists');
        }
    }

    /**
     * 主营行业添加
     */
    public function addCategory()
    {
        if (request()->isAjax()) {
            $data = [
                'category_name' => input('category_name', ''),//行业名称
                'baozheng_money' => input('baozheng_money', 0.00),//保证金金额
                'sort' => input('sort', 0),//排序
            ];
            $supply_category_model = new SupplyCategoryModel();
            $this->addLog("添加供应商主营行业:" . $data[ 'category_name' ] . ",保证金:" . $data[ "baozheng_money" ]);
            return $supply_category_model->addCategory($data);
        } else {
            return $this->fetch('supplycategory/add_category');
        }
    }

    /**
     * 主营行业编辑
     */
    public function editCategory()
    {
        $supply_category_model = new SupplyCategoryModel();
        if (request()->isAjax()) {
            $data = [
                'category_name' => input('category_name', ''),
                'baozheng_money' => input('baozheng_money', 0.00),
                'sort' => input('sort', 0.00),
                'category_id' => input('category_id', 0),//直接在数据中传参
            ];
            $this->addLog("编辑供应商主营行业:" . $data[ 'category_name' ] . ",保证金:" . $data[ "baozheng_money" ]);
            return $supply_category_model->editCategory($data);
        } else {
            //商家主营行业信息
            $category_id = input('category_id', 0);
            $category_info = $supply_category_model->getCategoryInfo([ [ 'category_id', '=', $category_id ] ]);
            $this->assign('category_info', $category_info);

            return $this->fetch('supplycategory/edit_category');
        }
    }

    /**
     * 主营行业删除
     */
    public function deleteCategory()
    {
        $category_ids = input('category_ids', '');
        $supply_category_model = new SupplyCategoryModel();
        $this->addLog("删除供应商主营行业id:" . $category_ids);
        return $supply_category_model->deleteCategory([ [ 'category_id', 'in', $category_ids ] ]);
    }
}
