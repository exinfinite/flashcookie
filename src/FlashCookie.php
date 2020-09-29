<?php
namespace Exinfinite;

class FlashCookie {
    const KEY = "_notify_msg";
    static function set($msg, $status = 'success') {
        setcookie(self::KEY, serialize([
            'msg' => $msg,
            'status' => $status,
        ]));
    }
    static function get() {
        if (!array_key_exists(self::KEY, $_COOKIE)) {
            return false;
        }
        $data = unserialize($_COOKIE[self::KEY]);
        setcookie(self::KEY, '');
        return $data;
    }
}
?>