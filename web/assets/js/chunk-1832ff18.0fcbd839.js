(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-1832ff18"],{"8f8b":function(t,i,e){"use strict";e.d(i,"d",(function(){return s})),e.d(i,"a",(function(){return n})),e.d(i,"c",(function(){return o})),e.d(i,"b",(function(){return c}));var a=e("751a");function s(t){return Object(a["a"])({url:"/bundling/api/ordercreate/payment",data:t,forceLogin:!0})}function n(t){return Object(a["a"])({url:"/bundling/api/ordercreate/calculate",data:t,forceLogin:!0})}function o(t){return Object(a["a"])({url:"/bundling/api/ordercreate/create",data:t,forceLogin:!0})}function c(t){return Object(a["a"])({url:"/bundling/api/bundling/detail",data:t})}},"959e":function(t,i,e){"use strict";e.r(i);var a=function(){var t=this,i=t.$createElement,e=t._self._c||i;return e("div",{directives:[{name:"loading",rawName:"v-loading",value:t.loading,expression:"loading"}],staticClass:"combo-detail"},[t._m(0),t._l(t.goodsList.bundling_goods,(function(i,a){return e("div",{key:i.sku_item,staticClass:"item-wrap"},[e("div",{staticClass:"item"},[e("div",{staticClass:"info"},[e("div",{staticClass:"img-wrap",on:{click:function(e){return t.$router.pushToTab({path:"/sku-"+i.sku_id})}}},[e("img",{attrs:{src:t.$img(i.sku_image,{size:"mid"})},on:{error:function(i){return t.imageError(a)}}})]),e("div",{staticClass:"name"},[t._v(" "+t._s(i.sku_name)+" "),t.num>i.stock?e("p",[t._v("库存不足，剩余："+t._s(i.stock)+"件")]):t._e()])]),e("div",{staticClass:"price-wrap"},[e("div",{staticClass:"price"},[t._v(t._s(i.price))]),e("div",{staticClass:"num"},[t._v("x1")])])])])})),e("div",{staticClass:"combo-bottom"},[e("div",{staticClass:"num"},[e("p",[t._v("购买数量:")]),e("el-input",{attrs:{type:"number"},on:{change:function(i){return t.changeNum(!1)}},model:{value:t.num,callback:function(i){t.num=i},expression:"num"}})],1),e("div",{staticClass:"bottom-right"},[e("div",{staticClass:"price"},[e("div",{staticClass:"save-price"},[t._v("为您节省:￥"+t._s(t.saveThePrice))]),e("div",{staticClass:"old-price"},[t._v(" 套餐价: "),e("p",[t._v("￥"+t._s(t.packagePrice))])])]),e("el-button",{attrs:{type:"primary",disabled:!!t.isDisabled},on:{click:t.comboBuy}},[t._v("立即购买")])],1)])],2)},s=[function(){var t=this,i=t.$createElement,e=t._self._c||i;return e("div",{staticClass:"combo-title"},[e("div",{staticClass:"title-goods"},[t._v("商品信息")]),e("div",{staticClass:"title-orther"},[e("div",{staticClass:"title-price"},[t._v("价格")]),e("div",{staticClass:"title-num"},[t._v("数量")])])])}],n=(e("b680"),e("ac1f"),e("5319"),e("5530")),o=e("8f8b"),c=e("2f62"),r={name:"combo",components:{},data:function(){return{id:0,goodsList:[],num:1,packagePrice:0,saveThePrice:0,isDisabled:!1,loading:!0}},created:function(){this.id=this.$route.path.replace("/promotion/combo-",""),this.getDetail()},computed:Object(n["a"])({},Object(c["b"])(["defaultGoodsImage"])),watch:{$route:function(t){this.id=t.params.pathMatch,this.getDetail()}},methods:{getDetail:function(){var t=this;Object(o["b"])({bl_id:this.id}).then((function(i){i.data&&(t.goodsList=i.data,t.changeNum()),t.loading=!1})).catch((function(i){t.loading=!1,t.$message.error(i.message)}))},changeNum:function(t,i){var e=this;setTimeout((function(){var t=0;0==e.num.length&&(e.num=1),(e.num<=0||isNaN(e.num))&&(e.num=1),e.num=parseInt(e.num);for(var a=0,s=0;s<e.goodsList.bundling_goods.length;s++)a+=parseFloat(e.goodsList.bundling_goods[s].price),e.goodsList.bundling_goods[s].stock<e.num&&t++;e.isDisabled=t>0,e.saveThePrice=((a-e.goodsList.bl_price)*e.num).toFixed(2),e.packagePrice=(e.goodsList.bl_price*e.num).toFixed(2),i&&i()}),0)},comboBuy:function(){if(!this.isDisabled){var t={bl_id:this.id,num:this.num};this.$store.dispatch("order/setComboOrderCreateData",t),this.$router.push({path:"/promotion/combo_payment"})}},imageError:function(t){this.goodsList.bundling_goods[t].sku_image=this.defaultGoodsImage}}},u=r,d=(e("9f6b"),e("2877")),l=Object(d["a"])(u,a,s,!1,null,"dd839044",null);i["default"]=l.exports},"9f6b":function(t,i,e){"use strict";var a=e("e2fd"),s=e.n(a);s.a},e2fd:function(t,i,e){}}]);
//# sourceMappingURL=chunk-1832ff18.0fcbd839.js.map