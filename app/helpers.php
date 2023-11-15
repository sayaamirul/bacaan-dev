<?php

use Illuminate\Support\Str;

if (! function_exists('to_slug')) {
    function to_slug(string $string)
    {
        if ($string == '') {
            return '';
        }

        return Str::slug($string.'-'.Str::limit(md5(now()), 5));
    }
}
