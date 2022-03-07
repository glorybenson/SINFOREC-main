<?php

namespace App\Http\Controllers\Centre;

use App\Http\Controllers\Controller;
use App\Models\Arrondissement;
use App\Models\Communes;
use App\Models\Department;
use App\Models\Pay;
use App\Models\Region;
use App\Models\Util;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Centre;

class CentreController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */


    public function index()
    {
        $shell = new \stdClass();
        $binding = Util::load( $shell);

        return view('centre.index', $binding);
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

        return view('centre.create', $binding);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'arrondissements' => 'required',
            'communes' => 'required',
            'regions' => 'required',
            'description' => 'required',
            'departments' => 'required'
        ]);

        $centres = new Centre();
        Util::fill( $centres, [ 'arrondissements', 'communes', 'regions', 'description', 'departments'], $request);
        $centres->created_by = Auth::user()[ 'id'];

        return Util::try_save( $centres, null, [ 'sender' => 'Centres', 'redirect_url' => 'centre',
            'success' => 'Centre créée avec succès']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show($id)
    {
        $shell = new \stdClass();
        $binding = Util::load( $shell);

        $binding[ 'centre'] = DB::select( 'SELECT centre.id, centre.description, communes.description as communes, department.description as departments,
                                      regions.description as regions, arrondissement.description as arrondissements, communes.id as commune_id FROM communes
                                      INNER JOIN centre ON centre.communes=communes.id INNER JOIN department ON centre.departments=department.id
                                      INNER JOIN regions ON centre.regions=regions.id INNER JOIN arrondissement ON centre.arrondissements=arrondissement.id'
                                      . ' WHERE centre.id=?', [$id])[ 0];

        return view('centre.show', $binding);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $shell = new \stdClass();
        $binding = Util::load( $shell);

        $binding[ 'editingCentre'] = Centre::find( $id);

        return view('centre.edit', $binding);
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
        $this->validate($request, [
            'arrondissements' => 'required',
            'communes' => 'required',
            'regions' => 'required',
            'description' => 'required',
            'departments' => 'required',
        ]);

        $centres = Centre::find($id);
        Util::fill( $centres, [ 'arrondissements', 'communes', 'regions', 'description', 'departments'], $request);

        Util::try_save( $centres);

        return redirect( 'centre')->with('success', 'Centre mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Centre::destroy( $id);
        return back()->with( 'success', 'Centre supprimé avec succès.');
    }
}

/*select communes.description as communes, arrondissement.description arrondissement, department.description department, regions.country regions, pays.description pays FROM communes INNER JOIN arrondissement ON communes.arrondissement=arrondissement.description INNER JOIN department ON arrondissement.department=department.description INNER JOIN regions ON department.regions=regions.region INNER JOIN pays ON pays.description=regions.country*/
