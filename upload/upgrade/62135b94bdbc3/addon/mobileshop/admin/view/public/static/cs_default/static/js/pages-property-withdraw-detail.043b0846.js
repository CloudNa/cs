(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["pages-property-withdraw-detail"],{"27d9":function(i,t,s){"use strict";s.d(t,"b",(function(){return e})),s.d(t,"c",(function(){return n})),s.d(t,"a",(function(){return a}));var a={loadingCover:s("36db").default},e=function(){var i=this,t=i.$createElement,s=i._self._c||t;return s("v-uni-view",{staticClass:"withdrawal iphone-safe-area"},[s("v-uni-view",{staticClass:"dl"},[s("v-uni-view",{staticClass:"dt"},[i._v("店铺名称")]),s("v-uni-view",{staticClass:"dd"},[i._v(i._s(i.base_info.site_name))])],1),s("v-uni-view",{staticClass:"dl"},[s("v-uni-view",{staticClass:"dt"},[i._v("联系人")]),s("v-uni-view",{staticClass:"dd"},[i._v(i._s(i.base_info.name))])],1),s("v-uni-view",{staticClass:"dl"},[s("v-uni-view",{staticClass:"dt"},[i._v("联系电话")]),s("v-uni-view",{staticClass:"dd"},[i._v(i._s(i.base_info.mobile))])],1),s("v-uni-view",{staticClass:"dl"},[s("v-uni-view",{staticClass:"dt"},[i._v("账户类型")]),s("v-uni-view",{staticClass:"dd"},[1==i.base_info.bank_type?[i._v("银行")]:3==i.base_info.bank_type?[i._v("微信")]:[i._v("支付宝")]],2)],1),1==i.base_info.bank_type?[s("v-uni-view",{staticClass:"dl"},[s("v-uni-view",{staticClass:"dt"},[i._v("账户名称")]),s("v-uni-view",{staticClass:"dd"},[i._v(i._s(i.base_info.settlement_bank_name))])],1),s("v-uni-view",{staticClass:"dl"},[s("v-uni-view",{staticClass:"dt"},[i._v("提现账号")]),s("v-uni-view",{staticClass:"dd"},[i._v(i._s(i.base_info.settlement_bank_account_number))])],1),s("v-uni-view",{staticClass:"dl"},[s("v-uni-view",{staticClass:"dt"},[i._v("开户名")]),s("v-uni-view",{staticClass:"dd"},[i._v(i._s(i.base_info.settlement_bank_account_name))])],1)]:i._e(),3==i.base_info.bank_type?[s("v-uni-view",{staticClass:"dl"},[s("v-uni-view",{staticClass:"dt"},[i._v("微信昵称")]),s("v-uni-view",{staticClass:"dd"},[i._v(i._s(i.base_info.settlement_bank_address))])],1),s("v-uni-view",{staticClass:"dl"},[s("v-uni-view",{staticClass:"dt"},[i._v("微信号")]),s("v-uni-view",{staticClass:"dd"},[i._v(i._s(i.base_info.settlement_bank_name))])],1)]:[s("v-uni-view",{staticClass:"dl"},[s("v-uni-view",{staticClass:"dt"},[i._v("支付宝用户名")]),s("v-uni-view",{staticClass:"dd"},[i._v(i._s(i.base_info.settlement_bank_account_name))])],1),s("v-uni-view",{staticClass:"dl"},[s("v-uni-view",{staticClass:"dt"},[i._v("支付宝账号")]),s("v-uni-view",{staticClass:"dd"},[i._v(i._s(i.base_info.settlement_bank_account_number))])],1)],s("v-uni-view",{staticClass:"dl"},[s("v-uni-view",{staticClass:"dt"},[i._v("提现金额")]),s("v-uni-view",{staticClass:"dd"},[i._v(i._s(i.base_info.money)+"元")])],1),s("v-uni-view",{staticClass:"dl"},[s("v-uni-view",{staticClass:"dt"},[i._v("状态")]),s("v-uni-view",{staticClass:"dd"},[0==i.base_info.status?[i._v("待审核")]:1==i.base_info.status?[i._v("待转账")]:2==i.base_info.status?[i._v("已转账")]:-1==i.base_info.status?[i._v("已拒绝")]:i._e()],2)],1),s("v-uni-view",{staticClass:"dl"},[s("v-uni-view",{staticClass:"dt"},[i._v("申请时间")]),s("v-uni-view",{staticClass:"dd"},[i._v(i._s(i.$util.timeStampTurnTime(i.base_info.apply_time)))])],1),2==i.base_info.status?[s("v-uni-view",{staticClass:"dl"},[s("v-uni-view",{staticClass:"dt"},[i._v("转账时间")]),s("v-uni-view",{staticClass:"dd"},[i._v(i._s(i.$util.timeStampTurnTime(i.base_info.payment_time)))])],1),s("v-uni-view",{staticClass:"dl"},[s("v-uni-view",{staticClass:"dt"},[i._v("转账凭证")]),s("v-uni-view",{staticClass:"dd"},[s("v-uni-image",{staticClass:"img",attrs:{src:i.$util.img(i.base_info.paying_money_certificate)},on:{click:function(t){arguments[0]=t=i.$handleEvent(t),i.previewMedia()}}})],1)],1),s("v-uni-view",{staticClass:"dl"},[s("v-uni-view",{staticClass:"dt"},[i._v("转账凭证说明")]),s("v-uni-view",{staticClass:"dd"},[i._v(i._s(i.base_info.paying_money_certificate_explain?i.base_info.paying_money_certificate_explain:"暂无"))])],1)]:i._e(),s("v-uni-view",{staticClass:"dl"},[s("v-uni-view",{staticClass:"dt"},[i._v("是否结算周期")]),s("v-uni-view",{staticClass:"dd"},[i._v(i._s(0==i.base_info.is_period?"否":"是"))])],1),s("v-uni-view",{staticClass:"dl"},[s("v-uni-view",{staticClass:"dt"},[i._v("结算周期名称")]),s("v-uni-view",{staticClass:"dd"},[i._v(i._s(i.base_info.period_name))])],1),s("v-uni-view",{staticClass:"dl"},[s("v-uni-view",{staticClass:"dt"},[i._v("备注")]),s("v-uni-view",{staticClass:"dd"},[i._v(i._s(i.base_info.memo))])],1),s("loading-cover",{ref:"loadingCover"})],2)},n=[]},"3edf":function(i,t,s){"use strict";s.r(t);var a=s("27d9"),e=s("63e7");for(var n in e)"default"!==n&&function(i){s.d(t,i,(function(){return e[i]}))}(n);s("4a96");var v,d=s("f0c5"),l=Object(d["a"])(e["default"],a["b"],a["c"],!1,null,"4272019c",null,!1,a["a"],v);t["default"]=l.exports},"4a96":function(i,t,s){"use strict";var a=s("cfe1d"),e=s.n(a);e.a},"63e7":function(i,t,s){"use strict";s.r(t);var a=s("8f48"),e=s.n(a);for(var n in a)"default"!==n&&function(i){s.d(t,i,(function(){return a[i]}))}(n);t["default"]=e.a},"8f48":function(i,t,s){"use strict";Object.defineProperty(t,"__esModule",{value:!0}),t.default=void 0;var a={data:function(){return{id:0,base_info:{}}},onLoad:function(i){i.id?(this.id=i.id,this.getBaseInfo()):this.$util.goBack("/pages/property/withdraw/list")},onShow:function(){this.$util.checkToken("/pages/property/withdraw/detail?id="+this.id)},methods:{getBaseInfo:function(){var i=this;this.$api.sendRequest({url:"/shopapi/shopwithdraw/detail",data:{id:this.id},success:function(t){t.code>=0?i.base_info=t.data:i.$util.showToast({title:t.message}),i.$refs.loadingCover&&i.$refs.loadingCover.hide()}})},previewMedia:function(){var i=[this.base_info.paying_money_certificate];uni.previewImage({current:0,urls:i})}}};t.default=a},cfe1d:function(i,t,s){var a=s("cff1");"string"===typeof a&&(a=[[i.i,a,""]]),a.locals&&(i.exports=a.locals);var e=s("4f06").default;e("c7eae550",a,!0,{sourceMap:!1,shadowMode:!1})},cff1:function(i,t,s){var a=s("24fb");t=a(!1),t.push([i.i,'@charset "UTF-8";\r\n/**\r\n * 你可以通过修改这些变量来定制自己的插件主题，实现自定义主题功能\r\n * 建议使用scss预处理，并在插件代码中直接使用这些变量（无需 import 这个文件），方便用户通过搭积木的方式开发整体风格一致的App\r\n */.uni-line-hide[data-v-4272019c]{overflow:hidden;text-overflow:ellipsis;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical}.uni-using-hide[data-v-4272019c]{overflow:hidden;width:100%;text-overflow:ellipsis;white-space:nowrap}.prevent-head-roll[data-v-4272019c]{position:fixed;left:0;right:0;z-index:998}.withdrawal[data-v-4272019c]{padding:%?20?% 0;border-radius:%?10?%;overflow:hidden;margin:0 %?30?%}.withdrawal .dl[data-v-4272019c]{display:-webkit-box;display:-webkit-flex;display:flex;-webkit-box-pack:justify;-webkit-justify-content:space-between;justify-content:space-between;padding:%?30?%;border-bottom:1px solid #eee;background-color:#fff}.withdrawal .dl[data-v-4272019c]:last-child{border-bottom:0!important}.withdrawal .dl .dt[data-v-4272019c]{min-width:%?200?%}.withdrawal .dl .dd[data-v-4272019c]{-webkit-box-flex:1;-webkit-flex:1;flex:1;text-align:right;word-break:break-all}.withdrawal .dl .dd .img[data-v-4272019c]{height:%?80?%;width:%?80?%}',""]),i.exports=t}}]);