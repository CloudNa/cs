

-- 增大配置表value字段的大小
ALTER TABLE `config` MODIFY COLUMN `value` varchar(20000)  NOT NULL DEFAULT '' COMMENT '配置值json';

-- 商品表增加会员等级折扣设置
ALTER TABLE `goods` ADD COLUMN `is_consume_discount` tinyint(1) NOT NULL DEFAULT 0 COMMENT '是否参与会员等级折扣';
ALTER TABLE `goods` ADD COLUMN `member_price` varchar(255)  NOT NULL DEFAULT '' COMMENT '会员价';

-- 商品采集
CREATE TABLE `goods_grab`  (
  `grab_id` int(11) NOT NULL AUTO_INCREMENT,
  `site_id` int(11) NOT NULL DEFAULT 0,
  `is_virtual` tinyint(1) NOT NULL DEFAULT 0 COMMENT '商品类型（0实物1.虚拟）',
  `category_id` varchar(255) NOT NULL DEFAULT '' COMMENT '商品分类',
  `category_name` varchar(255)  NOT NULL DEFAULT '' COMMENT '商品分类名称',
  `total_num` int(11) NOT NULL DEFAULT 0 COMMENT '采集数',
  `success_num` int(11) NOT NULL DEFAULT 0 COMMENT '成功数',
  `error_num` int(11) NOT NULL DEFAULT 0 COMMENT '失败数',
  `create_time` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`grab_id`) USING BTREE
) ENGINE = InnoDB COMMENT = '商品采集' ROW_FORMAT = Compact;

CREATE TABLE `goods_grab_detail`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `site_id` int(11) NOT NULL DEFAULT 0,
  `grab_id` int(11) NOT NULL DEFAULT 0,
  `url` varchar(255)  NOT NULL DEFAULT '' COMMENT '采集地址',
  `type` varchar(255)  DEFAULT '' COMMENT '采集平台',
  `type_name` varchar(255)  NOT NULL DEFAULT '' COMMENT '采集平台名称',
  `reason` varchar(255)  NOT NULL DEFAULT '' COMMENT '失败原因',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '状态（1成功  2失败）',
  PRIMARY KEY (`id`) USING BTREE
  
) ENGINE = InnoDB COMMENT = '采集明细' ROW_FORMAT = Compact;

-- 商品或sku表增加会员等级折扣设置
ALTER TABLE `goods_sku` ADD COLUMN `is_consume_discount` tinyint(1) NOT NULL DEFAULT 0 COMMENT '是否参与会员等级折扣';
ALTER TABLE `goods_sku` ADD COLUMN `member_price` varchar(255)  NOT NULL DEFAULT '' COMMENT '会员价';

-- 会员修改账号
ALTER TABLE `member` ADD COLUMN `is_edit_username` int(1) NOT NULL DEFAULT 1 COMMENT '是否能修改username   0-不可修改  1-可以修改';

-- 会员等级权益

ALTER TABLE `member_level` ADD COLUMN `is_free_shipping` tinyint(1) NOT NULL DEFAULT 0 COMMENT '是否包邮';
ALTER TABLE `member_level` ADD COLUMN `consume_discount` decimal(10, 2) NOT NULL DEFAULT 100.00 COMMENT '消费折扣';
ALTER TABLE `member_level` ADD COLUMN `point_feedback` decimal(10, 2) NOT NULL DEFAULT 0.00 COMMENT '积分回馈倍率';
ALTER TABLE `member_level` ADD COLUMN `send_point` int(11) NOT NULL DEFAULT 0 COMMENT '赠送积分（等级礼包）';
ALTER TABLE `member_level` ADD COLUMN `send_balance` decimal(10, 2) NOT NULL DEFAULT 0.00 COMMENT '赠送红包（等级礼包）';
ALTER TABLE `member_level` ADD COLUMN `send_coupon` varchar(255)  NOT NULL DEFAULT '' COMMENT '赠送优惠券';
ALTER TABLE `member_level` ADD COLUMN `level_type` int(1) NOT NULL DEFAULT 0 COMMENT '等级类型 0免费卡 1付费卡';
ALTER TABLE `member_level` ADD COLUMN `charge_rule` text  NOT NULL COMMENT '付费规则';
ALTER TABLE `member_level` ADD COLUMN `charge_type` int(1) NOT NULL COMMENT '付费类型 0付款 1充值';
ALTER TABLE `member_level` ADD COLUMN `bg_color` varchar(255)  NOT NULL DEFAULT '#333';
ALTER TABLE `member_level` ADD COLUMN `status` int(1) NOT NULL DEFAULT 1 COMMENT '状态 0已下架 1发售中';
ALTER TABLE `member_level` ADD COLUMN `is_recommend` int(1) NOT NULL DEFAULT 0 COMMENT '是否推荐';

-- 订单日志
ALTER TABLE `order_log` MODIFY COLUMN `action_way` varchar(255) NOT NULL DEFAULT '0';
-- 维权订单日志
ALTER TABLE `order_refund_log` MODIFY COLUMN `action_way` varchar(255) NOT NULL DEFAULT '0';

-- 会员充值
ALTER TABLE `member_recharge_order` MODIFY COLUMN `price` decimal(11, 2) NOT NULL COMMENT '实付金额';
-- 将原来的所有的price都设置为buy_price
UPDATE `member_recharge_order` SET price = buy_price;

-- 消息模板
ALTER TABLE `message` ADD COLUMN `sitemessage_is_open` int(11) NOT NULL DEFAULT 0 COMMENT '站内信是否启动';
ALTER TABLE `message` ADD COLUMN `sitemessage_json` varchar(255)  NOT NULL DEFAULT '' COMMENT '站内信配置参数';

