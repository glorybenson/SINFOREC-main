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
                                        <li class="breadcrumb-item"><a href="{{ route('registre') }}">Des
                                                détails</a>
                                        </li>
                                        <li class="breadcrumb-item active"></li>
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
                                        {{ $add->get('first_name') . ' ' . $add->get('last_name') }}</h4>
                                    <div class="text-right">
                                        <a href="{{ route('registre') }}" class="btn btn-dark px-3">
                                            Retour</a>
                                    </div>
                                </div>
                                <div class="card-body">

                                    <table class="table table-bordered table-striped">
                                        <tr>
                                            <td>Prénom</td>
                                            <td>{{ $add->get('first_name') }}</td>
                                        </tr>
                                        <tr>
                                            <td>Nom de Famille</td>
                                            <td>{{ $add->get('last_name') }}</td>
                                        </tr>
                                        <tr>
                                            <td>Date de Naissance</td>
                                            <td>{{ $add->get('date_naissance') }}</td>
                                        </tr>
                                        <tr>
                                            <td>Prénom du Père</td>
                                            <td>{{ $add->get('name_of_father') }}</td>
                                        </tr>
                                        <tr>
                                            <td>Prénom de la mère</td>
                                            <td>{{ $add->get('name_of_mother') }}</td>
                                        </tr>
                                        <tr>
                                            <td>Nom de Famille de la Mère</td>
                                            <td>{{ $add->get('mother_maiden_name') }}</td>
                                        </tr>
                                        <tr>
                                            <td>Creer par</td>
                                            <td>{{ $add->get('admin_first_name') . ' ' . $add->get('admin_last_name') }}
                                            </td>
                                        </tr>
                                        <td>Cree le</td>
                                        <td>
                                            {{ Carbon\Carbon::parse($add->get('created_at'))->format('d-m-Y') }}
                                        </td>
                                    </table>



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
    </div>
@endsection
