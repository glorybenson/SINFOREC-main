@extends('layouts.app')

@section('content')
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="d-flex align-items-center">
                        <h5 class="page-title">Dashboard</h5>
                        <ul class="breadcrumb ml-2">
                            <li class="breadcrumb-item active">Pays</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title float-left">Pays</h4>
                        <div class="text-right">
                            <a href="{{ route('pays.create') }}" class="btn btn-dark px-3">Ajout d’un pays</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table mb-0 table-striped border-0 data-table" id="datatable">
                                <thead class="thead-light">
                                    <th>La description</th>
                                    <th>Créé par</th>
                                    <th>Créé sur</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    @foreach ($pays as $pay)
                                        <tr>
                                            <td>
                                                {{ $pay->description }}
                                            </td>
                                            <td>
                                                {{ \App\Models\User::find( $pay->created_by)->first_name }}
                                            </td>
                                            <td>
                                                {{ $pay->created_at }}
                                            </td>
                                            <td>
                                                <a class="text-dark"
                                                    href="{{ route('pays.show', ['id' => $pay->id, 'rt' => time()]) }}"><i
                                                        class="feather-eye"></i></a>
                                                <a href="{{ route('pays.edit', ['id' => $pay->id]) }}"
                                                    class="mx-2 text-dark"><i class="feather-edit"></i></a>
<!--                                                <a class="text-dark"
                                                    onclick="return confirm('Êtes-vous sûr de bien vouloir supprimer cet élément?');"
                                                    href="{{ route('pays.delete', ['id' => $pay->id]) }}"><i
                                                        class="feather-trash"></i></a>-->
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
