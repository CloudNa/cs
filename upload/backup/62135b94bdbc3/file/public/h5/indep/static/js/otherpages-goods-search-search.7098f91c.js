(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["otherpages-goods-search-search"],{"35ad":function(t,i,e){"use strict";e.r(i);var s=e("99a3"),a=e("a5ea");for(var o in a)"default"!==o&&function(t){e.d(i,t,(function(){return a[t]}))}(o);e("a38a");var n,r=e("f0c5"),c=Object(r["a"])(a["default"],s["b"],s["c"],!1,null,"9617a526",null,!1,s["a"],n);i["default"]=c.exports},"99a3":function(t,i,e){"use strict";var s;e.d(i,"b",(function(){return a})),e.d(i,"c",(function(){return o})),e.d(i,"a",(function(){return s}));var a=function(){var t=this,i=t.$createElement,e=t._self._c||i;return e("v-uni-view",{attrs:{"data-theme":t.themeStyle}},[e("v-uni-view",{staticClass:"content"},[e("v-uni-view",{staticClass:"cate-search"},[e("v-uni-view",{staticClass:"search-box"},[e("v-uni-input",{staticClass:"uni-input",attrs:{maxlength:"50","confirm-type":"search",placeholder:t.placWords?t.placWords:t.$lang("inputPlaceholder")},on:{focus:function(i){arguments[0]=i=t.$handleEvent(i),t.inputFocus.apply(void 0,arguments)},confirm:function(i){arguments[0]=i=t.$handleEvent(i),t.search()}},model:{value:t.inputValue,callback:function(i){t.inputValue=i},expression:"inputValue"}}),e("v-uni-text",{staticClass:"iconfont iconsousuo1",on:{click:function(i){arguments[0]=i=t.$handleEvent(i),t.search()}}})],1)],1),e("v-uni-view",{staticClass:"search-content"},[t.historyList.length?e("v-uni-view",{staticClass:"history"},[e("v-uni-view",{staticClass:"history-box"},[e("v-uni-view",{staticClass:"history-top"},[e("v-uni-view",{staticClass:"title"},[t._v(t._s(t.$lang("history")))]),e("v-uni-view",{staticClass:"icon iconfont iconicon7",on:{click:function(i){arguments[0]=i=t.$handleEvent(i),t.deleteHistoryList.apply(void 0,arguments)}}})],1),e("v-uni-view",{staticClass:"history-bottom ",style:{maxHeight:t.isAllHistory?"168rpx":"100%"},attrs:{id:"history-list"}},[t._l(t.historyList,(function(i,s){return e("v-uni-view",{key:s,staticClass:"history-li",on:{click:function(e){arguments[0]=e=t.$handleEvent(e),t.otherSearch(i)}}},[e("v-uni-button",{attrs:{type:"primary"}},[t._v(t._s(i))])],1)})),t.isAllHistory?e("v-uni-view",{staticClass:"history-li history_more",on:{click:function(i){arguments[0]=i=t.$handleEvent(i),t.isAllHistory=!1}}},[e("v-uni-button",{attrs:{type:"primary"}},[e("v-uni-text",{staticClass:"iconfont iconiconangledown"})],1)],1):t._e()],2)],1)],1):t._e(),t.hotList.length?e("v-uni-view",{staticClass:"history"},[e("v-uni-view",{staticClass:"history-box"},[e("v-uni-view",{staticClass:"history-top"},[e("v-uni-view",{staticClass:"title"},[t._v(t._s(t.$lang("hot")))])],1),e("v-uni-view",{staticClass:"history-bottom"},t._l(t.hotList,(function(i,s){return e("v-uni-view",{key:s,staticClass:"history-li",on:{click:function(e){arguments[0]=e=t.$handleEvent(e),t.otherSearch(i)},longpress:function(e){arguments[0]=e=t.$handleEvent(e),t.deleteItem(i)}}},[e("v-uni-button",{attrs:{type:"primary"}},[t._v(t._s(i))])],1)})),1)],1)],1):t._e()],1)],1)],1)},o=[]},a309:function(t,i,e){var s=e("24fb");i=s(!1),i.push([t.i,'@charset "UTF-8";\r\n/**\r\n * 你可以通过修改这些变量来定制自己的插件主题，实现自定义主题功能\r\n * 建议使用scss预处理，并在插件代码中直接使用这些变量（无需 import 这个文件），方便用户通过搭积木的方式开发整体风格一致的App\r\n */[data-v-9617a526] .fixed{position:relative;top:0}[data-v-9617a526] .empty{margin-top:0!important}.cart-empty[data-v-9617a526]{padding-top:54px}.content[data-v-9617a526]{width:100vw;height:calc(100vh - env(safe-area-inset-bottom) - 0px);background:#fff}.cate-search[data-v-9617a526]{width:100%;height:%?100?%;background:#fff;padding:%?10?% %?30?%;box-sizing:border-box;padding-top:%?30?%}.cate-search uni-input[data-v-9617a526]{font-size:%?28?%;height:%?60?%;padding:%?15?% %?25?% %?15?% %?30?%;line-height:%?60?%;width:calc(100% - %?120?%)}.cate-search uni-text[data-v-9617a526]{font-size:%?32?%;color:#909399;width:%?120?%;text-align:center}.cate-search .search-box[data-v-9617a526]{width:100%;height:100%;background:#f8f8f8;display:-webkit-box;display:-webkit-flex;display:flex;-webkit-box-pack:center;-webkit-justify-content:center;justify-content:center;-webkit-box-align:center;-webkit-align-items:center;align-items:center;border-radius:%?40?%}.search-content[data-v-9617a526]{box-sizing:border-box;background:#fff}.history[data-v-9617a526]{width:100%;box-sizing:border-box}.history .history-box[data-v-9617a526]{width:100%;height:100%;background:#fff;padding:%?30?% %?30?% %?0?% %?30?%;box-sizing:border-box;overflow:hidden}.history .history-box .history-top[data-v-9617a526]{width:100%;height:%?60?%;display:-webkit-box;display:-webkit-flex;display:flex;-webkit-box-pack:justify;-webkit-justify-content:space-between;justify-content:space-between;-webkit-box-align:center;-webkit-align-items:center;align-items:center;font-size:%?32?%}.history .history-box .history-top .title[data-v-9617a526]{font-weight:500;font-size:%?32?%}.history .history-box .history-top .iconfont[data-v-9617a526]{color:#909399;font-size:%?28?%}.history .history-box .history-bottom[data-v-9617a526]{width:100%;padding-top:%?20?%;position:relative}.history .history-box .history-bottom .history-li[data-v-9617a526]{display:inline-block;margin-right:%?20?%;margin-bottom:%?15?%;max-width:100%}.history .history-box .history-bottom .history-li uni-button[type="primary"][data-v-9617a526]{line-height:%?66?%;background:#f8f8f8!important;height:%?66?%;color:#303133!important;margin:0 %?0?% %?4?% 0!important;padding:0 %?20?%;overflow:hidden;white-space:nowrap;text-overflow:ellipsis}.history .history-box .history-bottom .history-li.history_more[data-v-9617a526]{margin-right:0;position:absolute;bottom:0;right:0}.history .hidden-show[data-v-9617a526]{width:100%;height:%?70?%;text-align:center;line-height:%?70?%}.search-alike[data-v-9617a526]{width:100%;height:calc(100vh - %?100?%);padding:0 %?20?%;box-sizing:border-box}.search-alike .alike-box[data-v-9617a526]{width:100%;height:100%;background:#fff;border-radius:%?20?%;overflow:hidden}',""]),t.exports=i},a38a:function(t,i,e){"use strict";var s=e("e1f24"),a=e.n(s);a.a},a5ea:function(t,i,e){"use strict";e.r(i);var s=e("cee3"),a=e.n(s);for(var o in s)"default"!==o&&function(t){e.d(i,t,(function(){return s[t]}))}(o);i["default"]=a.a},cee3:function(t,i,e){"use strict";var s=e("4ea4");e("4de4"),e("26e9"),e("ac1f"),e("841c"),e("498a"),Object.defineProperty(i,"__esModule",{value:!0}),i.default=void 0;var a=s(e("715e")),o={data:function(){return{inputValue:"",historyList:[],searchList:[],showSearch:!0,alikeList:[],isIndex:!1,placWords:"",hotList:[],isAllHistory:!1,siteId:0}},onLoad:function(t){t.keyword&&(this.inputValue=t.keyword),t.siteId&&(this.siteId=t.siteId),!uni.getStorageSync("search")&&uni.setStorageSync("search",[])},onShow:function(){this.$langConfig.refresh(),this.findHistoryList(),this.defaultSearch(),this.findHotList(),this.$nextTick((function(){this.getHistoryHeight()}))},mixins:[a.default],methods:{findHistoryList:function(){this.historyList=uni.getStorageSync("search").reverse()},deleteHistoryList:function(){var t=this;uni.showModal({title:"提示",content:"确认删除全部历史记录？",success:function(i){i.confirm&&(uni.setStorageSync("search",[]),t.findHistoryList())}})},deleteItem:function(t){var i=this;uni.showModal({title:"提示",content:"确认删除该条历史记录？",success:function(e){if(e.confirm){var s=uni.getStorageSync("search"),a=s.filter((function(i){return i!=t}));uni.setStorageSync("search",a),i.findHistoryList()}}})},defaultSearch:function(){var t=this;this.$api.sendRequest({url:"/api/goods/defaultSearchWords",success:function(i){t.placWords=i.data.words}})},findHotList:function(){var t=this;this.$api.sendRequest({url:"/api/goods/hotSearchWords",success:function(i){t.hotList=i.data.search_keywords}})},inputFocus:function(t){this.showScroll=!1,""!=this.inputValue.trim()&&(this.dataList=[])},otherSearch:function(t){this.inputValue=t,this.search()},search:function(){var t=this.inputValue.trim()?this.inputValue.trim():this.placWords;if(""!=t.trim()){this.showScroll=!0;var i=uni.getStorageSync("search"),e=[];i.length?(e=i.filter((function(i){return i!=t.trim()})),e.push(t.trim())):e.push(t.trim()),uni.setStorageSync("search",e);var s="/pages/goods/list/list";this.siteId>0&&(s="/otherpages/shop/list/list"),this.$util.redirectTo(s,{site_id:this.siteId,keyword:t})}else if(""==this.placWords)this.$util.showToast({title:"搜索内容不能为空哦"});else{s="/pages/goods/list/list";this.siteId&&(s="/otherpages/shop/list/list"),this.$util.redirectTo(s,{site_id:this.siteId,keyword:t})}},getHistoryHeight:function(){var t=this,i=uni.createSelectorQuery().in(this);i.select("#history-list").boundingClientRect((function(i){i&&i.height>2*uni.upx2px(70)+2*uni.upx2px(35)&&(t.isAllHistory=!0)})).exec()}}};i.default=o},e1f24:function(t,i,e){var s=e("a309");"string"===typeof s&&(s=[[t.i,s,""]]),s.locals&&(t.exports=s.locals);var a=e("4f06").default;a("d63f5b7a",s,!0,{sourceMap:!1,shadowMode:!1})}}]);