var laytpl, form, element, repeat_flag = false, table;
$(function () {
    $("body").on("click", ".contraction", function () {
        var goods_id = $(this).attr("data-goods-id");
        var open = $(this).attr("data-open");
        var open_t = $(this).siblings('.ns-title-content').children('.vips_price').attr("data-open") ? $(this).siblings('.ns-title-content').children('.vips_price').attr("data-open") : 0;
        var tr = $(this).parent().parent().parent().parent();
        var index = tr.attr("data-index");

        if ((parseInt(open)+parseInt(open_t)) > 0) {
            $(this).children("span").text("+");
            $(".js-sku-list-" + index).remove();
        } else {
            $(this).children("span").text("-");
            $.ajax({
                url: ns.url("admin/goods/getGoodsSkuList"),
                data: {goods_id: goods_id},
                dataType: 'JSON',
                type: 'POST',
                async: false,
                success: function (res) {
                    var list = res.data;
                    var sku_list = $("#skuList").html();
                    var data = {
                        list: list,
                        index: index,
                        member_price_is_exit: member_price_is_exit
                    };
                    laytpl(sku_list).render(data, function (html) {
                        tr.after(html);
                    });
                    layer.photos({
                        photos: '.img-wrap',
                        anim: 5
                    });
                }
            });
        }
        $(this).attr("data-open", (open == 0 ? 1 : 0));
        $(this).siblings('.ns-title-content').children('.vips_price').attr("data-open", (open == 0 ? 1 : 0));
    });
    $("body").on("click", ".vips_price", function () {
        var goods_id = $(this).attr("data-goods-id");
        var open = $(this).attr("data-open");
        var open_t = $(this).parent().siblings('.contraction').attr("data-open");
        var tr = $(this).parent().parent().parent().parent().parent();
        var index = tr.attr("data-index");

        if ((parseInt(open)+parseInt(open_t)) > 0) {
            $(this).parent().siblings('.contraction').children("span").text("+");
            $(".js-sku-list-" + index).remove();
        } else {
            $(this).parent().siblings('.contraction').children("span").text("-");
            $.ajax({
                url: ns.url("admin/goods/getGoodsSkuList"),
                data: {goods_id: goods_id},
                dataType: 'JSON',
                type: 'POST',
                async: false,
                success: function (res) {
                    var list = res.data;
                    var sku_list = $("#skuList").html();
                    var data = {
                        list: list,
                        index: index,
                        member_price_is_exit: member_price_is_exit
                    };
                    laytpl(sku_list).render(data, function (html) {
                        tr.after(html);
                    });

                    layer.photos({
                        photos: '.img-wrap',
                        anim: 5
                    });
                }
            });
        }
        $(this).attr("data-open", (open == 0 ? 1 : 0));
        $(this).parent().siblings('.contraction').attr("data-open", (open == 0 ? 1 : 0))
    });
    layui.use(['form', 'laytpl', 'element'], function () {
        form = layui.form;
        repeat_flag = false; //???????????????
        element = layui.element;
        laytpl = layui.laytpl;

        //????????????
        goodsBrand();

        //????????????
        // goodsSattr();
        form.render();
        refreshTable(0);

        //??????Tab????????????????????????hash???
        element.on('tab(goods_list_tab)', function () {
            var id = this.getAttribute('lay-id');
            var type = this.getAttribute('data-type');
            $("input[name='goods_state']").val("");
            $("input[name='verify_state']").val("");
            if (type) {
                $("input[name='" + type + "']").val(id);
            }

            $("#batchOperation").html("");
            if (type == "goods_state" && (id == 1 || id == 0)) {
                // ??????????????????????????????????????????
                $("#batchOperation").html('<button class="layui-btn layui-btn-primary" lay-event="lockup">????????????</button>');
                $("input[name='verify_state']").val(1);
            } else if (type == "verify_state" && id == 0) {
                // ?????????????????????????????????
                $("#batchOperation").html('<button class="layui-btn layui-btn-primary" lay-event="verify_on">????????????</button><button class="layui-btn layui-btn-primary" lay-event="verify_off">????????????</button>');
            }

            // ??????
            if (type == null) {
                refreshTable(0);
            } else if (type == "goods_state") {
                // ?????????????????????
                refreshTable(1);
            } else if (type == "verify_state" && id == 0) {
                // ?????????
                refreshTable(2);
            } else if (type == "verify_state") {
                // ???????????????????????????
                refreshTable(3);
            }
        });

        // ?????????????????????
        table.tool(function (obj) {
            var data = obj.data;
            switch (obj.event) {
                //?????????
                case 'member_price':
                    var url = ns.url("memberprice://shop/goods/config", {goods_id: data.goods_id});
                    //iframe???-????????????
                    var layerIndex = layer.open({
                        title: "??????????????????",
                        type: 2,
                        area: ['1100px', '650px'],
                        // btn: '??????',
                       content: url,
                        success: function(layero, index){
                            var dom_save = layer.getChildFrame("#save_member_price", index);
                            var dom_back = layer.getChildFrame("#back_goods_list", index);
                            var iframeWin = window[layero.find('iframe')[0]['name']];//??????iframe???????????????????????????iframe????????????
                            $(dom_save).click(function(){
                                setTimeout(function(){
                                    iframeWin.formSubmit(function(data){
                                        if (data == 1) {
                                            layer.close(layerIndex);
                                            table.reload();
                                        }
                                    });
                                },300)
                            });
                            $(dom_back).click(function(){
                                layer.close(layerIndex);
                            })
                        }
                    });

                    break;
                case 'select': //??????
                    goodsUrl(data);
                    break;
                case 'preview': //??????
                    goodsPreview(data);
                    break;
                case 'lockup': //????????????
                    lockup(data.goods_id);
                    break;
                case 'verify_on':
                    //????????????
                    verifyOn(data.goods_id, 1);
                    break;
                case 'verify_off':
                    //????????????
                    verifyOn(data.goods_id, -2);
                    break;
                case 'select_verify_remark':
                    getVerifyStateRemark(data.goods_id, -2);
                    break;
                case 'select_violations_remark':
                    getVerifyStateRemark(data.goods_id, 10);
                    break;
                case 'browse_records':
                    location.href = ns.url("admin/goods/goodsBrowse", {goods_id: data.goods_id});
                    break;
            }
        });

        // ????????????
        table.bottomToolbar(function (obj) {
            if (obj.data.length < 1) {
                layer.msg('???????????????????????????');
                return;
            }

            var id_array = new Array();
            for (i in obj.data) id_array.push(obj.data[i].goods_id);
            switch (obj.event) {

                case 'lockup': //????????????
                    lockup(id_array.toString());
                    break;
                case 'verify_on': //????????????

                    verifyOn(id_array.toString(), 1);
                    break;
                case 'verify_off': //????????????

                    verifyOn(id_array.toString(), -2);
                    break;
                case 'recommend_way'://????????????
                    settingRecommendWay(id_array.toString());
                    break;
            }
        });

        table.toolbar(function (obj) {
            if (obj.data.length < 1) {
                layer.msg('???????????????????????????');
                return;
            }

            var id_array = new Array();
            for (i in obj.data) id_array.push(obj.data[i].goods_id);
            switch (obj.event) {

                case 'lockup': //????????????
                    lockup(id_array.toString());
                    break;
                case 'verify_on':
                    //????????????
                    verifyOn(id_array.toString(), 1);
                    break;
                case 'verify_off':
                    //????????????
                    verifyOn(id_array.toString(), -2);
                    break;
                case 'recommend_way'://????????????
                    settingRecommendWay(id_array.toString());
                    break;
            }
        });

        table.on("sort", function (obj) {
            table.reload({
                page: {
                    curr: 1
                },
                where: {
                    order: obj.field,
                    sort: obj.type
                }
            });
        });

        // ????????????
        form.on('submit(search)', function (data) {
            table.reload({
                page: {
                    curr: 1
                },
                where: data.field
            });
            refreshVerifyStateCount();
            return false;
        });

         //????????????????????????
        form.on('submit(set_recommend_way)', function (data) {

            $.ajax({
                type: "POST",
                url: ns.url("admin/goods/modifyGoodsRecommendWay"),
                data:  data.field,
                dataType: 'JSON',
                success: function (res) {
                    layer.msg(res.message);
                    if (res.code >= 0) {
                        layer.closeAll();
                    }
                }
            })

        });
    });

});

