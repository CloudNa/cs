(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["pages-property-fee"],{"2f8a":function(t,a,e){"use strict";e("99af"),Object.defineProperty(a,"__esModule",{value:!0}),a.default=void 0;var i={data:function(){return{base_info:{},is_reopen:"",dashboard_list:[],tipShow:!0}},onShow:function(){this.$util.checkToken("/pages/property/fee")&&this.getBaseInfo()},methods:{getBaseInfo:function(){var t=this;this.$api.sendRequest({url:"/shopapi/account/feeStat",success:function(a){a.code>=0?(t.base_info=a.data.apply_data,t.is_reopen=a.data.is_reopen):t.$util.showToast({title:a.message})}})},getList:function(t){var a=this,e={page:t.num,page_size:t.size};this.$api.sendRequest({url:"/shopapi/account/fee",data:e,success:function(e){var i=[],l=e.message;0==e.code&&e.data?(0==e.data.page_count&&(a.emptyShow=!0),i=e.data.list):a.$util.showToast({title:l}),t.endSuccess(i.length),1==t.num&&(a.dashboard_list=[]),a.dashboard_list=a.dashboard_list.concat(i),a.$refs.loadingCover&&a.$refs.loadingCover.hide()}})}}};a.default=i},"3d0f":function(t,a,e){var i=e("24fb");a=i(!1),a.push([t.i,'@charset "UTF-8";\r\n/**\r\n * 你可以通过修改这些变量来定制自己的插件主题，实现自定义主题功能\r\n * 建议使用scss预处理，并在插件代码中直接使用这些变量（无需 import 这个文件），方便用户通过搭积木的方式开发整体风格一致的App\r\n */.uni-line-hide[data-v-fc0ed30a]{overflow:hidden;text-overflow:ellipsis;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical}.uni-using-hide[data-v-fc0ed30a]{overflow:hidden;width:100%;text-overflow:ellipsis;white-space:nowrap}.prevent-head-roll[data-v-fc0ed30a]{position:fixed;left:0;right:0;z-index:998}.operate_tip[data-v-fc0ed30a]{margin:%?30?%;padding:%?20?% %?30?%;background-color:#fff}.operate_tip .operate_content[data-v-fc0ed30a]{word-wrap:break-word;word-break:break-all}.operate_tip .operate_content > uni-view[data-v-fc0ed30a]{display:-webkit-box;display:-webkit-flex;display:flex}.search[data-v-fc0ed30a]{display:-webkit-box;display:-webkit-flex;display:flex;margin:%?30?%;-webkit-box-pack:center;-webkit-justify-content:center;justify-content:center;text-align:center}.search .search_input[data-v-fc0ed30a]{padding:0 %?20?%;background-color:#fff;-webkit-box-flex:1;-webkit-flex:1;flex:1;height:%?70?%;line-height:%?70?%;border-radius:%?70?%;display:-webkit-box;display:-webkit-flex;display:flex;-webkit-box-align:center;-webkit-align-items:center;align-items:center}.search .search_input uni-input[data-v-fc0ed30a]{height:%?70?%;line-height:%?70?%;border-radius:%?70?%;padding:0 %?20?%}.search .search_input .date[data-v-fc0ed30a]{display:-webkit-box;display:-webkit-flex;display:flex;-webkit-box-align:center;-webkit-align-items:center;align-items:center;-webkit-box-flex:1;-webkit-flex:1;flex:1;color:#909399}.search .search_input .date uni-picker[data-v-fc0ed30a]{-webkit-box-flex:1;-webkit-flex:1;flex:1}.search .search_input .date uni-picker.start[data-v-fc0ed30a]{margin-right:%?20?%!important}.search .search_input .date uni-picker.end[data-v-fc0ed30a]{margin-left:%?20?%!important}.search .search_input .date .clear[data-v-fc0ed30a]{min-width:%?60?%}.search .search_input .search_btn[data-v-fc0ed30a]{min-width:%?60?%}.search .search_input .placeholder[data-v-fc0ed30a]{font-size:%?28?%;color:#909399}.search .search_select[data-v-fc0ed30a]{background-color:#fff;height:%?70?%;line-height:%?70?%;border-radius:%?70?%;width:%?160?%;color:#909399;font-size:%?24?%;display:-webkit-box;display:-webkit-flex;display:flex;-webkit-box-align:center;-webkit-align-items:center;align-items:center;-webkit-box-pack:center;-webkit-justify-content:center;justify-content:center}.search .search_select > uni-text[data-v-fc0ed30a]{margin-left:%?10?%}.withdrawal[data-v-fc0ed30a]{padding:%?30?% 0}.withdrawal .withdrawal_item[data-v-fc0ed30a]{margin:0 %?30?%}.withdrawal .withdrawal_item .withdrawal_title[data-v-fc0ed30a]{font-size:%?32?%;font-weight:700;margin-bottom:%?20?%}.withdrawal .withdrawal_item .withdrawal_title .line[data-v-fc0ed30a]{display:inline-block;height:%?28?%;width:%?4?%;border-radius:%?4?%}.withdrawal .withdrawal_item .withdrawal_content[data-v-fc0ed30a]{background-color:#fff;border-radius:%?10?%}.withdrawal .withdrawal_item .withdrawal_content.margin-top[data-v-fc0ed30a]{margin-top:%?30?%!important}.withdrawal .withdrawal_item .withdrawal_content .flex_two[data-v-fc0ed30a]{display:-webkit-box;display:-webkit-flex;display:flex;-webkit-flex-wrap:wrap;flex-wrap:wrap}.withdrawal .withdrawal_item .withdrawal_content .flex_two .flex_one-item[data-v-fc0ed30a]{padding:%?40?% %?30?%;border-bottom:0}.withdrawal .withdrawal_item .withdrawal_content .flex_two .flex_one-item.border_none[data-v-fc0ed30a]{border-bottom:0}.withdrawal .withdrawal_item .withdrawal_content .flex_two .flex_one-item .tip[data-v-fc0ed30a]{color:#909399;font-size:%?24?%}.withdrawal .withdrawal_item .withdrawal_content .flex_two .flex_one-item .num[data-v-fc0ed30a]{font-size:%?30?%;overflow:hidden;text-overflow:ellipsis}.withdrawal .withdrawal_item .withdrawal_content .flex_two .flex_one-item .green[data-v-fc0ed30a]{color:green}.withdrawal .withdrawal_item .withdrawal_content .flex_two .flex_one-item .red[data-v-fc0ed30a]{color:red}.withdrawal .withdrawal_item .withdrawal_content .flex_two .flex_two-item[data-v-fc0ed30a]{padding:%?28?% %?30?%;width:calc(50% - %?60?% - 1px);border-bottom:1px solid #eee}.withdrawal .withdrawal_item .withdrawal_content .flex_two .flex_two-item[data-v-fc0ed30a]:nth-child(2n + 1){border-right:1px solid #eee}.withdrawal .withdrawal_item .withdrawal_content .flex_two .flex_two-item.border_none[data-v-fc0ed30a]{border-bottom:0}.withdrawal .withdrawal_item .withdrawal_content .flex_two .flex_two-item .tip[data-v-fc0ed30a]{color:#909399;font-size:%?24?%}.withdrawal .withdrawal_item .withdrawal_content .flex_two .flex_two-item .num[data-v-fc0ed30a]{font-size:%?30?%;font-weight:500;overflow:hidden;text-overflow:ellipsis}.withdrawal .withdrawal_item .withdrawal_content .withdrawal_list .withdrawal_list_title[data-v-fc0ed30a]{padding:%?20?% %?30?%;border-bottom:1px solid #eee;display:-webkit-box;display:-webkit-flex;display:flex;-webkit-box-pack:justify;-webkit-justify-content:space-between;justify-content:space-between;-webkit-box-align:center;-webkit-align-items:center;align-items:center}.withdrawal .withdrawal_item .withdrawal_content .withdrawal_list .withdrawal_list_info[data-v-fc0ed30a]{padding:%?20?% %?30?%}.withdrawal .withdrawal_item .withdrawal_content .withdrawal_list .withdrawal_list_info .withdrawal_list_base[data-v-fc0ed30a]{display:-webkit-box;display:-webkit-flex;display:flex}.withdrawal .withdrawal_item .withdrawal_content .withdrawal_list .withdrawal_list_info .withdrawal_list_base .tip[data-v-fc0ed30a]{width:%?260?%;color:#909399}.withdrawal .withdrawal_item .withdrawal_content .withdrawal_list .withdrawal_list_info .withdrawal_list_base .green[data-v-fc0ed30a]{color:green}.withdrawal .withdrawal_item .withdrawal_content .withdrawal_list .withdrawal_list_info .withdrawal_list_base .red[data-v-fc0ed30a]{color:red}.withdrawal .withdrawal_item .withdrawal_content .withdrawal_list .withdrawal_list_info .mark[data-v-fc0ed30a]{word-wrap:break-word;word-break:break-all;font-size:%?24?%}.withdrawal .withdrawal_item .operate[data-v-fc0ed30a]{display:-webkit-box;display:-webkit-flex;display:flex;-webkit-box-pack:end;-webkit-justify-content:flex-end;justify-content:flex-end;padding:%?20?% %?30?%;border-top:1px solid}.withdrawal .withdrawal_item .operate uni-button[data-v-fc0ed30a]{margin-left:%?20?%!important}',""]),t.exports=a},"9cf3":function(t,a,e){"use strict";var i=e("dfc4"),l=e.n(i);l.a},bb49:function(t,a,e){"use strict";e.d(a,"b",(function(){return l})),e.d(a,"c",(function(){return n})),e.d(a,"a",(function(){return i}));var i={nsEmpty:e("410b").default,loadingCover:e("36db").default},l=function(){var t=this,a=t.$createElement,e=t._self._c||a;return e("v-uni-view",{staticClass:"withdrawal"},[e("mescroll-uni",{ref:"mescroll",attrs:{fixed:!1},on:{getData:function(a){arguments[0]=a=t.$handleEvent(a),t.getList.apply(void 0,arguments)}}},[e("template",{attrs:{slot:"list"},slot:"list"},[e("v-uni-view",{staticClass:"operate_tip"},[e("v-uni-view",{on:{click:function(a){arguments[0]=a=t.$handleEvent(a),t.tipShow=!t.tipShow}}},[t._v("操作提示"),e("v-uni-text",{staticClass:"iconfont iconiconangledown"})],1),t.tipShow?e("v-uni-view",{staticClass:"operate_content"},[e("v-uni-view",{staticClass:"color-tip font-size-tag margin-top"},[e("v-uni-text",{staticClass:"margin-right"},[t._v("●")]),e("v-uni-view",{staticClass:"color-tip font-size-tag"},[t._v("店铺到期30日内可以申请续签")])],1),e("v-uni-view",{staticClass:"color-tip font-size-tag margin-top"},[e("v-uni-text",{staticClass:"margin-right"},[t._v("●")]),e("v-uni-view",{staticClass:"color-tip font-size-tag"},[t._v("请认准官方收款账户，支付凭据上传之后请联系官方客服人员")])],1)],1):t._e()],1),e("v-uni-view",{staticClass:"withdrawal_item margin-top"},[e("v-uni-view",{staticClass:"withdrawal_title"},[e("v-uni-text",{staticClass:"line color-base-bg margin-right"}),t._v("入驻费用")],1),e("v-uni-view",{staticClass:"withdrawal_content"},[e("v-uni-view",{staticClass:"flex_two"},[e("v-uni-view",{staticClass:"flex_two-item"},[e("v-uni-view",{staticClass:"tip"},[t._v("入驻费用(元)")]),e("v-uni-view",{staticClass:"num"},[t._v(t._s(t.base_info.shop_open_fee))])],1),e("v-uni-view",{staticClass:"flex_two-item"},[e("v-uni-view",{staticClass:"tip"},[t._v("保证金(元)")]),e("v-uni-view",{staticClass:"num"},[t._v(t._s(t.base_info.shop_baozhrmb))])],1),e("v-uni-view",{staticClass:"flex_one-item .border_none"},[e("v-uni-view",{staticClass:"tip"},[t._v("到期时间"),2==t.base_info.is_reopen?[1==t.is_reopen?e("v-uni-text",{staticClass:"margin-left font-size-tag color-base-text",on:{click:function(a){arguments[0]=a=t.$handleEvent(a),t.$util.redirectTo("/pages/apply/shopset")}}},[t._v("申请续签")]):e("v-uni-text",{staticClass:"margin-left font-size-tag color-base-text",on:{click:function(a){arguments[0]=a=t.$handleEvent(a),t.$util.redirectTo("/pages/apply/payinfo")}}},[t._v("申请续签")])]:t._e(),e("v-uni-text",{staticClass:"margin-left font-size-tag color-base-text",on:{click:function(a){arguments[0]=a=t.$handleEvent(a),t.$util.redirectTo("/pages/property/reopen/list")}}},[t._v("续签记录")])],2),e("v-uni-view",{staticClass:"num"},[t._v(t._s(t.base_info.expire_time))])],1)],1)],1)],1),e("v-uni-view",{staticClass:"withdrawal_item"},[t.dashboard_list.length>0?t._l(t.dashboard_list,(function(a,i){return e("v-uni-view",{key:i,staticClass:"withdrawal_content margin-top"},[e("v-uni-view",{staticClass:"withdrawal_list"},[e("v-uni-view",{staticClass:"withdrawal_list_title"},[e("v-uni-view",{staticClass:"tip color-tip"},[t._v(t._s(a.account_no))])],1),e("v-uni-view",{staticClass:"withdrawal_list_info"},[e("v-uni-view",{staticClass:"withdrawal_list_base"},[e("v-uni-view",{staticClass:"tip"},[t._v("缴费金额（元）")]),e("v-uni-view",[t._v(t._s(a.money))])],1),e("v-uni-view",{staticClass:"withdrawal_list_base"},[e("v-uni-view",{staticClass:"tip"},[t._v("费用类型")]),e("v-uni-view",[t._v(t._s(a.type_name))])],1),e("v-uni-view",{staticClass:"withdrawal_list_base"},[e("v-uni-view",{staticClass:"tip"},[t._v("创建时间")]),e("v-uni-view",[t._v(t._s(t.$util.timeStampTurnTime(a.create_time)))])],1)],1)],1)],1)})):e("ns-empty",{attrs:{text:"暂无入驻费用数据"}})],2)],1)],2),e("loading-cover",{ref:"loadingCover"})],1)},n=[]},bdb2:function(t,a,e){"use strict";e.r(a);var i=e("2f8a"),l=e.n(i);for(var n in i)"default"!==n&&function(t){e.d(a,t,(function(){return i[t]}))}(n);a["default"]=l.a},c44a:function(t,a,e){"use strict";e.r(a);var i=e("bb49"),l=e("bdb2");for(var n in l)"default"!==n&&function(t){e.d(a,t,(function(){return l[t]}))}(n);e("9cf3");var r,d=e("f0c5"),s=Object(d["a"])(l["default"],i["b"],i["c"],!1,null,"fc0ed30a",null,!1,i["a"],r);a["default"]=s.exports},dfc4:function(t,a,e){var i=e("3d0f");"string"===typeof i&&(i=[[t.i,i,""]]),i.locals&&(t.exports=i.locals);var l=e("4f06").default;l("51742383",i,!0,{sourceMap:!1,shadowMode:!1})}}]);