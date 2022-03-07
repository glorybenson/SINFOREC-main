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
                                        <li class="breadcrumb-item"><a href="{{ route('pays.index') }}">Des détails</a>
                                        </li>
                                        <li class="breadcrumb-item active">La description</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title float-left">
                                        La description</h4>
                                    <div class="text-right">
                                        <a href="{{ route('pays.index') }}" class="btn btn-dark px-3">
                                            Retour pays</a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="mb-5">
                                        <label for=""> La description</label>
                                        <p>{{ $pay->get('description') }}</p>
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
