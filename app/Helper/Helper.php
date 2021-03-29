<?php


namespace App\Helper;


class Helper
{
    public static function getAvatarUrl(string $email, int $width = 35)
    {
        return "https://www.gravatar.com/avatar/" . md5($email) . "?d=mm&s=".$width;
    }

}