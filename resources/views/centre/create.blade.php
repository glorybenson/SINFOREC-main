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
                                                href="{{ route('centre') }}">centre</a>
                                        </li>
                                        <li class="breadcrumb-item active">Créer une nouvelle centre</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" data-conn="{{ $link }}">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title float-left">Centre</h4>
                                    <div class="text-right">
                                        <a href="{{ route('centre') }}" class="btn btn-dark px-3">
                                            Retour centre</a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="{{ route('centre.create.post') }}">
                                        @csrf
                                        <div class="row mb-3">
                                            <label for="description"
                                                   class="col-md-2 col-form-label text-md-end">Description</label>
                                            <div class="col-md-10">
                                                <input value="{{ old('description') }}" class="form-control" name="description" required>
                                                @if ($errors->has('description'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('description') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="description" class="col-md-2 col-form-label text-md-end">
                                                Region</label>
                                            @if (isset($regions))
                                                <div class="col-md-10">
                                                    <select data-live-search="true" data-name="regions" name="regions"
                                                            class="selectpicker w-100 modifiable" id="regions">
                                                        <option value="" selected>--</option>
                                                        @foreach ($regions as $item)
                                                            <option value="{{ ((object)$item)->id }}">
                                                                {{ ((object)$item)->description }}</option>
                                                        @endforeach
                                                    </select>
                                                    @if ($errors->has('regions'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('regions') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            @endif
                                        </div>
                                        <div class="row mb-3">
                                            <label for="description" class="col-md-2 col-form-label text-md-end">
                                                Département</label>
                                            @if (isset($departments))
                                                <div class="col-md-10">
                                                    <select data-live-search="true" data-name="departments" name="departments" id="departments" class="selectpicker w-100 modifiable">
                                                        <option value="" selected>--</option>
                                                        @foreach ($departments as $item)
                                                            <option value="{{ ((object)$item)->id }}">
                                                                {{ ((object)$item)->description }}</option>
                                                        @endforeach
                                                    </select>
                                                    @if ($errors->has('departments'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('departments') }}</strong>
                                                        </span>
                                                    @endif
                                                    @endif
                                                </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="description" class="col-md-2 col-form-label text-md-end">
                                                Arrondissement</label>
                                            @if (isset($arrondissements))
                                                <div class="col-md-10">
                                                    <select data-live-search="true" data-name="arrondissements" name="arrondissements"
                                                            class="selectpicker w-100 modifiable" id="arrondissements">
                                                        <option value="" selected>--</option>
                                                        @foreach ($arrondissements as $item)
                                                            <option value="{{ ((object)$item)->id }}">
                                                                {{ ((object)$item)->description }}</option>
                                                        @endforeach
                                                    </select>
                                                    @if ($errors->has('arrondissements'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('arrondissements') }}</strong>
                                                        </span>
                                                    @endif
                                                    @endif
                                                </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="communes" class="col-md-2 col-form-label text-md-end">
                                                Communes</label>
                                            @if (isset($communes))
                                                <div class="col-md-10">
                                                    <select data-live-search="true" data-name="communes" name="communes"
                                                            class="selectpicker w-100 modifiable" id="communes">
                                                        <option value="" selected>--</option>
                                                        @foreach ($communes as $item)
                                                            <option value="{{ ((object)$item)->id }}">
                                                                {{ ((object)$item)->description }}</option>
                                                        @endforeach
                                                    </select>
                                                @if ($errors->has('commune'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('communes') }}</strong>
                                                    </span>
                                                @endif
                                            @endif
                                            </div>
                                        </div>
                                        <div class="float-right">
                                            <button type="submit" class="btn btn-primary px-4"
                                                onclick="return confirm('Are you sure you want to submit this form?')">
                                                Créer le Centre
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
