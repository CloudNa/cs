const templateFloorStyle2 = `
<div class="floor-style-2">
	<div class="head-wrap">
		<h2 @click="setTitle" :style="{ color : mData.title.value.color }">{{ mData.title.value.text }}</h2>
		<p @click="setSubTitle" :style="{ color : mData.subTitle.value.color }">{{ mData.subTitle.value.text }}</p>
	</div>
	<div class="body-wrap">
		<ul class="goods-list" @click="selectedGoods">
			<li v-for="(item,index) in goodsLength" :key="index">
				<template v-if="mData.goodsList.value.list.length > index && mData.goodsList.value.list[index].goods_name">
					<div class="img-wrap">
						<img alt="商品图片" :src="goodsImg(mData.goodsList.value.list[index].goods_image)">
					</div>
					<h3>{{mData.goodsList.value.list[index].goods_name}}</h3>
					<p class="desc">{{mData.goodsList.value.list[index].introduction}}</p>
					<p class="price ns-text-color">
						<span class="num">{{mData.goodsList.value.list[index].price}}元</span>
						<del>{{mData.goodsList.value.list[index].market_price}}元</del>
					</p>
				</template>
				<template v-else>
					<div class="img-wrap empty">商品图片</div>
					<h3>商品名称</h3>
					<p class="desc">商品描述</p>
					<p class="price ns-text-color">
						<span class="num">99元</span>
						<del>199元</del>
					</p>
				</template>
			</li>
		</ul>
	</div>
	<div class="bottom-wrap" @click="uploadBottomImg">
		<img v-if="mData.bottomImg.value.url" :src="$parent.img(mData.bottomImg.value.url)">
		<div v-else class="empty"><span>点击上传图片<br/><br/>建议尺寸 1210 x 118 像素</span></div>
	</div>
</div>`;

Vue.component('floor-style-2', {
	template: templateFloorStyle2,
	props: {
		data: {
			type: Object,
			required: true,
		},
	},
	data: function () {
		return {
			mData: {},
			selectGoodsId: [],
			goodsLength: 20
		};
	},
	created: function () {
		this.mData = this.data;
	},
	methods: {
		/* 秒杀图片处理 */
		goodsImg(imgStr) {
			let imgs = imgStr.split(',');
			return this.$parent.img(imgs[0], { size: 'mid' });
		},
		setTitle: function () {
			var self = this;
			this.$parent.setText(self.mData.title.value, function (data) {
				self.mData.title.value = data;
			});
		},
		setSubTitle: function () {
			var self = this;
			this.$parent.setText(self.mData.subTitle.value, function (data) {
				self.mData.subTitle.value = data;
			});
		},
		uploadBottomImg: function () {
			var self = this;
			this.$parent.uploadImg(self.mData.bottomImg.value, function (data) {
				self.mData.bottomImg.value = data;
			});
		},
		selectedGoods: function () {
			var self = this;
			goodsSelect(function (res) {
				self.selectGoodsId = [];
				var sku_ids = [];
				self.mData.goodsList.value.list = [];
				for (var i = 0; i < res.length; i++) {
					var item = res[i];
					delete item.sku_list;
					delete item.selected_sku_list;
					self.mData.goodsList.value.list[i] = item;
					self.selectGoodsId.push(item.goods_id);
					sku_ids.push(item.sku_id);
				}
				self.mData.goodsList.value.sku_ids = sku_ids.toString();
				vm.$forceUpdate();
			}, self.selectGoodsId, {mode: "spu", max_num: self.goodsLength, min_num: 1});
		}

	},
	watch: {
		mData: function (curr) {
			for (var i = 0; i < curr.goodsList.value.list.length; i++) {
				this.selectGoodsId.push(curr.goodsList.value.list[i].goods_id);
			}
		},
	},
});