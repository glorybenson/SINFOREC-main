@extends('naissance.registre.container')

@section('form-content')
    @php
        $header = "Renseignement sur le Père";
        $previous = "naissance.forms.child_info";
        $next = "naissance.forms.mother_info";
    @endphp
    <div class="row mb-3">
        <label for="father_info-country"
               class="col-md-2 col-form-label text-md-end required">Prénom du Père</label>
        <div class="col-md-10">
            <input id="father_info-country" type="text" class="form-control serializable" name="father_info-country"
                   required tabindex="1">
            @if ($errors->has('description'))
                <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('description') }}</strong>
                                                        </span>
            @endif
        </div>
    </div>
    <div class="row mb-3">
        <label for="father_info-region"
               class="col-md-2 col-form-label text-md-end required">Nom de famille du Père</label>

        <div class="col-md-10">
            <input id="father_info-region" type="text" class="form-control serializable" name="father_info-region"
                   required tabindex="2">
            @if ($errors->has('description'))
                <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('description') }}</strong>
                                                        </span>
            @endif
        </div>
    </div>
    <div class="row mb-3">
        <label for="father_info-department" class="col-md-2 col-form-label text-md-end required">
            Date de Naissance du Père</label>
        <div class="md-form md-outline input-with-post-icon datepicker">
            <input id="father_info-department" placeholder="Select date" type="date" name="father_info-department" class="form-control serializable" required tabindex="3">
        </div>
    </div>
    <div class="row mb-3">
        <label for="father_info-borough"
               class="col-md-2 col-form-label text-md-end required">Lieu de Naissance du Père</label>

        <div class="col-md-10">
            <input id="father_info-borough" type="text" class="form-control serializable" name="father_info-borough"
                   required tabindex="4">
            @if ($errors->has('description'))
                <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('description') }}</strong>
                                                        </span>
            @endif
        </div>
    </div>
    <div class="row mb-3">
        <label for="father_info-communes"
               class="col-md-2 col-form-label text-md-end required">Profession du Père</label>

        <div class="col-md-10">
            <input id="father_info-communes" type="text" class="form-control serializable" name="father_info-communes"
                   required tabindex="5">
            @if ($errors->has('description'))
                <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('description') }}</strong>
                                                        </span>
            @endif
        </div>
    </div>
    <div class="row mb-3">
        <label for="father_info-center"
               class="col-md-2 col-form-label text-md-end required">Addresse du Père</label>
        <div class="col-md-10">
            <input id="father_info-center" type="text" class="form-control serializable" name="father_info-center"
                   required tabindex="6">
            @if ($errors->has('description'))
                <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('description') }}</strong>
                                                        </span>
            @endif
        </div>
    </div>
@endsection
