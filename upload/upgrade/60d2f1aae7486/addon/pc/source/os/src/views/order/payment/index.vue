<template>
	<div v-loading="fullscreenLoading">
		<!--收货地址-->
		<div class="item-block" v-if="orderPaymentData.is_virtual == 0">
			<div class="block-text">收货地址</div>

			<div clsas="address-list">
				<div class="address-item" @click="addAddressShow">
					<div class="add-address">
						<i class="el-icon-circle-plus-outline"></i>
						添加收货地址
					</div>
				</div>

				<div class="address-item" v-for="(item, key) in memberAddress" :key="item.id" :class="addressId == item.id ? 'active' : ''"  v-if="key < 3 || (addressShow && key >= 3)">
					<div class="address-info">
						<div class="options">
							<div @click="editAddress(item.id)">编辑</div>
							<template v-if="item.is_default == 0">
								<el-popconfirm title="确定要删除该地址吗？" @onConfirm="deleteMemberAddress(item.id)">
									<div slot="reference">删除</div>
								</el-popconfirm>
							</template>
						</div>
						<div class="address-name">{{ item.name }}</div>
						<div class="address-mobile" @click="setMemberAddress(item.id)">{{ item.mobile }}</div>
						<div class="address-desc" @click="setMemberAddress(item.id)">{{ item.full_address }} {{ item.address }}</div>
					</div>
				</div>

				<div v-if="memberAddress.length > 3 && !addressShow" @click="addressShow = true" class="el-button--text address-open">
					<i class="el-icon-arrow-down"></i>
					更多收货地址
				</div>

				<div class="clear"></div>
			</div>
		</div>

		<!--购买虚拟类商品需填写您的手机号-->
		<div class="item-block" v-if="orderPaymentData.is_virtual == 1">
			<div class="block-text">购买虚拟类商品需填写您的手机号，以方便商家与您联系</div>

			<el-form ref="form" size="mini" class="mobile-wrap" label-width="80px">
				<el-form-item label="手机号码">
					<el-input placeholder="请输入您的手机号码" maxlength="11" v-model="orderCreateData.member_address.mobile"></el-input>
				</el-form-item>
			</el-form>
		</div>

		<!--收货地址添加-->
		<el-dialog :title="addressForm.id == 0 ? '添加收货地址' : '编辑收货地址'" :visible.sync="dialogVisible" width="32%">
			<el-form ref="form" :rules="addressRules" :model="addressForm" label-width="80px">
				<el-form-item label="姓名" prop="name">
					<el-input v-model="addressForm.name" placeholder="收货人姓名"></el-input>
				</el-form-item>

				<el-form-item label="手机" prop="mobile">
					<el-input v-model="addressForm.mobile" maxlength="11" placeholder="收货人手机号"></el-input>
				</el-form-item>

				<el-form-item label="电话">
					<el-input v-model="addressForm.telephone" placeholder="收货人固定电话（选填）"></el-input>
				</el-form-item>

				<el-form-item class="area" label="地区" prop="area">
					<el-row :gutter="10">
						<el-col :span="7">
							<el-select prop="province" ref="province" v-model="addressForm.province_id" @change="getAddress(1)" placeholder="请选择省">
								<el-option label="请选择省" value="0"></el-option>
								<el-option v-for="item in pickerValueArray" :key="item.id" :label="item.name" :value="item.id"></el-option>
							</el-select>
						</el-col>
						<el-col :span="7">
							<el-select ref="city" prop="city" v-model="addressForm.city_id" @change="getAddress(2)" placeholder="请选择市">
								<el-option label="请选择市" value="0"></el-option>
								<el-option v-for="item in cityArr" :key="item.id" :label="item.name" :value="item.id"></el-option>
							</el-select>
						</el-col>
						<el-col :span="7">
							<el-select ref="district" prop="district" v-model="addressForm.district_id" placeholder="请选择区/县">
								<el-option label="请选择区/县" value="0"></el-option>
								<el-option v-for="item in districtArr" :key="item.id" :label="item.name" :value="item.id"></el-option>
							</el-select>
						</el-col>
					</el-row>
				</el-form-item>

				<el-form-item label="详细地址" prop="address">
					<el-input v-model="addressForm.address" placeholder="定位小区、街道、写字楼"></el-input>
				</el-form-item>
			</el-form>
			<span slot="footer" class="dialog-footer">
				<el-button @click="dialogVisible = false">取 消</el-button>
				<el-button type="primary" @click="addmemberAddress('form')">确 定</el-button>
			</span>
		</el-dialog>
		
		<!-- 发票信息添加 -->
		<el-dialog title="添加发票信息" :visible.sync="invoiceVisible" width="32%">
			<el-form :model="invoiceForm" :rules="invoiceRules" ref="invoiceForm" label-width="150px">
				<el-form-item label="发票类型" prop="invoice_type">
					<el-radio-group v-model="invoiceForm.invoice_type">
						<el-radio :label="item.value" v-for="(item,index) in paperData" :key="index">{{item.name}}</el-radio>
					</el-radio-group>
				</el-form-item>
				<el-form-item label="发票抬头类型" prop="invoice_title_type">
					<el-radio-group v-model="invoiceForm.invoice_title_type">
						<el-radio :label="item.value" v-for="(item,index) in enterpriseData" :key="index">{{item.name}}</el-radio>
					</el-radio-group>
				</el-form-item>
				<el-form-item label="请填写抬头名称" prop="invoice_title">
					<el-input v-model="invoiceForm.invoice_title"></el-input>
				</el-form-item>
				<el-form-item label="请填写纳税人识别号" prop="taxpayer_number" v-if="invoiceForm.invoice_title_type == 2">
					<el-input v-model="invoiceForm.taxpayer_number"></el-input>
				</el-form-item>
				<el-form-item label="请填写发票邮寄地址" prop="invoice_full_address" v-if="invoiceForm.invoice_type == 1">
					<el-input v-model="invoiceForm.invoice_full_address"></el-input>
				</el-form-item>
				<el-form-item label="请填写接收邮箱" prop="invoice_email" v-if="invoiceForm.invoice_type == 2">
					<el-input v-model="invoiceForm.invoice_email"></el-input>
				</el-form-item>
				<el-form-item label="发票内容" prop="invoice_content" v-if="invoiceForm.invoice_content_array.length > 0">
					<el-radio-group v-model="invoiceForm.invoice_content">
						<el-radio :label="item" v-for="(item,index) in invoiceForm.invoice_content_array" :key="index">{{item}}</el-radio>
					</el-radio-group>
				</el-form-item>
			</el-form>
			<span slot="footer" class="dialog-footer">
				<el-button @click="invoiceVisible = false">取 消</el-button>
				<el-button type="primary" @click="addmemberInvoice('invoiceForm')">确 定</el-button>
			</span>
		</el-dialog>
		
		<!--使用余额-->
		<div class="item-block" v-if="orderPaymentData.member_account.balance_total > 0">
			<div class="block-text">是否使用余额</div>
			<div class="pay-type-list">
				<div class="pay-type-item" :class="orderCreateData.is_balance ? '' : 'active'" @click="useBalance(0)">不使用余额</div>
				<div class="pay-type-item" :class="orderCreateData.is_balance ? 'active' : ''" @click="useBalance(1)">使用余额</div>
				<div class="clear"></div>
			</div>
		</div>
		
		<!--商品信息-->
		<div class="item-block">
			<div class="goods-list">
				<table>
					<tr>
						<td width="50%">商品</td>
						<td width="12.5%">价格</td>
						<td width="12.5%">数量</td>
						<td width="12.5%">小计</td>
					</tr>
				</table>
			</div>
		</div>

		<div v-for="(siteItem, siteIndex) in orderPaymentData.shop_goods_list" :key="siteIndex">
			<div class="item-block">
				<div class="goods-list">
					<table>
						<tr>
							<td colspan="5">
								<i class="store-icon iconfont iconmendian"></i>
								<router-link :to="'/shop-' + siteItem.site_id" target="_blank">{{ siteItem.site_name }}</router-link>
							</td>
						</tr>
					</table>
				</div>
			</div>
			<div class="item-block">
				<div class="goods-list">
					<table>
						<tr v-for="(goodsItem, goodsIndex) in siteItem.goods_list" :key="goodsIndex">
							<td width="50%">
								<div class="goods-info">
									<div class="goods-info-left">
										<router-link :to="{ path: '/sku-' + goodsItem.sku_id }" target="_blank">
											<img class="goods-img" :src="$img(goodsItem.sku_image, { size: 'mid' })" @error="imageError(goodsIndex)" />
										</router-link>
									</div>
									<div class="goods-info-right">
										<router-link :to="{ path: '/sku-' + goodsItem.sku_id }" target="_blank">
											<div class="goods-name">{{ goodsItem.sku_name }}</div>
										</router-link>
									</div>
								</div>
							</td>
							<td width="12.5%" class="goods-price">￥{{ goodsItem.discount_price }}</td>
							<td width="12.5%" class="goods-num">{{ goodsItem.num }}</td>
							<td width="12.5%" v-if="goodsIndex == 0" :rowspan="siteItem.goods_list.length" class="goods-money">￥{{ siteItem.pay_money | moneyFormat }}</td>
						</tr>
					</table>

					<!--配送方式、留言、优惠券、店铺优惠-->
					<div class="goods-footer">
						<div class="goods-footer-left">
							<div v-if="orderPaymentData.is_virtual == 0">
								<div class="order-cell" style="display: flex;justify-content: start;align-items: baseline;">
									<div class="tit" style="margin-right: 10px;">
										配送方式：
										<span class="ns-text-color">
											<span v-if="orderPaymentData.delivery[siteItem.site_id].delivery_type == 'store' && orderPaymentData.delivery[siteItem.site_id].store_name">
												{{ orderPaymentData.delivery[siteItem.site_id].store_name }}
											</span>
										</span>
									</div>

									<div v-if="siteItem.express_type.length > 0">
										<div class="express-item" v-for="(deliveryItem, deliveryIndex) in siteItem.express_type" :key="deliveryIndex"
											@click="selectDeliveryType(deliveryItem, siteItem.site_id, siteItem.express_type)" 
											:class="orderPaymentData.delivery[siteItem.site_id].delivery_type == deliveryItem.name ? 'active' : ''"
											v-if="deliveryItem.name != 'local'"
										>
											{{ deliveryItem.title }}
										</div>
									</div>
									<div v-else-if="memberAddress.length == 0">
										<div class="box ns-text-color">请先添加收货地址</div>
									</div>
									<div v-else>
										<div class="box ns-text-color">商家未配置配送方式</div>
									</div>
								</div>
							</div>
							<!--开票选择-->
							<div class=" order-cell" style="display: flex;justify-content: start;align-items: baseline;">
								<div class="block-text" style="margin-right: 10px;">发票信息：</div>

								<div class="pay-type-list">
									<div class="express-item" :class="siteItem.is_invoice == 1  ? '' : 'active'" @click="isInvoice(0,siteItem.site_id)">
										无需发票
									</div>
									<div @click="editInvoice(1,siteItem.site_id)" style="display: inline-block;">
										<div class="express-item" :class="siteItem.is_invoice == 1 ? 'active' : '' " @click="isInvoice(1,siteItem.site_id)">
											需要发票
										</div>
									</div>
									<div>
										<div v-if="siteItem.invoice_type == 1" class="invoice-detail">纸质发票</div>
										<div v-if="siteItem.invoice_type == 2" class="invoice-detail">电子发票</div>
										<div v-if="siteItem.invoice_title_type == 1" class="invoice-detail">个人</div>
										<div v-if="siteItem.invoice_title_type == 2" class="invoice-detail">企业</div>
										<div v-if="siteItem.invoice_content != ''" class="invoice-detail">{{siteItem.invoice_content}}</div>
										<div v-if="siteItem.invoice_type == 1 ||siteItem.invoice_type == 2" @click="editInvoice(1,siteItem.site_id)" class="invoice-detail" style="color: #FF4544;">修改</div>
										<div v-else @click="editInvoice(1,siteItem.site_id)" class="invoice-detail" style="color: #FF4544;">
											<div class="invoice-detail">请设置发票信息</div>
											<span @click="isInvoice(1,siteItem.site_id)">设置</span>
										</div>
									</div>
									<div class="clear"></div>
								</div>
							</div>

							<div v-if="siteItem.coupon_list.length > 0">
								<div class="order-cell">
									<div class="tit">优惠券</div>
									<div v-if="siteItem.coupon_id">
										<span class="ns-text-color" @click="openSiteCoupon(siteItem.site_id, siteItem.coupon_list)">已选择优惠券，已优惠</span>
										<span class="ns-text-color" @click="openSiteCoupon(siteItem.site_id, siteItem.coupon_list)">
											<span class="inline">￥</span>
											{{ siteItem.coupon_money }}
										</span>
									</div>

									<div v-else>
										<div class="box ns-text-color" @click="openSiteCoupon(siteItem.site_id, siteItem.coupon_list)">不使用优惠券</div>
									</div>
								</div>
							</div>

							<div>
								<div class="order-cell" v-if="siteItem.promotion_money > 0">
									<span class="tit">店铺优惠</span>
									<div class="box text-overflow">
										<div class="order-cell" v-for="(promotionItem, promotionIndex) in siteItem.promotion" :key="promotionIndex">
											<div class="box text-overflow" v-if="promotionIndex == 'manjian'">
												<span class="ns-text-color">满减：</span>
												<span class="ns-text-color" v-for="(item, index) in promotionItem" :key="index">{{ item.discount_array.desc }}</span>
											</div>

											<div class="box text-overflow" v-if="promotionIndex == 'freeshipping'">
												<span class="ns-text-color">满额包邮：</span>
												<span class="ns-text-color">{{ promotionItem.area_names }} 满{{ promotionItem.price }}包邮</span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="goods-footer-right">
							<div>
								<div class="order-cell" style="display: flex;justify-content: start;">
									<div class="tit" style="margin-right: 10px;">买家留言：</div>
									<div class="box">
										<el-input rows="3" type="textarea" placeholder="留言前建议先与商家协调一致" v-model="orderCreateData.buyer_message[siteItem.site_id]" class="buyer-message" @input="textarea" maxlength="140" show-word-limit resize="none"></el-input>
									</div>
								</div>
							</div>
						</div>
						<div class="clear"></div>
					</div>

				</div>
			</div>
		</div>

		<!--平台优惠券-->
		<div class="item-block" v-if="orderPaymentData && orderPaymentData.platform_coupon_list && orderPaymentData.platform_coupon_list.length > 0">
			<div class="block-text">平台优惠券</div>

			<div class="order-cell platform-coupon">
				<div v-if="orderCreateData.platform_coupon_id">
					<span class="ns-text-color" @click="openPlatformCoupon">已选择优惠券，已优惠</span>
					<span class="ns-text-color" @click="openPlatformCoupon">
						<span class="inline">￥</span>
						{{ orderPaymentData.platform_coupon_money }}
					</span>
				</div>

				<div v-else>
					<div class="box ns-text-color" @click="openPlatformCoupon">不使用优惠券</div>
				</div>
			</div>
		</div>

		<!-- 总计 -->
		<div class="item-block">
			<div class="order-statistics">
				<table>
					<tr>
						<td align="right">商品金额：</td>
						<td align="left">￥{{ orderPaymentData.goods_money | moneyFormat }}</td>
					</tr>
					<tr v-if="orderPaymentData.is_virtual == 0">
						<td align="right">运费：</td>
						<td align="left">￥{{ orderPaymentData.delivery_money | moneyFormat }}</td>
					</tr>
					<tr v-if="orderPaymentData.invoice_money > 0">
						<td align="right">税费：</td>
						<td align="left">￥{{ orderPaymentData.invoice_money | moneyFormat }}</td>
					</tr>
					<tr v-if="orderPaymentData.promotion_money > 0">
						<td align="right">优惠：</td>
						<td align="left">￥{{ orderPaymentData.promotion_money | moneyFormat }}</td>
					</tr>
					<tr v-if="orderPaymentData.coupon_money > 0">
						<td align="right">店铺优惠券：</td>
						<td align="left">￥{{ orderPaymentData.coupon_money | moneyFormat }}</td>
					</tr>
					<tr v-if="orderPaymentData.platform_coupon_money > 0">
						<td align="right">平台优惠券：</td>
						<td align="left">￥{{ orderPaymentData.platform_coupon_money | moneyFormat }}</td>
					</tr>
					<tr v-if="orderPaymentData.balance_money > 0">
						<td align="right">使用余额：</td>
						<td align="left">￥{{ orderPaymentData.balance_money | moneyFormat }}</td>
					</tr>
				</table>
			</div>
			<div class="clear"></div>
		</div>

		<!--结算-->
		<div class="item-block">
			<div class="order-submit">
				<div class="order-money">
					共{{ orderPaymentData.goods_num }}件，应付金额：
					<div class="ns-text-color">￥{{ orderPaymentData.pay_money | moneyFormat }}</div>
				</div>
				<el-button type="primary" class="el-button--primary" @click="orderCreate">订单结算</el-button>
			</div>
			<div class="clear"></div>
		</div>

		<!--选择优惠券弹框-->
		<el-dialog title="选择优惠券" :visible.sync="dialogCoupon" width="50%">
			<el-table ref="couponTable" :data="siteCoupon.data" highlight-current-row @row-click="selectCoupon" class="cursor-pointer">
				<el-table-column label="" width="55">
					<template slot-scope="scope">
						<div class="disabled-selected-wrap">
							<el-radio v-model="couponRadio" :label="scope.row"><i></i></el-radio>
						</div>
					</template>
				</el-table-column>
				<el-table-column prop="coupon_name" label="名称" width="200"></el-table-column>
				<el-table-column label="优惠">
					<template slot-scope="scope">
						<span v-if="scope.row.type == 'reward'">{{ scope.row.money }}</span>
						<span v-if="scope.row.type == 'discount'">{{ scope.row.discount }} 折</span>
					</template>
				</el-table-column>
				<el-table-column prop="use" label="使用"></el-table-column>
				<el-table-column prop="time" label="期限"></el-table-column>
			</el-table>
			<br />
			<div class="align-right">
				<el-button @click="dialogCoupon = false">取消</el-button>
				<el-button @click="saveCoupon()" type="primary">确认选择</el-button>
			</div>
		</el-dialog>

		<!--选择平台优惠券弹框-->
		<el-dialog title="选择平台优惠券" :visible.sync="dialogPlatcoupon" width="50%" @close="savePlatformCoupon()">
			<el-table ref="platformCouponTable" :data="orderPaymentData.platform_coupon_list" highlight-current-row @row-click="selectPlatformCoupon" class="cursor-pointer">
				<el-table-column label="" width="55">
					<template slot-scope="scope">
						<div class="disabled-selected-wrap">
							<el-radio v-model="platformCouponRadio" :label="scope.row"><i></i></el-radio>
						</div>
					</template>
				</el-table-column>
				<el-table-column prop="platformcoupon_name" label="名称" width="200"></el-table-column>
				<el-table-column prop="money" label="优惠"></el-table-column>
				<el-table-column label="使用">
					<template slot-scope="scope">
						<span class="ns-text-color-gray ns-font-size-sm" v-if="scope.row.at_least > 0">满{{ scope.row.at_least }}可用</span>
						<span class="ns-text-color-gray ns-font-size-sm" v-else>任意金额可用</span>
					</template>
				</el-table-column>
				<el-table-column label="期限">
					<template slot-scope="scope">
						<span>{{ $util.timeStampTurnTime(scope.row.end_time) }}</span>
					</template>
				</el-table-column>
			</el-table>
			<br />
			<div class="align-right">
				<el-button @click="dialogPlatcoupon = false">取消</el-button>
				<el-button @click="dialogPlatcoupon = false" type="primary">确认选择</el-button>
			</div>
		</el-dialog>

		<!--配送方式  门店 -->
		<el-dialog title="选择门店" :visible.sync="dialogStore" width="50%">
			<el-table ref="singleTable" :data="storeList" highlight-current-row @row-click="selectStore" class="cursor-pointer">
				<el-table-column label="" width="55">
					<template slot-scope="scope">
						<el-radio v-model="storeRadio" :label="scope.row"><i></i></el-radio>
					</template>
				</el-table-column>
				<el-table-column prop="store_name" label="名称" width="160"></el-table-column>
				<el-table-column prop="store_address" label="地址"></el-table-column>
				<el-table-column prop="open_date" label="营业时间"></el-table-column>
			</el-table>
		</el-dialog>

		<!-- 配送方式 外卖 -->
		<el-dialog title="送达时间" :visible.sync="deliveryTime" width="400px">
			<el-form status-icon ref="ruleForm" label-width="100px">
				<el-form-item label="送达时间">
					<el-col :span="11">
						<el-time-picker format="HH:mm" value-format="HH:mm" placeholder="选择时间" :value="time" v-model="time" start="09:01" end="21:01" @change="bindTimeChange"></el-time-picker>
					</el-col>
				</el-form-item>
				<el-form-item label="">
					<el-col :span="20">
						<div class="align-right">
							<el-button size="small" @click="deliveryTime = false">关闭</el-button>
							<el-button type="primary" size="small" @click="setDeliveryTime(siteDelivery.site_id)">确认选择</el-button>
						</div>
					</el-col>
				</el-form-item>
			</el-form>
		</el-dialog>

		<!-- 支付密码 -->
		<el-dialog title="使用余额" :visible.sync="dialogpay" width="350px">
			<template v-if="orderPaymentData.member_account.is_pay_password == 0">
				<p>为了您的账户安全,请您先设置的支付密码</p>
				<p>可到"会员中心","账号安全","支付密码"中设置</p>
				<span slot="footer" class="dialog-footer">
					<el-button size="small" @click="dialogpay = false">暂不设置</el-button>
					<el-button size="small" type="primary" @click="setPayPassword">立即设置</el-button>
				</span>
			</template>
			<el-form v-else status-icon ref="ruleForm" label-width="100px">
				<el-form-item label="支付密码" class="pay-password-item">
					<!--添加一个不可见的input,欺骗浏览器自动填充-->
					<el-input type="password" class="pay-password hide-password" :maxlength="6"></el-input>
					<el-input type="password" class="pay-password" :maxlength="6" v-model="password" @input="input"></el-input>
				</el-form-item>
				<p class="ns-text-color forget-password" @click="setPayPassword">忘记密码</p>
			</el-form>
		</el-dialog>
	</div>
</template>

<script>
	import PicZoom from 'vue-piczoom';
	import detail from './payment.js';
	export default {
		name: 'payment',
		components: {
			PicZoom
		},
		mixins: [detail]
	};
</script>

<style lang="scss" scoped>
	@import './payment.scss';
</style>
