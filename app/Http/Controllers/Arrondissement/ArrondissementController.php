<?php

namespace App\Http\Controllers\Arrondissement;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Util;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use App\Models\Arrondissement;

class ArrondissementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $arrondissement = Arrondissement::all();
        $department = Department::all();
        return view('arrondissement.index', [ 'arrondissement' => $arrondissement, 'department' => $department]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $department = Util::get_entity( 'department');
        return view('arrondissement.create', ['department' => $department]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate( $request, [
            'description' => 'required',
            'department_id' => 'required|not_regex:/^--$/',
        ]);

        $arrondissement = new Arrondissement();
        Util::fill( $arrondissement, [ 'description', 'department_id'], $request);
        $arrondissement->created_by = Auth()->user()[ 'id'];

        return Util::try_save( $arrondissement, null, [ 'sender' => 'Arrondissement', 'redirect_url' => 'arrondissement',
                                                                 'success' => 'Arrondissement créé avec succès']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show($id)
    {
        $arrondissement = Arrondissement::find($id);
        $department_id = $arrondissement->get( 'department_id')[ 0]->department_id;
        $department_description = Department::find( $department_id)->description;
        return view('arrondissement.show', ['arrondissement' => $arrondissement, 'department_description' => $department_description ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $department = Util::get_entity( 'department');
        $arrondissement = Arrondissement::find( $id);

        return view('arrondissement.edit', ['arrondissement' => $arrondissement, 'department' => $department]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $this->validate( $request, [
            'description' => 'required',
            'department_id' => 'required|not_regex:/^--$/',
        ]);

        $arrondissement = Arrondissement::find($id);
        Util::fill( $arrondissement, [ 'description', 'department_id'], $request);

        Util::try_save( $arrondissement, 'update');

        return back()->with('success', 'Arrondissement mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Arrondissement::destroy( $id);
        return back()->with('success', 'Arrondissement supprimé avec succès.');
    }
}
