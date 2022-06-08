@extends('layouts.dashboard')

@section('Content')

    <div class="px-4 py-5 my-1 text-center">
        <h1 class="display-5 fw-bold">{{__('demande.new')}}</h1>
        <div class="col-lg-6 mx-auto">
        <p class="lead mb-4">{{__('info.not')}}</p>
        <hr>
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
            <a href="{{route('demandes')}}" class="btn btn-primary btn-lg px-4 gap-3">{{__('demande.all')}}</a>
        </div>
        </div>
    </div>
    {{-- Form_for create a new member --}}
    <div class="container">
        @if($errors->any())
            <div class="alert alert-danger">
                <p><strong>{{__('global_translate.error')}}</strong></p>
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
        @endif
        <form action="{{route('demande/store')}}" method="POST" enctype="multipart/form-data">
                @csrf
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
                <div class="mb-3">
                <label for="nom" class="form-label">{{__('global_translate.fname')}}</label>
                <input type="text" class="form-control" name="nom[{{ $key }}]"  >
                </div>
                <div class="mb-3">
                <label for="statu" class="form-label">{{__('global_translate.lname')}}</label>
                <input type="text" class="form-control" name="prenom[{{ $key }}]"  >
                </div>
                <div class="mb-3">
                    <label for="adresse" class="form-label">{{__('global_translate.adresse')}}</label>
                    <input type="text"  class="form-control" name="adresse[{{ $key }}]" >
                </div>
            </div>
            @endforeach
        </div>
                <div class="mb-3">
                    <label for="genreDemande" class="form-label">{{__('demande.type')}}</label>
                    <select id="genre" class="form-control" name="genreDemande"  onchange="Ajoute()">
                        <option value="" hidden selected></option>
                            @foreach ($GenreArray as $item => $val)
                               <option value="{{$item}}">{{$val[app()->getLocale()]}}</option>
                            @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="cin" class="form-label">{{__('demande.cin')}}</label>
                    <input type="text"  class="form-control" name="cin"  >
                </div>
                <div class="mb-3">
                    <label for="nbrRamed" class="form-label">{{__('demande.ramed')}}</label>
                    <input type="text"  class="form-control" name="nbrRamed" >
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">{{__('global_translate.email')}}</label>
                    <input type="email"  class="form-control" name="email" >
                </div>
                <div class="mb-3">
                    <label for="Tel" class="form-label">{{__('demande.télé')}}</label>
                    <input type="text"  class="form-control" name="Tel" >
                </div>
                <div class="mb-3">
                    <label for="montant" class="form-label">{{__('demande.montantDemander')}}</label>
                    <input type="text"  class="form-control" name="montant" >
                </div>
                <div class="mb-3">
                    <label for="pieceJustifs" class="form-label">{{__('demande.piecejust')}}</label>
                    <input type="file"  class="form-control" name="pieceJustifs" >
                </div>

                <button type="submit" class="btn btn-primary">{{__('global.Submit')}}</button>
      </form>
    </div>

    <script>
        function Ajoute(){
            document.getElementById("Autre").style.display = "none"
            var Genre=document.getElementById("genre");
            if (Genre.value == "Autres") {
                document.getElementById("Autre").style.display = "block"
            }
        }
    </script>

    @endsection
