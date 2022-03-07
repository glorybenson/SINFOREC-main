<?php

namespace App\Http\Controllers\Naissance;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Util;
use Illuminate\Support\Facades\Auth;
use App\Models\Naissance;
use Illuminate\Http\Request;

class RegistreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $add = DB::table('naissance')
            ->join('users', 'naissance.created_by', '=', 'users.id')
            ->select('naissance.*', 'users.first_name as admin_first_name', 'users.last_name as admin_last_name')
            ->get();

        return view('naissance.registre.index', ['add' => collect($add)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $shell = new \stdClass();
        $binding = Util::load( $shell);

        return view('naissance.registre.create', $binding);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'date_naissance' => 'required',
            'name_of_mother' => 'required',
            'name_of_father' => 'required',
            'mother_maiden_name' => 'required',
        ]);

        $add = new Add;
        $add->first_name = $request->first_name;
        $add->last_name = $request->last_name;
        $add->date_naissance = $request->date_naissance;
        $add->name_of_mother = $request->name_of_mother;
        $add->name_of_father = $request->name_of_father;
        $add->mother_maiden_name = $request->mother_maiden_name;
        $add->created_by = Auth::user()->id;
        $add->save();
        return back()->with('success', 'Ajout créée avec succès');
    }
}
