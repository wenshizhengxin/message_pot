SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for epii_message
-- ----------------------------
DROP TABLE IF EXISTS `epii_message`;
CREATE TABLE `epii_message`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '消息通知表主键id',
  `message_type` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '消息类型',
  `text` varchar(128) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '通知文本',
  `property` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '通知属性（json格式）',
  `target_id` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '目标id',
  `receiver_id` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '接收者id',
  `receiver_role` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '接收者角色',
  `receiver_dept` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '接收者部门',
  `sender_id` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '发送者id',
  `sender_role` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '发送者角色',
  `sender_dept` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '发送者部门',
  `create_time` int(10) UNSIGNED NULL DEFAULT 0 COMMENT '创建时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '消息通知表';

SET FOREIGN_KEY_CHECKS = 1;