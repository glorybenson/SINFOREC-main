<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ErrorLookup extends Model
{
    use HasFactory;

    const LOOKUP = [
      '23000' => '%1 exists already'
    ];

    static function log( $given, $params) {

        if( array_key_exists( $given, ErrorLookup::LOOKUP))
            return self::construct( ErrorLookup::LOOKUP[  $given], $params);

        return 'Unknown error';
    }

    static function construct( $query, $params) {
        $i = 0;
        $keys = array_keys( $params);
        while( preg_match( '/%[0-9]+/', $query, $matches, PREG_OFFSET_CAPTURE))
        {
            $major = $matches[ 0];
            $length = strlen( $major[ 0]);
            $offset = $major[ 1];
            $query = substr_replace( $query, $params[ $keys[ $i++]], $offset, $length);
        }

        return $query;
    }
}
