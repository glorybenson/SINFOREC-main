<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Role extends Model
{
    use HasFactory;

    public static $roles = [
        "2" => "Administration",
        "3" => "naissance",
        "4" => "Mariage",
        "5" => "Décès",
        "6" => "Certificat De",
        "7" => "Rapports",
        "8" => "Tableau de Bord"
    ];

    public static $roleIDs = [
        "2" => "has_admin",
        "3" => "has_naissance",
        "4" => "has_mariage",
        "5" => "has_deces",
        "6" => "has_cert",
        "7" => "has_rapport",
        "8" => "has_tableau"
    ];

    public static function transform( $given_roles) {
        $result = [];
        array_walk(self::$roles, function ( $value, $key) use ($given_roles, &$result) {
            $result[ $key] = in_array( $key, $given_roles) ? "selected" : "";
        }, $result);
        return $result;
    }

    public static function roles_of( $roles) {

        $shell = new \stdClass();

        foreach ( self::$roleIDs as $key => $role)
            $shell->{ $role} = in_array( $key, $roles);

        return $shell;
    }
}
