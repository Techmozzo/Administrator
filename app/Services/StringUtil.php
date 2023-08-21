<?php

namespace App\Services;

class StringUtil{
    public static function generateCode(int $limit):string{
        return substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, $limit);
    }
}
