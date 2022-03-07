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
                                        <a href="{{ route('registre') }}" class="btn btn-dark px-3">
                                            Retour</a>
                                    </div>

                                </div>
                                <div class="card-body">

                                    <form method="POST" action="{{ route('registre.edit.post', ['id' => $add->get('id')]) }}">
                                        @csrf


                                        <div class="row mb-3">
                                            <label for="first_name"
                                                class="col-md-2 col-form-label text-md-end">Prénom</label>

                                            <div class="col-md-10">
                                                <input value="{{ $add->get('first_name') }}" class="form-control"
                                                    id="first_name" name="first_name" required>
                                                @if ($errors->has('first_name'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('first_name') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="last_name" class="col-md-2 col-form-label text-md-end"> Nom de
                                                Famille</label>

                                            <div class="col-md-10">
                                                <input value="{{ $add->get('last_name') }}" class="form-control"
                                                    id="last" name="last_name" required>
                                                @if ($errors->has('last_name'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('last_name') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>





                                        <div class="row mb-3">
                                            <label for="description" class="col-md-2 col-form-label text-md-end">Date de
                                                Naissance</label>

                                            <div class="col-md-10">
                                                <input type="date" value="{{ $add->get('date_naissance') }}"
                                                    class="form-control" id="date_naissance" name="date_naissance"
                                                    required>
                                                @if ($errors->has('date_naissance'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('date_naissance') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>


                                        <div class="row mb-3">
                                            <label for="description" class="col-md-2 col-form-label text-md-end">Prénom du
                                                Père</label>

                                            <div class="col-md-10">
                                                <input value="{{ $add->get('name_of_father') }}" class="form-control"
                                                    id="name_of_father" name="name_of_father" required>
                                                @if ($errors->has('name_of_father'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('name_of_father') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>



                                        <div class="row mb-3">
                                            <label for="description" class="col-md-2 col-form-label text-md-end">Prénom de
                                                la mère</label>

                                            <div class="col-md-10">
                                                <input value="{{ $add->get('name_of_mother') }}" class="form-control"
                                                    id="name_of_mother" name="name_of_mother" required>
                                                @if ($errors->has('name_of_mother'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('name_of_mother') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>



                                        <div class="row mb-3">
                                            <label for="description" class="col-md-2 col-form-label text-md-end">Nom de
                                                Famille de la Mère</label>

                                            <div class="col-md-10">
                                                <input value="{{ $add->get('mother_maiden_name') }}"
                                                    class="form-control" id="name_of_mother" name="mother_maiden_name"
                                                    required>
                                                @if ($errors->has('mother_maiden_name'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('mother_maiden_name') }}</strong>
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
