<?php

namespace App\DataFixtures\Providers;

use Faker\Provider\Base as BaseProvider;

class RolesAndServiceListProvider extends BaseProvider
{
    protected static $roles = [
        'ROLE_MEMBER',
        'ROLE_ADMIN',
        'ROLE_PROVIDER',
    ];

    public static function userRole(){
        return static::randomElement(static::$roles);
    }
}