/**
 * ??????????????????
 * @param status ?????????0 ?????????1 ????????????????????????2 ????????????3 ???????????????????????????
 */
function refreshTable(status) {

    // ??????
    var cols = [
        [{
            type: 'checkbox',
            unresize: 'false',
            width: '3%'
        }, {
            title: '????????????',
            unresize: 'false',
            width: '25%',
            templet: '#goods_info'
        }, {
            field: 'site_name',
            title: '????????????',
            unresize: 'false',
            width: '10%',
            templet: function (data) {
                return '<span title="' + data.site_name + '">' + data.site_name + '</span>';
            }
        }, {
            field: 'price',
            title: '??????',
            unresize: 'false',
            width: '9%',
            templet: function (data) {
                return '<span style="line-height:40px!important;"  class="ns-line-hiding" title="???' + data.price + '">???' + data.price + '<span>';
            }
        }, {
            field: 'goods_stock',
            title: '??????',
            unresize: 'false',
            width: '8%',
            sort: true
        }, {
            field: 'sale_num',
            title: '??????',
            unresize: 'false',
            width: '7%',
            sort: true
        }, {
            field: 'sort',
            unresize: 'false',
            title: `<div class="ns-prompt-block">????????????
							<div class="ns-prompt">
								<i class="iconfont iconwenhao1 required ns-growth"></i>
								<div class="ns-growth-box ns-reason-box ns-reason-growth ns-prompt-box">
									<div class="ns-prompt-con">
									<p>?????????????????????0????????????????????????????????????</p>
								</div>
							</div>
							</div>
						</div>`,
            width: '7%',
            align: 'center',
            templet: '#editSort',
            sort: true
        }, {
            title: '????????????',
            unresize: 'false',
            width: '6%',
            templet: function (data) {
                var str = '';
                if (data.goods_state == 1) {
                    str = '?????????';
                } else if (data.goods_state == 0) {
                    str = '?????????';
                }
                return str;
            }
        }, {
            title: '????????????',
            unresize: 'false',
            width: '6%',
            templet: function (data) {
                var str = '';
                if (data.verify_state == 1) {
                    str = '?????????';
                } else if (data.verify_state == 0) {
                    str = '?????????';
                } else if (data.verify_state == 10) {
                    str = '????????????';
                } else if (data.verify_state == -1) {
                    str = '?????????';
                } else if (data.verify_state == -2) {
                    str = '????????????';
                }
                return str;
            }
        }, {
            title: '????????????',
            unresize: 'false',
            width: '10%',
            templet: function (data) {
                return '<span title="' + ns.time_to_date(data.create_time) + '">' + ns.time_to_date(data.create_time) + '</span>';
            }
        }, {
            title: '??????',
            toolbar: '#action',
            unresize: 'false',
            width: '10%'
        }]
    ];

    if (status === 1) {
        // ?????????????????????
        cols = [
            [{
                type: 'checkbox',
                unresize: 'false',
                width: '3%'
            }, {
                title: '????????????',
                unresize: 'false',
                width: '25%',
                templet: '#goods_info'
            }, {
                field: 'site_name',
                title: '????????????',
                unresize: 'false',
                width: '10%',
            }, {
                field: 'price',
                title: '??????(???)',
                unresize: 'false',
                width: '12%'
            }, {
                field: 'goods_stock',
                title: '??????',
                unresize: 'false',
                width: '10%'
            }, {
                field: 'sale_num',
                title: '??????',
                unresize: 'false',
                width: '8%'
            }, {
                title: '????????????',
                unresize: 'false',
                width: '10%',
                templet: function (data) {
                    var str = '';
                    if (data.goods_state == 1) {
                        str = '?????????';
                    } else if (data.goods_state == 0) {
                        str = '?????????';
                    }
                    return str;
                }
            }, {
                title: '????????????',
                unresize: 'false',
                width: '12%',
                templet: function (data) {
                    return ns.time_to_date(data.create_time);
                }
            }, {
                title: '??????',
                toolbar: '#action',
                unresize: 'false',
                width: '10%'
            }]
        ];
    } else if (status === 2) {
        // ?????????????????????????????????
    } else if (status === 3) {
        // ???????????????????????????
        cols = [
            [{
                type: 'checkbox',
                unresize: 'false',
                width: '3%'
            }, {
                title: '????????????',
                unresize: 'false',
                width: '37%',
                templet: '#goods_info'
            }, {
                field: 'site_name',
                title: '????????????',
                unresize: 'false',
                width: '25%',
            }, {
                title: '????????????',
                unresize: 'false',
                width: '10%',
                templet: function (data) {
                    var str = '';
                    if (data.verify_state == 1) {
                        str = '?????????';
                    } else if (data.verify_state == 0) {
                        str = '?????????';
                    } else if (data.verify_state == 10) {
                        str = '????????????';
                    } else if (data.verify_state == -1) {
                        str = '?????????';
                    } else if (data.verify_state == -2) {
                        str = '????????????';
                    }
                    return str;
                }
            }, {
                title: '????????????',
                unresize: 'false',
                width: '15%',
                templet: function (data) {
                    return ns.time_to_date(data.create_time);
                }
            }, {
                title: '??????',
                unresize: 'false',
                width: '10%',
                templet: function (data) {
                    var str = '';
                    if (data.verify_state == 10) {
                        str = '<a href="javascript:getVerifyStateRemark(' + data.goods_id + ',10);" class="ns-text-color">??????</a>';
                    } else if (data.verify_state == -2) {
                        str = '<a href="javascript:getVerifyStateRemark(' + data.goods_id + ',-2);" class="ns-text-color">??????</a>';
                    }
                    return str;
                }
            }]
        ];
    }

    table = new Table({
        elem: '#goods_list',
        url: ns.url("admin/goods/lists"),
        cols: cols,
        toolbar: '#toolbarOperation',
        bottomToolbar: "#batchOperation",
        where: {
            search_text: $("input[name='search_text']").val(),
            search_text_type: $("select[name='search_text_type'] option:checked").val(),
            goods_state: $("input[name='goods_state']").val(),
            verify_state: $("input[name='verify_state']").val(),
            category_id: $("input[name='category_id']").val(),
            goods_brand: $("select[name='goods_brand'] option:checked").val(),
            goods_class: $("select[name='goods_class'] option:checked").val(),
            goods_attr_class: $("select[name='goods_attr_class'] option:checked").val(),
            start_sale: $("input[name='start_sale']").val(),
            end_sale: $("input[name='end_sale']").val()
        }
    });

    refreshVerifyStateCount();
}
$(".reset").click(function () {
    $("input[name='category_id']").val('')
})
//????????????
function verifyOn(goods_ids, verify_state) {
    if (verify_state === -2) {
        // ??????
        layer.prompt({
            formType: 2,
            title: '??????????????????',
            cancel: function (index, layero) {
                repeat_flag = false;
            },
            end: function () {
                repeat_flag = false;
            }
        }, function (value, index, elem) {

            if (repeat_flag) return;
            repeat_flag = true;
            layer.close(index);

            $.ajax({
                url: ns.url("admin/goods/verifyOn"),
                data: {
                    goods_ids: goods_ids.toString(),
                    verify_state: verify_state,
                    verify_state_remark: value
                },
                dataType: 'JSON',
                type: 'POST',
                success: function (res) {
                    layer.msg(res.message);
                    repeat_flag = false;
                    if (res.code == 0) {
                        table.reload();
                        refreshVerifyStateCount();
                    }
                }
            });
        });
    } else {

        layer.confirm('??????????????????????', function () {
            if (repeat_flag) return;
            repeat_flag = true;
            layer.close(index);

            $.ajax({
                url: ns.url("admin/goods/verifyOn"),
                data: {
                    goods_ids: goods_ids.toString(),
                    verify_state: verify_state
                },
                dataType: 'JSON',
                type: 'POST',
                success: function (res) {
                    layer.msg(res.message);
                    repeat_flag = false;
                    if (res.code == 0) {
                        table.reload();
                        refreshVerifyStateCount();
                    }
                }
            });
        });
    }

}

