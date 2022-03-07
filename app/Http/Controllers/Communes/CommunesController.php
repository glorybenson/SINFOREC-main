<?php

namespace App\Http\Controllers\Communes;

use App\Http\Controllers\Controller;
use App\Models\Arrondissement;
use App\Models\Util;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use App\Models\Communes;
use Illuminate\Support\Facades\URL;

class CommunesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $communes = Communes::all();
        $arrondissement = Arrondissement::all();
        return view('communes.index', ['communes' => $communes, 'arrondissement' => $arrondissement]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $arrondissement = Util::get_entity( 'arrondissement');
        return view('communes.create', ['arrondissement' => $arrondissement]);
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
            'arrondissement_id' => 'required|not_regex:/^--$/',
        ]);

        $communes = new Communes();
        Util::fill( $communes, [ 'description', 'arrondissement_id'], $request);
        $communes->created_by = Auth()->user()[ 'id'];

        return Util::try_save( $communes, null, [ 'sender' => 'Communes', 'redirect_url' => 'communes',
            'success' => 'Commune créée avec succès']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show($id)
    {
        $communes = Communes::find($id);
        $arrondissement_id = $communes->get( 'arrondissement_id')[ 0]->arrondissement_id;
        $arrondissement_description = Arrondissement::find( $arrondissement_id)->description;
        return view('communes.show', ['communes' => $communes, 'arrondissement_description' => $arrondissement_description]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $arrondissement = Util::get_entity( 'arrondissement');
        $communes = Communes::find($id);
        return view('communes.edit', ['communes' => $communes, 'arrondissement' => $arrondissement]);
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
            'arrondissement_id' => 'required|not_regex:/^--$/',
        ]);

        $communes = Communes::find($id);
        Util::fill( $communes, [ 'description', 'arrondissement_id'], $request);

        Util::try_save( $communes);

        return redirect( 'communes')->with('success', 'Commune mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Communes::destroy( $id);
        return back()->with('success', 'Commune supprimée avec succès.');
    }
}
