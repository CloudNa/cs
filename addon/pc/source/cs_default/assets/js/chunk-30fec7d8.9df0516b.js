(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-30fec7d8"],{"3f75":function(e,t,a){},"6f92":function(e,t,a){"use strict";a.r(t);var s=function(){var e=this,t=e.$createElement,a=e._self._c||t;return a("div",{staticClass:"box"},[a("div",{directives:[{name:"show",rawName:"v-show",value:e.yes,expression:"yes"}],staticClass:"null-page"}),a("el-card",{staticClass:"box-card logistics"},[a("div",{staticClass:"clearfix",attrs:{slot:"header"},slot:"header"},[a("el-breadcrumb",{attrs:{separator:"/"}},[a("el-breadcrumb-item",{attrs:{to:{path:"/member/order_list"}}},[e._v("订单列表")]),a("el-breadcrumb-item",[e._v("物流详情")])],1)],1),a("div",{directives:[{name:"loading",rawName:"v-loading",value:e.loading,expression:"loading"}]},[a("el-tabs",{model:{value:e.activeParcel,callback:function(t){e.activeParcel=t},expression:"activeParcel"}},e._l(e.packageList,(function(t,s){return a("el-tab-pane",{key:s,attrs:{label:t.package_name,name:"parcel_"+s}},[t.trace.success&&t.trace.list.length>0?a("div",{staticClass:"trace"},[a("el-timeline",e._l(t.trace.list,(function(t,s){return a("el-timeline-item",{key:s,attrs:{timestamp:t.datetime,placement:"top",type:0==s?"primary":""}},[a("p",[e._v(e._s(t.remark))])])})),1)],1):a("div",{staticClass:"trace"},[a("p",{staticClass:"empty-wrap"},[e._v(e._s(t.trace.reason))])]),a("ul",{staticClass:"info-wrap"},[a("li",[a("label",[e._v("运单号码：")]),a("span",[e._v(e._s(t.delivery_no))])]),a("li",[a("label",[e._v("物流公司：")]),a("span",[e._v(e._s(t.express_company_name))])])]),a("ul",{staticClass:"goods-wrap"},e._l(t.goods_list,(function(t,r){return a("li",{key:r,on:{click:function(a){return e.$router.pushToTab("/sku-"+t.sku_id)}}},[a("div",{staticClass:"img-wrap"},[a("img",{attrs:{src:e.$img(t.sku_image,{size:"mid"})},on:{error:function(t){return e.imageError(s,r)}}})]),a("p",{staticClass:"sku-name"},[e._v(e._s(t.sku_name)+" x "+e._s(t.num))])])})),0)])})),1)],1)])],1)},r=[],i=a("5530"),n=(a("159b"),a("dea0")),c=a("2f62"),o={name:"logistics",components:{},data:function(){return{orderId:0,loading:!0,activeParcel:"parcel_0",packageList:[],yes:!0}},created:function(){this.orderId=this.$route.query.order_id,this.orderId||this.$router.push({path:"/member/order_list"}),this.getOrderPackageInfo()},computed:Object(i["a"])({},Object(c["b"])(["defaultGoodsImage"])),mounted:function(){var e=this;setTimeout((function(){e.yes=!1}),300)},methods:{getOrderPackageInfo:function(){var e=this;Object(n["d"])({order_id:this.orderId}).then((function(t){t.code>=0?(e.packageList=t.data,e.packageList.forEach((function(e){e.trace.list&&(e.trace.list=e.trace.list.reverse())})),e.loading=!1):e.$message({message:"未获取到订单包裹信息！",type:"warning",duration:2e3,onClose:function(){e.$router.push({path:"/member/order_list"})}})})).catch((function(t){e.loading=!1}))},imageError:function(e,t){this.packageList[e].goods_list[t].sku_image=this.defaultGoodsImage}}},l=o,d=(a("9b5e"),a("2877")),u=Object(d["a"])(l,s,r,!1,null,"f9e45644",null);t["default"]=u.exports},"9b5e":function(e,t,a){"use strict";a("3f75")}}]);
//# sourceMappingURL=chunk-30fec7d8.9df0516b.js.map