//??????????????????
function lockup(goods_ids) {
    layer.prompt({
        formType: 2,
        title: '??????????????????',
        cancel: function (index, layero) {
            repeat_flag = false;
        },
        end: function () {
            repeat_flag = false;
        },
        yes: function (index, layero) {
            var value = layero.find(".layui-layer-input").val();

            if (repeat_flag) return;
            repeat_flag = true;
            if (value) {
                $.ajax({
                    url: ns.url("admin/goods/lockup"),
                    data: {
                        "verify_state_remark": value,
                        "goods_ids": goods_ids.toString()
                    },
                    dataType: 'JSON',
                    type: 'POST',
                    success: function (res) {
                        layer.msg(res.message);
                        repeat_flag = false;
                        if (res.code == 0) {
                            table.reload();
                            refreshVerifyStateCount();
                        }
                    }
                });
                layer.close(index);
            } else {
                repeat_flag = false;
                layer.msg('???????????????????????????!', {icon: 5, anim: 6});
                return;
            }
        }
    });
}

// ????????????
function goodsUrl(data) {
    $(".operation-wrap[data-goods-id='" + data.goods_id + "'] .popup-qrcode-wrap").show();
    $('#goods_name').html(data.goods_name);
    $.ajax({
        type: "POST",
        url: ns.url("admin/goods/goodsUrl"),
        data: {
            'goods_id': data.goods_id
        },
        dataType: 'JSON',
        success: function (res) {
            if (res.data.path.h5.status == 1) {
                res.data.goods_id = data.goods_id;
                laytpl($("#goods_url").html()).render(res.data, function (html) {
                    $(".operation-wrap[data-goods-id='" + data.goods_id + "'] .popup-qrcode-wrap").html(html).show();

                    $("body").click(function (e) {
                        if (!$(e.target).closest(".popup-qrcode-wrap").length) {
                            $(".operation-wrap[data-goods-id='" + data.goods_id + "'] .popup-qrcode-wrap").hide();
                        }
                    });
                });
            } else {
                layer.msg(res.data.path.h5.message);
                $(".operation-wrap[data-goods-id='" + data.goods_id + "'] .popup-qrcode-wrap").hide();
            }
        }
    });
}

