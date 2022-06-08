@extends('layouts.dashboard')

@section('Content')
        <div class="px-4 py-5 my-1 text-center">
            <h1 class="display-5 fw-bold">{{__('projet.edit')}}</h1>
            <div class="col-lg-6 mx-auto">
            <p class="lead mb-4">{{__('info.not')}}</p>
            <hr>
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                <a href="{{route('projets')}}" class="btn btn-primary btn-lg px-4 gap-3">{{__('projet.all')}}</a>
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
            <form action="{{route('projet/update', $projet->id)}}" method="POST" enctype="multipart/form-data">
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
                                <label for="titre" class="form-label fw-bold">{{__('projet.Ti_projet')}} ({{$val['name']}})</label>
                                <input type="text" class="form-control" name="titre[{{ $key }}]" value="{{old('titre.' . $key, $projet->getTranslation('titre', $key))}}">
                            </div>
                            <div class="mb-3">
                                <label for="detail" class="form-label fw-bold">{{__('global_translate.detail')}} ({{$val['name']}})</label>
                                <textarea  class="form-control" name="detail[{{ $key }}]">{{old('detail.' . $key, $projet->getTranslation('detail', $key))}}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="responsable" class="form-label fw-bold">{{__('global_translate.responsabl')}} ({{$val['name']}})</label>
                                <input type="text" class="form-control" name="responsable[{{ $key }}]"  value="{{old('responsable.' . $key, $projet->getTranslation('responsable', $key))}}">
                            </div>
                            <div class="mb-3">
                                <label for="lieu" class="form-label fw-bold">{{__('global_translate.lieu')}}({{$val['name']}})</label>
                                <input type="text" class="form-control"name="lieu[{{ $key }}]"  value="{{old('lieu.' . $key, $projet->getTranslation('lieu', $key))}}">
                            <br>
                           </div>
                        </div>
                    @endforeach
                </div>
                    <div class="mb-3">
                        <label for="Partenaire" class="form-label fw-bold">{{__('global_translate.partenaires')}}</label>
                        <div class="col">
                            <select name="Partenaire[]"  class="form-control" multiple>
                                @foreach ($Partenair as $item)}
                                        @php $x=false; @endphp
                                    @foreach($Partenar as $item2)
                                        @if($item2->id_part == $item->id)
                                            @php $x=true; @endphp
                                        @endif
                                    @endforeach
                                    <option value="{{$item->id}}" {{($x==true)? "selected": ""}}>{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="date_debut" class="form-label fw-bold">{{__('global_translate.debut')}}</label>
                        <input type="date" class="form-control"name="date_debut"  value="{{$projet->date_debut}}">
                    </div>
                    <div class="mb-3">
                        <label for="date_fin" class="form-label fw-bold">{{__('global_translate.fin')}}</label>
                        <input type="date" class="form-control"name="date_fin"  value="{{$projet->date_fin}}">
                    </div>
                    <div class="mb-3">
                        <label for="photo" class="form-label fw-bold">{{__('global_translate.imgs')}}</label>
                        <input type="file" accept="image/*" min="0" class="form-control" name="photo[]" multiple="multiple" value="{{$projet->photo}}">
                    </div>
                    <div class="mb-3">
                        <label for="video" class="form-label fw-bold">{{__('global_translate.videos')}}</label>
                        <div class="container">
                            <div id="Vids" class="row">
                                @foreach ($projet->Media->Where('types', 'video') as $item)
                                <div class="col">
                                    <input type="text" min="0" value="{{$item->URL}}" class="form-control my-2" name="video[]" >
                                </div>
                                @endforeach
                            <div class="col">
                                <button type="button" class="btn btn-primary my-2" onclick="Ajoute()">+</button>
                            </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">{{__('global_translate.send')}}</button>
        </form>
        </div>
        @include('layouts.inc.scriptBtn_Url')
@endsection