-- 设置消息模板
UPDATE `message` SET support_type = concat(support_type, ",sitemessage"),sitemessage_is_open = 0,sitemessage_json = '{"content":"尊敬的{username}，您的订单已创建，订单号{orderno}。"}' where keywords = 'ORDER_CREATE';
UPDATE `message` SET support_type = concat(support_type, ",sitemessage"),sitemessage_is_open = 0,sitemessage_json = '{"content":"尊敬的{username}，您的订单已创建，订单号{orderno}。"}'  where keywords = 'ORDER_CLOSE';
UPDATE `message` SET support_type = concat(support_type, ",sitemessage"),sitemessage_is_open = 0,sitemessage_json = '{"content":"尊敬的{username}，您的订单已创建，订单号{orderno}。"}'  where keywords = 'ORDER_COMPLETE';

UPDATE `message` SET sitemessage_is_open = 0,sitemessage_json = '{"content":"尊敬的{username}，你的订单号为{orderno}的订单已成功支付,支付金额{ordermoney}"}',weapp_json = '{"tid":"6271","kidList":[7,1,4,3],"content":"下单时间{{time7.DATA}}\n订单编号{{character_string1.DATA}}\n商品名称{{thing4.DATA}}\n订单金额{{amount3.DATA}}","sceneDesc":"订单完成通知","weapp_template_id":""}',weapp_is_open = 0,support_type = concat(support_type, ",weapp,sitemessage") where keywords = 'ORDER_PAY';
UPDATE `message` SET sitemessage_is_open = 0,sitemessage_json = '{"content":"尊敬的{username}，您的订单已发货，订单号{orderno}。"}',weapp_json = '{"tid":"3637","kidList":[2,1,7,3],"content":"订单号{{character_string2.DATA}}\n商品名称{{thing1.DATA}}\n订单金额{{amount7.DATA}}\n发货时间{{date3.DATA}}","sceneDesc":"订单发货通知","weapp_template_id":""}',weapp_is_open = 0,support_type = concat(support_type, ",weapp,sitemessage")  where keywords = 'ORDER_DELIVERY';
UPDATE `message` SET sitemessage_is_open = 0,sitemessage_json = '{"content":"尊敬的{username}，您的订单{orderno}，收货成功。"}',weapp_json = '{"tid":"12340","kidList":[9,1,2,7],"content":"确认收货人{{thing9.DATA}}\n订单号{{character_string1.DATA}}\n商品名称{{thing2.DATA}}\n收货时间{{time7.DATA}}","sceneDesc":"订单收货通知","weapp_template_id":""}',weapp_is_open = 0,support_type = concat(support_type, ",weapp,sitemessage")  where keywords = 'ORDER_TAKE_DELIVERY';
UPDATE `message` SET sitemessage_is_open = 0,sitemessage_json = '{"content":"尊敬的{username}，您的订单{orderno}，商家同意退款。"}',weapp_json = '{"tid":"6964","kidList":[3,1,7],"content":"订单编号{{character_string3.DATA}}\n退款金额{{amount1.DATA}}\n申请结果{{phrase7.DATA}}","sceneDesc":"商家同意退款","weapp_template_id":""}',weapp_is_open = 0,support_type = concat(support_type, ",weapp,sitemessage")  where keywords = 'ORDER_REFUND_AGREE';
UPDATE `message` SET sitemessage_is_open = 0,sitemessage_json = '{"content":"尊敬的{username}，您的订单{orderno}，商家拒绝退款。"}',weapp_json = '{"tid":"6952","kidList":[4,3],"content":"订单号{{character_string4.DATA}}\n退款金额{{amount3.DATA}}","sceneDesc":"商家同意退款","weapp_template_id":""}',weapp_is_open = 0,support_type = concat(support_type, ",weapp,sitemessage")  where keywords = 'ORDER_REFUND_REFUSE';
UPDATE `message` SET sitemessage_is_open = 0,sitemessage_json = '{"content":"尊敬的{username}，您申请的{money}余额，已提现成功。"}',weapp_json = '{"tid":"5184","kidList":[6,3],"content":"提现金额{{amount6.DATA}}\n提现时间{{date3.DATA}}","sceneDesc":"会员提现成功通知","weapp_template_id":""}',weapp_is_open = 0,support_type = concat(support_type, ",weapp,sitemessage")  where keywords = 'USER_WITHDRAWAL_SUCCESS';
UPDATE `message` SET weapp_json = '{"tid":"6699","kidList":[1,2,3],"content":"提现金额{{amount1.DATA}}\n提现时间{{time2.DATA}}\n备注{{thing3.DATA}}","sceneDesc":"会员申请提现通知","weapp_template_id":""}',weapp_is_open = 0,support_type = concat(support_type, ",weapp")  where keywords = 'FENXIAO_WITHDRAWAL_SUCCESS';
UPDATE `message` SET weapp_json = '{"tid":"18547","kidList":[2,4],"content":"提现金额{{amount2.DATA}}\n提现进度{{thing4.DATA}}","sceneDesc":"分销提现失败通知","weapp_template_id":""}',weapp_is_open = 0,support_type = concat(support_type, ",weapp")  where keywords = 'FENXIAO_WITHDRAWAL_ERROR';
INSERT INTO `message`(`addon`, `keywords`, `title`, `message_type`, `message_json`, `email_is_open`, `email_title`, `email_content`, `sms_is_open`, `sms_addon`, `sms_json`, `sms_content`, `wechat_is_open`, `wechat_json`, `weapp_is_open`, `weapp_json`, `aliapp_is_open`, `aliapp_json`, `sitemessage_is_open`, `sitemessage_json`, `support_type`) VALUES ('', 'RECHARGE_SUCCESS', '会员充值成功通知', 1, '{\"username\":\"会员名称\",\"money\":\"提现金额\"}', 0, '充值成功提醒', '<p>尊敬的{会员名称}，您的账户充值{充值金额}。</p>', 0, '', '{\"alisms\":{\"template_id\":\"\",\"content\":\"尊敬的{username}，您好！您在{create_time}成功充值余额{money}元。\",\"smssign\":\"\"}}', '', 0, '', 0, '', 0, '', 0, '{\"content\":\"\尊\敬\的{username}，\您\好！\您\在{create_time}\成\功\充\值\余\额{money}\元。\"}', 'sms,email,sitemessage');