/**
 * ????????????????????????
 */
function settingRecommendWay(data) {

    laytpl($("#recommend_way").html()).render(data, function(html) {
        layer_label = layer.open({
            title: '????????????????????????',
            skin: 'layer-tips-class',
            type: 1,
            area: ['450px'],
            content: html,
        });
    });

    form.render();
}


// ????????????
var isOpenGoodsPreviewPopup = false;//?????????????????????????????????
function goodsPreview(data) {
    if (isOpenGoodsPreviewPopup) return;
    isOpenGoodsPreviewPopup = true;
    $.ajax({
        type: "POST",
        url: ns.url("admin/goods/goodsPreview"),
        data: {
            'goods_id': data.goods_id
        },
        dataType: 'JSON',
        success: function (res) {
            if (res.data.path.h5.status == 1) {
                res.data.goods_id = data.goods_id;

                laytpl($("#goods_preview").html()).render(res.data, function (html) {
                    var layerIndex = layer.open({
                        title: '????????????',
                        skin: 'layer-tips-class',
                        type: 1,
                        area: ['600px', '600px'],
                        content: html,
                        success: function () {
                            isOpenGoodsPreviewPopup = false;
                        }
                    });
                });
            } else {
                layer.msg(res.data.path.h5.message);
            }
        }
    });
}

