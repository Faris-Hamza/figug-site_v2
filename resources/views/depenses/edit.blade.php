@extends('layouts.dashboard')

@section('Content')

    <div class="px-4 py-5 my-1 text-center">
        <h1 class="display-5 fw-bold">{{__('depenses.edit')}}</h1>
        <div class="col-lg-6 mx-auto">
        <p class="lead mb-4">{{__('info.not')}}</p>
        <hr>
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
            <a href="{{route('depenses')}}" class="btn btn-primary btn-lg px-4 gap-3">{{__('depenses.all')}}</a>
        </div>
        </div>
    </div>
    {{-- Form_for create a new member --}}
    <div class="container">
        @if($errors->any())
            <div class="alert alert-danger">
                <p><strong>Opps Something went wrong</strong></p>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @php
            $ModePayment = ["Chéque", "Virement banquaire", "Espice"];
        @endphp
            <form action="{{route('depense/update',$depense->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        @foreach(config('locales.languages') as $key => $val)
                            <a class="nav-link {{ $loop->index == 0 ? 'active' : '' }}" id="{{ $key }}-tab" data-bs-toggle="tab" data-bs-target="#{{ $key }}" href="#{{ $key }}" role="tab" aria-controls="{{ $key }}" aria-selected="true">{{ $val['name'] }}</a>
                        @endforeach
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    @foreach(config('locales.languages') as $key => $val)
                        <div class="tab-pane fade {{ $loop->index == 0 ? 'show active' : '' }}" id="{{ $key }}" role="tabpanel" aria-labelledby="{{ $key }}-tab" tabindex="0">
                            <br>
                            <div class="mb-3">
                                <label for="libelle" class="form-label">{{__('depenses.libelle')}}</label>
                                <input type="text" class="form-control" name="libelle[{{ $key }}]" value="{{old('libelle.' . $key, $depense->getTranslation('libelle', $key))}}"  >
                            </div>
                            <div class="mb-3">
                                <label for="contrante" class="form-label">{{__('depenses.contrante')}}</label>
                                <input type="text" class="form-control" name="objectif[{{ $key }}]" value="{{old('objectif.' . $key, $depense->getTranslation('objectif', $key))}}">
                            </div>
                            <div class="mb-3">
                                <label for="Beneficiaire" class="form-label">{{__('depenses.beneficiair')}}</label>
                                <input type="text" class="form-control" name="Beneficiaire[{{ $key }}]" value="{{old('Beneficiaire.' . $key, $depense->getTranslation('Beneficiaire', $key))}}">
                            </div>

                            <br>
                        </div>
                    @endforeach
                </div>
                <div class="mb-3">
                    <label for="modePayment" class="form-label">{{__('depenses.Mode')}}</label>
                    <select class="form-control"  name="modePayment" >
                        @foreach ($ModePayement as $item => $val)
                            <option value="{{$item}}" {{($val[app()->getLocale()]==$depense->modePayment)?"selected":""}}>{{$val[app()->getLocale()]}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="date" class="form-label">{{__('global_translate.date')}}</label>
                    <input type="date" class="form-control" name="date" value="{{ $depense->date}}">
                </div>
                <div class="mb-3">
                    <label for="montant" class="form-label">{{__('depenses.montant ')}}</label>
                    <input type="text" class="form-control" name="montant" value="{{$depense->montant}}">
                <div class="mb-3">
                    <label for="justif" class="form-label">{{__('depenses.Piece ')}}</label>
                    <input type="file" accept=".pdf" class="form-control" name="justif"  >
                </div>
                <button type="submit" class="btn btn-primary">{{__('global_translate.send')}}</button>
            </div>
            </form>

    </div>

    @endsection