-- 牛云短信模板
INSERT INTO `sms_template`(`tem_id`, `keywords`, `template_type`, `template_name`, `template_content`, `param_json`, `status`, `audit_status`, `create_time`, `update_time`) VALUES (0, 'RECHARGE_SUCCESS', 2, '余额充值', '尊敬的{username}，您好！您成功充值余额{money}元。', '{\"username\":\"others\",\"money\":\"amount\"}', 0, 0, 0, 1620814518);

-- 订单表增加字段
ALTER TABLE `order` ADD COLUMN `invoice_status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '发票状态（0待开票   1已开票）';
ALTER TABLE `order` ADD COLUMN `invoice_remark` text  COMMENT '发票备注';
ALTER TABLE `order` ADD COLUMN `invoice_code` varchar(255)  NOT NULL DEFAULT '' COMMENT '发票编码';
ALTER TABLE `order` ADD COLUMN `invoice_image` varchar(255)  NOT NULL DEFAULT '' COMMENT '发票凭证';
ALTER TABLE `order` ADD COLUMN `invoice_time` int(11) NOT NULL DEFAULT 0 COMMENT '开票时间';
ALTER TABLE `order` ADD COLUMN `is_fenxiao` tinyint(1) NOT NULL DEFAULT 0 COMMENT '是否参与分销 0不参与 1参与';
ALTER TABLE `order` ADD COLUMN `predict_delivery_time` int(11) NOT NULL DEFAULT 0 COMMENT '预计发货时间';
ALTER TABLE `order` ADD COLUMN `is_video_number` int(1) NOT NULL DEFAULT 0 COMMENT '订单是否同步到视频号';

-- 订单到处记录表
ALTER TABLE `order_export` ADD COLUMN `app_module` varchar(255) NOT NULL DEFAULT 'shop' COMMENT '应用模块';

-- 限制领取数量
ALTER TABLE `promotion_coupon_type` ADD COLUMN `is_limitcount` tinyint(1) UNSIGNED NOT NULL DEFAULT 0 COMMENT '是否限制领取数量,0限制，1无限制';

-- 增加了领取方式
ALTER TABLE `promotion_platformcoupon` MODIFY COLUMN `get_type` int(11) NOT NULL DEFAULT 0 COMMENT '获取方式1订单2.直接领取3.活动领取4.系统发放5.用户操作奖励6.会员级别升级送优惠券';

-- 增大自定义模板的大小
ALTER TABLE `site_diy_view` MODIFY COLUMN `value` longtext COMMENT '配置值';

-- 预售
CREATE TABLE `promotion_presale`  (
  `presale_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `presale_name` varchar(50)  NOT NULL DEFAULT '' COMMENT '预售活动名称',
  `site_id` int(11) NOT NULL DEFAULT 0 COMMENT '站点id',
  `site_name` varchar(255)  NOT NULL COMMENT '所属店铺名称',
  `goods_id` int(11) NOT NULL DEFAULT 0 COMMENT '商品id',
  `presale_stock` int(11) NOT NULL DEFAULT 0 COMMENT '预售总库存',
  `presale_num` int(11) NOT NULL DEFAULT 0 COMMENT '限购',
  `start_time` int(11) NOT NULL DEFAULT 0 COMMENT '定金开始时间',
  `end_time` int(11) NOT NULL DEFAULT 0 COMMENT '定金结束时间',
  `pay_start_time` int(11) NOT NULL DEFAULT 0 COMMENT '尾款支付时间',
  `pay_end_time` int(11) NOT NULL DEFAULT 0 COMMENT '尾款结束时间',
  `deliver_type` tinyint(1) NOT NULL DEFAULT 0 COMMENT '发货方式（0固定时间   1尾款支付后N天）',
  `deliver_time` int(11) NOT NULL DEFAULT 0 COMMENT '发货时间',
  `is_fenxiao` tinyint(1) NOT NULL DEFAULT 0 COMMENT '是否参与分销（0不参与  1参与）',
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '状态（0未开始 1活动进行中  2活动已结束  3失效  4删除）',
  `status_name` varchar(20)  NOT NULL DEFAULT '' COMMENT '状态名称',
  `sale_num` int(11) NOT NULL DEFAULT 0 COMMENT '销量',
  `create_time` int(11) NOT NULL DEFAULT 0,
  `update_time` int(11) NOT NULL DEFAULT 0,
  `presale_deposit` decimal(10, 2) NOT NULL DEFAULT 0.00 COMMENT '预售定金',
  `presale_price` decimal(10, 2) NOT NULL DEFAULT 0.00 COMMENT '抵扣金额',
  `sku_id` int(11) NOT NULL DEFAULT 0,
  `is_deposit_back` tinyint(1) NOT NULL DEFAULT 0 COMMENT '是否退定金是0 否1',
  `modify_time` int(11) NOT NULL DEFAULT 0 COMMENT '修改时间',
  `deposit_agreement` text  COMMENT '定金协议',
  `remark` text  COMMENT '活动规则说明',
  PRIMARY KEY (`presale_id`) USING BTREE
) ENGINE = InnoDB COMMENT = '商品预售' ROW_FORMAT = Compact;

