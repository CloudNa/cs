<?php /*a:1:{s:43:"./app/component/view/rubik_cube/design.html";i:1619851410;}*/ ?>
<nc-component v-bind:data="data[index]" v-bind:class="['rubik-cube']">

	<template slot="preview">
		
		<div class="preview-box" v-bind:style="{background: nc.backgroundColor}">
			<template v-if="nc.list.length>0 && !nc.list[0].imageUrl">
				<div class="tip">点击编辑魔方</div>
			</template>

			<template v-if="(nc.selectedTemplate != 'custom-rubik-cube')">
			<ul>
				<template v-if="nc.selectedTemplate == 'row1-of3'">
					<li v-for="item in nc.list" v-bind:class="nc.selectedTemplate" :style="{width: 'calc((100% - '+ nc.imageGap * 2 +'px) / 3)'}">
						<template v-if="item.imageUrl!=''">
							<div >
								<img v-bind:src="changeImgUrl(item.imageUrl)">
							</div>
						</template>
					</li>
				</template>
				
				<template v-else-if="nc.selectedTemplate == 'row1-of4'">
					<li v-for="item in nc.list" v-bind:class="nc.selectedTemplate" :style="{width: 'calc((100% - '+ nc.imageGap * 3 +'px) / 4)'}">
						<template v-if="item.imageUrl!=''">
							<div >
								<img v-bind:src="changeImgUrl(item.imageUrl)">
							</div>
						</template>
					</li>
				</template>
				
				<template v-else-if="nc.selectedTemplate == 'row1-lt-of2-rt'">
					<div class="template-left">
						<template v-for="(item, index) in nc.list">
							<template v-if="index == 0">
								<li v-bind:class="nc.selectedTemplate">
									<template v-if="item.imageUrl!=''">
										<div :style="{padding: nc.imageGap/2 + 'px'}">
											<img v-bind:src="changeImgUrl(item.imageUrl)">
										</div>
									</template>
								</li>
							</template>
						</template>
					</div>
					<div class="template-right">
						<template v-for="(item, index) in nc.list">
							<template v-if="index != 0">
								<li v-bind:class="nc.selectedTemplate">
									<template v-if="item.imageUrl!=''">
										<div :style="{padding: nc.imageGap/2 + 'px'}">
											<img v-bind:src="changeImgUrl(item.imageUrl)">
										</div>
									</template>
								</li>
							</template>
						</template>
					</div>
				</template>
				
				<template v-else-if="nc.selectedTemplate == 'row1-lt-of1-tp-of2-bm'">
					<div class="template-left" :style="{paddingRight: nc.imageGap/2 + 'px'}">
						<template v-for="(item, index) in nc.list">
							<template v-if="index == 0">
								<li v-bind:class="nc.selectedTemplate">
									<template v-if="item.imageUrl!=''">
										<div>
											<img v-bind:src="changeImgUrl(item.imageUrl)">
										</div>
									</template>
								</li>
							</template>
						</template>
					</div>
					<div class="template-right" :style="{paddingLeft: nc.imageGap/2 + 'px'}">
						<div class="template-top" :style="{paddingBottom: nc.imageGap/2 + 'px'}">
							<template v-for="(item, index) in nc.list">
								<template v-if="index == 1">
									<li v-bind:class="nc.selectedTemplate">
										<template v-if="item.imageUrl!=''">
											<div>
												<img v-bind:src="changeImgUrl(item.imageUrl)">
											</div>
										</template>
									</li>
								</template>
							</template>
						</div>
						
						<div class="template-bottom" :style="{paddingTop: nc.imageGap/2 + 'px'}">
							<template v-for="(item, index) in nc.list">
								<template v-if="index != 1 && index != 0">
									<li v-bind:class="nc.selectedTemplate" :style="{padding: '0 ' + nc.imageGap/2 + 'px'}">
										<template v-if="item.imageUrl!=''">
											<div>
												<img v-bind:src="changeImgUrl(item.imageUrl)">
											</div>
										</template>
									</li>
								</template>
							</template>
						</div>
					</div>
				</template>
				
				<template v-else>
					<li v-for="item in nc.list" v-bind:class="nc.selectedTemplate">
						<template v-if="item.imageUrl!=''">
							<div :style="{padding: nc.imageGap/2 + 'px'}">
								<img v-bind:src="changeImgUrl(item.imageUrl)">
							</div>
						</template>
					</li>
				</template>
			</ul>
			</template>

			<template v-else>
				<template v-if="nc.lazyLoad">
					<rubik-cube-diy-html v-bind:diy-html="nc.diyHtml"></rubik-cube-diy-html>
				</template>
			</template>
		</div>
	</template>
	
	<template slot="edit">
		<template v-if="nc.lazyLoad">
			<rubik-cube></rubik-cube>
		</template>
		<slide v-bind:data="{ field : 'imageGap', label : '图片间隙', max: 30 }"></slide>
		
		<div class="template-edit-title">
			<h3>其他设置</h3>
			<i class="layui-icon layui-icon-down" onclick="closeBox(this)"></i>
		</div>
		<div class="template-edit-wrap">
			<color v-bind:data="{ field : 'backgroundColor', 'label' : '背景颜色' }"></color>
		</div>
	</template>
	
	<!-- 资源 -->
	<template slot="resource">
		
		<js>
		var rubikCubeResourcePath = "<?php echo htmlentities($resource_path); ?>";
		</js>
		<css src="<?php echo htmlentities($resource_path); ?>/rubik_cube/css/design.css"></css>
		<js src="<?php echo htmlentities($resource_path); ?>/rubik_cube/js/design.js"></js>
		
	</template>

</nc-component>