@extends('layouts.dashboard')

@section('Content')
        <div class="px-4 py-5 my-1 text-center">
        <h1 class="display-5 fw-bold">Nouveau presse</h1>
        <div class="col-lg-6 mx-auto">
        <p class="lead mb-4">Sur cette page, vous devez entrer toutes les informations requises pour qu'elles soient affichées à l'endroit approprié. Ceci afin de permettre un meilleur contrôle sur les informations affichées sur votre site afin qu'elles ne soient pas dépendantes</p>
        <hr>
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
            <a href="{{route('presse')}}" class="btn btn-primary btn-lg px-4 gap-3">Tout les presse</a>
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
        <form action="{{route('presse/store')}}" method="POST" enctype="multipart/form-data">
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

                            <div class="mb-3">
                                <label for="name" class="form-label fw-bold">{{__('global_translate.name')}} </label>
                                <input type="text" class="form-control" name="name[{{ $key }}]"  >
                            </div>
                            <div class="mb-3">
                                <label for="lieu" class="form-label fw-bold">{{__('global_translate.lieu')}} </label>
                                <input type="text" class="form-control" name="lieu[{{ $key }}]"  >
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="mb-3">
                    <label for="date" class="form-label fw-bold">{{__('global_translate.date')}}</label>
                    <input type="date" class="form-control" name="date"  >
                </div>
                <div class="mb-3">
                    <label for="url" class="form-label fw-bold">{{__('presse.Lien')}}</label>
                    <input type="text" class="form-control" name="url"  >
                </div>
                <div class="mb-3">
                    <label for="logo" class="form-label fw-bold">{{__('global_translate.logo')}}</label>
                    <input type="file" accept="image/*" class="form-control" name="logo" >
                </div>

                <button type="submit" class="btn btn-primary">Save</button>

      </form>
    </div>
    @endsection

