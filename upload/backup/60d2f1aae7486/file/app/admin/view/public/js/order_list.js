/**
 * 渲染订单列表
 */
Order = function(){};

/**
 * 设置数据集
 */
Order.prototype.setData = function(data){
    Order.prototype.data = data;
};

/**
 * 列名数据
 */
Order.prototype.cols = [
    {
        title : '<span style="margin-left:10px;" class="ns-line-hiding" title="商品信息">商品信息</span>',
        width : "25%",
        className : "product-info",
        template : function(orderitem,order){
            var h = '<div class="img-block" >';
            h += '<img layer-src src="'+ ns.img(orderitem.sku_image) +'">';
            h += '</div>';
            h += '<div class="info">';
            h += '<a href="javascript:;" class="ns-multi-line-hiding" title="'+ orderitem.sku_name +'">' + orderitem.sku_name + '</a>';
            //是否是赠品
            if(orderitem.is_present == 1){
                h += '<div class="present-label">赠品</div>';
            }
            h += '<p>'+ orderitem.goods_class_name +'</p>';
            h += '</div>';
            return h;
        }
    },
    {
        title : '<span class="ns-line-hiding" title="单价/数量">单价/数量</span>',
        width : "11%",
        align : "right",
        className : "order-price",
        template : function(orderitem,order){
            // var h = '<div style="padding-right: 15px;">';
            // h += '<span class="ns-line-hiding" title="￥'+ orderitem.price + '\/' + orderitem.num +'">￥' + orderitem.price + '\/' + orderitem.num + '</span>';
            // h += '</div>';
            // return h;
			var h = '<div style="padding-right: 15px;">';
			h += '<div>';
			h += '<span>￥' + orderitem.price + '</span>';
			h += '</div>';
			h += '<div>';
			h += '<span>' + orderitem.num + '件</span>';
			h += '</div>';
			h += '</div>';
			return h;
        }
    },
    {
        title: '<span class="ns-line-hiding" >维权</span>',
        width: "10%",
        className: "order-price",
        template: function (orderitem, order) {
            var html = '';
            if (orderitem.refund_status_name != '') {
                html += '<br/><a href="' + ns.url("admin/refund/detail", {order_goods_id: orderitem.order_goods_id}) + '"  target="_blank" class="ns-text-color">' + orderitem.refund_status_name + '</a>&nbsp;&nbsp;';
            }
            return html;
        }
    },
    {
        title : '<p class="ns-line-hiding" title="实付金额">实付金额</p>',
        width : "11%",
        className : "order-money",
        merge : true,
        template : function(orderitem,order){
            var h = '<div style="padding-right: 15px;">';
            h += '<div class="ns-line-hiding" title="￥'+ order.order_money +'" style="width:160px;text-align:left;">￥' + order.order_money + '</div>';
            h += '<div style="margin-top:10px;width:160px;text-align:left;">店铺结算：￥'+(parseFloat(order.shop_money)-parseFloat(order.refund_shop_money)-parseFloat(order.commission)+parseFloat(order.platform_coupon_money)-parseFloat(order.refund_platform_coupon_money)).toFixed(2)+'</div>';
            h += '<div style="width:160px;text-align:left;">平台结算：￥'+(parseFloat(order.platform_money)-parseFloat(order.refund_platform_money)).toFixed(2)+'</div>';
            h += '</div>';
            return h;
        }
    },
    {
        title : '<span class="ns-line-hiding" title="买家/收货人">买家/收货人</span>',
        width : "12%",
        align : "left",
        className : "buyers",
        merge : true,
        template : function(orderitem,order){
            var h = '<p>';
            h += '<a class="ns-text-color" target="_blank" href="' + ns.url("admin/member/editmember?member_id=") + order.member_id + '">' + order.nickname + '</a>';
            h += '</p>';
            h += '<p>';
            h += '<span class="ns-line-hiding" title="'+ order.mobile +'">' + order.mobile + '</span>';
            h += '</p>';
            if(order.order_type != 4){
                // h += '<p>';
                h += '<span href="javascript:;" class="ns-line-hidings" title="'+ order.name +'">' + order.name + ' </span>';
                // h += '</p>';
                h += '<span class="ns-line-hiding" title="' + order.full_address + order.address + '">' + order.full_address + order.address + '</span>';
            }
            return h;
        }
    },
    {
        title : '<span class="ns-line-hiding" title="商家名称">商家名称</span>',
        width : "10%",
        align : "center",
        className : "shop-info",
        merge : true,
        template : function(orderitem,order){
            var h = '<div>';
            h += '<span class="ns-line-hiding" title="'+ order.site_name +'">' + order.site_name + '</span>';
            h += '</div>';
            return h;
        }
    },
    {
        title : '<span class="ns-line-hiding" title="交易状态">交易状态</span>',
        width : "11%",
        align : "center",
        className : "transaction-status",
        merge : true,
        template : function(orderitem,order){
            var html = '<div>' + order.order_status_name + '</div>';
            html += '<div>' + order.promotion_type_name;
            html += order.promotion_status_name != '' ? '(' + order.promotion_status_name + ')' : '';
            html += '</div>';
            return html;
        }
    },
    {
        title : '<span class="ns-line-hiding" >操作</span>',
        width : "9%",
        align : "left",
        className : "operation",
        merge : true,
        template : function(orderitem,order){
            var url = "admin/order/detail";
            var html = '<div class="ns-table-btn">';
            html += '<a href="'+ns.url(url,{order_id:order.order_id})+'" class="layui-btn ns-line-hiding" target="_blank">查看详情</a>';//默认存在
			html += '</div>';
            return html;

        }
    }
];

