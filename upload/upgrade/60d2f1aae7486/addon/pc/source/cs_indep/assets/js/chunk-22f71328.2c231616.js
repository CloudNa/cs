(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-22f71328"],{"35ed":function(e,t,n){},"4c23":function(e,t,n){"use strict";n("35ed")},c984:function(e,t,n){"use strict";n.r(t);var r=function(){var e=this,t=e.$createElement,n=e._self._c||t;return n("div",{staticClass:"box"},[n("div",{directives:[{name:"show",rawName:"v-show",value:e.yes,expression:"yes"}],staticClass:"null-page"}),n("el-card",{staticClass:"box-card order-list"},[n("div",{staticClass:"clearfix",attrs:{slot:"header"},slot:"header"},[n("span",[e._v("退款/售后")])]),n("div",{directives:[{name:"loading",rawName:"v-loading",value:e.loading,expression:"loading"}]},[n("nav",[n("li",[e._v("商品信息")]),n("li",[e._v("退款金额")]),n("li",[e._v("退款类型")]),n("li",[e._v("退款状态")]),n("li",[e._v("操作")])]),e.refundList.length>0?n("div",{staticClass:"list"},e._l(e.refundList,(function(t,r){return n("div",{key:r,staticClass:"item"},[n("div",{staticClass:"head"},[n("span",{staticClass:"create-time"},[e._v(e._s(e.$util.timeStampTurnTime(t.refund_action_time)))]),n("span",{staticClass:"order-no"},[e._v("退款编号："+e._s(t.refund_no))]),n("router-link",{attrs:{to:"/shop-"+t.site_id,target:"_blank"}},[e._v(e._s(t.site_name))]),n("span",{staticClass:"order-type"},[e._v(e._s(3==t.refund_status?"退款成功":"退款中"))])],1),n("ul",[n("li",[n("div",{staticClass:"img-wrap",on:{click:function(n){return e.$router.pushToTab("/sku-"+t.sku_id)}}},[n("img",{attrs:{src:e.$img(t.sku_image,{size:"mid"})},on:{error:function(t){return e.imageError(r)}}})]),n("div",{staticClass:"info-wrap"},[n("h5",{on:{click:function(n){return e.$router.pushToTab("/sku-"+t.sku_id)}}},[e._v(e._s(t.sku_name))])])]),n("li",[n("span",[e._v("￥"+e._s(t.refund_apply_money))])]),n("li",[n("span",[e._v(e._s(1==t.refund_type?"退款":"退货"))])]),n("li",[n("span",{staticClass:"ns-text-color"},[e._v(e._s(t.refund_status_name))]),n("el-link",{attrs:{underline:!1},on:{click:function(n){return e.orderDetail(t)}}},[e._v("退款详情")])],1),n("li",[t.refund_action.length>0?e._l(t.refund_action,(function(r,a){return n("el-button",{key:a,attrs:{type:"primary",size:"mini",plain:!0},on:{click:function(n){return e.operation(r.event,t)}}},[e._v(" "+e._s(r.title)+" ")])})):e._e()],2)])])})),0):e.loading||0!=e.refundList.length?e._e():n("div",{staticClass:"empty-wrap"},[e._v("暂无相关订单")])]),n("div",{staticClass:"pager"},[n("el-pagination",{attrs:{background:"","pager-count":5,total:e.total,"prev-text":"上一页","next-text":"下一页","current-page":e.currentPage,"page-size":e.pageSize,"hide-on-single-page":""},on:{"update:currentPage":function(t){e.currentPage=t},"update:current-page":function(t){e.currentPage=t},"update:pageSize":function(t){e.pageSize=t},"update:page-size":function(t){e.pageSize=t},"size-change":e.handlePageSizeChange,"current-change":e.handleCurrentPageChange}})],1)])],1)},a=[],i=n("5530"),s=(n("b0c0"),n("2f62")),o=n("e585"),u={name:"activist",components:{},data:function(){return{orderStatus:"all",loading:!0,refundList:[],currentPage:1,pageSize:10,total:0,yes:!0}},created:function(){this.orderStatus=this.$route.query.status||"all",this.getrefundList()},computed:Object(i["a"])({},Object(s["b"])(["defaultGoodsImage"])),mounted:function(){var e=this;setTimeout((function(){e.yes=!1}),300)},methods:{handleClick:function(e,t){this.currentPage=1,this.orderStatus=e.name,this.refresh()},getrefundList:function(){var e=this;Object(o["i"])({page:this.currentPage,page_size:this.pageSize}).then((function(t){var n=[];0==t.code&&t.data&&(n=t.data.list,e.total=t.data.count),e.refundList=n,e.loading=!1})).catch((function(t){e.loading=!1}))},handlePageSizeChange:function(e){this.pageSize=e,this.refresh()},handleCurrentPageChange:function(e){this.currentPage=e,this.refresh()},refresh:function(){this.loading=!0,this.getrefundList()},operation:function(e,t){switch(e){case"orderRefundCancel":this.cancleRefund(t.order_goods_id);break;case"orderRefundDelivery":this.$router.push({path:"/member/refund_detail",query:{order_goods_id:t.order_goods_id,action:"returngoods"}});break;case"orderRefundAsk":this.$router.push({path:"/member/refund?order_goods_id="+t.order_goods_id});break}},orderDetail:function(e){this.$router.push({path:"/member/refund_detail",query:{order_goods_id:e.order_goods_id}})},imageError:function(e){this.refundList[e].sku_image=this.defaultGoodsImage},cancleRefund:function(e){var t=this;this.$confirm("撤销之后本次申请将会关闭,如后续仍有问题可再次发起申请","提示",{confirmButtonText:"确认撤销",cancelButtonText:"暂不撤销",type:"warning"}).then((function(){t.isSub||(t.isSub=!0,Object(o["a"])({order_goods_id:e}).then((function(e){var n=e.code,r=e.message;e.data;n>=0?(t.$message({message:"撤销成功",type:"success"}),t.getrefundList()):t.$message({message:r,type:"warning"})})).catch((function(e){t.$message.error(e.message)})))})).catch((function(){}))}}},c=u,d=(n("4c23"),n("2877")),l=Object(d["a"])(c,r,a,!1,null,"26b6ff2f",null);t["default"]=l.exports},e585:function(e,t,n){"use strict";n.d(t,"h",(function(){return a})),n.d(t,"g",(function(){return i})),n.d(t,"f",(function(){return s})),n.d(t,"e",(function(){return o})),n.d(t,"a",(function(){return u})),n.d(t,"d",(function(){return c})),n.d(t,"b",(function(){return d})),n.d(t,"c",(function(){return l})),n.d(t,"i",(function(){return f}));var r=n("751a");function a(e){return Object(r["a"])({url:"/api/orderrefund/refundData",data:e,forceLogin:!0})}function i(e){return Object(r["a"])({url:"/api/orderrefund/refund",data:e,forceLogin:!0})}function s(e){return Object(r["a"])({url:"/api/orderrefund/detail",data:e,forceLogin:!0})}function o(e){return Object(r["a"])({url:"/api/orderrefund/delivery",data:e,forceLogin:!0})}function u(e){return Object(r["a"])({url:"/api/orderrefund/cancel",data:e,forceLogin:!0})}function c(e){return Object(r["a"])({url:"/api/ordercomplain/detail",data:e,forceLogin:!0})}function d(e){return Object(r["a"])({url:"/api/ordercomplain/complain",data:e,forceLogin:!0})}function l(e){return Object(r["a"])({url:"/api/ordercomplain/cancel",data:e,forceLogin:!0})}function f(e){return Object(r["a"])({url:"/api/orderrefund/lists",data:e,forceLogin:!0})}}}]);
//# sourceMappingURL=chunk-22f71328.2c231616.js.map