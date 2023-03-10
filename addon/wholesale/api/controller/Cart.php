<?php

namespace addon\wholesale\api\controller;

use addon\wholesale\model\Cart as CartModel;
use app\api\controller\BaseApi;

class Cart extends BaseApi
{
	/**
	 * 添加信息
	 */
	public function add()
	{
		$token = $this->checkToken();
		if ($token['code'] < 0) return $this->response($token);

		$sku_id = isset($this->params['sku_id']) ? $this->params['sku_id'] : 0;
		$num = isset($this->params['num']) ? $this->params['num'] : 0;
		if (empty($sku_id)) {
			return $this->response($this->error('', 'REQUEST_SKU_ID'));
		}
		if (empty($num)) {
			return $this->response($this->error('', 'REQUEST_NUM'));
		}
		$cart = new CartModel();
		$data = [
			'site_id' => $this->params['site_id'],
			'member_id' => $token['data']['member_id'],
			'sku_id' => $sku_id,
			'num' => $num
		];

		$res = $cart->addCart($data);
		if ($res['code'] == 0) {
			$res = $cart->getCartCount($token['data']['member_id']);
		}

		return $this->response($res);
	}

	/**
	 * 编辑信息
	 */
	public function edit()
	{
		$token = $this->checkToken();
		if ($token['code'] < 0) return $this->response($token);

		$cart_id = isset($this->params['cart_id']) ? $this->params['cart_id'] : 0;
		$num = isset($this->params['num']) ? $this->params['num'] : 0;
		if (empty($cart_id)) {
			return $this->response($this->error('', 'REQUEST_CART_ID'));
		}
		if (empty($num)) {
			return $this->response($this->error('', 'REQUEST_NUM'));
		}

		$cart = new CartModel();
		$data = [
			'cart_id' => $cart_id,
			'member_id' => $token['data']['member_id'],
			'num' => $num
		];
		$res = $cart->editCart($data);
		return $this->response($res);
	}

	/**
	 * 删除信息
	 */
	public function delete()
	{
		$token = $this->checkToken();
		if ($token['code'] < 0) return $this->response($token);

		$cart_id = isset($this->params['cart_id']) ? $this->params['cart_id'] : 0;
		if (empty($cart_id)) {
			return $this->response($this->error('', 'REQUEST_CART_ID'));
		}
		$cart = new CartModel();
		$data = [
			'cart_id' => $cart_id,
			'member_id' => $token['data']['member_id']
		];
		$res = $cart->deleteCart($data);
		return $this->response($res);
	}

	/**
	 * 清空购物车
	 */
	public function clear()
	{
		$token = $this->checkToken();
		if ($token['code'] < 0) return $this->response($token);

		$cart = new CartModel();
		$data = [
			'member_id' => $token['data']['member_id']
		];
		$res = $cart->clearCart($data);
		return $this->response($res);
	}

	/**
	 * 列表信息
	 */
	public function lists()
	{
		$token = $this->checkToken();
		if ($token['code'] < 0) return $this->response($token);
		$cart = new CartModel();
		$list = $cart->getCart($token['data']['member_id']);
		return $this->response($list);
	}

	/**
	 * 获取购物车数量
	 * @return string
	 */
	public function count()
	{
		$token = $this->checkToken();
		if ($token['code'] < 0) return $this->response($token);
		$cart = new CartModel();
		$list = $cart->getCartCount($token['data']['member_id']);
		return $this->response($list);
	}
}