/**
 * 渲染表头
 */
Order.prototype.header = function(){
    var colgroup = '<colgroup>';
    var thead = '<thead><tr>';
    for(var i=0;i<this.cols.length;i++){
        var align = this.cols[i].align ? "text-align:" + this.cols[i].align : "";
        colgroup += '<col width="' + this.cols[i].width + '">';
        thead += '<th style="' + align + '" class="' + (this.cols[i].className || "") + '">';
        thead += '<div class="layui-table-cell">' + this.cols[i].title + '</div>';
        thead += '</th>';
    }
    colgroup += '</colgroup>';
    thead += '</tr></thead>';
    return colgroup + thead;
};

/**
 * 渲染内容
 */
Order.prototype.tbody = function(){

    var tbody = '<tbody>';
    for(var i=0;i<this.data.list.length;i++){

        var order = this.data.list[i];
        var orderitemList = order.order_goods;
        var pay_type_name = order.pay_type_name != '' ? order.pay_type_name : "";
        //分割行
        tbody += '<tr class="separation-row">';
        tbody += '<td colspan="' + this.cols.length + '"></td>';
        tbody += '</tr>';

        //订单项头部

        tbody += '<tr class="header-row">';
        tbody += '<td colspan="8">';
        tbody += '<span class="order-item-header" style="margin-right:50px;">订单号：' + order.order_no + '</span>';
		tbody += '<span class="order-item-header" style="margin-right:50px;">下单时间：' + ns.time_to_date(order.create_time) + '</span>';
        if(pay_type_name) tbody += '<span class="order-item-header">支付方式：' + pay_type_name + '</span>';
        tbody += '</td>';
        tbody += '</tr>';

        var orderitemHtml = '';
		loadImgMagnify();
        for(var j=0;j<orderitemList.length;j++){

            var orderitem = orderitemList[j];
            orderitemHtml += '<tr class="content-row">';
            for(var k=0;k<this.cols.length;k++){

                if(j == 0 && this.cols[k].merge && this.cols[k].template){

                    orderitemHtml += '<td class="' + (this.cols[k].className || "") + '" align="' + (this.cols[k].align || "") + '" style="' + (this.cols[k].style || "") + '" rowspan="' + orderitemList.length + '">';
                    orderitemHtml += this.cols[k].template(orderitem,order);
                    orderitemHtml += '</td>';

                }else if(this.cols[k].template && !this.cols[k].merge){

                    orderitemHtml += '<td class="' + (this.cols[k].className || "") + '" align="' + (this.cols[k].align || "") + '" style="' + (this.cols[k].style || "") + '">';
                    orderitemHtml += this.cols[k].template(orderitem,order);
                    orderitemHtml += '</td>';

                }
            }
            orderitemHtml += '</tr>';
        }
        tbody += orderitemHtml;

        if (order.remark != '') {
            tbody += '<tr class="remark-row">';
            tbody += '<td colspan="' + this.cols.length + '">卖家备注：' + order.remark + '</td>';
            tbody += '</tr>';
        }
    }

    tbody += '</tbody>';
    return tbody;
};

/**
 * 渲染表格
 */
Order.prototype.fetch = function(){
    if(this.data.list.length > 0){
        return '<table class="layui-table order-list-table layui-form">' + this.header() + this.tbody() + '</table>';
    }else{
        return '<table class="layui-table order-list-table layui-form">' + this.header() + '</table>'+'<div class="order-no-data-block"><ul><li><i class="layui-icon layui-icon-tabs"></i> </li><li>暂无订单</li></ul></div>';
    }
};