CREATE TABLE `promotion_presale_goods`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `presale_id` int(11) NOT NULL DEFAULT 0,
  `site_id` int(11) NOT NULL DEFAULT 0,
  `goods_id` int(11) NOT NULL DEFAULT 0,
  `sku_id` int(11) NOT NULL DEFAULT 0,
  `presale_stock` int(11) NOT NULL DEFAULT 0 COMMENT '预售库存',
  `presale_deposit` decimal(10, 2) NOT NULL DEFAULT 0.00 COMMENT '预售定金',
  `presale_price` decimal(10, 2) NOT NULL DEFAULT 0.00 COMMENT '抵扣金额',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB ROW_FORMAT = Compact;

CREATE TABLE `promotion_presale_order`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `site_id` int(11) NOT NULL DEFAULT 0 COMMENT '站点id',
  `site_name` varchar(255)  NOT NULL DEFAULT '' COMMENT '站点名称',
  `presale_id` int(11) NOT NULL DEFAULT 0 COMMENT '预售id',
  `order_no` varchar(255)  NOT NULL DEFAULT '' COMMENT '订单编号',
  `deposit_out_trade_no` varchar(255)  NOT NULL DEFAULT '' COMMENT '定金支付流水号',
  `final_out_trade_no` varchar(255)  NOT NULL DEFAULT '' COMMENT '尾款支付流水号',
  `order_from` varchar(55)  NOT NULL DEFAULT '' COMMENT '订单来源',
  `order_from_name` varchar(50)  NOT NULL DEFAULT '' COMMENT '订单来源名称',
  `order_type` int(11) NOT NULL DEFAULT 0 COMMENT '订单类型 1. 普通订单  2. 门店订单  3. 本地配送订单4. 虚拟订单',
  `order_type_name` varchar(50)  NOT NULL DEFAULT '' COMMENT '订单类型名称',
  `pay_start_time` int(11) NOT NULL DEFAULT 0 COMMENT '尾款支付开始时间',
  `pay_end_time` int(11) NOT NULL DEFAULT 0 COMMENT '尾款支付结束时间',
  `is_fenxiao` int(1) NOT NULL DEFAULT 0 COMMENT '是否参与分销 0不参与 1参与',
  `goods_id` int(11) NOT NULL DEFAULT 0 COMMENT '商品id',
  `goods_name` varchar(400)  NOT NULL DEFAULT '' COMMENT '商品名称',
  `sku_id` int(11) NOT NULL DEFAULT 0 COMMENT '商品skuid',
  `sku_name` varchar(500)  NOT NULL DEFAULT '' COMMENT '商品名称',
  `sku_image` varchar(255)  NOT NULL DEFAULT '' COMMENT '商品图片',
  `sku_no` varchar(10)  NOT NULL DEFAULT '' COMMENT '商品编码',
  `is_virtual` int(11) NOT NULL DEFAULT 0 COMMENT '是否是虚拟商品',
  `goods_class` int(11) NOT NULL DEFAULT 0 COMMENT '商品种类(1.实物 2.虚拟3.卡券)',
  `goods_class_name` varchar(50)  NOT NULL DEFAULT '' COMMENT '商品类型名称',
  `cost_price` decimal(10, 2) NOT NULL DEFAULT 0.00 COMMENT '成本价',
  `sku_spec_format` varchar(1000)  NOT NULL DEFAULT '' COMMENT 'sku规格格式',
  `member_id` int(11) NOT NULL DEFAULT 0 COMMENT '购买人uid',
  `name` varchar(50)  NOT NULL DEFAULT '' COMMENT '购买人姓名',
  `mobile` varchar(11)  NOT NULL DEFAULT '' COMMENT '购买人手机',
  `telephone` varchar(20)  NOT NULL DEFAULT '' COMMENT '购买人固定电话',
  `province_id` int(11) NOT NULL DEFAULT 0 COMMENT '购买人省id',
  `city_id` int(11) NOT NULL DEFAULT 0 COMMENT '购买人市id',
  `district_id` int(11) NOT NULL DEFAULT 0 COMMENT '购买人区县id',
  `community_id` int(11) NOT NULL DEFAULT 0 COMMENT '购买人社区id',
  `address` varchar(255)  NOT NULL DEFAULT '' COMMENT '购买人地址',
  `full_address` varchar(255)  NOT NULL DEFAULT '' COMMENT '购买人详细地址',
  `longitude` varchar(10)  NOT NULL DEFAULT '' COMMENT '购买人地址经度',
  `latitude` varchar(10)  NOT NULL DEFAULT '' COMMENT '购买人地址纬度',
  `buyer_ip` varchar(20)  NOT NULL DEFAULT '' COMMENT '购买人ip',
  `buyer_ask_delivery_time` int(11) NOT NULL DEFAULT 0 COMMENT '购买人要求配送时间',
  `buyer_message` varchar(50)  NOT NULL DEFAULT '' COMMENT '购买人留言信息',
  `num` int(11) NOT NULL DEFAULT 0 COMMENT '购买数量',
  `presale_deposit` decimal(10, 2) NOT NULL DEFAULT 0.00 COMMENT '预售定金单价',
  `presale_deposit_money` decimal(10, 2) NOT NULL DEFAULT 0.00 COMMENT '定金总额',
  `presale_price` decimal(10, 2) NOT NULL DEFAULT 0.00 COMMENT '抵扣金额单价',
  `presale_money` decimal(10, 2) UNSIGNED NOT NULL DEFAULT 0.00 COMMENT '抵扣总额',
  `price` decimal(10, 2) NOT NULL DEFAULT 0.00 COMMENT '商品单价',
  `goods_money` decimal(10, 2) NOT NULL DEFAULT 0.00 COMMENT '商品总额',
  `balance_deposit_money` decimal(10, 2) NOT NULL DEFAULT 0.00 COMMENT '余额支付定金金额',
  `pay_deposit_money` decimal(10, 2) NOT NULL DEFAULT 0.00 COMMENT '现金支付定金金额',
  `delivery_money` decimal(10, 2) NOT NULL DEFAULT 0.00 COMMENT '配送金额',
  `promotion_money` decimal(10, 2) NOT NULL DEFAULT 0.00 COMMENT '订单优惠金额',
  `coupon_id` int(11) NOT NULL DEFAULT 0 COMMENT '优惠券id',
  `coupon_money` decimal(10, 2) NOT NULL DEFAULT 0.00 COMMENT '优惠券金额',
  `invoice_money` decimal(10, 2) NOT NULL DEFAULT 0.00 COMMENT '发票金额',
  `order_money` decimal(10, 2) NOT NULL DEFAULT 0.00 COMMENT '订单金额',
  `final_money` decimal(10, 2) NOT NULL DEFAULT 0.00 COMMENT '尾款总额',
  `balance_final_money` decimal(10, 2) NOT NULL DEFAULT 0.00 COMMENT '余额支付尾款金额',
  `pay_final_money` decimal(10, 2) NOT NULL DEFAULT 0.00 COMMENT '现金支付尾款金额',
  `pay_deposit_time` int(11) NOT NULL DEFAULT 0 COMMENT '定金支付时间',
  `deposit_pay_type` varchar(55)  NOT NULL DEFAULT '' COMMENT '定金支付方式',
  `deposit_pay_type_name` varchar(50)  NOT NULL DEFAULT '' COMMENT '定金支付类型名称',
  `pay_final_time` int(11) NOT NULL DEFAULT 0 COMMENT '尾款支付时间',
  `final_pay_type` varchar(55)  NOT NULL DEFAULT '' COMMENT '尾款支付方式',
  `final_pay_type_name` varchar(50)  NOT NULL DEFAULT '' COMMENT '尾款支付类型名称',
  `order_status` tinyint(3) NOT NULL DEFAULT 0 COMMENT '订单状态',
  `order_status_name` varchar(255)  NOT NULL DEFAULT '' COMMENT '状态名称',
  `order_status_action` varchar(1000)  NOT NULL DEFAULT '' COMMENT '订单操作',
  `deposit_refund_no` varchar(255)  NOT NULL DEFAULT '' COMMENT '定金退款流水号',
  `final_refund_no` varchar(255)  NOT NULL DEFAULT '' COMMENT '尾款退款流水号',
  `refund_money` decimal(10, 2) NOT NULL DEFAULT 0.00 COMMENT '退款金额',
  `refund_status` tinyint(3) NOT NULL DEFAULT 0 COMMENT '退款状态',
  `refund_status_name` varchar(255)  NOT NULL DEFAULT '' COMMENT '退款名称',
  `apply_refund_time` int(11) NOT NULL DEFAULT 0 COMMENT '申请退款时间',
  `refund_time` int(11) NOT NULL DEFAULT 0 COMMENT '审核时间',
  `refuse_reason` varchar(255)  NOT NULL DEFAULT '' COMMENT '拒绝原因',
  `delivery_type` varchar(50)  NOT NULL DEFAULT '0' COMMENT '配送方式',
  `delivery_type_name` varchar(50)  NOT NULL DEFAULT '' COMMENT '配送方式名称',
  `delivery_store_id` int(11) NOT NULL DEFAULT 0 COMMENT '门店id',
  `delivery_store_name` varchar(255)  NOT NULL DEFAULT '' COMMENT '门店名称',
  `delivery_store_info` varchar(255)  NOT NULL DEFAULT '' COMMENT '门店信息(json)',
  `is_invoice` int(11) NOT NULL DEFAULT 0 COMMENT '是否需要发票 0 无发票  1 有发票',
  `invoice_type` int(11) NOT NULL DEFAULT 1 COMMENT '发票类型  1 纸质发票 2 电子发票',
  `invoice_title` varchar(255)  NOT NULL DEFAULT '' COMMENT '发票抬头',
  `taxpayer_number` varchar(255)  NOT NULL DEFAULT '' COMMENT '纳税人识别号',
  `invoice_rate` decimal(10, 2) NOT NULL DEFAULT 0.00 COMMENT '发票税率',
  `invoice_content` varchar(255)  NOT NULL DEFAULT '' COMMENT '发票内容',
  `invoice_delivery_money` decimal(10, 2) NOT NULL DEFAULT 0.00 COMMENT '发票邮寄费用',
  `invoice_full_address` varchar(255)  NOT NULL DEFAULT '' COMMENT '发票邮寄地址',
  `is_tax_invoice` int(11) NOT NULL DEFAULT 0 COMMENT '是否需要增值税专用发票',
  `invoice_email` varchar(255)  NOT NULL DEFAULT '' COMMENT '发票发送邮件',
  `invoice_title_type` int(11) NOT NULL DEFAULT 0 COMMENT '发票抬头类型  1 个人  2 企业',
  `close_time` int(11) NOT NULL DEFAULT 0 COMMENT '订单关闭时间',
  `create_time` int(11) NOT NULL DEFAULT 0 COMMENT '订单创建时间',
  `predict_delivery_time` int(11) NOT NULL DEFAULT 0 COMMENT '预计发货时间',
  `is_deposit_back` int(11) NOT NULL DEFAULT 0 COMMENT '是否退定金是0 否1',
  `deposit_agreement` text  COMMENT '定金协议',
  `relate_order_id` int(11) NOT NULL DEFAULT 0 COMMENT '关联订单id',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB COMMENT = '预售定金表' ROW_FORMAT = Compact;

