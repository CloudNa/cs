(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["pages-login-login"],{"4cb7":function(e,t,i){"use strict";i.r(t);var r=i("7963"),a=i.n(r);for(var n in r)"default"!==n&&function(e){i.d(t,e,(function(){return r[e]}))}(n);t["default"]=a.a},"5c50":function(e,t,i){"use strict";var r=i("6ded"),a=i.n(r);a.a},"6ded":function(e,t,i){var r=i("adc9");"string"===typeof r&&(r=[[e.i,r,""]]),r.locals&&(e.exports=r.locals);var a=i("4f06").default;a("1799d275",r,!0,{sourceMap:!1,shadowMode:!1})},7963:function(e,t,i){"use strict";var r=i("4ea4");i("ac1f"),i("5319"),Object.defineProperty(t,"__esModule",{value:!0}),t.default=void 0;var a=r(i("ba52")),n={data:function(){return{loginList:{username:"",password:"",vcode:""},captchaConfig:1,captcha:{id:"",img:""},back:"",redirect:"redirectTo"}},onLoad:function(e){uni.getStorageSync("token")&&uni.removeStorageSync("token"),uni.getStorageSync("site_id")&&uni.removeStorageSync("site_id"),this.back=e.back||"",this.getCaptchaConfig()},methods:{toRegistered:function(){this.back?this.$util.redirectTo("/pages/apply/register",{back:this.back}):this.$util.redirectTo("/pages/apply/register")},getImg:function(){this.getCodeImg()},getCaptchaConfig:function(){var e=this;this.$api.sendRequest({url:"/shopapi/config/captchaConfig",data:{},success:function(t){t.code>=0&&t.data&&(e.captchaConfig=t.data.shop_login,1==e.captchaConfig?e.getCodeImg():e.$refs.loadingCover&&e.$refs.loadingCover.hide())}})},getCodeImg:function(){var e=this;this.$api.sendRequest({url:"/shopapi/captcha/captcha",data:{captcha_id:this.captcha.id},success:function(t){t.code>=0&&t.data&&(e.captcha=t.data,e.captcha.img=e.captcha.img.replace(/\r\n/g,"")),e.$refs.loadingCover&&e.$refs.loadingCover.hide()}})},login:function(){var e=this;this.vertify()&&this.$api.sendRequest({url:"/shopapi/login/login",data:{captcha_id:this.captcha.id,username:this.loginList.username,password:this.loginList.password,captcha_code:this.loginList.vcode},success:function(t){t.code>=0?(e.$util.showToast({title:"登录成功"}),uni.setStorageSync("token",t.data.token),uni.setStorageSync("site_id",t.data.site_id),t.data.site_id>0?""!=e.back?e.$util.redirectTo(decodeURIComponent(e.back),{},e.redirect):e.$util.redirectTo("/pages/index/index",{},e.redirect):e.getShopStatus()):(e.getImg(),e.$util.showToast({title:t.message}))}})},getShopStatus:function(){var e=this;this.$api.sendRequest({url:"/shopapi/apply/index",success:function(t){var i=t.data;0==t.code&&i&&(1==t.data.procedure?e.$util.redirectTo("/pages/apply/mode",{},"reLaunch"):e.$util.redirectTo("/pages/apply/audit",{},"reLaunch"))}})},vertify:function(){var e=[];e=[{name:"username",checkType:"required",errorMsg:"请输入用户名"},{name:"password",checkType:"required",errorMsg:"请输入密码"}],1==this.captchaConfig&&""!=this.captcha.id&&e.push({name:"vcode",checkType:"required",errorMsg:"请输入验证码"});var t=a.default.check(this.loginList,e);return!!t||(this.$util.showToast({title:a.default.error}),!1)}}};t.default=n},ac6d:function(e,t,i){"use strict";i.d(t,"b",(function(){return a})),i.d(t,"c",(function(){return n})),i.d(t,"a",(function(){return r}));var r={loadingCover:i("36db").default},a=function(){var e=this,t=e.$createElement,i=e._self._c||t;return i("v-uni-view",{staticClass:"login"},[i("v-uni-view",{staticClass:"login-title"},[e._v("商家登录")]),i("v-uni-view",{staticClass:"login-input"},[i("v-uni-view",{staticClass:"iconfont icon06_huiyuanguanli color-base-text"}),i("v-uni-input",{staticClass:"uni-input",attrs:{placeholder:"请输入用户名"},model:{value:e.loginList.username,callback:function(t){e.$set(e.loginList,"username",t)},expression:"loginList.username"}})],1),i("v-uni-view",{staticClass:"login-input"},[i("v-uni-view",{staticClass:"iconfont iconmima color-base-text"}),i("v-uni-input",{staticClass:"uni-input",attrs:{placeholder:"请输入密码",password:"true"},model:{value:e.loginList.password,callback:function(t){e.$set(e.loginList,"password",t)},expression:"loginList.password"}})],1),1==e.captchaConfig?i("v-uni-view",{staticClass:"login-input"},[i("v-uni-view",{staticClass:"iconfont iconyanzhengma1 color-base-text"}),i("v-uni-input",{staticClass:"uni-input",attrs:{placeholder:"请输入验证码",type:"number"},on:{confirm:function(t){arguments[0]=t=e.$handleEvent(t),e.login()}},model:{value:e.loginList.vcode,callback:function(t){e.$set(e.loginList,"vcode",t)},expression:"loginList.vcode"}}),i("v-uni-image",{staticClass:"code",attrs:{src:e.captcha.img,mode:"aspectFit"},on:{click:function(t){arguments[0]=t=e.$handleEvent(t),e.getImg.apply(void 0,arguments)}}})],1):e._e(),i("v-uni-button",{attrs:{type:"primary"},on:{click:function(t){arguments[0]=t=e.$handleEvent(t),e.login()}}},[e._v("登录")]),i("v-uni-view",{staticClass:"login-text"},[i("v-uni-text",[e._v("还没成为我们的伙伴？")]),i("v-uni-text",{staticClass:"color-base-text",on:{click:function(t){arguments[0]=t=e.$handleEvent(t),e.toRegistered.apply(void 0,arguments)}}},[e._v("申请入驻")])],1),i("loading-cover",{ref:"loadingCover"})],1)},n=[]},ad14:function(e,t,i){"use strict";i.r(t);var r=i("ac6d"),a=i("4cb7");for(var n in a)"default"!==n&&function(e){i.d(t,e,(function(){return a[e]}))}(n);i("5c50");var o,s=i("f0c5"),c=Object(s["a"])(a["default"],r["b"],r["c"],!1,null,"cacf8f10",null,!1,r["a"],o);t["default"]=c.exports},adc9:function(e,t,i){var r=i("24fb");t=r(!1),t.push([e.i,'@charset "UTF-8";\r\n/**\r\n * 你可以通过修改这些变量来定制自己的插件主题，实现自定义主题功能\r\n * 建议使用scss预处理，并在插件代码中直接使用这些变量（无需 import 这个文件），方便用户通过搭积木的方式开发整体风格一致的App\r\n */.uni-line-hide[data-v-cacf8f10]{overflow:hidden;text-overflow:ellipsis;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical}.uni-using-hide[data-v-cacf8f10]{overflow:hidden;width:100%;text-overflow:ellipsis;white-space:nowrap}.prevent-head-roll[data-v-cacf8f10]{position:fixed;left:0;right:0;z-index:998}uni-page-body[data-v-cacf8f10]{background-color:#fff}.login[data-v-cacf8f10]{margin:0 %?60?% 0;padding-top:%?180?%}.login .login-title[data-v-cacf8f10]{font-size:%?60?%;font-weight:500;display:inline-block;margin-bottom:%?50?%}.login .login-input[data-v-cacf8f10]{display:-webkit-box;display:-webkit-flex;display:flex;height:%?70?%;margin:%?50?% auto 0;-webkit-box-align:center;-webkit-align-items:center;align-items:center;-webkit-box-pack:center;-webkit-justify-content:center;justify-content:center;border-bottom:1px solid #eee;border-radius:%?10?%;padding:%?6?% %?10?%}.login .login-input .iconfont[data-v-cacf8f10]{font-size:%?40?%}.login .login-input .uni-input[data-v-cacf8f10]{-webkit-box-flex:1;-webkit-flex:1;flex:1;margin-left:%?20?%}.login .login-input .code[data-v-cacf8f10]{width:%?150?%;height:%?70?%}.login uni-button[data-v-cacf8f10]{margin:%?180?% auto 0}.login .login-text[data-v-cacf8f10]{text-align:center;margin:%?50?% auto 0;color:#909399}body.?%PAGE?%[data-v-cacf8f10]{background-color:#fff}',""]),e.exports=t},ba52:function(e,t,i){i("c975"),i("a9e3"),i("4d63"),i("ac1f"),i("25f0"),i("1276"),e.exports={error:"",check:function(e,t){for(var i=0;i<t.length;i++){if(!t[i].checkType)return!0;if(!t[i].name)return!0;if(!t[i].errorMsg)return!0;if(!e[t[i].name])return this.error=t[i].errorMsg,!1;switch(t[i].checkType){case"custom":if("function"==typeof t[i].validate&&!t[i].validate(e[t[i].name]))return this.error=t[i].errorMsg,!1;break;case"required":var r=new RegExp("/[S]+/");if(r.test(e[t[i].name]))return this.error=t[i].errorMsg,!1;break;case"string":r=new RegExp("^.{"+t[i].checkRule+"}$");if(!r.test(e[t[i].name]))return this.error=t[i].errorMsg,!1;break;case"int":r=new RegExp("^(-[1-9]|[1-9])[0-9]{"+t[i].checkRule+"}$");if(!r.test(e[t[i].name]))return this.error=t[i].errorMsg,!1;break;case"digit":r=new RegExp("^(d{0,10}(.?d{0,2}){"+t[i].checkRule+"}$");if(!r.test(e[t[i].name]))return this.error=t[i].errorMsg,!1;break;case"between":if(!this.isNumber(e[t[i].name]))return this.error=t[i].errorMsg,!1;var a=t[i].checkRule.split(",");if(a[0]=Number(a[0]),a[1]=Number(a[1]),e[t[i].name]>a[1]||e[t[i].name]<a[0])return this.error=t[i].errorMsg,!1;break;case"betweenD":r=/^-?[1-9][0-9]?$/;if(!r.test(e[t[i].name]))return this.error=t[i].errorMsg,!1;a=t[i].checkRule.split(",");if(a[0]=Number(a[0]),a[1]=Number(a[1]),e[t[i].name]>a[1]||e[t[i].name]<a[0])return this.error=t[i].errorMsg,!1;break;case"betweenF":r=/^-?[0-9][0-9]?.+[0-9]+$/;if(!r.test(e[t[i].name]))return this.error=t[i].errorMsg,!1;a=t[i].checkRule.split(",");if(a[0]=Number(a[0]),a[1]=Number(a[1]),e[t[i].name]>a[1]||e[t[i].name]<a[0])return this.error=t[i].errorMsg,!1;break;case"same":if(e[t[i].name]!=t[i].checkRule)return this.error=t[i].errorMsg,!1;break;case"notsame":if(e[t[i].name]==t[i].checkRule)return this.error=t[i].errorMsg,!1;break;case"email":r=/^[a-z0-9]+([._\\-]*[a-z0-9])*@([a-z0-9]+[-a-z0-9]*[a-z0-9]+.){1,63}[a-z0-9]+$/;if(!r.test(e[t[i].name]))return this.error=t[i].errorMsg,!1;break;case"phoneno":r=/^[1](([3][0-9])|([4][5-9])|([5][0-3,5-9])|([6][5,6])|([7][0-8])|([8][0-9])|([9][1,8,9]))[0-9]{8}$/;if(!r.test(e[t[i].name]))return this.error=t[i].errorMsg,!1;break;case"zipcode":r=/^[0-9]{6}$/;if(!r.test(e[t[i].name]))return this.error=t[i].errorMsg,!1;break;case"reg":r=new RegExp(t[i].checkRule);if(!r.test(e[t[i].name]))return this.error=t[i].errorMsg,!1;break;case"in":if(-1==t[i].checkRule.indexOf(e[t[i].name]))return this.error=t[i].errorMsg,!1;break;case"notnull":if(0==e[t[i].name]||void 0==e[t[i].name]||null==e[t[i].name]||e[t[i].name].length<1)return this.error=t[i].errorMsg,!1;break;case"lengthMin":if(e[t[i].name].length<t[i].checkRule)return this.error=t[i].errorMsg,!1;break;case"lengthMax":if(e[t[i].name].length>t[i].checkRule)return this.error=t[i].errorMsg,!1;break}}return!0},isNumber:function(e){var t=/^-?[1-9][0-9]?.?[0-9]*$/;return t.test(e)}}}}]);