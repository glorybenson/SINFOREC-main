@extends('layouts.app')

@section('content')
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="d-flex align-items-center">
                        <h5 class="page-title">Dashboard</h5>
                        <ul class="breadcrumb ml-2">
                            <li class="breadcrumb-item active">Regions</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title float-left">Regions</h4>
                        <div class="text-right">
                            <a href="{{ route('region.create') }}" class="btn btn-dark px-3">Créer une nouvelle region</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table mb-0 table-striped border-0 data-table" id="datatable">
                                <thead class="thead-light">
                                    <th>La description</th>
                                    <th>Pays</th>
                                    <th>Créé par</th>
                                    <th>Créé sur</th>
                                    <th>Action</th>
                                </thead>
                                        @foreach ( $regions as $item)
                                            <tr>
                                                <td>{{ $item->description }}</td>
                                                <td>{{ \App\Models\Pay::find( $item->pay_id)->description }}</td>
                                                <td>
                                                    {{ \App\Models\User::find( $item->created_by)->first_name }}
                                                </td>
                                                <td>
                                                {{ $item->created_at }}
                                                <td>
                                                    <a
                                                        href="{{ route('region.show', ['id' => $item->id, 'rt' => time()]) }}"><i
                                                            class="feather-eye"></i></a>
                                                    <a class="px-2"
                                                        href="{{ route('region.edit', ['id' => $item->id]) }}"> <i
                                                            class="feather-edit"></i></a>
<!--                                                    <a onclick="return confirm('Êtes-vous sûr de bien vouloir supprimer cet élément?');"
                                                        href="{{ route('region.delete', ['id' => $item->id]) }}"><i
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
