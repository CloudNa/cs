<?php /*a:1:{s:44:"./app/component/view/graphic_nav/design.html";i:1619851396;}*/ ?>
<nc-component v-bind:data="data[index]" v-bind:class="['graphic-navigation']">

	<!-- 预览 -->
	<template slot="preview">
		<div class="preview-box" v-bind:style="{ background: nc.backgroundColor, marginTop : nc.marginTop + 'px', borderRadius: nc.navRadius == 'fillet' ? '5px' : '0px' }">
			<template v-if="nc.lazyLoad">
				<graphic-nav></graphic-nav>
			</template>
		</div>
	</template>
	
	<!-- 编辑 -->
	<template slot="edit">
		<template v-if="nc.lazyLoad">
			<graphic-nav-list></graphic-nav-list>
		</template>
		
	</template>
	
	<!-- 资源 -->
	<template slot="resource">

		<js>
			var graphicNavResourcePath = "<?php echo htmlentities($resource_path); ?>";
			var STATICEXT_IMG ="http://niushop1.bucuoya.cn/public/static/ext/diyview/img";
		</js>
		<css src="<?php echo htmlentities($resource_path); ?>/graphic_nav/css/design.css"></css>
		<js src="<?php echo htmlentities($resource_path); ?>/graphic_nav/js/design.js"></js>
		
	</template>

</nc-component>