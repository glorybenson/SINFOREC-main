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
                                        <li class="breadcrumb-item"><a href="{{ route('regions.index') }}">Regions</a>
                                        </li>
                                        <li class="breadcrumb-item active">Éditer</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title float-left">Éditer</h4>
                                    <div class="text-right">
                                        <a href="{{ route('regions.index') }}" class="btn btn-dark px-3">
                                            Retour regions</a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form method="POST"
                                        action="{{ route('region.edit.post', ['id' => $region->id]) }}">
                                        @csrf
                                        {{-- <div class="row mb-3">
                                            <label for="first_name"
                                                class="col-md-2 col-form-label text-md-end">Prénom</label>

                                            <div class="col-md-10">
                                                <input value="{{ old('first_name') }}" id="first_name" type="text"
                                                    class="form-control " name="first_name" autocomplete="name" required>
                                                @if ($errors->has('first_name'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('first_name') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="last_name" class="col-md-2 col-form-label text-md-end">
                                                Nom de famille</label>

                                            <div class="col-md-10">
                                                <input id="last_name" type="text" class="form-control " name="last_name"
                                                    value="{{ old('last_name') }}" required autocomplete="name" autofocus>
                                                @if ($errors->has('last_name'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('last_name') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div> --}}

                                        {{-- <div class="row mb-3">
                                            <label for="email" class="col-md-2 col-form-label text-md-end">E-mail</label>

                                            <div class="col-md-10">
                                                <input id="email" type="email" class="form-control " name="email"
                                                    value="{{ old('email') }}" required autocomplete="email">
                                                @if ($errors->has('email'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div> --}}
                                        <div class="row mb-3">
                                            <label for="description"
                                                class="col-md-2 col-form-label text-md-end">Description</label>

                                            <div class="col-md-10">
                                                <input  value="{{ $region->description }}" class="form-control" id="description" name="description"
                                                    required>
                                                @if ($errors->has('description'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('description') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="role" class="col-md-2 col-form-label text-md-end">Pays</label>
                                            <div class="col-md-10">
                                                <select class="selectpicker w-100" data-live-search="true" name="pay_id"
                                                        required aria-label=".form-select-lg example">
                                                    @foreach( $countries as $country)
                                                        <option value="{{ $country->id  }}" {{ $country->id == $region->pay_id ? 'selected' : '' }} >
                                                            {{ $country->description  }}</option>
                                                    @endforeach
                                                </select>
                                                @if ( $errors->any())
                                                    <div class="text-danger">
                                                        <ul>
                                                            @foreach ($errors->all() as $error)
                                                                <li>{{ $error }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-primary px-4"
                                                onclick="return confirm('Are you sure you want to submit this form?')">
                                                Sauvegarder les modifications
                                            </button>
                                        </div>
                                    </form>
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
