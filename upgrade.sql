

DROP TABLE IF EXISTS ns_message;
CREATE TABLE message (
  id int UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '主键',
  addon varchar(255) NOT NULL DEFAULT '' COMMENT '插件',
  keywords varchar(50) NOT NULL DEFAULT '' COMMENT '关键字',
  title varchar(255) NOT NULL DEFAULT '' COMMENT '主题',
  message_type int NOT NULL DEFAULT 1 COMMENT '消息类型 1 买家消息  2 卖家消息',
  message_json varchar(1000) NOT NULL DEFAULT '' COMMENT '配置参数',
  email_is_open int NOT NULL DEFAULT 0 COMMENT '是否启动邮箱',
  email_title varchar(50) NOT NULL DEFAULT '' COMMENT '邮箱标题',
  email_content varchar(1000) NOT NULL DEFAULT '' COMMENT '邮箱发送内容',
  sms_is_open int NOT NULL DEFAULT 0 COMMENT '是否启动短信',
  sms_addon varchar(255) NOT NULL DEFAULT '' COMMENT '发送短信插件',
  sms_json varchar(1000) NOT NULL DEFAULT '' COMMENT '短信配置参数',
  sms_content varchar(1000) NOT NULL DEFAULT '' COMMENT '短信内容',
  wechat_is_open int NOT NULL DEFAULT 0 COMMENT '微信公众号消息',
  wechat_json varchar(1000) NOT NULL DEFAULT '' COMMENT '配置参数',
  weapp_is_open int NOT NULL DEFAULT 0 COMMENT '微信小程序是否启动',
  weapp_json varchar(1000) NOT NULL DEFAULT '' COMMENT '微信小程序配置参数',
  aliapp_is_open int NOT NULL DEFAULT 0 COMMENT '支付宝小程序是否启动',
  aliapp_json varchar(1000) NOT NULL DEFAULT '' COMMENT '支付宝小程序配置参数',
  sitemessage_is_open int NOT NULL DEFAULT 0 COMMENT '站内信是否启动',
  sitemessage_json varchar(255) NOT NULL DEFAULT '' COMMENT '站内信配置参数',
  support_type varchar(255) NOT NULL DEFAULT '' COMMENT '支持场景 如小程序  wep端',
  PRIMARY KEY (id)
)
ENGINE = INNODB,
AUTO_INCREMENT = 41,
AVG_ROW_LENGTH = 712,
CHARACTER SET utf8,
COLLATE utf8_general_ci,
COMMENT = '消息管理';

