@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-10 mx-auto">
            <div class="mt-3">
                <div class="content container-fluid">
                    <div class="page-header">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <div class="d-flex align-items-center">
                                    <h5 class="page-title">Dashboard</h5>
                                    <ul class="breadcrumb ml-2">
                                        <li class="breadcrumb-item"><a href="{{ route('centre') }}">Des détails</a>
                                        </li>
                                        <li class="breadcrumb-item active">Centre</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title float-left text-capitalize">
                                        Centre</h4>
                                    <div class="text-right">
                                        <a href="{{ route('centre') }}" class="btn btn-dark px-3">
                                            Retour centre</a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered table-striped">
                                        <tr>
                                            <td>La description</td>
                                            <td>{{ $centre->description }}</td>
                                        </tr>
                                        <tr>
                                            <td>Arrondissement</td>
                                            <td>{{ $centre->arrondissements }}</td>
                                        </tr>
                                        <tr>
                                            <td>Région</td>
                                            <td>{{ $centre->regions }}</td>
                                        </tr>
                                        <tr>
                                            <td>Département</td>
                                            <td>{{ $centre->departments }}</td>
                                        </tr>
                                        <tr>
                                            <td>Commune</td>
                                            <td>{{ $centre->communes }}</td>
                                        </tr>
                                    </table>
                                    <div class="mb-5">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
