var laytpl, form, element, repeat_flag, table;
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
				url: ns.url("shop/goods/getGoodsSkuList"),
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
						member_price_is_exit: member_price_is_exit,

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
				url: ns.url("shop/goods/getGoodsSkuList"),
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
						member_price_is_exit: member_price_is_exit,

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

			$("#toolbarOperation").html(html);
			$("#batchOperation").html(html);
			
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
			var curr = $(".layui-laypage-em").next().html();
			switch (obj.event) {
				//?????????
				case 'member_price':

					var url = ns.url("memberprice://shop/goods/config", {goods_id: data.goods_id});
					// alert(url);
					// exit;
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
				case 'edit':
					//??????`
					if (data.goods_class == 1) {
						window.open(ns.url("shop/goods/editgoods", {"goods_id": data.goods_id}));
					} else {
						window.open(ns.url("shop/virtualgoods/editgoods", {"goods_id": data.goods_id}));
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
				case 'editStock':
					editStock(data);
					break;
				case 'copy':
					copyGoods(data.goods_id);
					break;
				case 'browse_records':
					location.href = ns.url("shop/goods/goodsBrowse", {goods_id:data.goods_id});
					break;
				case 'select_violations_remark':
					getVerifyStateRemark(data.goods_id, 10);
					break;
			}
		});
		
		// ????????????????????????
		form.on('submit(edit_stock)', function (obj) {
			var field = obj.field;
			if (repeat_flag) return false;
			repeat_flag = true;
			
			$.ajax({
				type: "POST",
				url: ns.url("shop/goods/editGoodsStockPrice"),
				data: {
					'sku_list': field
				},
				dataType: 'JSON',
				success: function (res) {
					layer.msg(res.message);
					repeat_flag = false;
					if (res.code == 0) {
						table.reload({
							page: {
								curr: $(".layui-laypage-em").next().html()  //???????????????
						   },
						});
						refreshVerifyStateCount();
						layer.closeAll('page');
					}
				}
			});
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

        table.on("sort",function (obj) {
            table.reload({
                page: {
                    curr: 1
                },
                where: {
                    order:obj.field,
                    sort:obj.type
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

		// ????????????
		form.on('submit(export)', function (data) {

			exportGoods(data.field);
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

});

/**
 * ??????????????????
 * @param status ?????????0 ?????????1 ????????????
 */
function refreshTable(status) {
	var page = $(".page").val();
	var cols = [
		[{
			type: 'checkbox',
			unresize: 'false',
			width: '3%'
		}, {
			title: '????????????',
			unresize: 'false',
			width: '22%',
			templet: '#goods_info'
		}, {
			field: 'price',
			title: '<span style="padding-right: 15px;">??????(???)</span>',
			unresize: 'false',
			width: '8%',
			align: 'right',
			templet: function (data) {
				return '<span style="padding-right: 15px;">???' + data.price + '</span>';
			}
		}, {
			field: 'goods_stock',
			title: '??????',
			unresize: 'false',
			width: '10%',
			sort:true
		}, {
			field: 'sale_num',
			title: '??????',
			unresize: 'false',
			width: '10%',
            sort:true
		}, {
			title: '????????????',
			unresize: 'false',
			width: '15%',
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
			toolbar: '#action',
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
				width: '22%',
				templet: '#goods_info'
			}, {
				title: '????????????',
				unresize: 'false',
				width: '15%',
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
				toolbar: '#action',
				unresize: 'false',
				width: '15%'
			}]
		];
	}
	
	table = new Table({
		elem: '#goods_list',
		url: ns.url("shop/goods/lists"),
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
			promotion_type: $("select[name='promotion_type'] option:checked").val(),//????????????
		}
	});
	
	refreshVerifyStateCount();
}

function add() {
	location.href = ns.url('shop/goods/addGoods');
}
function grab() {
	location.href = ns.url('goodsgrab://shop/goodsgrab/lists');
}
// ??????
function deleteGoods(goods_ids) {
	layer.confirm('???????????????????????????????????????????', function () {
		if (repeat_flag) return;
		repeat_flag = true;
		
		$.ajax({
			url: ns.url("shop/goods/deleteGoods"),
			data: {goods_ids: goods_ids.toString()},
			dataType: 'JSON',
			type: 'POST',
			success: function (res) {
				layer.msg(res.message);
				repeat_flag = false;
				if (res.code == 0) {
					table.reload({
						page: {
							curr: $(".layui-laypage-em").next().html()  //???????????????
					    },
					});
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
		url: ns.url("shop/goods/offGoods"),
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
		url: ns.url("shop/goods/onGoods"),
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

// ????????????
function editStock(data) {
	$.ajax({
		type: "POST",
		url: ns.url("shop/goods/getGoodsSkuList"),
		data: {
			'goods_id': data.goods_id,
		},
		dataType: 'JSON',
		success: function (res) {
			laytpl($("#edit_stock").html()).render(res.data, function (html) {
				layer_stock = layer.open({
					title: '????????????',
					skin: 'layer-tips-class',
					type: 1,
					area: ['1000px'],
					content: html,
				});
			});
		}
	});
	
}

// ????????????
function goodsUrl(data) {
	$(".operation-wrap[data-goods-id='" + data.goods_id + "'] .popup-qrcode-wrap").css("display", "block");
	$('#goods_name').html(data.goods_name);
	$.ajax({
		type: "POST",
		url: ns.url("shop/goods/goodsUrl"),
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
			}
		}
	});
	
}

// ????????????
var isOpenGoodsPreviewPopup = false;//?????????????????????????????????
function goodsPreview(data) {
	if (isOpenGoodsPreviewPopup) return;
	isOpenGoodsPreviewPopup = true;
	$.ajax({
		type: "POST",
		url: ns.url("shop/goods/goodsPreview"),
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
 * ????????????????????????
 * @param goods_id
 * @param verify_state
 */
function getVerifyStateRemark(goods_id, verify_state) {
	$.ajax({
		url: ns.url("shop/goods/getVerifyStateRemark"),
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
		url: ns.url("shop/goods/refreshVerifyStateCount"),
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

//????????????
function copyGoods(goods_id){
	layer.confirm('????????????????????????????', function() {
		$.ajax({
			url: ns.url("shop/goods/copygoods"),
			data: {goods_id : goods_id},
			dataType: 'JSON',
			type: 'POST',
			success: function(res) {
				layer.msg(res.message);

				if (res.code >= 0) {
					table.reload();
					refreshVerifyStateCount();
					// location.reload();
				}
			}
		});
	}, function () {
		layer.close();
	});
}

/**
 * ????????????
 * @param field
 */
function exportGoods(field){
	layer.confirm('???????????????????????????????', {title:'????????????'},function() {
		$.ajax({
			url: ns.url("shop/goods/exportgoods"),
			data: field,
			dataType: 'JSON',
			type: 'POST',
			success: function(res) {
				layer.msg(res.message);

				if (res.code >= 0) {
					window.open(ns.url('shop/goods/export'));
				}
			}
		});
	}, function () {
		layer.close();
	});
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
		case 'shop_category':
			var shop_category = [];

			$(".shop_category_class").each(function(){
				shop_category.push($(this).val());
			});
			// if(shop_category.length == 0){
			// 	layer.msg('????????????????????????!');
			// 	return;
			// }
			field.shop_category = shop_category.toString();
			break;
		case 'limit':
			field.max_buy = $('[name="batch_max_buy"]').val();
			field.min_buy = $('[name="batch_min_buy"]').val();
			if (isNaN(field.max_buy) || !regExp.number.test(field.max_buy)) {
				layer.msg('??????????????????????????????');
				return;
			}
			if (field.max_buy < 0) {
				layer.msg('????????????????????????0');
				return;
			}
			if (isNaN(field.min_buy) || !regExp.number.test(field.min_buy)) {
				layer.msg('??????????????????????????????');
				return;
			}
			if (field.min_buy < 0) {
				layer.msg('????????????????????????0');
				return;
			}
			if (parseInt(field.min_buy) > parseInt(field.max_buy) && parseInt(field.max_buy) > 0) {
				layer.msg('????????????????????????????????????');
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
		url: ns.url("shop/goods/batchGoods"),
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