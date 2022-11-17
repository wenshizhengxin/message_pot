<?php

namespace wenshizhengxin\message_pot\libs;

use think\Db;

class Message
{
    public static function send($message_type, $target_id, Receiver $receiver, Sender $sender = null, $text = '', $property = '', $extends = [])
    {
        $insertData = [
            'message_type' => $message_type,
            'target_id' => $target_id,
            'text' => $text,
            'property' => $property,
            'receiver_id' => $receiver->getId(),
            'receiver_role' => $receiver->getRole(),
            'receiver_dept' => $receiver->getDept(),
            'sender_id' => 0,
            'sender_role' => 0,
            'sender_dept' => 0,
            'create_time' => time(),
        ];

        if ($sender && ($sender instanceof Sender)) {
            $insertData['sender_id'] = $sender->getId();
            $insertData['sender_role'] = $sender->getRole();
            $insertData['sender_dept'] = $sender->getDept();
        }

        foreach ($extends as $key => $value) {
            if (!isset($insertData[$key])) {
                $insertData[$key] = $value;
            }
        }

        return Db::name('message')->insert($insertData, false, true);
    }

    public static function receive($where = [])
    {
        Db::name('message')->where($where)->delete();
    }

    public static function getTotal($where = [])
    {
        return Db::name('message')->where($where)->count();
    }
}