-- 客服

CREATE TABLE if not exists `servicer_dialogue` (
  id int(11) NOT NULL AUTO_INCREMENT COMMENT '数据ID',
  member_id int(11) NOT NULL DEFAULT 0 COMMENT '会员ID（匿名聊天则为0）',
  servicer_id int(11) NOT NULL COMMENT '客服ID',
  create_day date NOT NULL COMMENT '聊天创建日',
  create_time time NOT NULL COMMENT '聊天创建时间',
  add_time int(11) NOT NULL DEFAULT 0 COMMENT '创建时间戳',
  content_type tinyint(4) NOT NULL DEFAULT 0 COMMENT '内容类型（0文本1商品2订单3图片）',
  `read` tinyint(2) NOT NULL DEFAULT 0 COMMENT '消息是否已读',
  shop_id int(11) NOT NULL DEFAULT 0 COMMENT '商户ID',
  goods_sku_id int(11) NOT NULL DEFAULT 0 COMMENT '关联商品ID',
  order_id int(11) NOT NULL DEFAULT 0 COMMENT '关联订单ID',
  consumer_say text DEFAULT NULL COMMENT '顾客说',
  servicer_say text DEFAULT NULL COMMENT '客服说',
  type tinyint(2) NOT NULL DEFAULT 0 COMMENT '0: say,客户咨询，1：answer,客服回答',
  relate_data varchar(3000) NOT NULL DEFAULT '' COMMENT '相关数据 json格式',
  content text NOT NULL COMMENT '聊天内容',
  message text NOT NULL,
  PRIMARY KEY (id),
  KEY `index_create_day` (`create_day`) COMMENT '聊天日期索引'
)
ENGINE = INNODB,
AUTO_INCREMENT = 1,
CHARACTER SET utf8,
COLLATE utf8_general_ci,
COMMENT = '客服对话内容';


