(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["otherpages-help-list-list"],{"640e":function(t,e,i){"use strict";i.d(e,"b",(function(){return a})),i.d(e,"c",(function(){return o})),i.d(e,"a",(function(){return n}));var n={nsEmpty:i("77de").default,loadingCover:i("1d00").default},a=function(){var t=this,e=t.$createElement,i=t._self._c||e;return i("v-uni-view",{staticClass:"help",attrs:{"data-theme":t.themeStyle}},[t.dataList.length?t._l(t.dataList,(function(e,n){return i("v-uni-view",{key:n,staticClass:"help-item"},[i("v-uni-view",{staticClass:"item-title"},[t._v(t._s(e.class_name))]),t._l(e.child_list,(function(e,n){return i("v-uni-view",{key:n,staticClass:"item-content",on:{click:function(i){arguments[0]=i=t.$handleEvent(i),t.helpDetail(e)}}},[t._v(t._s(e.title))])}))],2)})):[i("ns-empty",{attrs:{text:"暂无帮助信息",isIndex:!1}})],i("loading-cover",{ref:"loadingCover"})],2)},o=[]},"6f1e":function(t,e,i){"use strict";var n=i("b37a"),a=i.n(n);a.a},"7c9f":function(t,e,i){"use strict";i.r(e);var n=i("d474"),a=i.n(n);for(var o in n)"default"!==o&&function(t){i.d(e,t,(function(){return n[t]}))}(o);e["default"]=a.a},a705:function(t,e,i){var n=i("24fb");e=n(!1),e.push([t.i,'@charset "UTF-8";\r\n/**\r\n * 你可以通过修改这些变量来定制自己的插件主题，实现自定义主题功能\r\n * 建议使用scss预处理，并在插件代码中直接使用这些变量（无需 import 这个文件），方便用户通过搭积木的方式开发整体风格一致的App\r\n */.help[data-v-1c8e25f1]{height:100%;-webkit-box-sizing:border-box;box-sizing:border-box;padding-top:%?20?%}.help .help-item[data-v-1c8e25f1]{width:calc(100% - %?60?%);margin:0 auto;padding:%?32?% %?35?%;-webkit-box-sizing:border-box;box-sizing:border-box;background-color:#fff;margin-bottom:%?18?%;-webkit-border-radius:%?10?%;border-radius:%?10?%}.help .help-item .item-title[data-v-1c8e25f1]{padding-bottom:%?15?%;font-size:%?30?%;color:#000;border-bottom:1px solid #f1f1f1}.help .help-item .item-content[data-v-1c8e25f1]{padding:%?24?% 0;border-bottom:1px solid #f1f1f1;font-size:%?28?%;color:#606266}.help .help-item .item-content[data-v-1c8e25f1]:last-child{border-bottom:none;padding-bottom:0}',""]),t.exports=e},b37a:function(t,e,i){var n=i("a705");"string"===typeof n&&(n=[[t.i,n,""]]),n.locals&&(t.exports=n.locals);var a=i("4f06").default;a("14672d4c",n,!0,{sourceMap:!1,shadowMode:!1})},cba6:function(t,e,i){"use strict";i.r(e);var n=i("640e"),a=i("7c9f");for(var o in a)"default"!==o&&function(t){i.d(e,t,(function(){return a[t]}))}(o);i("6f1e");var r,s=i("f0c5"),d=Object(s["a"])(a["default"],n["b"],n["c"],!1,null,"1c8e25f1",null,!1,n["a"],r);e["default"]=d.exports},d474:function(t,e,i){"use strict";var n=i("4ea4");Object.defineProperty(e,"__esModule",{value:!0}),e.default=void 0;var a=n(i("7382")),o={data:function(){return{dataList:[]}},onLoad:function(){this.getData()},mixins:[a.default],onShow:function(){this.$langConfig.refresh()},methods:{getData:function(){var t=this;this.$api.sendRequest({url:"/api/helpclass/lists",data:{app_module:"shop"},success:function(e){0==e.code&&e.data?t.dataList=e.data:t.$util.showToast({title:e.message}),t.$refs.loadingCover&&t.$refs.loadingCover.hide()},fail:function(e){t.$refs.loadingCover&&t.$refs.loadingCover.hide()}})},helpDetail:function(t){t.link_address?this.$util.redirectTo("/otherpages/webview/webview",{link:encodeURIComponent(t.link_address)}):this.$util.redirectTo("/otherpages/help/detail/detail",{id:t.id})}},onShareAppMessage:function(t){var e="帮助中心使你更加方便",i="/otherpages/help/list/list";return{title:e,path:i,success:function(t){},fail:function(t){}}}};e.default=o}}]);