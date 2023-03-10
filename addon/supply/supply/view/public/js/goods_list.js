var laytpl, form, element, repeat_flag, table;
$(function () {
    $("body").on("click", ".contraction", function () {
        var goods_id = $(this).attr("data-goods-id");
        var open = $(this).attr("data-open");
        var tr = $(this).parent().parent().parent().parent();
        var index = tr.attr("data-index");

        if (open == 1) {
            $(this).children("span").text("+");
            $(".js-sku-list-" + index).remove();
        } else {
            $(this).children("span").text("-");
            $.ajax({
                url: ns.url("supply://supply/goods/getGoodsSkuList"),
                data: {goods_id: goods_id},
                dataType: 'JSON',
                type: 'POST',
                async: false,
                success: function (res) {
                    var list = res.data;
                    var sku_list = $("#skuList").html();
                    var data = {
                        list: list,
                        index: index
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
    });
    $('body').on('click', '.batch-set-wrap .tab-wrap li', function(){
        var type = $(this).attr('data-type');
        $(this).addClass('active').siblings('li').removeClass('active');
        $('.batch-set-wrap .content-wrap .tab-item.'+ type).addClass('tab-show').siblings('.tab-item').removeClass('tab-show');
        $('.batch-set-wrap .footer-wrap').show();
    });

    $('body').on('click', '.batch-set-wrap .shipping .layui-form-radio', function(){
        if ($('[name="is_free_shipping"]:checked').val() == 1) {
            $('.batch-set-wrap .shipping .shipping_template').hide();
        } else {
            $('.batch-set-wrap .shipping .shipping_template').show();
        }
    })
    layui.use(['form', 'laytpl', 'element'], function () {
        form = layui.form;
        repeat_flag = false; //???????????????
        element = layui.element;
        laytpl = layui.laytpl;

        form.render();
        refreshTable(0);

        //??????Tab????????????????????????hash???
        element.on('tab(goods_list_tab)', function () {
            var type = this.getAttribute('data-type');
            $("input[name='goods_state']").val("");
            $("input[name='verify_state']").val("");
            if (type) {
                var id = this.getAttribute('lay-id');
                $("input[name='" + type + "']").val(id);
            }
            var html = '<button class="layui-btn layui-btn-primary" lay-event="delete">????????????</button>';
            if (type == "goods_state" && id == 1) {
                // ????????????????????????
                html += '<button class="layui-btn layui-btn-primary" lay-event="off_goods">????????????</button>';
                $("input[name='verify_state']").val(1);
            } else if (type == "goods_state" && id == 0) {
                // ????????????????????????
                html += '<button class="layui-btn layui-btn-primary" lay-event="on_goods">????????????</button>';
                $("input[name='verify_state']").val(1);
            }
            html += '<button class="layui-btn layui-btn-primary" lay-event="batch_set">????????????</button>';
            $("#batchOperation").html(html);
            $("#toolbarOperation").html(html);
            // ??????????????????????????????????????????
            if (type == null || type == "goods_state" || (type == "verify_state" && id == 0)) {
                refreshTable(0);
            } else if (type == "verify_state") {
                // ???????????????????????????
                refreshTable(1);
            }

        });

        // ?????????????????????
        table.tool(function (obj) {
            var data = obj.data;
            switch (obj.event) {

                case 'preview': //??????
                    goodsPreview(data);
                    break;
                case 'edit':
                    //??????`
                    if (data.goods_class == 1) {
                        location.href = ns.url("supply://supply/goods/editgoods", {"goods_id": data.goods_id});
                    } else {
                        location.href = ns.url("supply://supply/virtualgoods/editgoods", {"goods_id": data.goods_id});
                    }
                    break;
                case 'delete':
                    //??????
                    deleteGoods(data.goods_id);
                    break;
                case 'off_goods':
                    //??????
                    offGoods(data.goods_id);
                    break;
                case 'on_goods':
                    //??????
                    onGoods(data.goods_id);
                    break;
                case 'select_violations_remark':
                    getVerifyStateRemark(data.goods_id, 10);
                    break;

            }
        });

        // ????????????
        table.toolbar(function (obj) {

            if (obj.data.length < 1) {
                layer.msg('???????????????????????????');
                return;
            }
            var id_array = new Array();
            for (i in obj.data) id_array.push(obj.data[i].goods_id);
            switch (obj.event) {
                case "delete":
                    deleteGoods(id_array.toString());
                    break;
                case 'off_goods':
                    //??????
                    offGoods(id_array.toString());
                    break;
                case 'on_goods':
                    //??????
                    onGoods(id_array.toString());
                    break;
                case 'batch_set':
                    layer.open({
                        title: "????????????",
                        type: 1,
                        area: ['700px', '600px'],
                        content: $('#batchSet').html(),
                        success: function(){

                            //???????????????????????????
                            $("body").on('click', '.add_shop_category', function(){
                                laytpl($("#shop_category_html").html()).render([], function (html) {
                                    $(".js-goods-shop-category").append(html);
                                    form.render();
                                })
                            });

                            //??????????????????
                            $("body").on('click', '.js-goods-shop-category .layui-icon-close', function(){
                                $(this).parent().remove();
                            });


                            form.on('select(batch_shop_category)', function(data){
                                var shop_category = [];
                                var this_index = $(data.elem).parent().index();
                                $(".shop_category_class").each(function(){
                                    var index = $(this).parent().index();
                                    if(this_index != index){
                                        shop_category.push($(this).val());
                                    }
                                });
                                if(data.value != 0 && $.inArray(data.value, shop_category) != -1){
                                    $(data.elem).val(0);
                                    form.render();
                                    layer.msg("???????????????????????????????????????");
                                }
                            });
                            form.render();
                        }
                    });
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
                case "delete":
                    deleteGoods(id_array.toString());
                    break;
                case 'off_goods':
                    //??????
                    offGoods(id_array.toString());
                    break;
                case 'on_goods':
                    //??????
                    onGoods(id_array.toString());
                    break;
                case 'batch_set':
                    layer.open({
                        title: "????????????",
                        type: 1,
                        area: ['700px', '600px'],
                        content: $('#batchSet').html(),
                        success: function(){

                            //???????????????????????????
                            $("body").on('click', '.add_shop_category', function(){
                                laytpl($("#shop_category_html").html()).render([], function (html) {
                                    $(".js-goods-shop-category").append(html);
                                    form.render();
                                })
                            });

                            //??????????????????
                            $("body").on('click', '.js-goods-shop-category .layui-icon-close', function(){
                                $(this).parent().remove();
                            });


                            form.on('select(batch_shop_category)', function(data){
                                var shop_category = [];
                                var this_index = $(data.elem).parent().index();
                                $(".shop_category_class").each(function(){
                                    var index = $(this).parent().index();
                                    if(this_index != index){
                                        shop_category.push($(this).val());
                                    }
                                });
                                if(data.value != 0 && $.inArray(data.value, shop_category) != -1){
                                    $(data.elem).val(0);
                                    form.render();
                                    layer.msg("???????????????????????????????????????");
                                }
                            });
                            form.render();
                        }
                    });
                    break;
            }
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

        // ??????
        form.verify({
            int: function (value) {
                if (value < 0) {
                    return '??????????????????0!'
                }
                if (value % 1 != 0) {
                    return '?????????????????????!'
                }
            },
        })

    });
});

/**
 * ??????????????????
 * @param status ?????????0 ?????????1 ????????????
 */
function refreshTable(status) {
    var cols = [
        [{
            type: 'checkbox',
            unresize: 'false',
            width: '3%'
        }, {
            title: '????????????',
            unresize: 'false',
            width: '20%',
            templet: '#goods_info'
        }, {
            field: 'price',
            title: '<span style="padding-right: 15px;">??????(???)</span>',
            unresize: 'false',
            width: '13%',
            align: 'right',
            templet: function (data) {

                if (data.min_price == data.max_price) {
                    var price_str = '???' + data.max_price;
                } else {
                    var price_str = '???' + data.min_price + '~' + data.max_price;
                }
                return '<span style="padding-right: 15px;">' + price_str + '</span>';
            }
        }, {
            field: 'goods_stock',
            title: '??????',
            unresize: 'false',
            width: '10%'
        }, {
            field: 'sale_num',
            title: '??????',
            unresize: 'false',
            width: '10%'
        }, {
            title: '????????????',
            unresize: 'false',
            width: '12%',
            templet: function (data) {
                var str = '';
                if (data.goods_state == 1 && data.verify_state == 1) {
                    str = '?????????';
                } else if (data.goods_state == 0 && data.verify_state == 1) {
                    str = '?????????';
                }else if (data.verify_state === 0) {
                    str = '?????????';
                }else if (data.verify_state === -2) {
                    str = '????????????';
                }else if (data.verify_state === 10) {
                    str = '????????????';
                    str +='<a class="btn-color" lay-event="select_violations_remark">????????????</a>'
                }
                return str;
            }
        }, {
            title: '????????????',
            unresize: 'false',
            width: '17%',
            templet: function (data) {
                return ns.time_to_date(data.create_time);
            }
        }, {
            title: '??????',
            toolbar: '#operation',
            unresize: 'false',
            width: '15%'
        }]
    ];
    if (status === 1) {
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
                title: '????????????',
                unresize: 'false',
                width: '12%',
                templet: function (data) {
                    var str = '';
                    if (data.verify_state == 1) {
                        str = '?????????';
                    } else if (data.verify_state == 0) {
                        str = '?????????';
                    } else if (data.verify_state == 10) {
                        str = '????????????';
                        str +='<a class="btn-color" lay-event="select_violations_remark">????????????</a>'
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
                width: '25%',
                templet: function (data) {
                    return ns.time_to_date(data.create_time);
                }
            }, {
                title: '??????',
                unresize: 'false',
                width: '20%',
                templet: function (data) {
                    var str = '';
                    if (data.verify_state == 10) {
                        str = '<a href="javascript:getVerifyStateRemark(' + data.goods_id + ',10);" class="ns-text-color">??????</a>';
                    } else if (data.verify_state == -2) {
                        str = '<a href="javascript:getVerifyStateRemark(' + data.goods_id + ',-2);" class="ns-text-color">??????</a>';
                    }
                    return str;
                }
            }, {
                title: '??????',
                toolbar: '#operation',
                unresize: 'false',
                width: '15%'
            }]
        ];
    }

    table = new Table({
        elem: '#goods_list',
        url: ns.url("supply://supply/goods/lists"),
        cols: cols,
        toolbar: "#toolbarOperation",
        bottomToolbar: "#batchOperation",
        where: {
            search_text: $("input[name='search_text']").val(),
            goods_state: $("input[name='goods_state']").val(),
            verify_state: $("input[name='verify_state']").val(),
            start_sale: $("input[name='start_sale']").val(),
            end_sale: $("input[name='end_sale']").val(),
            // start_price: 0,
            // end_price: 0,
            goods_shop_category_ids: $("select[name='goods_shop_category_ids'] option:checked").val(),
            category_id: $("input[name='category_id']").val(),
            goods_class: $("select[name='goods_class'] option:checked").val(),
        }
    });

    refreshVerifyStateCount();
}

function add() {
    location.href = ns.url('supply://supply/goods/addgoods');
    // var html = $("#selectAddGoods").html();
    // laytpl(html).render({}, function (html) {
    //     layer.open({
    //         type: 1,
    //         title: '??????????????????',
    //         area: ['600px'],
    //         content: html
    //
    //     });
    // });
}

// ??????
function deleteGoods(goods_ids) {
    layer.confirm('???????????????????????????????????????????', function () {
        if (repeat_flag) return;
        repeat_flag = true;

        $.ajax({
            url: ns.url("supply://supply/goods/deleteGoods"),
            data: {goods_ids: goods_ids.toString()},
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

//????????????
function offGoods(goods_ids) {
    if (repeat_flag) return;
    repeat_flag = true;

    $.ajax({
        url: ns.url("supply://supply/goods/offGoods"),
        data: {goods_state: 0, goods_ids: goods_ids.toString()},
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
}

//????????????
function onGoods(goods_ids) {

    if (repeat_flag) return;
    repeat_flag = true;

    $.ajax({
        url: ns.url("supply://supply/goods/onGoods"),
        data: {goods_state: 1, goods_ids: goods_ids.toString()},
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
}


/**
 * ????????????????????????
 * @param goods_id
 * @param verify_state
 */
function getVerifyStateRemark(goods_id, verify_state) {
    $.ajax({
        url: ns.url("supply://supply/goods/getVerifyStateRemark"),
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

/**
 * ??????????????????????????????
 */
function refreshVerifyStateCount() {
    $.ajax({
        url: ns.url("supply://supply/goods/refreshVerifyStateCount"),
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

function closeStock() {
    layer.close(layer_stock);
}
// ????????????
var setSub = false;
function batchSetting(){
    var id_array = new Array(),
        setType = $('.batch-set-wrap .tab-wrap .active').attr('data-type'),
        checkedData = table.checkStatus('goods_list').data,
        field = {},
        regExp = {
            number: /^\d{0,10}$/,
            digit: /^\d{0,10}(.?\d{0,2})$/
        };
    for (i in checkedData) id_array.push(checkedData[i].goods_id);

    switch(setType){
        case 'category':
            field.category = $('[name="batch_category"]').val();
            if(field.category <= 0){
                layer.msg('????????????????????????!');
                return;
            }
            break;
        case 'shipping':
            field.is_free_shipping = $('[name="is_free_shipping"]:checked').val();
            field.shipping_template = $('[name="batch_shipping_template"]').val();
            if (field.is_free_shipping == 0 && field.shipping_template == 0) {
                layer.msg('?????????????????????');
                return;
            }
            break;
    }

    if (setSub) return;
    setSub = true;

    field.type = setType;
    field.goods_ids = id_array.toString();
    $.ajax({
        type: "POST",
        url: ns.url("supply/supply/goods/batchGoods"),
        data: field,
        dataType: 'JSON',
        success: function (res) {
            setSub = false;
            if (res.code >= 0) {
                $('.batch-set-wrap .footer-wrap').hide();
                $('.batch-set-wrap .content-wrap .tab-item.result').addClass('tab-show').siblings('.tab-item').removeClass('tab-show');
            } else {
                layer.msg('????????????');
            }
        }
    })
}