INSERT INTO message VALUES
(5, '', 'ORDER_CREATE', '订单创建通知', 1, '{"orderno":"订单号","username":"会员名称"}', 1, '', '', 1, '', '{"alisms":{"template_id":"SMS_186948179","content":"\\u5c0a\\u656c\\u7684\\u4f1a\\u5458\\uff0c\\u60a8\\u7684\\u8ba2\\u5355\\u5df2\\u521b\\u5efa\\uff0c\\u8ba2\\u5355\\u53f7${orderno}\\u3002","smssign":""}}', '【{sitename}】,您的验证码{code},请不要泄露得1其他人', 1, '{"template_id_short":"OPENTM401874876","template_id":"fvFQhNEkfY1xK63DsyX3dTcBYMh2hiF8ArQ4kUjUL5g","headtext":"","bottomtext":"","headtextcolor":"#e73030","bottomtextcolor":"","content":"\\u8ba2\\u5355\\u53f7\\uff1a{{keyword1.DATA}}\\n\\u4e0b\\u5355\\u65f6\\u95f4\\uff1a{{keyword2.DATA}}\\n\\u4ea7\\u54c1\\u8be6\\u60c5\\uff1a{{keyword3.DATA}}\\n\\u9700\\u652f\\u4ed8\\u91d1\\u989d\\uff1a{{keyword4.DATA}}\\n\\u6536\\u8d27\\u8be6\\u60c5\\uff1a{{keyword5.DATA}}"}', 1, '', 0, '', 1, '{"content":"\\u5c0a\\u656c\\u7684{username}，\\u60a8\\u7684\\u8ba2\\u5355\\u5df2\\u521b\\u5efa，\\u8ba2\\u5355\\u53f7{orderno}。"}', 'sms,email,wechat,sitemessage'),
(6, '', 'ORDER_CLOSE', '订单关闭通知', 1, '{"orderno":"订单号"}', 1, '订单关闭', '<p>尊敬的会员，您的订单{订单号}，已关闭</p>', 0, '', '{"alisms":{"template_id":"SMS_186968030","content":"\\u5c0a\\u656c\\u7684\\u4f1a\\u5458\\uff0c\\u60a8\\u7684\\u8ba2\\u5355${orderno}\\uff0c\\u5df2\\u5173\\u95ed\\u3002","smssign":""}}', '', 1, '{"template_id_short":"OPENTM205543831","template_id":"9twWt8T5MfX57ekjLzcedSUBcnT-4JgU0kW8zKSHHB0","headtext":"","bottomtext":"","headtextcolor":"","bottomtextcolor":"","content":"\\u8ba2\\u5355\\u5546\\u54c1\\uff1a{{keyword1.DATA}}\\n\\u8ba2\\u5355\\u7f16\\u53f7\\uff1a{{keyword2.DATA}}\\n\\u4e0b\\u5355\\u65f6\\u95f4\\uff1a{{keyword3.DATA}}\\n\\u8ba2\\u5355\\u91d1\\u989d\\uff1a{{keyword4.DATA}}\\n\\u5173\\u95ed\\u65f6\\u95f4\\uff1a{{keyword5.DATA}}"}', 0, '', 0, '', 1, '{"content":"\\u5c0a\\u656c\\u7684{username}，\\u60a8\\u7684\\u8ba2\\u5355{orderno}，\\u5df2\\u5173\\u95ed。"}', 'sms,email,wechat,sitemessage'),
(7, '', 'ORDER_COMPLETE', '订单完成通知', 1, '{"orderno":"订单号"}', 0, '订单完成', '<p>尊敬的会员，您的订单{订单号}，交易成功</p>', 0, '', '{"alisms":{"template_id":"SMS_186943140","content":"\\u5c0a\\u656c\\u7684\\u4f1a\\u5458\\uff0c\\u60a8\\u7684\\u8ba2\\u5355${orderno}\\uff0c\\u4ea4\\u6613\\u6210\\u529f\\u3002","smssign":""}}', '', 1, '{"template_id_short":"OPENTM412034601","template_id":"pqHDJ-UvsRiXcnhbrXi7EXQeGw5QlQhLbnwMkHCH8HE","headtext":"您的订单已完成。","bottomtext":"详情请登录公众号查看。","headtextcolor":"#fe0000","bottomtextcolor":"#1f7af2","content":"订单单号：{{keyword1.DATA}}\\n订单商品：{{keyword2.DATA}}\\n下单时间：{{keyword3.DATA}}"}', 1, '', 0, '', 1, '{"content":"\\u5c0a\\u656c\\u7684{username}，\\u60a8\\u7684\\u8ba2\\u5355{orderno}，\\u4ea4\\u6613\\u6210\\u529f。"}', 'sms,email,wechat,sitemessage'),
(8, '', 'ORDER_PAY', '订单支付通知', 1, '{"orderno":"订单号","username":"会员名称","ordermoney":"订单金额"}', 0, '订单支付', '<p>亲爱的{会员名称},你的订单号为{订单号}的订单已成功支付,支付金额{订单金额}</p>', 0, '', '{"alisms":{"template_id":"SMS_166781181","content":"\\u4eb2\\u7231\\u7684${username},\\u4f60\\u7684\\u8ba2\\u5355\\u53f7\\u4e3a${orderno}\\u7684\\u8ba2\\u5355\\u5df2\\u6210\\u529f\\u652f\\u4ed8,\\u652f\\u4ed8\\u91d1\\u989d${ordermoney}","smssign":""}}', '', 1, '{"template_id_short":"OPENTM402074360","template_id":"CDdclx9Oz93xQrB1bmxe3P1PvPld9VoumWNH5PTAeTU","headtext":"","bottomtext":"","headtextcolor":"","bottomtextcolor":"","content":"下单时间：{{keyword1.DATA}}\\n订单编号：{{keyword2.DATA}}\\n商品信息：{{keyword3.DATA}}\\n订单金额：{{keyword4.DATA}}"}', 1, '{"tid":"6271","kidList":[7,1,4,3],"content":"\\u4e0b\\u5355\\u65f6\\u95f4{{time7.DATA}}\\n\\u8ba2\\u5355\\u7f16\\u53f7{{character_string1.DATA}}\\n\\u5546\\u54c1\\u540d\\u79f0{{thing4.DATA}}\\n\\u8ba2\\u5355\\u91d1\\u989d{{amount3.DATA}}","sceneDesc":"\\u8ba2\\u5355\\u5b8c\\u6210\\u901a\\u77e5","weapp_template_id":"a5SQDYeseK2tpbNkRUqqsi-rKjMBJAvlQrYA03QR9jw"}', 0, '', 1, '{"content":"\\u5c0a\\u656c\\u7684{username}，\\u4f60\\u7684\\u8ba2\\u5355\\u53f7\\u4e3a{orderno}\\u7684\\u8ba2\\u5355\\u5df2\\u6210\\u529f\\u652f\\u4ed8,\\u652f\\u4ed8\\u91d1\\u989d{ordermoney}"}', 'sms,email,wechat,weapp,sitemessage'),
(9, '', 'ORDER_DELIVERY', '订单发货通知', 1, '{"orderno":"订单号"}', 1, '', '', 0, '', '{"alisms":{"template_id":"SMS_186944266","content":"\\u5c0a\\u656c\\u7684\\u4f1a\\u5458\\uff0c\\u60a8\\u7684\\u8ba2\\u5355\\u5df2\\u53d1\\u8d27\\uff0c\\u8ba2\\u5355\\u53f7${orderno}\\u3002","smssign":""}}', '', 1, '{"template_id_short":"OPENTM406700005","template_id":"r2jq6QQdZSvDjleehv3zJq1gsLaXvhl_iO6bJD5kg8s","headtext":"","bottomtext":"","headtextcolor":"","bottomtextcolor":"","content":"\\u8ba2\\u5355\\u7f16\\u53f7\\uff1a{{keyword1.DATA}}\\n\\u5546\\u54c1\\u540d\\u79f0\\uff1a{{keyword2.DATA}}\\n\\u5546\\u54c1\\u4ef6\\u6570\\uff1a{{keyword3.DATA}}\\n\\u652f\\u4ed8\\u91d1\\u989d\\uff1a{{keyword4.DATA}}\\n\\u53d1\\u8d27\\u65f6\\u95f4\\uff1a{{keyword5.DATA}}"}', 1, '{"tid":"3637","kidList":[2,1,7,3],"content":"\\u8ba2\\u5355\\u53f7{{character_string2.DATA}}\\n\\u5546\\u54c1\\u540d\\u79f0{{thing1.DATA}}\\n\\u8ba2\\u5355\\u91d1\\u989d{{amount7.DATA}}\\n\\u53d1\\u8d27\\u65f6\\u95f4{{date3.DATA}}","sceneDesc":"\\u8ba2\\u5355\\u53d1\\u8d27\\u901a\\u77e5","weapp_template_id":"8uP5f9pB-4HzanpToDfxULrHy04N8RXRsF0tbmDifyM"}', 0, '', 1, '{"content":"\\u5c0a\\u656c\\u7684{username}，\\u60a8\\u7684\\u8ba2\\u5355\\u5df2\\u53d1\\u8d27，\\u8ba2\\u5355\\u53f7{orderno}。"}', 'sms,email,wechat,weapp,sitemessage'),
(10, '', 'ORDER_TAKE_DELIVERY', '订单收货通知', 1, '{"orderno":"订单号"}', 0, '订单收货成功', '<p>尊敬的会员，您的订单{订单号}，收货成功</p>', 1, '', '{"alisms":{"template_id":"SMS_186953019","content":"\\u5c0a\\u656c\\u7684\\u4f1a\\u5458\\uff0c\\u60a8\\u7684\\u8ba2\\u5355${orderno}\\uff0c\\u6536\\u8d27\\u6210\\u529f\\u3002","smssign":""}}', '', 1, '{"template_id_short":"OPENTM418052192","template_id":"VhiuUAogaEqtypVC6j-87e5PmYBvWhp9Ebns0NJY2aM","headtext":"","bottomtext":"","headtextcolor":"","bottomtextcolor":"","content":"收货地址：{{keyword1.DATA}}\\n联系人：{{keyword2.DATA}}\\n订单号：{{keyword3.DATA}}\\n订单详情：{{keyword4.DATA}}\\n操作时间：{{keyword5.DATA}}"}', 1, '{"tid":"12340","kidList":[9,1,2,7],"content":"\\u786e\\u8ba4\\u6536\\u8d27\\u4eba{{thing9.DATA}}\\n\\u8ba2\\u5355\\u53f7{{character_string1.DATA}}\\n\\u5546\\u54c1\\u540d\\u79f0{{thing2.DATA}}\\n\\u6536\\u8d27\\u65f6\\u95f4{{time7.DATA}}","sceneDesc":"\\u8ba2\\u5355\\u6536\\u8d27\\u901a\\u77e5","weapp_template_id":"9V3x_jLNc0MFMJ4o6eUytUpDW4vlGpF27yKNwFr7UkI"}', 0, '', 1, '{"content":"\\u5c0a\\u656c\\u7684{username}，\\u60a8\\u7684\\u8ba2\\u5355{orderno}，\\u6536\\u8d27\\u6210\\u529f。"}', 'sms,email,wechat,weapp,sitemessage'),
(11, '', 'ORDER_REFUND_AGREE', '商家同意退款', 1, '{"orderno":"订单号"}', 0, '商家同意退款', '<p>尊敬的会员，您的订单{订单号}，商家同意退款</p>', 1, '', '{"alisms":{"template_id":"SMS_186953023","content":"\\u5c0a\\u656c\\u7684\\u4f1a\\u5458\\uff0c\\u60a8\\u7684\\u8ba2\\u5355${orderno}\\uff0c\\u5546\\u5bb6\\u540c\\u610f\\u9000\\u6b3e\\u3002","smssign":""}}', '', 1, '{"template_id_short":"OPENTM412135258","template_id":"CzQeMHXgwLSbJDCoeRPQuGmvOXbipxy9G_AGK_16aEU","headtext":"","bottomtext":"","headtextcolor":"","bottomtextcolor":"","content":"\\u8ba2\\u5355\\u53f7\\uff1a{{keyword1.DATA}}\\n\\u9000\\u6b3e\\u91d1\\u989d\\uff1a{{keyword2.DATA}}\\n\\u65f6\\u95f4\\uff1a{{keyword3.DATA}}"}', 1, '{"tid":"6964","kidList":[3,1,7],"content":"\\u8ba2\\u5355\\u7f16\\u53f7{{character_string3.DATA}}\\n\\u9000\\u6b3e\\u91d1\\u989d{{amount1.DATA}}\\n\\u7533\\u8bf7\\u7ed3\\u679c{{phrase7.DATA}}","sceneDesc":"\\u5546\\u5bb6\\u540c\\u610f\\u9000\\u6b3e","weapp_template_id":"fjvtogKFT6f-jbAkO4DD-SpxlWH-8OXfIulyXUBQ92s"}', 0, '', 1, '{"content":"\\u5c0a\\u656c\\u7684{username}，\\u60a8\\u7684\\u8ba2\\u5355{orderno}，\\u5546\\u5bb6\\u540c\\u610f\\u9000\\u6b3e。"}', 'sms,email,wechat,weapp,sitemessage'),
(12, '', 'ORDER_REFUND_REFUSE', '商家拒绝退款', 1, '{"orderno":"订单号"}', 0, '商家拒绝退款', '<p>尊敬的会员，您的订单{订单号}，商家拒绝退款</p>', 1, '', '{"alisms":{"template_id":"SMS_186953026","content":"\\u5c0a\\u656c\\u7684\\u4f1a\\u5458\\uff0c\\u60a8\\u7684\\u8ba2\\u5355${orderno}\\uff0c\\u5546\\u5bb6\\u62d2\\u7edd\\u9000\\u6b3e\\u3002","smssign":""}}', '', 1, '{"template_id_short":"OPENTM417819857","template_id":"7_bj3u34I19ElRhN5mb-9lRvIo9qLl5S0V1zK2cTj64","headtext":"","bottomtext":"","headtextcolor":"","bottomtextcolor":"","content":"单号：{{keyword1.DATA}}\\n金额：{{keyword2.DATA}}\\n时间：{{keyword3.DATA}}"}', 1, '{"tid":"6952","kidList":[4,3],"content":"\\u8ba2\\u5355\\u53f7{{character_string4.DATA}}\\n\\u9000\\u6b3e\\u91d1\\u989d{{amount3.DATA}}","sceneDesc":"\\u5546\\u5bb6\\u540c\\u610f\\u9000\\u6b3e","weapp_template_id":"arJR8KU3EMvyksg_4LIIqnbk0NOdF2kDT4aRSkt6o6s"}', 0, '', 1, '{"content":"\\u5c0a\\u656c\\u7684{username}，\\u60a8\\u7684\\u8ba2\\u5355{orderno}，\\u5546\\u5bb6\\u62d2\\u7edd\\u9000\\u6b3e。"}', 'sms,email,wechat,weapp,sitemessage'),
(13, '', 'VERIFY', '核销取货', 1, '{"orderno":"订单号"}', 0, '核销成功', '<p>尊敬的会员，您的订单{订单号}，商家核销成功</p>', 1, '', '{"alisms":{"template_id":"SMS_186948085","content":"\\u5c0a\\u656c\\u7684\\u4f1a\\u5458\\uff0c\\u60a8\\u7684\\u8ba2\\u5355${orderno}\\uff0c\\u5546\\u5bb6\\u6838\\u9500\\u6210\\u529f\\u3002","smssign":""}}', '', 1, '{"template_id_short":"OPENTM416687547","template_id":"", "headtext": "", "bottomtext": "", "headtextcolor": "", "bottomtextcolor": "", "content": "商品名称：{{keyword1.DATA}}\\n商品数量：{{keyword2.DATA}}\\n核销时间：{{keyword3.DATA}}"}', 0, '', 0, '', 0, '', 'sms,email'),
(14, '', 'BUYER_REFUND', '买家发起退款提醒', 2, '{"username":"会员名称","goodsname":"商品名称","orderno":"订单号","refundmoney":"退款金额","refundreason":"退款原因","refundno":"退款单号"}', 1, '买家发起退款1', '<p>{会员名称}申请了退款，订单号为{订单号}的商品{商品名称}，退款单号为{退款单号}，退款金额{退款金额}，退款原因{退款原因}。</p>', 0, '', '{"alisms":{"template_id":"SMS_187270241","content":"${username}\\u7533\\u8bf7\\u4e86\\u9000\\u6b3e\\uff0c\\u8ba2\\u5355\\u53f7\\u4e3a${orderno}\\u7684\\u5546\\u54c1${goodsname}\\uff0c\\u9000\\u6b3e\\u5355\\u53f7\\u4e3a${refundno}\\uff0c\\u9000\\u6b3e\\u91d1\\u989d${refundmoney}\\uff0c\\u9000\\u6b3e\\u539f\\u56e0${refundreason}\\u3002","smssign":""}}', '', 1, '{"template_id_short":"OPENTM412244458","template_id":"","headtext":"","bottomtext":"","headtextcolor":"","bottomtextcolor":"","content":"\\u9000\\u6b3e\\u5355\\u53f7\\uff1a{{keyword1.DATA}}\\n\\u7533\\u8bf7\\u65f6\\u95f4\\uff1a{{keyword2.DATA}}\\n\\u9000\\u6b3e\\u91d1\\u989d\\uff1a{{keyword3.DATA}}"}', 0, '', 0, '', 0, '', 'sms,email,wechat'),
(15, '', 'BUYER_DELIVERY_REFUND', '买家已退货提醒', 2, '{"orderno":"订单号"}', 1, '买家退货通知', '<p>订单号为{订单号}，买家退货。</p>', 1, '', '{"alisms":{"template_id":"SMS_187225307","content":"\\u8ba2\\u5355\\u53f7\\u4e3a${orderno}\\uff0c\\u4e70\\u5bb6\\u9000\\u8d27\\u3002","smssign":""}}', '', 1, '{"template_id_short":"OPENTM206905995","template_id":"","headtext":"","bottomtext":"","headtextcolor":"","bottomtextcolor":"","content":"\\u9000\\u8d27\\u8ba2\\u5355\\u53f7\\uff1a{{keyword1.DATA}}\\n\\u9000\\u8d27\\u5546\\u54c1\\uff1a{{keyword2.DATA}}\\n\\u9000\\u8d27\\u6570\\u91cf\\uff1a{{keyword3.DATA}}\\n\\u9000\\u8d27\\u91d1\\u989d\\uff1a{{keyword4.DATA}}"}', 0, '', 0, '', 0, '', 'sms,email,wechat'),
(16, '', 'REGISTER_CODE', '注册验证', 1, '{"code":"验证码","site_name":"站点名称"}', 0, '发送邮箱注册验证码', '<p>{站点名称}发送邮箱注册验证码{验证码}</p>', 1, '', '{"alisms":{"template_id":"SMS_144855003","content":"{code}\\u60a8\\u7684\\u9a8c\\u8bc1\\u7801{site_name}\\u4e3a\\uff1a${code}\\uff0c\\u8be5\\u9a8c\\u8bc1\\u7801 5 \\u5206\\u949f\\u5185\\u6709\\u6548\\uff0c\\u8bf7\\u52ff\\u6cc4\\u6f0f\\u4e8e\\u4ed6\\u4eba\\u3002","smssign":""}}', '', 0, '', 0, '', 0, '', 0, '', 'sms,email'),
(17, '', 'REGISTER_SUCCESS', '注册成功', 1, '{"shopname":"商城名称","username":"会员名称"}', 0, '会员注册成功通知', '<p>尊敬的{会员名称},您已成功注册为{商城名称}用户。</p>', 1, '', '{"alisms":{"template_id":"SMS_107425156","content":"\\u5c0a\\u656c\\u7684${username},\\u60a8\\u4ee5\\u6210\\u529f\\u6ce8\\u518c\\u4e3a${shopname}\\u7528\\u6237\\u3002","smssign":""}}', '', 1, '{"template_id_short":"OPENTM409413579","template_id":"ePg4DW7p0h1hvZkKs0K-P0TSUjygNVHIqYZzVDGUeMs","headtext":"","bottomtext":"","headtextcolor":"","bottomtextcolor":"","content":"注册账号：{{keyword1.DATA}}\\n注册时间：{{keyword2.DATA}}"}', 0, '', 0, '', 0, '', 'sms,email,wechat'),
(18, '', 'FIND_PASSWORD', '找回密码', 1, '{"code":"验证码","site_name":"站点名称"}', 1, '发送邮箱找回密码验证码', '\r\n<p>{站点名称}发送邮箱找回密码验证码{验证码}</p>', 1, '', '{"alisms":{"template_id":"SMS_190792675","content":"\\u60a8\\u7684\\u9a8c\\u8bc1\\u7801\\u4e3a\\uff1a${number}\\uff0c\\u8be5\\u9a8c\\u8bc1\\u7801 5 \\u5206\\u949f\\u5185\\u6709\\u6548\\uff0c\\u8bf7\\u52ff\\u6cc4\\u6f0f\\u4e8e\\u4ed6\\u4eba\\u3002","smssign":""}}', '', 0, '', 0, '', 0, '', 0, '', 'sms,email'),
(19, '', 'LOGIN', '会员登录', 1, '{"name":"会员名称"}', 1, '会员登录', '<p>尊敬的{会员名称}，您的账号登陆成功。</p>', 0, '', '{"alisms":{"template_id":"1111111111","content":"","smssign":""}}', '', 1, '{"template_id_short":"OPENTM412447375","template_id":"QYPWVWavgSxDPkNgy0zTYcXtgjfrFDu7o8HgZvWIp9E","headtext":"","bottomtext":"","headtextcolor":"","bottomtextcolor":"","content":"登录账号：{{keyword1.DATA}}\\n登录状态：{{keyword2.DATA}}\\n登录时间：{{keyword3.DATA}}"}', 0, '', 0, '', 0, '', 'sms,email,wechat'),
(20, '', 'MEMBER_BIND', '账户绑定', 1, '{"code":"验证码","site_name":"站点名称"}', 0, '发送邮箱绑定验证码', '<p>{站点名称}发送邮箱绑定验证码{验证码}</p>', 1, '', '{"alisms":{"template_id":"SMS_190792680","content":"","smssign":""}}', '', 0, '', 0, '', 0, '', 0, '', 'sms,email'),
(21, '', 'LOGIN_CODE', '动态码登录', 1, '{"code":"验证码"}', 0, '', '<p>您的验证码为：{验证码}，该验证码 5 分钟内有效，请勿泄漏于他人。</p>', 1, '', '{"alisms":{"template_id":"SMS_190792665","content":"\\u60a8\\u7684\\u9a8c\\u8bc1\\u7801\\u4e3a\\uff1a${code}\\uff0c\\u8be5\\u9a8c\\u8bc1\\u7801 5 \\u5206\\u949f\\u5185\\u6709\\u6548\\uff0c\\u8bf7\\u52ff\\u6cc4\\u6f0f\\u4e8e\\u4ed6\\u4eba\\u3002","smssign":""}}', '', 0, '', 0, '', 0, '', 0, '', 'sms,email'),
(25, '', 'SET_PASSWORD', '设置密码', 1, '{"code":"验证码"}', 0, '', '', 1, '', '{"alisms":{"template_id":"SMS_190728294","content":"\\u60a8\\u7684\\u9a8c\\u8bc1\\u7801\\u4e3a\\uff1a${code}\\uff0c\\u8be5\\u9a8c\\u8bc1\\u7801 5 \\u5206\\u949f\\u5185\\u6709\\u6548\\uff0c\\u8bf7\\u52ff\\u6cc4\\u6f0f\\u4e8e\\u4ed6\\u4eba\\u3002","smssign":""}}', '', 0, '', 0, '', 0, '', 0, '', 'sms'),
(27, '', 'BUYER_TAKE_DELIVERY', '买家收货通知', 2, '{"orderno":"订单号"}', 0, '', '', 0, '', '', '', 1, '{"template_id_short":"OPENTM418052192","template_id":"ndYtDOXuaVIuDir5Rnxtd8LJwaPtyAvMB7nXfZIOM0Y","headtext":"","bottomtext":"","headtextcolor":"","bottomtextcolor":"","content":"收货地址：{{keyword1.DATA}}\\n联系人：{{keyword2.DATA}}\\n订单号：{{keyword3.DATA}}\\n订单详情：{{keyword4.DATA}}\\n操作时间：{{keyword5.DATA}}"}', 0, '', 0, '', 0, '', 'sms,email,wechat'),
(28, '', 'BUYER_PAY', '买家支付通知', 2, '{"orderno":"订单号","ordermoney":"订单金额"}', 0, '', '', 0, '', '', '', 1, '{"template_id_short":"OPENTM402074360","template_id":"uqkL5Hf14aS5vhu2lmpu7wKD3cuTFs2exoE35xH2oeo","headtext":"","bottomtext":"","headtextcolor":"","bottomtextcolor":"","content":"下单时间：{{keyword1.DATA}}\\n订单编号：{{keyword2.DATA}}\\n商品信息：{{keyword3.DATA}}\\n订单金额：{{keyword4.DATA}}"}', 0, '', 0, '', 0, '', 'sms,email,wechat'),
(29, '', 'USER_WITHDRAWAL_APPLY', '会员申请提现通知', 2, '{"username":"会员名称","money":"提现金额"}', 0, '', '', 0, '', '', '', 1, '{"template_id_short":"OPENTM416719519","template_id":"pDiCdELV_bbOuGc4AiBXi3cvAG7qkUQ6vDXQCZESLCg","headtext":"","bottomtext":"","headtextcolor":"","bottomtextcolor":"","content":"申请人：{{keyword1.DATA}}\\n创建时间：{{keyword2.DATA}}\\n申请金额：{{keyword3.DATA}}"}', 0, '', 0, '', 0, '', 'sms,email,wechat'),
(30, '', 'FENXIAO_WITHDRAWAL_APPLY', '分销申请提现通知', 2, '{"fenxiaoname":"分销商名称","money":"提现金额"}', 1, '', '', 0, '', '', '', 1, '{"template_id_short":"OPENTM416719519","template_id":"vyH3ei9nX107LlTc9NmMvYtrppS9ipDxJgrZi3UbQAY","headtext":"","bottomtext":"","headtextcolor":"","bottomtextcolor":"","content":"申请人：{{keyword1.DATA}}\\n创建时间：{{keyword2.DATA}}\\n申请金额：{{keyword3.DATA}}"}', 0, '', 0, '', 0, '', 'sms,email,wechat'),
(31, '', 'USER_WITHDRAWAL_SUCCESS', '会员提现成功通知', 1, '{"username":"会员名称","money":"提现金额"}', 0, '', '', 1, '', '{"alisms":{"template_id":"","content":"\\u5c0a\\u656c\\u7684{username}\\uff0c\\u60a8\\u7533\\u8bf7\\u7684{money}\\u4f59\\u989d\\uff0c\\u5df2\\u63d0\\u73b0\\u6210\\u529f\\u3002","smssign":""}}', '', 0, '', 1, '{"tid":"5184","kidList":[6,3],"content":"\\u63d0\\u73b0\\u91d1\\u989d{{amount6.DATA}}\\n\\u63d0\\u73b0\\u65f6\\u95f4{{date3.DATA}}","sceneDesc":"\\u4f1a\\u5458\\u63d0\\u73b0\\u6210\\u529f\\u901a\\u77e5","weapp_template_id":"UNetRU6W_YgRZG5YzApM7wZCsOFtuIlF503jv4HOslk"}', 0, '', 1, '{"content":"\\u5c0a\\u656c\\u7684{username}\\uff0c\\u60a8\\u7533\\u8bf7\\u7684{money}\\u4f59\\u989d\\uff0c\\u5df2\\u63d0\\u73b0\\u6210\\u529f\\u3002"}', 'sms,email,weapp,sitemessage'),
(32, '', 'FENXIAO_WITHDRAWAL_SUCCESS', '分销提现成功通知', 1, '{"fenxiaoname":"分销商名称","money":"提现金额"}', 0, '', '', 0, '', '{"alisms":{"template_id":"","content":"\\u5c0a\\u656c\\u7684{fenxiaoname}\\uff0c\\u60a8\\u7533\\u8bf7\\u7684{money}\\u4f63\\u91d1\\uff0c\\u5df2\\u63d0\\u73b0\\u6210\\u529f\\u3002","smssign":""}}', '', 0, '', 1, '{"tid":"6699","kidList":[1,2,3],"content":"\\u63d0\\u73b0\\u91d1\\u989d{{amount1.DATA}}\\n\\u63d0\\u73b0\\u65f6\\u95f4{{time2.DATA}}\\n\\u5907\\u6ce8{{thing3.DATA}}","sceneDesc":"\\u4f1a\\u5458\\u7533\\u8bf7\\u63d0\\u73b0\\u901a\\u77e5","weapp_template_id":"FcbKs3D-unIwTRwirqDINpkc1RUloXiH7GH7GRrKtxs"}', 0, '', 0, '', 'sms,email,weapp'),
(34, '', 'USER_CANCEL_SUCCESS', '会员注销成功', 1, '{"username":"会员账号"}', 0, '', '', 0, '', '', '', 0, '', 0, '', 0, '', 0, '', 'sms,email'),
(35, '', 'USER_CANCEL_FAIL', '会员注销失败', 1, '{"username":"会员账号"}', 0, '', '', 0, '', '', '', 0, '', 0, '', 0, '', 0, '', 'sms,email'),
(36, '', 'USER_CANCEL_APPLY', '会员注销申请', 2, '{"username":"会员账号"}', 0, '', '', 0, '', '', '', 1, '{"template_id_short":"OPENTM413481457","template_id":"KD3BKlZlnlLyqPa51cDc68lPjxboerECpLRd9YJuY8c","headtext":"","bottomtext":"","headtextcolor":"","bottomtextcolor":"","content":"申请人：{{keyword1.DATA}}\\n手机号码：{{keyword2.DATA}}"}', 0, '', 0, '', 0, '', 'sms,email,wechat'),
(37, '', 'FENXIAO_WITHDRAWAL_ERROR', '分销提现失败通知', 1, '{"fenxiaoname":"分销商名称","money":"提现金额"}', 0, '', '', 0, '', '{"alisms":{"template_id":"SMS_205885275","content":"\\u5c0a\\u656c\\u7684{username}\\uff0c\\u60a8\\u7533\\u8bf7\\u7684{money}\\u4f63\\u91d1\\uff0c\\u5df2\\u63d0\\u73b0\\u6210\\u529f\\u3002","smssign":""}}', '', 1, '{"template_id_short":"OPENTM417749055","template_id":"iLlTSaOoaXdp-TV1yweNGhgmRyVP2-ex9OgG7WIKgH4","headtext":"会员提现失败通知","bottomtext":"进入商城查看详情","headtextcolor":"","bottomtextcolor":"","content":"提现时间：{{keyword1.DATA}}\\n审核状态：{{keyword2.DATA}}\\n提现方式：{{keyword3.DATA}}\\n提现金额：{{keyword4.DATA}}"}', 1, '{"tid":"18547","kidList":[2,4],"content":"\\u63d0\\u73b0\\u91d1\\u989d{{amount2.DATA}}\\n\\u63d0\\u73b0\\u8fdb\\u5ea6{{thing4.DATA}}","sceneDesc":"\\u5206\\u9500\\u63d0\\u73b0\\u5931\\u8d25\\u901a\\u77e5","weapp_template_id":"qBugDo7tvFxCS6PCKkAU7CvzVjRNHd6KrOBleMbSXeU"}', 0, '', 0, '', 'sms,wechat,weapp'),
(38, '', 'RECHARGE_SUCCESS', '会员充值成功通知', 1, '{"username":"会员名称","money":"提现金额"}', 0, '充值成功提醒', '<p>尊敬的{会员名称}，您的账户充值{充值金额}。</p>', 1, '', '{"alisms":{"template_id":"","content":"尊敬的{username}，您好！您在{create_time}成功充值余额{money}元。","smssign":""}}', '', 0, '', 1, '', 0, '', 1, '{"content":"\\u5c0a\\u656c\\u7684{username}，\\u60a8\\u597d！\\u60a8\\u5728{create_time}\\u6210\\u529f\\u5145\\u503c\\u4f59\\u989d{money}\\u5143。"}', 'sms,email,sitemessage');