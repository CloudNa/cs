<?php
/**
 * shop多商户商城
 */


namespace addon\freeshipping\event;

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
        return success();
	}
}