/**
 * ???????????????????????????????????????
 * @param goods_id
 * @param verify_state
 */
function getVerifyStateRemark(goods_id, verify_state) {
    if (repeat_flag) return;
    repeat_flag = true;
    $.ajax({
        url: ns.url("admin/goods/getVerifyStateRemark"),
        data: {goods_id: goods_id},
        dataType: 'JSON',
        type: 'POST',
        success: function (res) {
            var data = res.data;
            if (data) {
                var title = '';
                if (verify_state == -2) title = '??????????????????';
                else title = '??????????????????';
                layer.open({
                    title: title,
                    content: data.verify_state_remark,
                    cancel: function (index, layero) {
                        repeat_flag = false;
                    },
                    end: function () {
                        repeat_flag = false;
                    },
                    yes: function (index, layero) {
                        repeat_flag = false;
                        layer.close(index);
                    }
                });
            }
        }
    });
}

//????????????
function goodsBrand() {
    var brandHtml = "";
    $.ajax({
        url: ns.url("admin/goodsbrand/lists"),
        type: 'POST',
        dataType: 'JSON',
        success: function (res) {
            brandHtml += '<option value="">??????</option>';
            $.each(res.data.list, function (key, val) {
                brandHtml += '<option value="' + val.brand_id + '">' + val.brand_name + '</option>';
            });
            $("select[name='goods_brand']").html(brandHtml);
            form.render('select');
        }
    });
}

