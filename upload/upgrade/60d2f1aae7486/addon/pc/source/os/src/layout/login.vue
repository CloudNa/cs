<template>
    <el-container>
        <!-- 头部 -->
        <el-header class="ns-login-header">
            <div class="header-in">
                <!-- <ns-header-mid /> -->
                <el-row>
                    <el-col :span="2">
                        <router-link to="/" class="logo-wrap"><img :src="$img(siteInfo.logo)" alt/></router-link>
                    </el-col>
					
					<p>{{login_register}}</p>
                </el-row>
            </div>
        </el-header>
        <el-main>
          <transition name="slide"><router-view /></transition>
				</el-main>
        <!-- 底部 -->
        <el-footer class="login-footer"><copy-right /></el-footer>
    </el-container>
</template>
<script>
    import CopyRight from "./components/CopyRight"
    import NsHeaderMid from "./components/NsHeaderMid"
    import { mapGetters } from "vuex"

    export default {
		data: () => {
			return {
				login_register : '欢迎登陆'
			}
		},
        name: "Layout",
        components: {
            CopyRight,
            NsHeaderMid
        },
        created() {
			this.login_register = this.$route.path == "/login" ? '欢迎登陆' : '欢迎注册';
            this.$store.dispatch("site/siteInfo")
        },
		watch: {
			$route(to, from) {
				this.login_register = to.path == "/login" ? '欢迎登陆' : '欢迎注册';
			}
		},
        computed: {
            ...mapGetters(["siteInfo"])
        },
        methods: {}
    }
</script>
<style lang="scss">
    .ns-login-header {
        height: 89px !important;
    }

    .header-in {
        width: $width;
        height: 89px;
        margin: 20px auto 0;
        .logo-wrap {
            width: 240px;
            height: 68px;
            display: block;
            line-height: 68px;
            img {
                max-width: 100%;
                max-height: 100%;
            }
        }
		p {
			font-size: 28px;
		}
    }
	
	.login-footer .footer-bottom p .footer-link, .login-footer .footer-bottom p .el-link.el-link--default {
		color: #303133;
	}
	
	.login-footer .footer-bottom p .footer-link:hover {
		color: $base-color;
	}
</style>
