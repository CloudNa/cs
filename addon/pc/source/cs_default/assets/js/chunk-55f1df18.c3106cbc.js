(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-55f1df18"],{"4a5c":function(t,a,e){"use strict";var i=e("75f1"),s=e.n(i);s.a},"75f1":function(t,a,e){},a1c2:function(t,a,e){"use strict";e.r(a);var i=function(){var t=this,a=t.$createElement,e=t._self._c||a;return e("div",{staticClass:"detail-wrap"},[e("el-breadcrumb",{staticClass:"path",attrs:{separator:"/"}},[e("el-breadcrumb-item",{staticClass:"path-home",attrs:{to:{path:"/"}}},[e("i",{staticClass:"n el-icon-s-home"}),t._v(" 首页 ")]),e("el-breadcrumb-item",{attrs:{to:{path:"/cms/help"}}},[t._v("帮助列表")]),e("el-breadcrumb-item",{staticClass:"path-help"},[t._v("帮助详情")])],1),e("div",{directives:[{name:"loading",rawName:"v-loading",value:t.loading,expression:"loading"}],staticClass:"help-detail"},[e("div",{staticClass:"title"},[t._v(t._s(t.detail.title))]),e("div",{staticClass:"info"},[e("div",{staticClass:"time"},[t._v(t._s(t.$util.timeStampTurnTime(t.detail.create_time)))])]),e("div",{staticClass:"content",domProps:{innerHTML:t._s(t.detail.content)}})])],1)},s=[],c=(e("ac1f"),e("5319"),e("5c6b")),n={name:"help_detail",components:{},data:function(){return{detail:[],loading:!0}},created:function(){this.id=this.$route.path.replace("/cms/help-",""),this.getDetail()},watch:{$route:function(t){this.id=t.params.pathMatch,this.getDetail()}},methods:{getDetail:function(){var t=this;Object(c["a"])({id:this.id}).then((function(a){0==a.code&&(a.data?(t.loading=!1,t.detail=a.data):t.$router.push({path:"/cms/help"}))})).catch((function(a){t.loading=!1,t.$message.error(a.message)}))}}},l=n,r=(e("4a5c"),e("2877")),o=Object(r["a"])(l,i,s,!1,null,"528b7208",null);a["default"]=o.exports}}]);
//# sourceMappingURL=chunk-55f1df18.c3106cbc.js.map