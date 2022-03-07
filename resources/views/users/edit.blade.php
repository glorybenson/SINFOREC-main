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
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Utilisateur</a>
                                    </li>
                                    <li class="breadcrumb-item active">Edit</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title float-left">Edit User Details</h4>
                                <div class="text-right">
                                    <a href="{{ route('home') }}" class="btn btn-dark px-3">Retour aux utilisateurs</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('edit.user', $user->id) }}">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $user->id }}">

                                    <div class="row mb-3">
                                        <label for="first_name" class="col-md-2 col-form-label text-md-end">{{ __('Prénom') }}</label>

                                        <div class="col-md-10">
                                            <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ $user->first_name }}" autocomplete="first name" required>
                                            @error('first_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="last_name" class="col-md-2 col-form-label text-md-end">{{ __('Nom de famille') }}</label>

                                        <div class="col-md-10">
                                            <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ $user->last_name }}" required autocomplete="last name">

                                            @error('last_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="pays" class="col-md-2 col-form-label text-md-end">Pays</label>
                                        <div class="col-md-10">
                                            <select multiple id="geographical_zone_pay" multiple onchange="dataFilterSelect(this, 'pay', 'geographical_zone_region')" data-parsley-errors-container="#invalid-feedback" class="select" data-name="pays" name="pays[]" required aria-label=".form-select-lg">
                                                @if(isset($pays))
                                                @foreach($pays as $pay)
                                                <option value="{{$pay->id}}" {{ collect($user->pays)->contains($pay->id) ? 'selected' : '' }}>{{$pay->description}}</option>
                                                @endforeach
                                                @endif
                                            </select>
                                            <span class="feedback-new" id="invalid-feedback" role="alert"></span>
                                            @error('pays')
                                            <span class="invalid-feedback" id="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="description" class="col-md-2 col-form-label text-md-end">Régions</label>
                                        <div class="col-md-10">
                                            <select id="geographical_zone_region" multiple onchange="dataFilterSelect(this, 'region', 'geographical_zone_department')" data-parsley-errors-container="#invalid-feedback2" data-live-search="true" name="regions[]" class="select" tabindex="2" required>
                                                <!-- <option value="">--</option> -->
                                                @isset($regions))
                                                @foreach($regions as $region)
                                                <option value="{{$region->id}}" {{ collect($user->regions)->contains($region->id) ? 'selected' : '' }}>{{$region->description}}</option>
                                                @endforeach
                                                @endisset
                                            </select>
                                            <span class="feedback-new" id="invalid-feedback2" role="alert"></span>
                                            @error('regions')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="description" class="col-md-2 col-form-label text-md-end">Départements</label>
                                        <div class="col-md-10">
                                            <select id="geographical_zone_department" multiple onchange="dataFilterSelect(this, 'department', 'geographical_zone_arrondissement')" data-parsley-errors-container="#invalid-feedback3" data-live-search="true" name="departments[]" class="select w-100 serializable" tabindex="2" required>
                                                <!-- <option value="">--</option> -->
                                                @if(isset($departments))
                                                @foreach($departments as $department)
                                                <option value="{{$department->id}}" {{ collect($user->departments)->contains($department->id) ? 'selected' : '' }}>{{$department->description}}</option>
                                                @endforeach
                                                @endif
                                            </select>
                                            <span class="feedback-new" id="invalid-feedback3" role="alert"></span>
                                            @error('departments')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="description" class="col-md-2 col-form-label text-md-end">Arrondissements</label>
                                        <div class="col-md-10">
                                            <select id="geographical_zone_arrondissement" multiple onchange="dataFilterSelect(this, 'arrondissement', 'geographical_zone_commune')" data-parsley-errors-container="#invalid-feedback4" data-live-search="true" name="arrondissements[]" class="select w-100 serializable" tabindex="2" required>
                                                <!-- <option value="">--</option> -->
                                                @if(isset($arrondissements))
                                                @foreach($arrondissements as $arrondissement)
                                                <option value="{{$arrondissement->id}}" {{ collect($user->arrondissements)->contains($arrondissement->id) ? 'selected' : '' }}>{{$arrondissement->description }}</option>
                                                @endforeach
                                                @endif
                                            </select>
                                            <span class="feedback-new" id="invalid-feedback4" role="alert"></span>
                                            @error('arrondissements')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="commune" class="col-md-2 col-form-label text-md-end">Communes</label>
                                        <div class="col-md-10">
                                            <select id="geographical_zone_commune" multiple onchange="dataFilterSelect(this, 'commune', 'geographical_zone_centre')" data-parsley-errors-container="#invalid-feedback5" data-live-search="true" name="communes[]" class="select w-100 serializable modifiable" tabindex="2" required>
                                                <!-- <option value="">--</option> -->
                                                @if(isset($communes))
                                                @foreach($communes as $commune)
                                                <option value="{{$commune->id}}" {{ collect($user->communes)->contains($commune->id) ? 'selected' : '' }}>{{$commune->description}}</option>
                                                @endforeach
                                                @endif
                                            </select>
                                            <span class="feedback-new" id="invalid-feedback5" role="alert"></span>
                                            @error('communes')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="description" class="col-md-2 col-form-label text-md-end">Centres</label>
                                        <div class="col-md-10">
                                            <select id="geographical_zone_centre" multiple data-parsley-errors-container="#invalid-feedback6" data-live-search="true" name="centres[]" class="select w-100 serializable" tabindex="2" required>
                                                <!-- <option value="">--</option> -->
                                                @if(isset($centre))
                                                @foreach($centre as $item)
                                                <option value="{{$item->id}}" {{ collect($user->centres)->contains($item->id) ? 'selected' : '' }}>{{$item->description}}</option>
                                                @endforeach
                                                @endif
                                            </select>
                                            <span class="feedback-new" id="invalid-feedback6" role="alert"></span>
                                            @error('centres')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="email" class="col-md-2 col-form-label text-md-end">{{ __('E-Mail') }}</label>

                                        <div class="col-md-10">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="email" class="col-md-2 col-form-label text-md-end">{{ __('User Role') }}</label>

                                        <div class="col-md-10">
                                            <select multiple class="select select2-hidden-accessible @error('role') is-invalid @enderror" name="role[]" required>
                                                <option value="">Select Role</option>
                                                <option value="2" {{ collect($user->roles)->contains(2) ? 'selected' : '' }}>Administration</option>
                                                <option value="3" {{ collect($user->roles)->contains(3) ? 'selected' : '' }}>Naissance</option>
                                                <option value="4" {{ collect($user->roles)->contains(4) ? 'selected' : '' }}>Mariage</option>
                                                <option value="5" {{ collect($user->roles)->contains(5) ? 'selected' : '' }}>Décès</option>
                                                <option value="6" {{ collect($user->roles)->contains(6) ? 'selected' : '' }}>Certificat De</option>
                                                <option value="7" {{ collect($user->roles)->contains(7) ? 'selected' : '' }}>Rapports</option>
                                                <option value="8" {{ collect($user->roles)->contains(8) ? 'selected' : '' }}>Tableau de Bord</option>
                                            </select>
                                            @error('role')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary p-2" onclick="return confirm('Are you sure you want to submit this form?')">
                                            {{ __('Update user details') }}
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
@include('layouts.includes.filterJs')
@endsection