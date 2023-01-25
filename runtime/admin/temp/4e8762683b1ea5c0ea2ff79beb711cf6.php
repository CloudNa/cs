<?php /*a:1:{s:43:"./app/component/view/goods_list/design.html";i:1619851394;}*/ ?>
<nc-component v-bind:data="data[index]" class="goods-list">

	<!-- 预览 -->
	<template slot="preview">

		<!-- 图一 -->
		<div class="goods-list-preview" v-bind:style="{ backgroundColor : nc.backgroundColor, margin: (nc.marginTop + 'px 15px 0 15px') }">
			<div class="goods-list" :class="nc.style == 1 ? 'single-column' : 'double-column' ">
				<div class="goods-item margin-bottom">
					<div class="goods-img">
						<img src="http://niushop1.bucuoya.cn/public/static/ext/diyview/img/crack_figure.png">
						<div class="goods-tag" v-show="nc.goodsTag == 'default'">爆款</div>
						<div class="goods-tag-img" v-show="nc.goodsTag == 'diy'">
							<div v-if="nc.tagImg.imageUrl == '' " class="tag-wrap">角标区域</div>
							<img v-else :src="changeImgUrl(nc.tagImg.imageUrl)">
						</div>
					</div>
					<div class="info-wrap">
						<div class="name-wrap">
							<div class="goods-name">商品名称</div>
						</div>
						<div class="pro-info">
							<div class="delete-price"><span class="unit">¥</span>15.99</div>
							<div class="sale">1005人付款</div>
						</div>
						<div class="lineheight-clear">
							<div class="discount-price">
								<span class="unit">¥</span>
								<span class="price">25.69</span>
							</div>
						</div>
					</div>
				</div>
				<div class="goods-item margin-bottom">
					<div class="goods-img">
						<img src="http://niushop1.bucuoya.cn/public/static/ext/diyview/img/crack_figure.png">
						<div class="goods-tag" v-show="nc.goodsTag == 'default'">爆款</div>
						<div class="goods-tag-img" v-show="nc.goodsTag == 'diy'">
							<div v-if="nc.tagImg.imageUrl == '' " class="tag-wrap">角标区域</div>
							<img v-else :src="changeImgUrl(nc.tagImg.imageUrl)">
						</div>
					</div>
					<div class="info-wrap">
						<div class="name-wrap">
							<div class="goods-name">商品名称</div>
						</div>
						<div class="pro-info">
							<div class="delete-price"><span class="unit">¥</span>15.99</div>
							<div class="sale">1005人付款</div>
						</div>
						<div class="lineheight-clear">
							<div class="discount-price">
								<span class="unit">¥</span>
								<span class="price">25.69</span>
							</div>
						</div>
					</div>
				</div>
				<div class="goods-item margin-bottom">
					<div class="goods-img">
						<img src="http://niushop1.bucuoya.cn/public/static/ext/diyview/img/crack_figure.png">
						<div class="goods-tag" v-show="nc.goodsTag == 'default'">爆款</div>
						<div class="goods-tag-img" v-show="nc.goodsTag == 'diy'">
							<div v-if="nc.tagImg.imageUrl == '' " class="tag-wrap">角标区域</div>
							<img v-else :src="changeImgUrl(nc.tagImg.imageUrl)">
						</div>
					</div>
					<div class="info-wrap">
						<div class="name-wrap">
							<div class="goods-name">商品名称</div>
						</div>
						<div class="pro-info">
							<div class="delete-price"><span class="unit">¥</span>15.99</div>
							<div class="sale">1005人付款</div>
						</div>
						<div class="lineheight-clear">
							<div class="discount-price">
								<span class="unit">¥</span>
								<span class="price">25.69</span>
							</div>
						</div>
					</div>
				</div>
				<div class="goods-item margin-bottom">
					<div class="goods-img">
						<img src="http://niushop1.bucuoya.cn/public/static/ext/diyview/img/crack_figure.png">
						<div class="goods-tag" v-show="nc.goodsTag == 'default'">爆款</div>
						<div class="goods-tag-img" v-show="nc.goodsTag == 'diy'">
							<div v-if="nc.tagImg.imageUrl == '' " class="tag-wrap">角标区域</div>
							<img v-else :src="changeImgUrl(nc.tagImg.imageUrl)">
						</div>
					</div>
					<div class="info-wrap">
						<div class="name-wrap">
							<div class="goods-name">商品名称</div>
						</div>
						<div class="pro-info">
							<div class="delete-price"><span class="unit">¥</span>15.99</div>
							<div class="sale">1005人付款</div>
						</div>
						<div class="lineheight-clear">
							<div class="discount-price">
								<span class="unit">¥</span>
								<span class="price">25.69</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</template>

	<!-- 编辑 -->
	<template slot="edit">
		<template v-if="nc.lazyLoad">
			<goods-list-style></goods-list-style>
		</template>

		<template v-if="nc.lazyLoad">
			<goods-list></goods-list>
		</template>

		<template v-if="nc.lazyLoad">
			<goods-tag-style></goods-tag-style>
		</template>

		<div class="template-edit-title"><h3>其他设置</h3></div>
		<color v-bind:data="{ field : 'backgroundColor', 'label' : '背景颜色' }"></color>
		<slide v-bind:data="{ field : 'marginTop', label : '页面间距' }"></slide>

		<!-- 商品列表风格弹框 -->
		<div class="goods-list-style">
			<div class="style-list-goods layui-form">
				<div class="style-list-con-goods">
					<div class="style-li-goods" v-bind:class="{'selected ns-border-color': nc.style == 1}">
						<img src="<?php echo htmlentities($resource_path); ?>/goods_list/img/style1.png" />
					</div>
					<div class="style-li-goods" v-bind:class="{'selected ns-border-color': nc.style == 2}">
						<img src="<?php echo htmlentities($resource_path); ?>/goods_list/img/style2.png" />
					</div>
				</div>

				<input type="hidden" name="style">

			</div>
		</div>

		<!-- 商品分类选择弹框 -->
		<div class="goods-category-layer">
			<?php if(!(empty($goods_category_list) || (($goods_category_list instanceof \think\Collection || $goods_category_list instanceof \think\Paginator ) && $goods_category_list->isEmpty()))): ?>
			<div class="category-head">分类名称</div>
			<div class="category-wrap">
				<?php if(is_array($goods_category_list) || $goods_category_list instanceof \think\Collection || $goods_category_list instanceof \think\Paginator): if( count($goods_category_list)==0 ) : echo "" ;else: foreach($goods_category_list as $key=>$vo): ?>
				<div class="category-item" data-id="<?php echo htmlentities($vo['category_id']); ?>"><?php echo htmlentities($vo['category_name']); ?></div>
				<?php endforeach; endif; else: echo "" ;endif; ?>
			</div>
			<?php endif; ?>
		</div>

	</template>
	
	<!-- 资源 -->
	<template slot="resource">
		<js>
			var goodsListResourcePath = "<?php echo htmlentities($resource_path); ?>";
		</js>
		<css src="<?php echo htmlentities($resource_path); ?>/goods_list/css/design.css"></css>
		<js src="<?php echo htmlentities($resource_path); ?>/goods_list/js/design.js"></js>
		
	</template>
	
</nc-component>