<?php

namespace Phucle\Assignment\Commons;

class Helper
{
    public static function debug($data) {
        echo '<pre>';

        var_dump($data);

        die;
    }
}