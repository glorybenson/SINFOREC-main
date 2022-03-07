@extends('layouts.app')

@section('content')
    <div class="content container-fluid" data-user="{{ Auth()->user()->email  }}">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="d-flex align-items-center">
                        <h5 class="page-title">Dashboard</h5>
                        <ul class="breadcrumb ml-2">
                            <li class="breadcrumb-item active">{{ $header }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title float-left">{{ $header }}</h4>
                        <div class="float-right">
                            <button id="draft" class="btn btn-outline-primary px-4" style="font-size: large">
                                enregistrer dans les brouillons
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('arrondissement.create.post') }}">
                            @csrf
                            @yield( 'form-content')
                            <div class="d-flex justify-content-end">
                                @if( isset( $previous))
                                    <a id="previous" href="{{route( $previous)}}"
                                       class="btn btn-outline-primary px-4 text-capitalize mr-3" style="font-size: large">
                                        précédent
                                    </a>
                                @endif
                                @if( isset( $last))
                                    <button type="submit"
                                            class="btn btn-outline-primary px-4 mr-3"
                                            onclick="return confirm('Are you sure you want to submit this form?')">
                                        Sauvegarder et quitter
                                    </button>
                                @else
                                        <div class="float-right">
                                            <a id="next" href="{{route( $next)}}"
                                               class="btn btn-outline-primary px-4 text-capitalize" style="font-size: large">
                                                suivante
                                            </a>
                                        </div>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