ALTER TABLE `servicer` MODIFY COLUMN `nickname` varchar(50)  NOT NULL DEFAULT '' COMMENT '客服昵称';
ALTER TABLE `servicer` MODIFY COLUMN `avatar` varchar(500)  NOT NULL DEFAULT '' COMMENT '客服头像';

-- 视频号
CREATE TABLE `shopcompoent_category`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `first_cat_id` int(11) NOT NULL DEFAULT 0 COMMENT '第一级类目ID',
  `second_cat_id` int(11) NOT NULL DEFAULT 0 COMMENT '第二级类目ID',
  `third_cat_id` int(11) NOT NULL DEFAULT 0 COMMENT '第三级类目ID',
  `first_cat_name` varchar(200)  NOT NULL DEFAULT '' COMMENT '一级类目名称',
  `second_cat_name` varchar(200)  NOT NULL DEFAULT '' COMMENT '二级类目名称',
  `third_cat_name` varchar(200)  NOT NULL DEFAULT '' COMMENT '三级类目名称',
  `qualification` varchar(2000)  NOT NULL DEFAULT '' COMMENT '类目资质',
  `qualification_type` int(1) NOT NULL DEFAULT 0 COMMENT '类目资质类型,0:不需要,1:必填,2:选填',
  `product_qualification_type` int(1) NOT NULL DEFAULT 0 COMMENT '商品资质类型,0:不需要,1:必填,2:选填',
  `product_qualification` varchar(2000)  NOT NULL DEFAULT '' COMMENT '商品资质',
  `create_time` int(11) NOT NULL DEFAULT 0 COMMENT '创建时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB COMMENT = '小程序交易组件类目表' ROW_FORMAT = Compact;

CREATE TABLE `shopcompoent_category_audit`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `site_id` int(11) NOT NULL DEFAULT 0 COMMENT '站点ID',
  `third_cat_id` int(11) NOT NULL DEFAULT 0 COMMENT '第三级类目ID',
  `certificate` varchar(2000)  NOT NULL DEFAULT '' COMMENT '类目资质材料',
  `qualification_pics` varchar(2000)  NOT NULL DEFAULT '' COMMENT '商品资质材料',
  `audit_id` varchar(2000)  NOT NULL DEFAULT '' COMMENT '审核ID',
  `audit_time` int(11) NOT NULL DEFAULT 0 COMMENT '审核时间',
  `status` int(1) NOT NULL DEFAULT 0 COMMENT '审核状态, 0：审核中，1：审核成功，9：审核拒绝',
  `reject_reason` varchar(2000)  NOT NULL DEFAULT '' COMMENT '拒绝原因',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB COMMENT = '小程序交易组件类目审核表' ROW_FORMAT = Compact;

CREATE TABLE `shopcompoent_goods`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `site_id` int(11) NOT NULL DEFAULT 0 COMMENT '站点ID',
  `out_product_id` int(11) NOT NULL DEFAULT 0 COMMENT '商家自定义商品ID',
  `third_cat_id` int(11) NOT NULL DEFAULT 0 COMMENT '第三级类目ID',
  `cat_name` varchar(1000)  NOT NULL DEFAULT '' COMMENT '类目名称',
  `brand_id` int(11) NOT NULL DEFAULT 0 COMMENT '品牌id',
  `product_id` int(11) NOT NULL DEFAULT 0 COMMENT '交易组件平台内部商品ID',
  `edit_status` int(11) NOT NULL DEFAULT 0 COMMENT '商品草稿状态, 0：初始值，1：编辑中，2：审核中，3：审核失败，4：审核成功',
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '商品线上状态, 0:初始值,5:上架,11:自主下架,13:违规下架/风控系统下架',
  `info_version` varchar(500)  NOT NULL DEFAULT '' COMMENT '预留字段，用于版本控制',
  `create_time` int(11) NOT NULL DEFAULT 0 COMMENT '创建时间',
  `update_time` int(11) NOT NULL DEFAULT 0 COMMENT '更新时间',
  `audit_time` int(100) NOT NULL DEFAULT 0 COMMENT '审核时间',
  `reject_reason` varchar(5000)  NOT NULL DEFAULT '' COMMENT '失败原因',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB COMMENT = '小程序交易组件商品表' ROW_FORMAT = Compact;

