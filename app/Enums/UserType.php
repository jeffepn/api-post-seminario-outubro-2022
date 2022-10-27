<?php

namespace App\Enums;

class UserType {
    public const ADMIN = 1;
    public const USER = 2;

    public static function all(): array
    {
        return [
            self::ADMIN,
            self::USER
        ];
    }
}