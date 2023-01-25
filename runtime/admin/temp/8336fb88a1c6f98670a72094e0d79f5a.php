<?php /*a:1:{s:43:"./app/component/view/horz_blank/design.html";i:1619851398;}*/ ?>
<nc-component v-bind:data="data[index]" v-bind:class="['auxiliary-blank']">

	<!-- 预览 -->
	<template slot="preview">
		<div class="preview-box">
			<div v-bind:style="{ height : nc.height+'px', margin: '0 '+nc.marginLeftRight+'px', backgroundColor : nc.backgroundColor }"></div>
		</div>
	</template>
	
	<!-- 编辑 -->
	<template slot="edit">
		<color v-bind:data="{ field : 'backgroundColor', label : '空白颜色' }"></color>
		<slide v-bind:data="{ field : 'height', label : '空白高度' }"></slide>
		<slide v-bind:data="{ field : 'marginLeftRight', label : '左右边距' }"></slide>
	</template>

	<!-- 资源 -->
	<template slot="resource">
		
		<css src="<?php echo htmlentities($resource_path); ?>/horz_blank/css/design.css"></css>
		
	</template>
	
</nc-component>