(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["pages-statistics-visit"],{"0867":function(t,e,a){"use strict";a.r(e);var i=a("8a72"),r=a.n(i);for(var o in i)"default"!==o&&function(t){a.d(e,t,(function(){return i[t]}))}(o);e["default"]=r.a},"56b6":function(t,e,a){"use strict";a.r(e);var i=a("8c19"),r=a("0867");for(var o in r)"default"!==o&&function(t){a.d(e,t,(function(){return r[t]}))}(o);a("d833");var l,n=a("f0c5"),s=Object(n["a"])(r["default"],i["b"],i["c"],!1,null,"2f69517e",null,!1,i["a"],l);e["default"]=s.exports},"6a92":function(t,e,a){"use strict";Object.defineProperty(e,"__esModule",{value:!0}),e.default=void 0;var i={data:function(){return{cWidth:0,cHeight:0,canvas:!0,arr:[],collect_shop:{categories:[],series:[]},collect_goods:{categories:[],series:[]},visit_count:{categories:[],series:[]},refCurr:"",transaction_time:7,picker:{gaikuang:[{date_type:0,date_text:"今日实时"},{date_type:1,date_text:"近7天"},{date_type:2,date_text:"近30天"}],table:[{date_type:1,date_text:"近7天",day:7},{date_type:2,date_text:"近30天",day:30}]},pickerCurr:{gaikuang:0,collect_shop:0,collect_goods:0,visit_count:0},total_money:{gaikuang:0,collect_shop:0,collect_goods:0,visit_count:0},order_info:{},shop_info:{}}},onShow:function(){this.$util.checkToken("/pages/statistics/visit")&&(this.getChartsInfo(),this.getTotalData(),this.getTotalData(1))},methods:{selectCharts:function(t){this.refCurr=t},bindPickerChange:function(t,e){this.pickerCurr[t]=e.detail.value,this.transaction_time=this.picker.table[e.target.value].day,this.getChartsInfo(),this.getTotalData(this.picker.table[e.target.value].date_type)},pickerChangeShop:function(t){this.pickerCurr.gaikuang=t.target.value,this.getTotalData()},init:function(){this.cWidth=uni.upx2px(630),this.cHeight=uni.upx2px(500),this.getServerData()},getTotalData:function(t){var e=this,a=t||this.picker.gaikuang[this.pickerCurr.gaikuang].date_type;this.$api.sendRequest({url:"/shopapi/statistics/visit",data:{date_type:a},success:function(a){a.code>=0?t?e.refCurr?e.total_money[e.refCurr]=a.data[e.refCurr]:(e.total_money.collect_shop=a.data.collect_shop,e.total_money.collect_goods=a.data.collect_goods,e.total_money.visit_count=a.data.visit_count):e.shop_info=a.data:e.$util.showToast({title:a.message}),e.$refs.loadingCover&&e.$refs.loadingCover.hide()}})},getChartsInfo:function(){var t=this,e=this.refCurr?this.picker.table[this.pickerCurr[this.refCurr]].date_type:this.picker.table[this.pickerCurr["visit_count"]].date_type;this.$api.sendRequest({url:"/shopapi/statistics/getVisitStatList",data:{date_type:e},success:function(e){if(e.code>=0){t.order_info=e.data;for(var a=[],i=t.transaction_time-1;i>=0;i--)a.push(t.getDay(-i));t.collect_shop.categories=t.collect_goods.categories=t.visit_count.categories=a,t.collect_shop.series=[{name:"店铺收藏数",data:e.data.collect_shop,color:"#FF6A00",time:e.data.time}],t.collect_goods.series=[{name:"商品收藏数",data:e.data.collect_goods,color:"#FF6A00",time:e.data.time}],t.visit_count.series=[{name:"商品浏览数",data:e.data.visit_count,color:"#FF6A00",time:e.data.time}],t.$refs[t.refCurr]?t.$refs[t.refCurr][0].changeData(t.refCurr,t[t.refCurr]):t.init()}else t.$util.showToast({title:e.message})}})},getDay:function(t){var e=new Date;e.setDate(e.getDate()+t);e.getFullYear();var a=e.getMonth()+1;a<10&&(a="0"+a);var i=e.getDate();return i<10&&(i="0"+i),a+"-"+i},getServerData:function(){var t={yAxisdisabled:!0,xAxisgridColor:"transparent",yAxisgridType:"dash",yAxisgridColor:"#eeeeee",animation:!0,enableScroll:!0,scrollColor:"transparent",scrollBackgroundColor:"transparent",scrollPosition:"right",boundaryGap:"justify",extra:{area:{addLine:!0,opacity:.5,width:2,color:"#FF6A00",type:"curve"}},legend:!1};this.collect_shop=Object.assign(this.collect_shop,t,{unit:"个"}),this.collect_goods=Object.assign(this.collect_goods,t,{unit:"件"}),this.visit_count=Object.assign(this.visit_count,t,{unit:"条"});var e=[{title:"店铺收藏数",opts:this.collect_shop,chartType:"area",extraType:"curve",id:"collect_shop"},{title:"商品收藏数",opts:this.collect_goods,chartType:"area",extraType:"curve",id:"collect_goods"},{title:"商品浏览数",opts:this.visit_count,chartType:"area",extraType:"curve",id:"visit_count"}];this.arr=e}}};e.default=i},"8a72":function(t,e,a){"use strict";var i=a("4ea4");Object.defineProperty(e,"__esModule",{value:!0}),e.default=void 0;var r=i(a("4064")),o=i(a("6a92")),l={components:{uCharts:r.default},mixins:[o.default]};e.default=l},"8c19":function(t,e,a){"use strict";a.d(e,"b",(function(){return r})),a.d(e,"c",(function(){return o})),a.d(e,"a",(function(){return i}));var i={loadingCover:a("8f54").default},r=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("v-uni-view",{staticClass:"withdrawal safe-area"},[a("v-uni-view",{staticClass:"withdrawal_item"},[a("v-uni-view",{staticClass:"withdrawal_title"},[a("v-uni-view",{staticClass:"withdrawal_title_info"},[a("v-uni-text",{staticClass:"line color-base-bg margin-right"}),a("v-uni-text",[t._v("访问概况")])],1),a("v-uni-picker",{attrs:{value:t.pickerCurr.gaikuang,range:t.picker.gaikuang,"range-key":"date_text"},on:{change:function(e){arguments[0]=e=t.$handleEvent(e),t.pickerChangeShop.apply(void 0,arguments)}}},[a("v-uni-view",{staticClass:"select color-tip"},[t._v(t._s(t.picker.gaikuang[t.pickerCurr.gaikuang].date_text)),a("v-uni-text",{staticClass:"iconfont iconiconangledown"})],1)],1)],1),a("v-uni-view",{staticClass:"withdrawal_content margin-top"},[a("v-uni-view",{staticClass:"flex_two"},[a("v-uni-view",{staticClass:"flex_three-item overhidden"},[a("v-uni-view",{staticClass:"tip overhidden"},[t._v("店铺收藏")]),a("v-uni-view",{staticClass:"num overhidden"},[t._v(t._s(t.shop_info.collect_shop))])],1),a("v-uni-view",{staticClass:"flex_three-item overhidden"},[a("v-uni-view",{staticClass:"tip overhidden"},[t._v("商品收藏")]),a("v-uni-view",{staticClass:"num overhidden"},[t._v(t._s(t.shop_info.collect_goods))])],1),a("v-uni-view",{staticClass:"flex_three-item overhidden"},[a("v-uni-view",{staticClass:"tip overhidden"},[t._v("商品浏览")]),a("v-uni-view",{staticClass:"num overhidden"},[t._v(t._s(t.shop_info.visit_count))])],1)],1)],1)],1),t._l(t.arr,(function(e,i){return[a("v-uni-view",{key:i+"_0",staticClass:"withdrawal_item margin-top"},[a("v-uni-view",{staticClass:"withdrawal_title"},[a("v-uni-view",{staticClass:"withdrawal_title_info"},[a("v-uni-text",{staticClass:"line color-base-bg margin-right"}),t._v(t._s(e.title)),e.opts.unit?a("v-uni-text",[t._v("("+t._s(e.opts.unit)+")")]):t._e(),a("v-uni-text",{staticClass:"margin-left total"},[t._v(t._s(t.total_money[e.id]))])],1),a("v-uni-picker",{attrs:{value:t.pickerCurr.table,range:t.picker.table,"range-key":"date_text"},on:{change:function(a){arguments[0]=a=t.$handleEvent(a),t.bindPickerChange(e.id,a)},click:function(a){arguments[0]=a=t.$handleEvent(a),t.selectCharts(e.id)}}},[a("v-uni-view",{staticClass:"select color-tip color-base-text"},[t._v(t._s(t.picker.table[t.pickerCurr[e.id]].date_text)),a("v-uni-text",{staticClass:"iconfont iconiconangledown"})],1)],1)],1),a("v-uni-view",{staticClass:"withdrawal_content margin-top"},[a("v-uni-view",{staticClass:"charts"},[a("v-uni-view",{on:{click:function(a){arguments[0]=a=t.$handleEvent(a),t.refCurr=e.id}}},[a("uCharts",{ref:e.id,refInFor:!0,attrs:{scroll:e.opts.enableScroll,show:t.canvas,canvasId:e.id,chartType:e.chartType,extraType:e.extraType,cWidth:t.cWidth,cHeight:t.cHeight,opts:e.opts}})],1)],1)],1)],1)]})),a("loading-cover",{ref:"loadingCover"})],2)},o=[]},a22f:function(t,e,a){var i=a("f438");"string"===typeof i&&(i=[[t.i,i,""]]),i.locals&&(t.exports=i.locals);var r=a("4f06").default;r("748e71d4",i,!0,{sourceMap:!1,shadowMode:!1})},d833:function(t,e,a){"use strict";var i=a("a22f"),r=a.n(i);r.a},f438:function(t,e,a){var i=a("24fb");e=i(!1),e.push([t.i,'@charset "UTF-8";\r\n/**\r\n * 你可以通过修改这些变量来定制自己的插件主题，实现自定义主题功能\r\n * 建议使用scss预处理，并在插件代码中直接使用这些变量（无需 import 这个文件），方便用户通过搭积木的方式开发整体风格一致的App\r\n */.uni-line-hide[data-v-2f69517e]{overflow:hidden;text-overflow:ellipsis;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical}.uni-using-hide[data-v-2f69517e]{overflow:hidden;width:100%;text-overflow:ellipsis;white-space:nowrap}.prevent-head-roll[data-v-2f69517e]{position:fixed;left:0;right:0;z-index:998}.withdrawal[data-v-2f69517e]{padding:1px 0}.withdrawal .withdrawal_item[data-v-2f69517e]{margin:0 %?30?%}.withdrawal .withdrawal_item .withdrawal_title[data-v-2f69517e]{display:-webkit-box;display:-webkit-flex;display:flex;-webkit-box-align:center;-webkit-align-items:center;align-items:center;margin-top:%?40?%}.withdrawal .withdrawal_item .withdrawal_title .withdrawal_title_info[data-v-2f69517e]{font-size:%?32?%;font-weight:700;-webkit-box-flex:1;-webkit-flex:1;flex:1}.withdrawal .withdrawal_item .withdrawal_title .withdrawal_title_info .total[data-v-2f69517e]{color:#ff6a00}.withdrawal .withdrawal_item .withdrawal_title .withdrawal_title_info .line[data-v-2f69517e]{display:inline-block;height:%?28?%;width:%?4?%;border-radius:%?4?%}.withdrawal .withdrawal_item .withdrawal_title .select[data-v-2f69517e]{border:1px solid #ccc;height:%?46?%;line-height:%?46?%;border-radius:%?46?%;min-width:%?160?%;text-align:center;font-size:%?24?%}.withdrawal .withdrawal_item .withdrawal_title .select uni-text[data-v-2f69517e]{vertical-align:middle}.withdrawal .withdrawal_item .withdrawal_content[data-v-2f69517e]{background-color:#fff;border-radius:%?10?%}.withdrawal .withdrawal_item .withdrawal_content.margin-top[data-v-2f69517e]{margin-top:%?30?%!important}.withdrawal .withdrawal_item .withdrawal_content .flex_two[data-v-2f69517e]{display:-webkit-box;display:-webkit-flex;display:flex;-webkit-flex-wrap:wrap;flex-wrap:wrap}.withdrawal .withdrawal_item .withdrawal_content .flex_two .flex_two-item[data-v-2f69517e]{padding:%?28?% %?30?%;width:calc(50% - %?60?% - 1px);border-bottom:1px solid #eee}.withdrawal .withdrawal_item .withdrawal_content .flex_two .flex_two-item[data-v-2f69517e]:nth-child(2n + 1){border-right:1px solid #eee}.withdrawal .withdrawal_item .withdrawal_content .flex_two .flex_two-item.border_none[data-v-2f69517e]{border-bottom:0}.withdrawal .withdrawal_item .withdrawal_content .flex_two .flex_two-item .num[data-v-2f69517e]{font-size:%?30?%;font-weight:500}.withdrawal .withdrawal_item .withdrawal_content .flex_two .flex_two-item .tip[data-v-2f69517e]{color:#909399;font-size:%?24?%}.withdrawal .withdrawal_item .withdrawal_content .flex_two .flex_three-item[data-v-2f69517e]{padding:%?28?% %?30?%;-webkit-box-flex:1;-webkit-flex:1;flex:1}.withdrawal .withdrawal_item .withdrawal_content .flex_two .flex_three-item[data-v-2f69517e]:nth-child(2n + 1){border-right:1px solid #eee}.withdrawal .withdrawal_item .withdrawal_content .flex_two .flex_three-item .num[data-v-2f69517e]{font-size:%?30?%;font-weight:500}.withdrawal .withdrawal_item .withdrawal_content .flex_two .flex_three-item .tip[data-v-2f69517e]{color:#909399;font-size:%?24?%}.withdrawal .withdrawal_item .withdrawal_content .flex_two .overhidden[data-v-2f69517e]{overflow:hidden;text-overflow:ellipsis;white-space:nowrap}.withdrawal .withdrawal_item .withdrawal_content .charts[data-v-2f69517e]{padding:%?30?%}.safe-area[data-v-2f69517e]{padding-bottom:calc(constant(safe-area-inset-bottom) + %?40?%);padding-bottom:calc(env(safe-area-inset-bottom) + %?40?%)}',""]),t.exports=e}}]);