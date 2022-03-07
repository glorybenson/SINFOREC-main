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
                                        <li class="breadcrumb-item"><a
                                                href="{{ route('arrondissement') }}">Arrondissement</a>
                                        </li>
                                        <li class="breadcrumb-item active">Créer un nouveau Arrondissement</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title float-left">Arrondissement</h4>
                                    <div class="text-right">
                                        <a href="{{ route('arrondissement') }}" class="btn btn-dark px-3">
                                            Retour arrondissement</a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="{{ route('arrondissement.create.post') }}">
                                        @csrf


                                        <div class="row mb-3">
                                            <label for="description"
                                                class="col-md-2 col-form-label text-md-end">Description</label>

                                            <div class="col-md-10">
                                                <input value="{{ old('description') }}" type="text" class="form-control" id="description" name="description"
                                                       required>
                                                @if ($errors->has('description'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('description') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="description" class="col-md-2 col-form-label text-md-end">
                                                Département</label>
                                            <div class="col-md-10">
                                                @if (isset($department))
                                                    <select data-live-search="true" name="department_id" class="selectpicker w-100"
                                                        id="region">
                                                        <option value="" selected>--</option>
                                                        @foreach ($department as $item)
                                                            <option value="{{ $item->id }}">{{ $item->description }}</option>
                                                        @endforeach
                                                    </select>
                                                    @if ($errors->has('department_id'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('department_id') }}</strong>
                                                        </span>
                                                    @endif
                                                @endif
                                            </div>
                                        </div>
                                        <div class="float-right">
                                            <button type="submit" class="btn btn-primary px-4"
                                                onclick="return confirm('Are you sure you want to submit this form?')">
                                                Créer l’Arrondissement
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
