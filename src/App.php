<?php

namespace wenshizhengxin\message_pot;

use epii\admin\center\config\Settings;
use epii\admin\center\libs\AddonsApp;
use think\Db;
use wenshizhengxin\message_pot\libs\Constant;

class App extends AddonsApp
{
    public function install(): bool
    {
        // TODO: Implement install() method.
        // 执行sql文件
        $prefix = Db::getConfig('prefix');
        if (!$prefix) {
            $prefix = 'epii_';
        }
        $res = $this->execSqlFile(__DIR__ . "/../data/sql/install.sql", $prefix);
        if (!$res) {
            return false;
        }
        // 初始化配置
        $initSettings = require __DIR__ . '/../data/settings/settings.php';
        foreach ($initSettings as $setting) {
            Settings::set(Constant::ADDONS . '.' . $setting['name'], $setting['value'], 0, 2, $setting['note']);
        }

        // 添加菜单及子菜单

        return true;
    }

    public function update($new_version, $old_version): bool
    {
        // TODO: Implement update() method.
        //        $updateSql = __DIR__ . '/data/update_sql/' . $old_version . '-' . $new_version . '.sql';
        ////        if (is_file($updateSql) === true) {
        ////            $res = $this->execSqlFile($updateSql, "epii_");
        ////            if (!$res) {
        ////                return false;
        ////            }
        ////        }

        return true;
    }

    public function onOpen(): bool
    {
        // TODO: Implement onOpen() method.
        return true;
    }

    public function onClose(): bool
    {
        // TODO: Implement onClose() method.
        return true;
    }
}
