<?php

namespace App\Http\Controllers\Pays;

use App\Http\Controllers\Controller;
use App\Models\Communes;
use App\Models\Util;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Models\Pay;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PaysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $pays = Pay::all();
        return view('pays.index', compact('pays'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $communes = Communes::all();
        return view('pays.create', [ 'communes' => $communes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'description' => 'required'
        ]);
        $pay = new Pay;
        Util::fill( $pay, [ 'description'], $request);
        $pay->created_by = Auth::user()[ 'id'];

        return Util::try_save( $pay, null, [ 'sender' => 'Pays', 'redirect_url' => 'pays', 'success' => 'Pays créé avec succès']);
        return redirect( 'pays')->with('success', 'De nouveaux pays ont été ajoutés');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show($id)
    {
        $pay = Pay::find($id);
        return view('pays.show', ['pay' => collect($pay)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pay = Pay::find($id);
        return view('pays.edit', ['pay' => collect($pay)]);
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
        $pay = Pay::find($id);
        $pay->description = $request->description;
        Util::try_save( $pay);
        return  redirect( 'pays')->with('success', 'Changements sauvegardés avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Pay::destroy( $id);
        return redirect('pays')->with('success', 'élément supprimé avec succès');
    }
}
