<?php
/**
 *shop商城系统
 */


namespace addon\discount\event;

/**
 * 应用卸载
 */
class UnInstall
{
	/**
	 * 执行卸载
	 */
	public function handle()
	{
/* 	    try{
	        execute_sql('addon/discount/data/uninstall.sql');
	        return success();
	    }catch (\Exception $e)
	    {
	        return error('', $e->getMessage());
	    } */
	    return error("系统插件不能删除");
	}
}