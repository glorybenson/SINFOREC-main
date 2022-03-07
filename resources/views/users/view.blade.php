@extends('layouts.app')

@section('content')
<style>
    .badge {
        font-size: 16px;
    }
</style>
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
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Utilisateur</a>
                                    </li>
                                    <li class="breadcrumb-item active">View</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title float-left">User Details</h4>
                                <div class="text-right">
                                    <a href="{{ route('home') }}" class="btn btn-dark px-3">Retour aux utilisateurs</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row pr-3 pl-3">
                                    <div class="col-3">
                                        <h6>Prénom</h6>
                                    </div>
                                    <div class="col-9">
                                        <h6>{{ $user->first_name }}</h6>
                                    </div>
                                </div>
                                <hr>
                                <div class="row pr-3 pl-3">
                                    <div class="col-3">
                                        <h6>Nom de famille</h6>
                                    </div>
                                    <div class="col-9">
                                        <h6>{{ $user->last_name }}</h6>
                                    </div>
                                </div>
                                <hr>
                                <div class="row pr-3 pl-3">
                                    <div class="col-3">
                                        <h6>User Role</h6>
                                    </div>
                                    <div class="col-9">
                                        @if(isset($roles))
                                        @foreach($roles as $role)
                                        @if(collect($user->roles)->contains($role['id']))
                                        <span class="badge badge-primary">{{$role['name']}}</span>
                                        @endif
                                        @endforeach
                                        @endif
                                    </div>
                                </div>
                                <hr>
                                <div class="row pr-3 pl-3">
                                    <div class="col-3">
                                        <h6>Pays</h6>
                                    </div>
                                    <div class="col-9">
                                        @if(isset($pays))
                                        @foreach($pays as $pay)
                                        @if(collect($user->pays)->contains($pay->id))
                                        <span class="badge badge-primary">{{$pay->description}}</span>
                                        @endif
                                        @endforeach
                                        @endif
                                    </div>
                                </div>
                                <hr>
                                <div class="row pr-3 pl-3">
                                    <div class="col-3">
                                        <h6>Départements</h6>
                                    </div>
                                    <div class="col-9">
                                        @if(isset($departments))
                                        @foreach($departments as $department)
                                        @if(collect($user->departments)->contains($department->id))
                                        <span class="badge badge-primary">{{$department->description}}</span>
                                        @endif
                                        @endforeach
                                        @endif
                                    </div>
                                </div>
                                <hr>
                                <div class="row pr-3 pl-3">
                                    <div class="col-3">
                                        <h6>Arrondissements</h6>
                                    </div>
                                    <div class="col-9">
                                        @if(isset($arrondissements))
                                        @foreach($arrondissements as $arrondissement)
                                        @if(collect($user->arrondissements)->contains($arrondissement->id))
                                        <span class="badge badge-primary">{{$arrondissement->description}}</span>
                                        @endif
                                        @endforeach
                                        @endif
                                    </div>
                                </div>
                                <hr>
                                <div class="row pr-3 pl-3">
                                    <div class="col-3">
                                        <h6>Communes</h6>
                                    </div>
                                    <div class="col-9">
                                        @if(isset($communes))
                                        @foreach($communes as $commune)
                                        @if(collect($user->communes)->contains($commune->id))
                                        <span class="badge badge-primary">{{$commune->description}}</span>
                                        @endif
                                        @endforeach
                                        @endif
                                    </div>
                                </div>
                                <hr>
                                <div class="row pr-3 pl-3">
                                    <div class="col-3">
                                        <h6>Centres</h6>
                                    </div>
                                    <div class="col-9">
                                        @if(isset($centre))
                                        @foreach($centre as $data)
                                        @if(collect($user->centres)->contains($data->id))
                                        <span class="badge badge-primary">{{$data->description}}</span>
                                        @endif
                                        @endforeach
                                        @endif
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
@include('layouts.includes.filterJs')
@endsection