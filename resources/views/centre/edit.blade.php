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
                                        <li class="breadcrumb-item text-capitalize"><a
                                                href="{{ route('communes') }}">Communes</a>
                                        </li>
                                        <li class="breadcrumb-item active">Éditer</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" data-conn="{{ $link }}">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title float-left">Éditer</h4>
                                    <div class="text-right">
                                        <a href="{{ route('centre') }}" class="btn btn-dark px-3">
                                            Retour centre</a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form method="POST"
                                    action="{{ route('centre.edit.post', [ 'id' => $editingCentre->id]) }}">
                                        @csrf
                                        <div class="row mb-3">
                                            <label for="description"
                                                class="col-md-2 col-form-label text-md-end">Description</label>
                                            <div class="col-md-10">
                                                <input value="{{ $editingCentre->description }}" class="form-control"
                                                    id="description" name="description" required>
                                                @if ($errors->has('description'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('description') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="description" class="col-md-2 col-form-label text-md-end">
                                                Arrondissement</label>
                                            <div class="col-md-10">
                                                <select data-live-search="true" name="arrondissements"
                                                    class="selectpicker w-100" id="region">
                                                    <option value="" selected>--</option>
                                                    @foreach ($arrondissements as $item)
                                                        <option value="{{ ((object)$item)->description }}">
                                                            {{ ((object)$item)->description }}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('arrondissements'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('arrondissements') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="description" class="col-md-2 col-form-label text-md-end">
                                                Région</label>
                                            <div class="col-md-10">
                                                <select data-live-search="true" name="regions" class="selectpicker w-100"
                                                    id="region">
                                                    <option selected>--</option>
                                                    @foreach ($regions as $item)
                                                        <option value="{{ ((object)$item)->description }}">
                                                            {{ ((object)$item)->description }}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('regions'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('regions') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="description" class="col-md-2 col-form-label text-md-end">
                                                Département</label>
                                            <div class="col-md-10">
                                                <select data-live-search="true" name="departments" class="selectpicker w-100"
                                                    id="region">
                                                    <option value="" selected>--</option>
                                                    @foreach ( $departments as $item)
                                                        <option value="{{ ((object)$item)->description }}">
                                                            {{ ((object)$item)->description }}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('departments'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('departments') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="description" class="col-md-2 col-form-label text-md-end">
                                                Communes</label>
                                            <div class="col-md-10">
                                                <select data-live-search="true" name="communes" class="selectpicker w-100"
                                                    id="region">
                                                    <option value="" selected>--</option>
                                                    @foreach ($communes as $item)
                                                        <option value="{{ ((object)$item)->description }}">
                                                            {{ ((object)$item)->description }}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('communes'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('communes') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="float-right">
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
