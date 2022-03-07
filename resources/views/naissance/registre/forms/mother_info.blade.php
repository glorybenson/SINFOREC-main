@extends('naissance.registre.container')

@section('form-content')
    @php
        $header = "Renseignement de la Mère";
        $previous = "naissance.forms.father_info";
        $next = "naissance.forms.declarant_info";
    @endphp
    <div class="row mb-3">
        <label for="mother_info-first_name"
               class="col-md-2 col-form-label text-md-end required">Prénom de la Mère</label>
        <div class="col-md-10">
            <input id="mother_info-first_name" type="text" class="form-control serializable" name="mother_info-first_name"
                   required tabindex="1">
            @if ($errors->has('description'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('description') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="row mb-3">
        <label for="mother_info-family_name"
               class="col-md-2 col-form-label text-md-end required">Nom de famille de la Mère</label>

        <div class="col-md-10">
            <input id="mother_info-family_name" type="text" class="form-control serializable" name="mother_info-family_name"
                   required tabindex="2">
            @if ($errors->has('description'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('description') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="row mb-3">
        <label for="mother_info-dob" class="col-md-2 col-form-label text-md-end required">
            Date de Naissance de la Mère</label>
        <div class="md-form md-outline input-with-post-icon datepicker">
            <input id="mother_info-dob" placeholder="Select date" name="mother_info-dob" type="date" class="form-control serializable" required tabindex="3">
        </div>
    </div>
    <div class="row mb-3">
        <label for="mother_info-birth_place"
               class="col-md-2 col-form-label text-md-end required">Lieu de Naissance de la Mère</label>
        <div class="col-md-10">
            <input id="mother_info-birth_place" type="text" class="form-control serializable" name="mother_info-birth_place"
                   required tabindex="4">
            @if ($errors->has('description'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('description') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="row mb-3">
        <label for="mother_info-occupation"
               class="col-md-2 col-form-label text-md-end required">Profession de la Mère</label>

        <div class="col-md-10">
            <input id="mother_info-occupation" type="text" class="form-control serializable" name="mother_info-occupation"
                   required tabindex="5">
            @if ($errors->has('description'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('description') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="row mb-3">
        <label for="mother_info-address"
               class="col-md-2 col-form-label text-md-end required">Addresse de la Mère</label>
        <div class="col-md-10">
            <input id="mother_info-address" type="text" class="form-control serializable" name="mother_info-address"
                   required tabindex="6">
            @if ($errors->has('description'))
                <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('description') }}</strong>
                                                        </span>
            @endif
        </div>
    </div>
@endsection
