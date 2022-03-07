@extends('naissance.registre.container')

@section('form-content')
    @php
        $header = "Renseignement sur le Déclarant";
        $previous = "naissance.forms.mother_info";
        $next = "naissance.forms.judgement";
    @endphp
    <div class="row mb-3">
        <label for="declarant_info-first_name"
               class="col-md-2 col-form-label text-md-end required">Prénom du déclarant</label>

        <div class="col-md-10">
            <input id="declarant_info-first_name" type="text" class="form-control serializable" name="declarant_info-first_name"
                   required tabindex="1">
            @if ($errors->has('description'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('description') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="row mb-3">
        <label for="declarant_info-last_name"
               class="col-md-2 col-form-label text-md-end required">Nom du déclarant</label>

        <div class="col-md-10">
            <input id="declarant_info-last_name" type="text" class="form-control serializable" name="declarant_info-last_name"
                   required tabindex="2">
            @if ($errors->has('description'))
                <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('description') }}</strong>
                                                        </span>
            @endif
        </div>
    </div>
    <div class="row mb-3">
        <label for="declarant_info-address"
               class="col-md-2 col-form-label text-md-end required">Adresse du déclarant </label>

        <div class="col-md-10">
            <input id="declarant_info-address" type="text" class="form-control serializable" name="declarant_info-address"
                   required tabindex="3">
            @if ($errors->has('description'))
                <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('description') }}</strong>
                                                        </span>
            @endif
        </div>
    </div>
    <div class="row mb-3">
        <label for="declarant_info-profession"
               class="col-md-2 col-form-label text-md-end required">Profession du déclarant </label>

        <div class="col-md-10">
            <input id="declarant_info-profession" type="number" class="form-control"
                   name="declarant_info-profession"
                   required tabindex="5">
            @if ($errors->has('description'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('description') }}</strong>
                </span>
            @endif
        </div>
    </div>
@endsection
