(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-0add63d5"],{"255f":function(t,i,e){"use strict";e.r(i);var s=function(){var t=this,i=t.$createElement,e=t._self._c||i;return e("div",{staticClass:"help-other"},[e("div",{staticClass:"item-info"},t._l(t.helpList.list,(function(i,s){return e("div",{key:s,staticClass:"item",on:{click:function(e){return t.detail(i.id)}}},[e("div",{staticClass:"item-title"},[t._v(t._s(i.title))]),e("div",{staticClass:"info"},[e("div",{staticClass:"time"},[t._v(t._s(t.$util.timeStampTurnTime(i.create_time)))])])])})),0)])},n=[],a=(e("ac1f"),e("5319"),e("5c6b")),c={name:"list_other",components:{},data:function(){return{helpList:[],id:null}},created:function(){this.id=this.$route.path.replace("/cms/help/listother-",""),this.getInfo()},watch:{$route:function(t){this.id=t.params.pathMatch,this.getInfo()}},methods:{detail:function(t){this.$router.push({path:"/cms/help-"+t})},getInfo:function(){var t=this;Object(a["c"])({class_id:this.id}).then((function(i){0==i.code&&i.data?t.helpList=i.data:t.$router.push({path:"/cms/help"})})).catch((function(i){t.$message.error(i.message)}))}}},o=c,l=(e("313f"),e("2877")),r=Object(l["a"])(o,s,n,!1,null,"15578e44",null);i["default"]=r.exports},"2ddc":function(t,i,e){},"313f":function(t,i,e){"use strict";var s=e("2ddc"),n=e.n(s);n.a}}]);
//# sourceMappingURL=chunk-0add63d5.2fae7e05.js.map