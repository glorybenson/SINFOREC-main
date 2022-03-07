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
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title float-left">Éditer</h4>
                                    <div class="text-right">
                                        <a href="{{ route('communes') }}" class="btn btn-dark px-3">
                                            Retour communes</a>
                                    </div>

                                </div>
                                <div class="card-body">
                                    <form method="POST"
                                        action="{{ route('communes.edit.post', ['id' => $communes->id]) }}">
                                        @csrf
                                        <div class="row mb-3">
                                            <label for="description"
                                                class="col-md-2 col-form-label text-md-end">Description</label>

                                            <div class="col-md-10">
                                                <input value="{{ $communes->description }}" class="form-control" id="description" name="description"
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
                                                Arrondissement</label>
                                            <div class="col-md-10">
                                                <select data-live-search="true" name="arrondissement_id"
                                                    class="selectpicker w-100" id="region">
                                                    @foreach ($arrondissement as $item)
                                                        <option value="{{ $item->id  }}"
                                                            {{ $item->id ===  $communes->arrondissement_id ? 'selected' : '' }} >
                                                            {{ $item->description }}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('arrondissement_id'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('arrondissement_id') }}</strong>
                                                    </span>
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
