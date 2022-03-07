<?php

namespace App\Http\Controllers\Regions;

use App\Http\Controllers\Controller;
use App\Models\Util;
use App\Models\Pay;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Models\Region;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RegionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $regions = Region::all();
        $pays = Pay::all();
        return view('regions.index', ['regions' => $regions, 'pays' => $pays]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Util::get_entity( 'pays');
        return view('regions.create', [ 'countries' => $countries]);
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
            'pay_id' => 'required|not_regex:/^--$/',
        ]);

        $region = new Region();
        Util::fill( $region, [ 'description', 'pay_id'], $request);
        $region->created_by = Auth::user()[ 'id'];

        return Util::try_save( $region, null, [ 'sender' => 'Region', 'redirect_url' => 'regions', 'success' => 'Région créée avec succès']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show($id)
    {
        $region = Region::find($id);
        $pay_id = $region->get( 'pay_id')[ 0]->pay_id;
        $pays_description = Pay::find( $pay_id)->description;

        return view('regions.show', ['region' => $region, 'pays_description' => $pays_description]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $countries = Util::get_entity( 'pays');
        $region = Region::find($id);

        return view('regions.edit', ['region' => $region, 'countries' => $countries]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update( Request $request, $id)
    {
        $this->validate( $request, [
            'description' => 'required',
            'pay_id' => 'required|not_regex:/^--$/',
        ]);

        $region = Region::find($id);
        Util::fill( $region, [ 'description', 'pay_id'], $request);

        Util::try_save( $region);

        return redirect( 'regions')->with('success', 'Changements sauvegardés avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Region::destroy( $id);
        return redirect('regions')->with('success', 'Région supprimée avec succès');
    }
}
