@extends('naissance.registre.container')

@section('form-content')
    @php
        $header = "Zone Gérographique";
        $next = "naissance.forms.child_info";
    @endphp
    <div class="row mb-3">
        <label for="geographical_zone-country" class="col-md-2 col-form-label text-md- required">
            Pays</label>
        <div class="col-md-10">
            @if (isset($pays))
                <select id="geographical_zone-country" data-live-search="true" name="geographical_zone-country" class="selectpicker w-100 serializable"
                        required tabindex="1">
                    @if ( count($pays) == 1)
                        <option value="{{ $pays[0]->description }}">{{ $pays[0]->description }}</option>
                    @else
                        <option value="" selected>--</option>
                        @foreach ($pays as $item)
                            <option value="{{ $item->description }}">
                                {{ $item->description }}
                            </option>
                        @endforeach
                    @endif
                </select>
                @if ($errors->has('pays'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('pays') }}</strong>
                    </span>
                @endif
            @endif
        </div>
    </div>
    <div class="row mb-3">
        <label for="geographical_zone-region" class="col-md-2 col-form-label text-md-end required">
            Régions</label>
        <div class="col-md-10">
            @if (isset($regions))
                <select id="geographical_zone-region" data-live-search="true" name="geographical_zone-region" class="selectpicker w-100 serializable"
                        required tabindex="2">
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
        <label for="geographical_zone-department" class="col-md-2 col-form-label text-md-end required">
            Départements</label>

        <div class="col-md-10">
            @if (isset($department))
                <select id="geographical_zone-department" data-live-search="true" name="geographical_zone-department" class="selectpicker w-100 serializable"
                        required tabindex="3">
                    @if (count($department) == 1)
                        <option value="{{ $department[0]->description }}">{{ $department[0]->description }}</option>
                    @else
                        <option value="" selected>--</option>
                        @foreach ($department as $item)
                            <option value="{{ $item->description }}">
                                {{ $item->description }}
                            </option>
                        @endforeach
                    @endif
                </select>
                @if ($errors->has('department'))
                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('department') }}</strong>
                                            </span>
                @endif
            @endif
        </div>
    </div>
    <div class="row mb-3">
        <label for="geographical_zone-borough" class="col-md-2 col-form-label text-md-end required">
            Arrondissements</label>

        <div class="col-md-10">
            @if (isset($arrondissement))
                <select id="geographical_zone-borough" data-live-search="true" name="geographical_zone-borough" class="selectpicker w-100 serializable"
                        required tabindex="4">
                    @if (count($arrondissement) == 1)
                        <option value="{{ $arrondissement[0]->description }}">{{ $arrondissement[0]->description }}</option>
                    @else
                        <option value="" selected>--</option>
                        @foreach ($arrondissement as $item)
                            <option value="{{ $item->description }}">
                                {{ $item->description }}
                            </option>
                        @endforeach
                    @endif
                </select>
                @if ($errors->has('arrondissement'))
                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('arrondissement') }}</strong>
                                                        </span>
                @endif
            @endif
        </div>
    </div>
    <div class="row mb-3">
        <label for="geographical_zone-commune" class="col-md-2 col-form-label text-md-end required">
            Communes</label>

        <div class="col-md-10">
            @if (isset($communes))
                <select id="geographical_zone-commune" data-live-search="true" name="geographical_zone-commune" class="selectpicker w-100 serializable"
                        required tabindex="5">
                    @if (count($communes) == 1)
                        <option value="{{ $communes[0]->description }}">{{ $communes[0]->description }}</option>
                    @else
                        <option value="" selected>--</option>
                        @foreach ($communes as $item)
                            <option value="{{ $item->description }}">
                                {{ $item->description }}
                            </option>
                        @endforeach
                    @endif
                </select>
                @if ($errors->has('communes'))
                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('communes') }}</strong>
                                            </span>
                @endif
            @endif
        </div>
    </div>
    <div class="row mb-3">
        <label for="geographical_zone-center" class="col-md-2 col-form-label text-md-end required">
            Centres</label>

        <div class="col-md-10">
            @if (isset($centres))
                <select id="geographical_zone-center" data-live-search="true" name="geographical_zone-center" class="selectpicker w-100 serializable"
                        required tabindex="6">
                    @if (count($centres) == 1)
                        <option value="{{ $centres[0]->description }}">{{ $centres[0]->description }}</option>
                    @else
                        <option value="" selected>--</option>
                        @foreach ($centres as $item)
                            <option value="{{ $item->description }}">
                                {{ $item->description }}
                            </option>
                        @endforeach
                    @endif
                </select>
                @if ($errors->has('centres'))
                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('centres') }}</strong>
                                                        </span>
                @endif
            @endif
        </div>
    </div>
@endsection