CREATE TABLE `shopcomponent_account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `site_id` int(11) NOT NULL DEFAULT '0' COMMENT '店铺id',
  `wx_username` varchar(255) NOT NULL DEFAULT '' COMMENT '微信号',
  `name` varchar(255) NOT NULL DEFAULT '' COMMENT '视频号名称',
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '状态 0 申请中  1已通过    -1 已拒绝  ',
  `refuse` varchar(255) NOT NULL DEFAULT '' COMMENT '拒绝理由',
  `create_time` int(11) NOT NULL DEFAULT '0',
  `update_time` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB COMMENT='视频号店铺微信号申请';

-- 站内信

CREATE TABLE `site_member_message`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `site_id` int(11) NOT NULL DEFAULT 0 COMMENT '站点id',
  `member_id` int(11) NOT NULL DEFAULT 0 COMMENT '会员id',
  `type` varchar(255)  NOT NULL DEFAULT '' COMMENT '站内信类型  service客服消息   group会员群发  system系统消息  ',
  `total_num` int(11) NOT NULL DEFAULT 0 COMMENT '消息数量',
  `is_seed` tinyint(1) NOT NULL DEFAULT 0 COMMENT '是否查看过 0未查看  1 已查看',
  `title` varchar(255)  NOT NULL DEFAULT '' COMMENT '标题  最后一条会重置标题',
  `content` varchar(2000)  NOT NULL DEFAULT '' COMMENT '缩略内容  最后一条会重置缩略内容',
  `is_top` tinyint(1) NOT NULL DEFAULT 0 COMMENT '是否置顶 0 无需置顶  1 置顶',
  `create_time` int(11) NOT NULL DEFAULT 0,
  `update_time` int(11) NOT NULL DEFAULT 0,
  `seed_time` int(11) NOT NULL DEFAULT 0 COMMENT '接收时间',
  `sub_type` varchar(255)  NOT NULL DEFAULT '' COMMENT '具体的业务类型',
  `seed_num` int(11) NOT NULL DEFAULT 0 COMMENT '已读数量',
  `is_delete` int(11) NOT NULL DEFAULT 0 COMMENT '是否被删除',
  `delete_time` int(11) NOT NULL DEFAULT 0 COMMENT '删除时间',
  `send_time` int(11) NOT NULL DEFAULT 0 COMMENT '送达时间',
  `remind_num` int(11) NOT NULL DEFAULT 0 COMMENT '提醒显示数量',
  `delete_num` int(11) NOT NULL DEFAULT 0 COMMENT '删除数量',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB COMMENT = '会员收到站内信的个人消息记录' ROW_FORMAT = Compact;

CREATE TABLE `site_member_sub_message`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `site_id` int(11) NOT NULL DEFAULT 0 COMMENT '站点id',
  `member_id` int(11) NOT NULL DEFAULT 0 COMMENT '会员id',
  `type` varchar(255)  NOT NULL DEFAULT '' COMMENT '站内信类型  service客服消息   group会员群发  system系统消息  ',
  `title` varchar(255)  NOT NULL DEFAULT '0' COMMENT '标题',
  `content` varchar(2000)  NOT NULL DEFAULT '0' COMMENT '内容',
  `message_json` varchar(2000)  NOT NULL DEFAULT '' COMMENT '消息内容',
  `event_type` varchar(255)  NOT NULL DEFAULT '' COMMENT '定义点击行为  跳转链接   固定跳转   公告(可以使富文本 也可能是是个公共的界面(占用文章))',
  `link` varchar(255)  NOT NULL DEFAULT '' COMMENT '跳转的链接 ',
  `create_time` int(11) NOT NULL DEFAULT 0,
  `update_time` int(11) NOT NULL DEFAULT 0,
  `records_id` int(11) NOT NULL DEFAULT 0 COMMENT '关联消息记录id',
  `is_seed` tinyint(1) NOT NULL DEFAULT 0 COMMENT '接收状态 0未接收 1 已接收',
  `seed_time` int(11) NOT NULL DEFAULT 0 COMMENT '接收时间',
  `scene` varchar(255)  NOT NULL DEFAULT '' COMMENT '场景',
  `sended_status` int(11) NOT NULL DEFAULT 0 COMMENT '送达状态 0未送达  1已送达',
  `sended_time` int(11) NOT NULL DEFAULT 0 COMMENT '送达时间',
  `text` longtext  NOT NULL COMMENT '消息页展示内容',
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '状态  0未送达  1已送达  2已接收',
  `json` varchar(2000)  NOT NULL DEFAULT '' COMMENT '附属内容',
  `is_delete` int(11) NOT NULL DEFAULT 0 COMMENT '是否被删除',
  `delete_time` int(11) NOT NULL DEFAULT 0 COMMENT '删除时间',
  `image` varchar(255)  NOT NULL DEFAULT '' COMMENT '导航图',
  `sub_type` varchar(255)  NOT NULL DEFAULT '' COMMENT '次级业务类型',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB COMMENT = '会员收到站内信的个人消息副表' ROW_FORMAT = Compact;

CREATE TABLE `site_message_records`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `site_id` int(11) NOT NULL DEFAULT 0 COMMENT '站点id',
  `type` varchar(255)  NOT NULL DEFAULT '' COMMENT '站内信类型  service客服消息   group会员群发  system系统消息  ',
  `total_num` int(11) NOT NULL DEFAULT 0 COMMENT '消息数量',
  `title` varchar(255)  NOT NULL DEFAULT '' COMMENT '标题  最后一条会重置标题',
  `content` varchar(2000)  NOT NULL DEFAULT '' COMMENT '缩略内容  最后一条会重置缩略内容',
  `addon` varchar(255)  NOT NULL DEFAULT '' COMMENT '插件',
  `event_type` varchar(255)  NOT NULL DEFAULT '' COMMENT '定义点击事件',
  `scene` varchar(255)  NOT NULL DEFAULT '' COMMENT '限制使用场景 h5  移动手机端  pc  pc电脑端  applet  小程序  如果为空的话为全场景',
  `json` varchar(255)  NOT NULL DEFAULT '' COMMENT '附属信息  各自业务各自调用',
  `create_time` int(11) NOT NULL DEFAULT 0,
  `update_time` int(11) NOT NULL DEFAULT 0,
  `is_timing` tinyint(1) NOT NULL DEFAULT 0 COMMENT '是否定时 0 立即发送 1已经发送 ',
  `timing` int(11) NOT NULL DEFAULT 0 COMMENT '定时',
  `message_json` varchar(2000)  NOT NULL DEFAULT '' COMMENT '消息数据json',
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '是否已发送 0 创建中  1 待发送  2 已发送  -1 已拒绝',
  `error_msg` varchar(255)  NOT NULL DEFAULT '' COMMENT '错误原因',
  `link` varchar(255)  NOT NULL DEFAULT '' COMMENT '链接',
  `text` longtext  NOT NULL COMMENT '消息也展示内容',
  `is_search` int(11) NOT NULL DEFAULT 0 COMMENT '是否参与筛选  0 不参与  1 参与筛选',
  `image` varchar(255)  NOT NULL DEFAULT '' COMMENT '导航图',
  `sub_type` varchar(255)  NOT NULL DEFAULT '' COMMENT '次级业务类型',
  `send_num` int(11) NOT NULL DEFAULT 0 COMMENT '已发送数量',
  `send_time` int(11) NOT NULL DEFAULT 0 COMMENT '发送时间',
  `seed_num` int(11) NOT NULL DEFAULT 0 COMMENT '已读数量',
  `delete_num` int(11) NOT NULL DEFAULT 0 COMMENT '删除消息数量',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB COMMENT = '站内信' ROW_FORMAT = Compact;

-- 直播新增字段
ALTER TABLE `weapp_live_room` ADD COLUMN `feeds_img` varchar(1000)  NOT NULL DEFAULT '' COMMENT '购物直播频道封面图';
ALTER TABLE `weapp_live_room` ADD COLUMN `close_replay` int(11) NOT NULL DEFAULT 0 COMMENT '是否开启回放';
ALTER TABLE `weapp_live_room` ADD COLUMN `close_share` int(11) NOT NULL DEFAULT 0 COMMENT '是否开启分享';
ALTER TABLE `weapp_live_room` ADD COLUMN `close_kf` int(11) NOT NULL DEFAULT 0 COMMENT '是否开启客服';

-- 默认添加广告位
INSERT INTO `adv_position`(`site_id`, `ap_name`, `ap_intro`, `ap_height`, `ap_width`, `default_content`, `ap_background_color`, `type`, `keyword`, `is_system`) VALUES (0, 'PC端注册页广告', '', 400, 1920, '', '#FFFFFF', 1, 'NS_PC_REGISTER', 0);
-- INSERT INTO `adv_position`(`site_id`, `ap_name`, `ap_intro`, `ap_height`, `ap_width`, `default_content`, `ap_background_color`, `type`, `keyword`, `is_system`) VALUES (0, 'PC端登录页广告', '', 400, 1920, '', '#ef9595', 1, 'NS_PC_LOGIN', 0);
INSERT INTO `adv_position`(`site_id`, `ap_name`, `ap_intro`, `ap_height`, `ap_width`, `default_content`, `ap_background_color`, `type`, `keyword`, `is_system`) VALUES (0, '预售专区广告', '', 400, 1920, '', '#FFFFFF', 2, 'NS_PRESALE', 0);

-- 添加默认广告位
SET @adv_ap_id = 0;

-- pc注册页广告位
select ap_id into @adv_ap_id  from adv_position  where keyword = 'NS_PC_REGISTER';
INSERT INTO `adv`(`site_id`, `ap_id`, `adv_title`, `adv_url`, `adv_image`, `slide_sort`, `price`, `background`) VALUES (0, @adv_ap_id, 'PC端注册页广告', '', 'upload/default/adv/default_reg.png', 0, 0.00, '#FFFFFF');

-- pc登录页广告位
select ap_id into @adv_ap_id  from adv_position  where keyword = 'NS_PC_LOGIN';
INSERT INTO `adv`(`site_id`, `ap_id`, `adv_title`, `adv_url`, `adv_image`, `slide_sort`, `price`, `background`) VALUES (0, @adv_ap_id, 'PC端登录页广告', '', 'upload/default/adv/default_reg.png', 0, 0.00, '#FFFFFF');

-- 预售专区广告
select ap_id into @adv_ap_id  from adv_position  where keyword = 'NS_PRESALE';
INSERT INTO `adv`(`site_id`, `ap_id`, `adv_title`, `adv_url`, `adv_image`, `slide_sort`, `price`, `background`) VALUES (0, @adv_ap_id, '预售专区广告', '', 'upload/default/diy_view/index_presale.png', 0, 0.00, '#FFFFFF');







