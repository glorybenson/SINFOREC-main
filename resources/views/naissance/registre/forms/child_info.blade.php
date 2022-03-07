@extends('naissance.registre.container')

@section('form-content')
    @php
        $header = "Renseignement sur l’enfant";
        $previous = "naissance.forms.geographical_zone";
        $next = "naissance.forms.father_info";
    @endphp
    <div class="row mb-3">
        <label for="child_info-date_of_decl" class="col-md-2 col-form-label text-md-end required">
            Date de Déclaration</label>
        <div class="md-form md-outline input-with-post-icon datepicker">
            <input id="child_info-date_of_decl" name="child_info-date_of_decl" placeholder="Select date" type="date" class="form-control serializable"
                   required>
        </div>
    </div>
    <div class="row mb-3">
        <label for="child_info-decl_number"
               class="col-md-2 col-form-label text-md-end required">Numéro de déclaration</label>
        <div class="col-md-10">
            <input id="child_info-decl_number" type="number" class="form-control serializable" name="child_info-decl_number"
                   required tabindex="1">
            @if ($errors->has('description'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('description') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="row mb-3">
        <label for="child_info-first_name"
               class="col-md-2 col-form-label text-md-end required">Prénom de l'enfant</label>

        <div class="col-md-10">
            <input id="child_info-first_name" type="text" class="form-control serializable" name="child_info-first_name"
                   required tabindex="2">
            @if ($errors->has('description'))
                <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('description') }}</strong>
                                                    </span>
            @endif
        </div>
    </div>
    <div class="row mb-3">
        <label for="child_info-last_name"
               class="col-md-2 col-form-label text-md-end required">Nom de famille de l'enfant</label>

        <div class="col-md-10">
            <input id="child_info-last_name" type="text" class="form-control serializable" name="child_info-last_name"
                   required tabindex="3">
            @if ($errors->has('description'))
                <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('description') }}</strong>
                                                    </span>
            @endif
        </div>
    </div>
    <div class="row mb-3">
        <label for="child_info-dob" class="col-md-2 col-form-label text-md-end required">
            Date de Naissance de l'enfant</label>
        <div class="md-form md-outline input-with-post-icon datepicker">
            <input id="child_info-dob" placeholder="Select date" type="date" name="child_info-dob" class="form-control serializable" required
                   tabindex="4">
        </div>
    </div>
    <div class="row mb-3">
        <label for="child_info-birth_time" class="col-md-2 col-form-label text-md-end required">
            Heure de Naissance</label>
        <div class="md-form md-outline input-with-post-icon datepicker">
            <input id="child_info-birth_time" placeholder="Select date" type="time" name="child_info-birth_time" class="form-control serializable"
                   required tabindex="5">
        </div>
    </div>
    <div class="row mb-3">
        <label for="child_info-gender" class="col-md-2 col-form-label text-md-end required">
            Sexe</label>
        <div class="col-md-10">
            <select id="child_info-gender" data-live-search="true" name="child_info-gender"
                    class="selectpicker w-100 serializable" required tabindex="6">
                <option value>--</option>
                <option value="Masculin">Masculin</option>
                <option value="Féminin">Féminin</option>
            </select>
        </div>
    </div>
    <div class="row mb-3">
        <label for="child_info-health_training"
               class="col-md-2 col-form-label text-md-end">Formation sanitaire</label>
        <div class="col-md-10">
            <input id="child_info-health_training" type="text" class="form-control serializable" name="child_info-health_training" tabindex="7">
            @if ($errors->has('description'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('description') }}</strong>
                </span>
            @endif
        </div>
    </div>
@endsection