//????????????
function goodsSattr() {
    var sattrHtml = "";
    $.ajax({
        url: ns.url("admin/goodsattr/lists"),
        type: 'POST',
        dataType: 'JSON',
        success: function (res) {
            sattrHtml += '<option value="">??????</option>';
            $.each(res.data.list, function (key, val) {
                sattrHtml += '<option value="${val.class_id}">${val.class_name}</option>';
            });
            $("select[name='goods_attr_class']").html(sattrHtml);
            form.render('select');
        }
    });
}

// ??????????????????????????????
function refreshVerifyStateCount() {
    $.ajax({
        url: ns.url("admin/goods/refreshVerifyStateCount"),
        type: 'POST',
        dataType: 'JSON',
        success: function (res) {
            for (var i = 0; i < res.length; i++) {
                if (res[i].count) $('div[lay-filter="goods_list_tab"] li[data-type="verify_state"][lay-id="' + res[i].state + '"] span.count').text(res[i].count).show();
                else $('div[lay-filter="goods_list_tab"] li[data-type="verify_state"][lay-id="' + res[i].state + '"] span').hide();
            }
        }
    });
}


// ?????????????????????
function editSort(goods_id, event){
    var data = $(event).val();

    if (data == '') {
        $(event).val(0);
        data = 0;
    }

    if(!new RegExp("^-?[0-9]\\d*$").test(data)){
        layer.msg("????????????????????????");
        return ;
    }
    if(data<0){
        layer.msg("?????????????????????0");
        return ;
    }
    $.ajax({
        type: 'POST',
        url: ns.url("admin/goods/modifySort"),
        data: {
            goods_id: goods_id,
            sort: data
        },
        dataType: 'JSON',
        success: function(res) {
            layer.msg(res.message);
            if(res.code==0){
                table.reload();
            }
        }
    });
}