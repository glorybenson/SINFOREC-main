<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class Util
{

    const COMMUNES = "communes";
    const DEPARTMENTS = "departments";
    const ARRONDISSEMENTS = "arrondissements";
    const CENTRE = "centre";
    const REGIONS = "regions";
    const PAYS = "pays";

    public static function fill( $dest, $props, $src): void {
        foreach ( $props as $prop)
            $dest->$prop = $src->$prop;
        return;
    }

    public static function try_save( Model $model, $stash_fn = null, $params = []) {
        try {
            if( $stash_fn != null)
                $model->$stash_fn();
            else
                $model->save();
        }
        catch ( QueryException $exception)
        {
            return back()->with('error', ErrorLookup::log( $exception->getCode(), $params));
        }

        if( $params[ 'redirect_url'] != null)
            return redirect( $params[ 'redirect_url'])->with( 'success', $params[ 'success']);

        return null;
    }

    public static function get_entity( $table_name)
    {
        $uid = Auth()->user()['id'];
        $query = DB::table( $table_name)->where('created_by', $uid)->get();
        $collection = [];
        if ( count($query) > 0)
            foreach ($query as $makeup) {
                $dummy = new \stdClass();
                $dummy->id = $makeup->id;
                $dummy->description = $makeup->description;
                $collection[] = $dummy;
            }
        return $collection;
    }

    public static function pack( $key, $ModelClass, $shell)
    {
        $model =  $ModelClass::where( 'created_by', Auth::user()[ 'id']);
        self::pack_ext( $key, $model->get(), $shell, null);
    }

    public static function pack_ext( $key, $model, $shell, $nullablefillables)
    {
        $fillables = $nullablefillables == null ? [] : $nullablefillables;
        foreach ( $model as $index => $result) {
            if( $index == 0 && $nullablefillables == null)
                $fillables = $result->getFillable();
            if( !isset( $shell->$key))
                $shell->$key = [];
            $values = [];
            foreach ( $fillables as $mapID)
                $values[ $mapID] = $result->$mapID;
            $shell->$key[] = $values;
        }

    }

    public static function load(\stdClass $shell)
    {
        Util::pack( Util::PAYS, Pay::class, $shell);
        Util::pack( Util::REGIONS, Region::class, $shell);
        Util::pack( Util::DEPARTMENTS, Department::class, $shell);
        Util::pack( Util::ARRONDISSEMENTS, Arrondissement::class, $shell);
        Util::pack( Util::COMMUNES, Communes::class, $shell);

        $centre = DB::select( 'SELECT centre.id, centre.description, communes.description as communes, department.description as departments,
                                      regions.description as regions, arrondissement.description as arrondissements, communes.id as commune_id FROM communes
                                      INNER JOIN centre ON centre.communes=communes.id INNER JOIN department ON centre.departments=department.id
                                      INNER JOIN regions ON centre.regions=regions.id INNER JOIN arrondissement ON centre.arrondissements=arrondissement.id');

        Util::pack_ext( Util::CENTRE, $centre, $shell, (new Centre())->getFillable());

        return [ Util::COMMUNES => property_exists( $shell, Util::COMMUNES) ? $shell->{ Util::COMMUNES} : [],
            Util::REGIONS => property_exists( $shell, Util::REGIONS) ? $shell->{ Util::REGIONS} : [],
            Util::DEPARTMENTS => property_exists( $shell, Util::DEPARTMENTS) ? $shell->{ Util::DEPARTMENTS} : [],
            Util::ARRONDISSEMENTS => property_exists( $shell, Util::ARRONDISSEMENTS) ? $shell->{ Util::ARRONDISSEMENTS} : [],
            Util::CENTRE => property_exists( $shell, Util::CENTRE) ? $shell->{ Util::CENTRE} : [],
            Util::PAYS => property_exists( $shell, Util::PAYS) ? $shell->{ Util::PAYS} : [],
            'link' => json_encode( $shell)];
    }
}
