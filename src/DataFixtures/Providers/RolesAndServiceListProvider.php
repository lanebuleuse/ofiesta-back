<?php

namespace App\DataFixtures\Providers;

use Faker\Provider\Base as BaseProvider;

class RolesAndServiceListProvider extends BaseProvider
{
    protected static $roles = [
        'ROLE_USER',
        'ROLE_ADMIN',
        'ROLE_PRESTATAIRE',
    ];

    protected static $serviceListItems = [
        'DJ',
        'Traiteurs',
        'Location de Salle',
        'Decorateurs'
    ];
   
    public static function userRole(){
        return static::randomElement(static::$roles);
    }

    public static function serviceList(){
        return static::randomElement(static::$serviceListItems);
    }

}