(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["otherpages-notice-detail-detail"],{"64a3":function(e,t,i){"use strict";i.r(t);var n=i("f075"),r=i("6b77");for(var a in r)"default"!==a&&function(e){i.d(t,e,(function(){return r[e]}))}(a);i("b683");var o,c=i("f0c5"),s=Object(c["a"])(r["default"],n["b"],n["c"],!1,null,"c308d98e",null,!1,n["a"],o);t["default"]=s.exports},"6b77":function(e,t,i){"use strict";i.r(t);var n=i("c465"),r=i.n(n);for(var a in n)"default"!==a&&function(e){i.d(t,e,(function(){return n[e]}))}(a);t["default"]=r.a},"702c":function(e,t,i){var n=i("24fb");t=n(!1),t.push([e.i,'@charset "UTF-8";\r\n/**\r\n * 你可以通过修改这些变量来定制自己的插件主题，实现自定义主题功能\r\n * 建议使用scss预处理，并在插件代码中直接使用这些变量（无需 import 这个文件），方便用户通过搭积木的方式开发整体风格一致的App\r\n */.page[data-v-c308d98e]{width:100%;height:100%;padding:%?20?%;-webkit-box-sizing:border-box;box-sizing:border-box;background-color:#fff}.notice-title[data-v-c308d98e]{font-size:%?32?%;text-align:center}.notice-content[data-v-c308d98e]{margin-top:%?20?%;word-break:break-all;font-size:%?28?%}.notice-meta[data-v-c308d98e]{text-align:right;margin-top:%?20?%;color:#909399}.notice-meta .notice-time[data-v-c308d98e]{font-size:%?24?%}',""]),e.exports=t},9344:function(e,t,i){var n=i("702c");"string"===typeof n&&(n=[[e.i,n,""]]),n.locals&&(e.exports=n.locals);var r=i("4f06").default;r("60c175dd",n,!0,{sourceMap:!1,shadowMode:!1})},b683:function(e,t,i){"use strict";var n=i("9344"),r=i.n(n);r.a},c465:function(e,t,i){"use strict";var n=i("4ea4");Object.defineProperty(t,"__esModule",{value:!0}),t.default=void 0;var r=n(i("fc98")),a=n(i("7382")),o={data:function(){return{noticeId:0,content:"",detail:{}}},mixins:[a.default],onLoad:function(e){var t=this;e.notice_id?this.noticeId=e.notice_id:this.$util.redirectTo("/otherpages/notice/list/list",{},"redirectTo"),this.$api.sendRequest({url:"/api/notice/info",data:{id:this.noticeId},success:function(e){0==e.code?e.data?(t.detail=e.data,t.content=(0,r.default)(e.data.content),t.$refs.loadingCover&&t.$refs.loadingCover.hide()):t.$util.redirectTo("/otherpages/notice/list/list",{},"redirectTo"):(t.$util.showToast({title:e.message}),setTimeout((function(){t.$util.redirectTo("/otherpages/notice/list/list",{},"redirectTo")}),1e3))},fail:function(e){t.$util.redirectTo("/otherpages/notice/list/list",{},"redirectTo"),t.$refs.loadingCover&&t.$refs.loadingCover.hide()}})},onShow:function(){this.$langConfig.refresh()},onShareAppMessage:function(e){var t="[公告]"+this.detail.title,i="/otherpages/notice/detail/detail?notice_id="+this.noticeId;return{title:t,path:i,success:function(e){},fail:function(e){}}}};t.default=o},f075:function(e,t,i){"use strict";i.d(t,"b",(function(){return r})),i.d(t,"c",(function(){return a})),i.d(t,"a",(function(){return n}));var n={loadingCover:i("1d00").default},r=function(){var e=this,t=e.$createElement,i=e._self._c||t;return i("v-uni-view",{staticClass:"page",attrs:{"data-theme":e.themeStyle}},[i("v-uni-view",{staticClass:"notice-title"},[e._v(e._s(e.detail.title))]),i("v-uni-view",{staticClass:"notice-content"},[i("v-uni-rich-text",{attrs:{nodes:e.content}})],1),i("v-uni-view",{staticClass:"notice-meta"},[i("v-uni-text",{staticClass:"notice-time"},[e._v("发表时间: "+e._s(e.$util.timeStampTurnTime(e.detail.create_time)))])],1),i("loading-cover",{ref:"loadingCover"})],1)},a=[]},fc98:function(e,t,i){"use strict";var n=i("4ea4");i("c975"),i("13d5"),i("4d63"),i("ac1f"),i("25f0"),i("466d"),i("5319"),i("1276"),Object.defineProperty(t,"__esModule",{value:!0}),t.default=void 0;var r=n(i("82a1")),a=/^<([-A-Za-z0-9_]+)((?:\s+[a-zA-Z_:][-a-zA-Z0-9_:.]*(?:\s*=\s*(?:(?:"[^"]*")|(?:'[^']*')|[^>\s]+))?)*)\s*(\/?)>/,o=/^<\/([-A-Za-z0-9_]+)[^>]*>/,c=/([a-zA-Z_:][-a-zA-Z0-9_:.]*)(?:\s*=\s*(?:(?:"((?:\\.|[^"])*)")|(?:'((?:\\.|[^'])*)')|([^>\s]+)))?/g,s=g("area,base,basefont,br,col,frame,hr,img,input,link,meta,param,embed,command,keygen,source,track,wbr"),l=g("a,address,article,applet,aside,audio,blockquote,button,canvas,center,dd,del,dir,div,dl,dt,fieldset,figcaption,figure,footer,form,frameset,h1,h2,h3,h4,h5,h6,header,hgroup,hr,iframe,isindex,li,map,menu,noframes,noscript,object,ol,output,p,pre,section,script,table,tbody,td,tfoot,th,thead,tr,ul,video"),d=g("abbr,acronym,applet,b,basefont,bdo,big,br,button,cite,code,del,dfn,em,font,i,iframe,img,input,ins,kbd,label,map,object,q,s,samp,script,select,small,span,strike,strong,sub,sup,textarea,tt,u,var"),u=g("colgroup,dd,dt,li,options,p,td,tfoot,th,thead,tr"),f=g("checked,compact,declare,defer,disabled,ismap,multiple,nohref,noresize,noshade,nowrap,readonly,selected"),h=g("script,style");function p(e,t){var i,n,r,p=[],g=e;p.last=function(){return this[this.length-1]};while(e){if(n=!0,p.last()&&h[p.last()])e=e.replace(new RegExp("([\\s\\S]*?)</"+p.last()+"[^>]*>"),(function(e,i){return i=i.replace(/<!--([\s\S]*?)-->|<!\[CDATA\[([\s\S]*?)]]>/g,"$1$2"),t.chars&&t.chars(i),""})),b("",p.last());else if(0==e.indexOf("\x3c!--")?(i=e.indexOf("--\x3e"),i>=0&&(t.comment&&t.comment(e.substring(4,i)),e=e.substring(i+3),n=!1)):0==e.indexOf("</")?(r=e.match(o),r&&(e=e.substring(r[0].length),r[0].replace(o,b),n=!1)):0==e.indexOf("<")&&(r=e.match(a),r&&(e=e.substring(r[0].length),r[0].replace(a,m),n=!1)),n){i=e.indexOf("<");var v=i<0?e:e.substring(0,i);e=i<0?"":e.substring(i),t.chars&&t.chars(v)}if(e==g)throw"Parse Error: "+e;g=e}function m(e,i,n,r){if(i=i.toLowerCase(),l[i])while(p.last()&&d[p.last()])b("",p.last());if(u[i]&&p.last()==i&&b("",i),r=s[i]||!!r,r||p.push(i),t.start){var a=[];n.replace(c,(function(e,t){var i=arguments[2]?arguments[2]:arguments[3]?arguments[3]:arguments[4]?arguments[4]:f[t]?t:"";a.push({name:t,value:i,escaped:i.replace(/(^|[^\\])"/g,'$1\\"')})})),t.start&&t.start(i,a,r)}}function b(e,i){if(i){for(n=p.length-1;n>=0;n--)if(p[n]==i)break}else var n=0;if(n>=0){for(var r=p.length-1;r>=n;r--)t.end&&t.end(p[r]);p.length=n}}b()}function g(e){for(var t={},i=e.split(","),n=0;n<i.length;n++)t[i[n]]=!0;return t}function v(e){return e.replace(/<\?xml.*\?>\n/,"").replace(/<!doctype.*>\n/,"").replace(/<!DOCTYPE.*>\n/,"")}function m(e){e=e.replace(/<!--[\s\S]*-->/gi,"");return e}function b(e){e=e.replace(/\\/g,"").replace(/<img/g,'<img style="width:100% !important;display:block;"');return e=e.replace(/<img [^>]*src=['"]([^'"]+)[^>]*>/gi,(function(e,t){return'<img style="width:100% !important;display:block;" src="'+r.default.img(t)+'"/>'})),e}function x(e){e=e.replace(/style\s*=\s*["][^>]*;[^"]?/gi,(function(e,t){return e=e.replace(/[:](\s?)[\s\S]*/gi,(function(e,t){return e.replace(/"/g,"'")})),e}));return e}function w(e){return e.reduce((function(e,t){var i=t.value,n=t.name;return e[n]?e[n]=e[n]+" "+i:e[n]=i,e}),{})}function _(e){e=v(e),e=m(e),e=b(e),e=x(e);var t=[],i={node:"root",children:[]};return p(e,{start:function(e,n,r){var a={name:e};if(0!==n.length&&(a.attrs=w(n)),r){var o=t[0]||i;o.children||(o.children=[]),o.children.push(a)}else t.unshift(a)},end:function(e){var n=t.shift();if(n.name!==e&&console.error("invalid state: mismatch end tag"),0===t.length)i.children.push(n);else{var r=t[0];r.children||(r.children=[]),r.children.push(n)}},chars:function(e){var n={type:"text",text:e};if(0===t.length)i.children.push(n);else{var r=t[0];r.children||(r.children=[]),r.children.push(n)}},comment:function(e){var i={node:"comment",text:e},n=t[0];n.children||(n.children=[]),n.children.push(i)}}),i.children}var k=_;t.default=k}}]);