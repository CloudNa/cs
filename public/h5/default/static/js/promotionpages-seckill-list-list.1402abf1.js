(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["promotionpages-seckill-list-list"],{"0aa2":function(t,i,e){"use strict";e.d(i,"b",(function(){return s})),e.d(i,"c",(function(){return o})),e.d(i,"a",(function(){return a}));var a={nsAdv:e("e7b3").default,nsEmpty:e("6a71").default,loadingCover:e("9af4").default},s=function(){var t=this,i=t.$createElement,e=t._self._c||i;return e("v-uni-view",{class:t.themeStyle,attrs:{"data-theme":t.themeStyle}},[e("v-uni-view",{directives:[{name:"show",rawName:"v-show",value:t.show,expression:"show"}]},[t.seckillId&&t.addonIsExit.seckill?e("mescroll-uni",{ref:"mescroll",attrs:{size:10},on:{getData:function(i){arguments[0]=i=t.$handleEvent(i),t.getData.apply(void 0,arguments)},scroll:function(i){arguments[0]=i=t.$handleEvent(i),t.scroll.apply(void 0,arguments)}}},[e("template",{attrs:{slot:"list"},slot:"list"},[e("ns-adv",{attrs:{keyword:"NS_SECKILL"}}),e("v-uni-view",{staticClass:"time-wrap"},[e("v-uni-image",{attrs:{src:t.$util.img("upload/uniapp/seckill.png"),mode:"widthFix"}}),e("v-uni-scroll-view",{staticClass:"scroll-wrap",attrs:{"scroll-x":!0,"scroll-with-animation":!0,"scroll-into-view":"a"+t.seckillId}},t._l(t.timeList,(function(i,a){return e("v-uni-view",{key:a,staticClass:"time-item",attrs:{id:"a"+i.id},on:{click:function(e){arguments[0]=e=t.$handleEvent(e),t.ontabtap(i.id,a)}}},[e("v-uni-view",{staticClass:"span font-size-toolbar",class:t.seckillId==i.id?"color-base-text":""},[t._v(t._s(t.transformSeckillTime(i.seckill_start_time)))]),a>t.index?e("v-uni-view",{staticClass:"em font-size-activity-tag color-sub",class:t.seckillId==i.id?"color-base-bg active":""},[t._v("敬请期待")]):t._e(),a!=t.index||i.isNow?t._e():e("v-uni-view",{staticClass:"em font-size-activity-tag color-sub",class:t.seckillId==i.id?"color-base-bg active":""},[t._v("即将开始")]),a==t.index&&i.isNow?e("v-uni-view",{staticClass:"em font-size-activity-tag color-sub",class:t.seckillId==i.id?"color-base-bg active":""},[t._v("抢购中")]):t._e(),a<t.index?e("v-uni-view",{staticClass:"em font-size-activity-tag color-sub",class:t.seckillId==i.id?"color-base-bg active":""},[t._v("已结束")]):t._e()],1)})),1)],1),t.dataList.length?e("v-uni-view",{staticClass:"goods-list single-column",on:{click:function(i){arguments[0]=i=t.$handleEvent(i),t.isEnd(t.seckillIndex<t.index&&t.timeList[t.index].isNow)}}},t._l(t.dataList,(function(i,a){return e("v-uni-view",{key:a,staticClass:"goods-item margin-bottom"},[e("v-uni-view",{staticClass:"goods-img",on:{click:function(e){arguments[0]=e=t.$handleEvent(e),t.toGoodsDetail(i.id,t.index)}}},[e("v-uni-image",{attrs:{src:t.goodsImg(i.goods_image),mode:"widthFix"},on:{error:function(i){arguments[0]=i=t.$handleEvent(i),t.imgError(a)}}}),""!=t.goodsTag(i)?e("v-uni-view",{staticClass:"color-base-bg goods-tag"},[t._v(t._s(t.goodsTag(i)))]):t._e()],1),e("v-uni-view",{staticClass:"info-wrap"},[e("v-uni-view",{staticClass:"name-wrap"},[e("v-uni-view",{staticClass:"goods-name",on:{click:function(e){arguments[0]=e=t.$handleEvent(e),t.toGoodsDetail(i.id,t.index)}}},[t._v(t._s(i.goods_name))])],1),e("v-uni-view",{staticClass:"lineheight-clear"},[e("v-uni-view",{staticClass:"discount-price"},[e("v-uni-text",{staticClass:"unit color-base-text font-size-tag"},[t._v(t._s(t.$lang("common.currencySymbol")))]),e("v-uni-text",{staticClass:"price color-base-text font-size-toolbar"},[t._v(t._s(i.seckill_price))])],1)],1),e("v-uni-view",{staticClass:"pro-info"},[e("v-uni-view",{staticClass:"delete-price font-size-activity-tag color-tip"},[e("v-uni-text",{staticClass:"unit"},[t._v(t._s(t.$lang("common.currencySymbol")))]),t._v(t._s(i.price))],1),e("v-uni-view",{on:{click:function(e){arguments[0]=e=t.$handleEvent(e),t.toGoodsDetail(i.id,t.index)}}},[e("v-uni-button",{attrs:{type:"primary",size:"mini"}},[t._v("去抢购")])],1)],1)],1)],1)})),1):t._e(),!t.dataList.length&&t.showEmpty?e("v-uni-view",{staticStyle:{"z-index":"1 !important"}},[e("ns-empty",{attrs:{fixed:!1,text:"该时间段暂无秒杀商品"}})],1):t._e()],1)],2):t._e()],1),e("v-uni-view",{directives:[{name:"show",rawName:"v-show",value:!t.show,expression:"!show"}],staticClass:"big-empty"},[e("ns-empty",{attrs:{text:"当前活动暂未开启"}})],1),e("loading-cover",{ref:"loadingCover"})],1)},o=[]},"0f01":function(t,i,e){var a=e("b230c");"string"===typeof a&&(a=[[t.i,a,""]]),a.locals&&(t.exports=a.locals);var s=e("4f06").default;s("14bc4146",a,!0,{sourceMap:!1,shadowMode:!1})},"2e31":function(t,i,e){"use strict";var a=e("0f01"),s=e.n(a);s.a},"3b70":function(t,i,e){"use strict";e.r(i);var a=e("d3b3"),s=e.n(a);for(var o in a)"default"!==o&&function(t){e.d(i,t,(function(){return a[t]}))}(o);i["default"]=s.a},4618:function(t,i,e){"use strict";var a;e.d(i,"b",(function(){return s})),e.d(i,"c",(function(){return o})),e.d(i,"a",(function(){return a}));var s=function(){var t=this,i=t.$createElement,e=t._self._c||i;return e("v-uni-view",[t.advList.length?e("v-uni-swiper",{staticClass:"ns-adv",attrs:{"indicator-dots":t.advList.length>1,"indicator-active-color":"#ffffff",autoplay:!0,interval:3e3,duration:1e3}},t._l(t.advList,(function(i,a){return e("v-uni-swiper-item",{key:a,on:{click:function(e){arguments[0]=e=t.$handleEvent(e),t.jumppage(i.adv_url)}}},[e("v-uni-view",{staticClass:"image-box"},[e("v-uni-image",{attrs:{src:t.$util.img(i.adv_image)}})],1)],1)})),1):t._e()],1)},o=[]},"5f961":function(t,i,e){"use strict";e.r(i);var a=e("0aa2"),s=e("80b1");for(var o in s)"default"!==o&&function(t){e.d(i,t,(function(){return s[t]}))}(o);e("2e31");var n,l=e("f0c5"),d=Object(l["a"])(s["default"],a["b"],a["c"],!1,null,"2c95aeab",null,!1,a["a"],n);i["default"]=d.exports},"7e4d":function(t,i,e){var a=e("9096");"string"===typeof a&&(a=[[t.i,a,""]]),a.locals&&(t.exports=a.locals);var s=e("4f06").default;s("cc9dcdfa",a,!0,{sourceMap:!1,shadowMode:!1})},"80b1":function(t,i,e){"use strict";e.r(i);var a=e("9856"),s=e.n(a);for(var o in a)"default"!==o&&function(t){e.d(i,t,(function(){return a[t]}))}(o);i["default"]=s.a},9096:function(t,i,e){var a=e("24fb");i=a(!1),i.push([t.i,".bg[data-v-e90b8dde]{width:100%;height:%?158?%;background-color:#fff;position:fixed;left:0;\r\ntop:%?88?%;\n}.ns-adv[data-v-e90b8dde]{background:#fff;height:%?300?%;border-radius:%?10?%;padding:%?8?% %?24?% %?24?%}.ns-adv .image-box[data-v-e90b8dde]{width:100%;height:100%;border-radius:%?10?%}.ns-adv uni-image[data-v-e90b8dde]{width:100%;height:100%;border-radius:%?10?%}",""]),t.exports=i},9856:function(t,i,e){"use strict";var a=e("4ea4");e("e25e"),e("ac1f"),Object.defineProperty(i,"__esModule",{value:!0}),i.default=void 0;var s=a(e("8e90")),o=a(e("c2b3")),n=a(e("e7b3")),l={data:function(){return{hour:"00",minute:"00",second:"00",ident:!1,showEmpty:!1}},components:{nsAdv:n.default},onLoad:function(t){this.siteId=parseInt(t.site_id)||0},onShow:function(){var t=this;this.$langConfig.refresh(),this.$store.dispatch("getAddonIsexit").then((function(i){i.seckill?t.getTimeList():(t.$util.showToast({title:"秒杀未开启",mask:!0}),setTimeout((function(){t.$util.redirectTo("/pages/index/index/index",{},"redirectTo")}),1e3))}))},mixins:[o.default,s.default],onReady:function(){var t=this;setTimeout((function(){var i=uni.createSelectorQuery().in(t);i.select(".time-wrap").boundingClientRect((function(i){i&&(t.timeTop=i.top)})).exec()}),500)}};i.default=l},b230c:function(t,i,e){var a=e("24fb");i=a(!1),i.push([t.i,'@charset "UTF-8";\r\n/**\r\n * 你可以通过修改这些变量来定制自己的插件主题，实现自定义主题功能\r\n * 建议使用scss预处理，并在插件代码中直接使用这些变量（无需 import 这个文件），方便用户通过搭积木的方式开发整体风格一致的App\r\n */[data-v-2c95aeab] .ns-adv{margin:%?20?% %?30?%;padding-top:%?20?%;border-radius:%?10?%;overflow:hidden;line-height:1}[data-v-2c95aeab] .ns-adv uni-image{width:100%}.time-wrap[data-v-2c95aeab]{display:-webkit-box;display:-webkit-flex;display:flex;padding:%?20?% %?30?%;background:#fff;line-height:1}.time-wrap.fixed[data-v-2c95aeab]{position:fixed;z-index:10;top:0;width:100vw;box-sizing:border-box}.time-wrap > uni-image[data-v-2c95aeab]{width:%?66?%;margin-right:%?20?%}.time-wrap .scroll-wrap[data-v-2c95aeab]{-webkit-box-flex:1;-webkit-flex:1;flex:1;max-width:calc(100% - %?86?%);white-space:nowrap}.time-wrap .scroll-wrap .time-item[data-v-2c95aeab]{padding:0 %?10?%;text-align:center;display:inline-block}.time-wrap .scroll-wrap .time-item .span[data-v-2c95aeab]{font-weight:700;line-height:1}.time-wrap .scroll-wrap .time-item .em[data-v-2c95aeab]{line-height:1;padding:%?6?% %?30?%;border-radius:%?24?%;margin-top:%?6?%}.time-wrap .scroll-wrap .time-item .em.active[data-v-2c95aeab]{color:#fff!important}.lineheight-clear[data-v-2c95aeab]{line-height:1!important}.goods-list.single-column .goods-item[data-v-2c95aeab]{padding:%?26?%;background:#fff;margin:%?20?% %?30?%;border-radius:%?10?%;display:-webkit-box;display:-webkit-flex;display:flex;position:relative}.goods-list.single-column .goods-item .goods-img[data-v-2c95aeab]{width:%?200?%;height:%?200?%;overflow:hidden;border-radius:%?10?%;margin-right:%?20?%}.goods-list.single-column .goods-item .goods-img uni-image[data-v-2c95aeab]{width:100%;height:100%}.goods-list.single-column .goods-item .goods-tag[data-v-2c95aeab]{color:#fff;line-height:1;padding:%?8?% %?12?%;position:absolute;border-top-left-radius:%?10?%;border-bottom-right-radius:%?10?%;top:%?26?%;left:%?26?%;font-size:%?22?%}.goods-list.single-column .goods-item .info-wrap[data-v-2c95aeab]{-webkit-box-flex:1;-webkit-flex:1;flex:1;display:-webkit-box;display:-webkit-flex;display:flex;-webkit-box-orient:vertical;-webkit-box-direction:normal;-webkit-flex-direction:column;flex-direction:column}.goods-list.single-column .goods-item .name-wrap[data-v-2c95aeab]{-webkit-box-flex:1;-webkit-flex:1;flex:1}.goods-list.single-column .goods-item .goods-name[data-v-2c95aeab]{font-size:%?28?%;line-height:1.3;overflow:hidden;text-overflow:ellipsis;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;height:%?68?%}.goods-list.single-column .goods-item .progress-wrap[data-v-2c95aeab]{display:-webkit-box;display:-webkit-flex;display:flex;margin-top:%?10?%}.goods-list.single-column .goods-item .progress-wrap uni-progress[data-v-2c95aeab]{-webkit-box-flex:1;-webkit-flex:1;flex:1}.goods-list.single-column .goods-item .progress-wrap .txt[data-v-2c95aeab]{margin:0 %?100?% 0 %?20?%}.goods-list.single-column .goods-item .discount-price[data-v-2c95aeab]{display:inline-block;font-weight:700;line-height:1;margin-top:%?16?%}.goods-list.single-column .goods-item .discount-price .unit[data-v-2c95aeab]{margin-right:%?6?%}.goods-list.single-column .goods-item .discount-price .txt[data-v-2c95aeab]{font-weight:400}.goods-list.single-column .goods-item .pro-info[data-v-2c95aeab]{position:relative;margin-top:%?16?%}.goods-list.single-column .goods-item .pro-info .delete-price[data-v-2c95aeab]{text-decoration:line-through;-webkit-box-flex:1;-webkit-flex:1;flex:1;display:-webkit-box;display:-webkit-flex;display:flex;-webkit-box-align:end;-webkit-align-items:flex-end;align-items:flex-end}.goods-list.single-column .goods-item .pro-info .delete-price .unit[data-v-2c95aeab]{margin-right:%?6?%}.goods-list.single-column .goods-item .pro-info .delete-price .txt[data-v-2c95aeab]{text-decoration:none}.goods-list.single-column .goods-item .pro-info > uni-view[data-v-2c95aeab]{line-height:1}.goods-list.single-column .goods-item .pro-info > uni-view[data-v-2c95aeab]:nth-child(2){position:absolute;right:0;bottom:0}.goods-list.single-column .goods-item .pro-info .buy-btn[data-v-2c95aeab]{width:%?160?%;height:%?90?%;border-radius:%?10?%}.goods-list.single-column .goods-item .pro-info .buy-btn .text[data-v-2c95aeab]{color:#fff;text-align:center;line-height:1;padding-top:%?20?%}.goods-list.single-column .goods-item .pro-info .buy-btn .progress[data-v-2c95aeab]{margin-top:%?6?%;padding:0 %?20?%;display:-webkit-box;display:-webkit-flex;display:flex}.goods-list.single-column .goods-item .pro-info .buy-btn .progress uni-progress[data-v-2c95aeab]{-webkit-box-flex:1;-webkit-flex:1;flex:1}.goods-list.single-column .goods-item .pro-info .buy-btn .progress .num[data-v-2c95aeab]{margin-left:%?10?%;color:#fff;line-height:1}.goods-list.single-column .goods-item .member-price-tag[data-v-2c95aeab]{display:inline-block;width:%?60?%;line-height:1;margin-left:%?6?%}.goods-list.single-column .goods-item .member-price-tag uni-image[data-v-2c95aeab]{width:100%}',""]),t.exports=i},c2b3:function(t,i,e){"use strict";e("99af"),e("4160"),e("a434"),e("07ac"),e("acd8"),e("e25e"),e("ac1f"),e("1276"),e("159b"),Object.defineProperty(i,"__esModule",{value:!0}),i.default=void 0;var a={data:function(){return{mescroll:null,timeList:[],seckillId:null,seckillIndex:null,dataList:[],index:null,siteId:0,timer:null,noStartList:[],showEmpty:!1}},watch:{seckillId:function(t,i){t&&i&&t!=i&&this.mescroll.resetUpScroll(!1)}},computed:{show:function(){return this.timeList.length>0}},methods:{goodsImg:function(t){var i=t.split(",");return i[0]?this.$util.img(i[0],{size:"mid"}):this.$util.getDefaultImage().default_goods_img},transformSeckillTime:function(t){t=parseFloat(t);var i=parseInt(t/3600),e=parseInt(t%3600/60),a=parseInt(t%60);return i<10&&(i="0"+i),e<10&&(e="0"+e),a<10&&(a="0"+a),i+":"+e},isEnd:function(t){t&&this.$util.showToast({title:"限时秒杀活动已结束"})},getTimeList:function(){var t=this;this.$api.sendRequest({url:"/seckill/api/seckill/lists",data:{site_id:this.siteId},success:function(i){var e=i.data;if(e){var a=new Date(1e3*i.timestamp),s=60*a.getHours()*60+60*a.getMinutes()+a.getSeconds(),o=Object.values(e.list);if(o.forEach((function(i,e){i.seckill_start_time<=s&&s<i.seckill_end_time?(i.isNow=!0,t.seckillId=i.id,t.index=e,t.seckillIndex=e):i.isNow=!1})),t.timeList=e.list,o.length){for(var n=Math.round(new Date/1e3),l=Math.round(new Date((new Date).toLocaleDateString()).getTime()/1e3),d=n-l,r=0;r<e.list.length;r++)if((s<e.list[r].seckill_start_time&&0==r||s<e.list[r].seckill_start_time&&s>e.list[r-1].seckill_end_time&&0!=r||r==e.list.length-1&&s>e.list[r].seckill_end_time)&&(t.seckillId=e.list[r].id,t.index=r,t.seckillIndex=r),d<o[r].seckill_start_time){var c=o[r];c.index=r,t.noStartList.push(c)}t.noStartList.length&&t.autoEvent()}var u=t;setInterval((function(t){u.getExpirationTime()}),1e3),t.$refs.loadingCover&&t.$refs.loadingCover.hide()}}})},getData:function(t){var i=this;this.mescroll=t,1==t.size&&(this.dataList=[]),this.$api.sendRequest({url:"/seckill/api/seckillgoods/page",data:{page_size:t.size,page:t.num,seckill_id:this.seckillId,site_id:this.siteId},success:function(e){i.showEmpty=!0;var a=[],s=e.message;0==e.code&&e.data?a=e.data.list:i.$util.showToast({title:s}),t.endSuccess(a.length),1==t.num&&(i.dataList=[]),i.dataList=i.dataList.concat(a),i.$refs.loadingCover&&i.$refs.loadingCover.hide()},fail:function(){t.endErr(),this.$refs.loadingCover&&this.$refs.loadingCover.hide()}})},getExpirationTime:function(){var t,i,e,a=this.timeList,s=new Date,o=s.toLocaleDateString();for(var n in a)if(a[n].isNow){this.ident=!0,i=Date.parse(s),t=Date.parse(o)+1e3*parseInt(a[n].seckill_end_time);var l=(t-i)/1e3;if(e=this.$util.countDown(l),this.hour=e.h,this.minute=e.i,this.second=e.s,0==l){var d=parseInt(n)+1;d<a.length&&(this.index=d),this.timeList[n].isNow=!1}return!1}this.ident=!1},ontabtap:function(t,i){this.seckillId=t,this.seckillIndex=i},toGoodsDetail:function(t,i){var e=this;this.seckillIndex<this.index?this.$util.showToast({title:"秒杀活动已结束！"}):this.seckillIndex>this.index?this.$util.showToast({title:"秒杀活动还未开启，敬请期待！"}):this.$api.sendRequest({url:"/api/config/time",data:{},success:function(a){var s=new Date(1e3*a.timestamp),o=60*s.getHours()*60+60*s.getMinutes()+s.getSeconds();e.timeList[i].seckill_start_time<=o&&o<e.timeList[i].seckill_end_time?e.timeList[i].isNow=!0:e.timeList[i].isNow=!1,e.$forceUpdate(),e.timeList[i].isNow?e.$util.redirectTo("/promotionpages/seckill/detail/detail",{seckill_id:t}):e.$util.showToast({title:"秒杀活动即将开启，敬请期待！"})}})},imgError:function(t){this.dataList[t].goods_image=this.$util.getDefaultImage().default_goods_img,this.$forceUpdate()},autoEvent:function(){var t=this;this.timer=setInterval((function(){for(var i=Math.round(new Date/1e3),e=Math.round(new Date((new Date).toLocaleDateString()).getTime()/1e3),a=i-e,s=0;s<t.noStartList.length;s++){var o=t.noStartList[s];a>o.seckill_start_time&&!o.isNow&&(t.seckillId=o.seckill_id,t.index=o.index,t.timeList[o.index].isNow=!0,void 0!=t.timeList[o.index-1]&&(t.timeList[o.index-1].isNow=!1),t.noStartList.splice(s))}0==t.noStartList.length&&clearInterval(t.timer)}),1e3)},goodsTag:function(t){switch(t.recommend_way){case 1:return"新品";case 2:return"精品";case 3:return"推荐";default:return""}}},onShareAppMessage:function(t){var i="一大波的秒杀福利就要开始了，真的不来看看嘛",e="/promotionpages/seckill/list/list";return{title:i,path:e,success:function(t){},fail:function(t){}}},onHide:function(){clearInterval(this.timer)}};i.default=a},d3b3:function(t,i,e){"use strict";e("4160"),e("159b"),Object.defineProperty(i,"__esModule",{value:!0}),i.default=void 0;var a={name:"ns-adv",props:{keyword:{type:String}},data:function(){return{advList:[]}},created:function(){this.getAdvList()},methods:{getAdvList:function(){var t=this;this.keyword&&this.$api.sendRequest({url:"/api/adv/detail",data:{keyword:this.keyword},success:function(i){0==i.code&&i.data&&(i.data.adv_list.forEach((function(t){t.adv_url&&(t.adv_url=JSON.parse(t.adv_url))})),t.advList=i.data.adv_list)}})},jumppage:function(t){this.$util.diyRedirectTo(t)}}};i.default=a},e7b3:function(t,i,e){"use strict";e.r(i);var a=e("4618"),s=e("3b70");for(var o in s)"default"!==o&&function(t){e.d(i,t,(function(){return s[t]}))}(o);e("f792");var n,l=e("f0c5"),d=Object(l["a"])(s["default"],a["b"],a["c"],!1,null,"e90b8dde",null,!1,a["a"],n);i["default"]=d.exports},f792:function(t,i,e){"use strict";var a=e("7e4d"),s=e.n(a);s.a}}]);