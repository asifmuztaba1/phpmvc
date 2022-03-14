<?php

namespace Phpmvc\Src\Core\Facades;

class Hasher
{
    public static function make($input,$salt) {
        $hash = hash("sha512",$salt.$input);

        if(strlen($hash) > 13)
            return $hash;

        return false;
    }

    public function verify($input,$salt, $existingHash): bool
    {
        $hash = hash("sha512",$salt.$input);

        return $hash === $existingHash;
    }
}