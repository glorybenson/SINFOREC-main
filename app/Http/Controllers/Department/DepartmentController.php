<?php

namespace App\Http\Controllers\Department;

use App\Http\Controllers\Controller;
use App\Models\Region;
use App\Models\Util;
use Illuminate\Http\Request;
use App\Models\Department;
use Illuminate\Support\Facades\DB;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $department = Department::all();
        $regions = Region::all();
        return view('department.index', ['department' => $department, 'regions' => $regions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $regions = Util::get_entity( 'regions');
        return view('department.create', ['regions' => $regions]);
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
            'region_id' => 'required|not_regex:/^--$/',
        ]);
        $department = new Department();
        Util::fill( $department, [ 'description', 'region_id'], $request);
        $department->created_by = Auth()->user()[ 'id'];

        return Util::try_save( $department, null, [ 'sender' => 'Department', 'redirect_url' => 'department', 'success' => 'Département créé avec succès']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show($id)
    {
        $department = Department::find($id);
        $region_id = $department->get( 'region_id')[ 0]->region_id;
        $region_description = Region::find( $region_id)->description;

        return view('department.show', ['department' => $department, 'region_description' => $region_description]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $regions = $this->getRegions();
        $department = Department::find($id);
        return view('department.edit', ['department' => $department, 'regions' => $regions]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $this->validate( $request, [
            'description' => 'required',
            'pays_id' => 'required|not_regex:/^--$/',
        ]);

        $department = Department::find($id);
        Util::fill( $department, [ 'description', 'region_id'], $request);

        Util::try_save( $department);

        return redirect( 'department')->with('success', 'Changements sauvegardés');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Department::destroy( $id);
        return redirect( 'destroy')->with('success', 'Élément supprimé avec succès');
    }

    /**
     * @return array
     */
    private function getRegions(): array
    {
        $uid = Auth()->user()['id'];
        $query = DB::table('regions')->where('created_by', $uid)->get();
        $regions = [];
        if (count($query) > 0)
            foreach ($query as $region) {
                $dummy = new \stdClass();
                $dummy->id = $region->id;
                $dummy->description = $region->description;
                $regions[] = $dummy;
            }
        return $regions;
    }
}
