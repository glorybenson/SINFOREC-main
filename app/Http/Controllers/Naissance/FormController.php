<?php

namespace App\Http\Controllers\Naissance;

use App\Http\Controllers\Controller;
use App\Models\Pay;
use App\Models\Region;
use App\Models\Department;
use App\Models\Arrondissement;
use App\Models\Communes;
use App\Models\Centre;
use App\Models\Naissance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class FormController extends Controller
{
    private static $BASE_URL = "naissance.registre.forms.";
    private static $EFFECT  = "font-weight-bold";

    /*private static $CONTROLLED_ROUTE = [
        'naissance/registre/geographical_zone',
        'naissance/registre/child_info',
        'naissance/registre/father_info',
        'naissance/registre/mother_info',
        'naissance/registre/declarant_info',
        'naissance/registre/judgement'
    ];*/

    static function currentUrlEffect( $currentPath )
    {

        if( strpos( Route::getCurrentRoute()->uri, $currentPath))
            return self::$EFFECT;
        return "";
    }

    function geographical_zone( Request $request) {
        $pays = Pay::all();
        $regions = Region::all();
        $department = Department::all();
        $arrondissement = Arrondissement::all();
        $communes = Communes::all();
        $centres = Centre::all();
        return view( self::$BASE_URL . 'geographical_zone',
            ['pays' => $pays, 'regions' => $regions, 'department' => $department,
             'arrondissement' => $arrondissement, 'communes' => $communes, 'centres' => $centres]);
    }

    function child_info() {
        return view( self::$BASE_URL . 'child_info');
    }

    function father_info() {
        return view( self::$BASE_URL . 'father_info');
    }

    function mother_info() {
        return view( self::$BASE_URL . 'mother_info');
    }

    function declarant_info() {
        return view( self::$BASE_URL . 'declarant_info');
    }

    function judgement() {
        $regions = Region::all();
        return view( self::$BASE_URL . 'judgement', ['regions' => $regions]);
    }
}
