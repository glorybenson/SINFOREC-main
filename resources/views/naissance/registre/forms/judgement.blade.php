@extends('naissance.registre.container')

@section('form-content')
    @php
        $header = "Jugement";
        $previous = "naissance.forms.mother_info";
        $last = true;
    @endphp
    <div class="row mb-3">
        <label for="judgement-judgement" class="col-md-2 col-form-label text-md-end required">Jugement</label>
        <div class="col-md-10 required">
            <select id="judgement-judgement" data-live-search="true" name="judgement-judgement" class="selectpicker w-100 serializable" required tabindex="1">
                <option value="" selected>---</option>
                <option value="Non">Oui</option>
                <option value="Oui">Non</option>
            </select>
        </div>
    </div>
    <div class="row mb-3">
        <label for="judgement-date" class="col-md-2 col-form-label text-md-end required">
            Date du jugement</label>
        <div class="md-form md-outline input-with-post-icon datepicker">
            <input id="judgement-date" placeholder="Select date" type="date" name="judgement-date" class="form-control serializable" required tabindex="2">
        </div>
    </div>
    <div class="row mb-3">
        <label for="judgement-number"
               class="col-md-2 col-form-label text-md-end required">Numéro du jugement</label>
        <div class="col-md-10">
            <input id="judgement-number" type="text" class="form-control serializable" name="judgement-number"
                   required tabindex="3">
            @if ($errors->has('description'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('description') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="row mb-3">
        <label for="judgment-region" class="col-md-2 col-form-label text-md-end required">Régions</label>
        <div class="col-md-10">
            @if (isset($regions))
                <select id="judgment-region" data-live-search="true" name="judgment-region" class="selectpicker w-100 serializable"
                        tabindex="4" required>
                    @if (count($regions) == 1)
                        <option value="{{ $regions[0]->region }}">{{ $regions[0]->region }}</option>
                    @else
                        <option value="" selected>--</option>
                        @foreach ($regions as $item)
                            <option value="{{ $item->region }}">
                                {{ $item->region }}
                            </option>
                        @endforeach
                    @endif
                </select>
                @if ($errors->has('regions'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('regions') }}</strong>
                    </span>
                @endif
            @endif
        </div>
    </div>
    <div class="row mb-3">
        <label for="judgement-annotations"
               class="col-md-2 col-form-label text-md-end required">Mentions Marginales</label>
        <div class="col-md-10">
            <input id="judgement-annotations" type="text" class="form-control serializable" name="judgement-annotations"
                   required tabindex="5">
            @if ($errors->has('description'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('description') }}</strong>
                </span>
            @endif
        </div>
    </div>
@endsection
