<?php /*a:1:{s:50:"./addon/presale/component/view/presale/design.html";i:1624437624;}*/ ?>
<nc-component v-bind:data="data[index]" class="component-presale">

	<!-- 预览 -->
	<template slot="preview">
		<div class="preview-box" v-bind:style="{ margin: nc.marginTop + 'px 15px 0' }">
			<div class="marketing-wrap marketing-wrap-1">
				<img v-if="nc.bgSelect == 'red'" src="<?php echo htmlentities($resource_path); ?>/presale/img/red.png" />
				<img v-if="nc.bgSelect == 'blue'" src="<?php echo htmlentities($resource_path); ?>/presale/img/blue.png" />
				<img v-if="nc.bgSelect == 'yellow'" src="<?php echo htmlentities($resource_path); ?>/presale/img/yellow.png" />
				<img v-if="nc.bgSelect == 'violet'" src="<?php echo htmlentities($resource_path); ?>/presale/img/violet.png" />
				
				<div class="marketing-box">
					<template v-if="nc.lazyLoad">
						<presale-top-content></presale-top-content>
					</template>
					
					<div class="list-wrap">
						<div class="item">
							<div class="img-wrap">
								<img src="http://niushop1.bucuoya.cn/public/static/ext/diyview/img/crack_figure.png" />
							</div>
							<div class="content">
								<div class="content-desc">商品名称</div>
								<!--<div class="content-num">¥15抵¥30</div>-->
								<div class="content-price">
									¥<span>99.00</span>
								</div>
							</div>
						</div>
						
						<div class="item">
							<div class="img-wrap">
								<img src="http://niushop1.bucuoya.cn/public/static/ext/diyview/img/crack_figure.png" />
							</div>
							<div class="content">
								<div class="content-desc">商品名称</div>
								<!--<div class="content-num">¥15抵¥30</div>-->
								<div class="content-price">
									¥<span>99.00</span>
								</div>
							</div>
						</div>
						
						<div class="item">
							<div class="img-wrap">
								<img src="http://niushop1.bucuoya.cn/public/static/ext/diyview/img/crack_figure.png" />
							</div>
							<div class="content">
								<div class="content-desc">商品名称</div>
								<!--<div class="content-num">¥15抵¥30</div>-->
								<div class="content-price">
									¥<span>99.00</span>
								</div>
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
			<presale-list></presale-list>
			<presale-style></presale-style>
		</template>
		
		<!-- <color v-bind:data="{ field : 'backgroundColor', 'label' : '背景颜色' }"></color> -->
		<template v-if="nc.lazyLoad">
			<presale-color></presale-color>
			<change-type></change-type>
		</template>
		
		<div class="template-edit-title">
			<h3>顶部标题设置</h3>
			<i class="layui-icon layui-icon-down" onclick="closeBox(this)"></i>
		</div>
		<template v-if="nc.lazyLoad">
			<presale-top-list></presale-top-list>
		</template>
		
		<div class="template-edit-title">
			<h3>其他设置</h3>
			<i class="layui-icon layui-icon-down" onclick="closeBox(this)"></i>
		</div>
		<template v-if="nc.lazyLoad">
			<slide v-bind:data="{ field : 'marginTop', label : '页面间距' }"></slide>
		</template>

		<!-- 弹框 -->
		<div class="presale-list-style">
			<div class="style-list-presale layui-form">
				<div class="style-list-con-presale">
					<div class="style-li-presale" v-bind:class="{'selected ns-border-color': nc.style == 1}">
						<img src="<?php echo htmlentities($resource_path); ?>/presale/img/presale_style_1.png" />
						<span class="layui-hide">风格一</span>
					</div>
				</div>
				
				<input type="hidden" name="style">
				<input type="hidden" name="style_name" />
			</div>
		</div>

	</template>

	<!-- 资源 -->
	<template slot="resource">
		<js>
			var presaleResourcePath = "<?php echo htmlentities($resource_path); ?>";
		</js>
		<css src="<?php echo htmlentities($resource_path); ?>/presale/css/design.css"></css>
		<js src="<?php echo htmlentities($resource_path); ?>/presale/js/design.js"></js>

	</template>

</nc-component>