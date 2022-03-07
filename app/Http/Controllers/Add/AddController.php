<?php

namespace App\Http\Controllers\Add;

use App\Http\Controllers\Controller;
use App\Models\Util;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Models\Add;
use Illuminate\Support\Facades\Auth;

class AddController extends Controller
{
    const GEO_ZONE = 'geographical_zone';
//    const VALIDATION_FIELDS = [
//        'first_name' => 'required',
//        'last_name' => 'required',
//        'date_naissance' => 'required',
//        'name_of_mother' => 'required',
//        'name_of_father' => 'required',
//        'mother_maiden_name' => 'required',
//    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $add = DB::table('naissance_add')
            ->join('users', 'naissance_add.created_by', '=', 'users.id')
            ->select('naissance_add.*')
            ->get();

        return view('naissance.registre.index', ['add' => $add]);
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
        $binding[ 'post_url'] = route( 'naissance.registre.create.post');
        $binding[ 'page_url'] = route( 'naissance.registre.create');

        return view('naissance.registre.create', $binding);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\RedirectResponse|Response
     */
    public function store(Request $request)
    {
        $inputs = $request->all();
        unset($inputs['_token']);
        if( array_key_exists( 'src', $inputs))
        {
            unset( $inputs[ 'src']);
            $ajax_call = true;
        }

        $add = new Add();
        $add->values = json_encode( $inputs);
        $add->created_by = Auth::user()[ 'id'];
        $add->done = isset( $ajax_call);
        $add->save();

        if ( isset( $ajax_call))
        {
            return response("Ajout créée avec succès", 200)
                ->header('Content-Type', 'text/plain');
        }

        return back()->with('success', 'Ajout créée avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show($id)
    {
        $add = DB::table('naissance_add')
            ->join('users', 'naissance_add.created_by', '=', 'users.id')
            ->select('naissance_add.*', 'users.first_name as admin_first_name', 'users.last_name as admin_last_name')
            ->get()->first();
        return view('naissance.registre.show', ['registre' => collect($add)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $old = Add::find( $id);
        $shell = new \stdClass();
        $binding = Util::load( $shell);
        $binding[ 'old'] = $old->values;
        $binding[ 'post_url'] = route( 'naissance.registre.edit.post', [ 'id' => $id]);
        $binding[ 'page_url'] = route( 'naissance.registre.edit', [ 'id' => $id]);

        return view('naissance.registre.create', $binding);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\RedirectResponse|Response
     */
    public function update( Request $request, $id)
    {
        $inputs = $request->all();
        unset($inputs['_token']);
        if( array_key_exists( 'src', $inputs))
        {
            unset( $inputs[ 'src']);
            $ajax_call = true;
        }
        $add = Add::find( $id);
        $add->values = json_encode( $inputs);
        $add->update();

        if ( isset( $ajax_call))
        {
            return response("Add créée avec succès", 200)
                ->header('Content-Type', 'text/plain');
        }

        return redirect()->back()->with('success', 'Add créée avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Add::destroy($id);
        return redirect()->route('naissance.registre')->with('success', 'Supprimée avec succès');
    }
}
