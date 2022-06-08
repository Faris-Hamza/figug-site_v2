@extends('layouts.dashboard')

@section('Content')
    <div class="px-4 py-5 my-1 text-center">
        <h1 class="display-5 fw-bold">{{__('rapport.edit')}}</h1>
        <div class="col-lg-6 mx-auto">
        <p class="lead mb-4">{{__('info.not')}}</p>
        <hr>
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
            <a href="{{route('rapports')}}" class="btn btn-primary btn-lg px-4 gap-3">Tout les rapports</a>
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
        <form action="{{route('rapport/update', $rapport->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    @foreach(config('locales.languages') as $key => $val)
                        <a class="nav-link {{ $loop->index == 0 ? 'active' : '' }}" id="{{ $key }}-tab" data-bs-toggle="tab" data-bs-target="#{{ $key }}" href="#{{ $key }}" role="tab" aria-controls="{{ $key }}" aria-selected="true">{{ $val['name'] }}</a>
                    @endforeach
                </div>
            </nav>
            <br>
                <div class="mb-3">
                    <label for="id_act" class="form-label fw-bold">{{__('activites.title')}}</label>
                    <select name="id_act"  class="form-control">
                        <option value="--" hidden></option>
                        @foreach ($activites as $item)
                           <option value="{{$item->id}}" {{($item->id==$rapport->id_act)?"selected":""}}>{{$item->name}}</option>
                        @endforeach
                      </select>
                </div>

            <div class="tab-content" id="nav-tabContent">
                @foreach(config('locales.languages') as $key => $val)
                    <div class="tab-pane fade {{ $loop->index == 0 ? 'show active' : '' }}" id="{{ $key }}" role="tabpanel" aria-labelledby="{{ $key }}-tab" tabindex="0">

                        <div class="mb-3">
                            <label for="context" class="form-label fw-bold">{{__('rapport.context')}} ({{$val['name']}})</label>
                            <textarea  class="form-control" name="context[{{$key}}]" >{{old('context.' . $key, $rapport->getTranslation('context', $key))}}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="lieu" class="form-label fw-bold">{{__('global_translate.lieu')}} ({{$val['name']}})</label>
                            <input type="text" class="form-control" name="lieu[{{$key}}]" value="{{old('lieu.' . $key, $rapport->getTranslation('lieu', $key))}}">
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mb-3">
                <label for="date" class="form-label fw-bold">{{__('global_translate.date')}}</label>
                <input type="date" class="form-control" name="date" value="{{$rapport->date}}">
            </div>
            <div class="mb-3">
                <label for="nbr_femme" class="form-label fw-bold">{{__('rapport.nbrfemme')}}</label>
                <input type="text" class="form-control" name="nbr_femme" value="{{$rapport->nbr_femme}}">
            </div>
            <div class="mb-3">
                <label for="nbr_homme" class="form-label fw-bold">{{__('rapport.nbrHomme')}}</label>
                <input type="text" class="form-control" name="nbr_homme" value="{{$rapport->nbr_homme}}">
            </div>


            <div class="mb-3">
                <label for="reference" class="form-label fw-bold">{{__('rapport.ref')}}</label>
                <input type="file" min="0" accept=".pdf" class="form-control" name="reference" >
            </div>
                <button type="submit" class="btn btn-primary">Submit</button>

      </form>
    </div>


@endsection
