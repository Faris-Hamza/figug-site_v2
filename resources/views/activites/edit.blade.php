@extends('layouts.dashboard')

@section('Content')
    <div class="px-4 py-5 my-1 text-center">
        <h1 class="display-5 fw-bold">{{__('activites.edit')}}</h1>
        <div class="col-lg-6 mx-auto">
        <p class="lead mb-4">{{__('info.not')}}</p>
        <hr>
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
            <a href="{{route('activite')}}" class="btn btn-primary btn-lg px-4 gap-3">{{__('activites.all')}}</a>
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
            <form action="{{route('activite/update', $activite->id)}}" method="post" enctype="multipart/form-data">
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
                                <label for="name" class="form-label fw-bold"> {{__('global_translate.titre')}} ({{ $key }})</label>
                                <input type="text" class="form-control" value="{{old('name.' . $key, $activite->getTranslation('name', $key))}}" name="name[{{ $key }}]">
                            </div>
                            <div class="mb-3">
                                <label for="detail" class="form-label fw-bold">{{__('global_translate.detail')}} ({{ $key }})</label>
                                <textarea  class="form-control" name="detail[{{ $key }}]">{{old('detail.' . $key, $activite->getTranslation('detail', $key))}}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="lieu" class="form-label fw-bold">{{__('global_translate.lieu')}} ({{ $key }})</label>
                                <input type="text" class="form-control" value="{{old('lieu.' . $key, $activite->getTranslation('lieu', $key))}}" name="lieu[{{ $key }}]" >
                            </div>
                            <div class="mb-3">
                                <label for="id_proj" class="form-label fw-bold">{{__('global_translate.projet')}} ({{ $key }})</label>
                                <select name="id_proj"  class="form-control">
                                    @foreach ($projets as $item)
                                        <option value="{{$item->id}}" {{($item->id==$activite->id_proj)? "selected": ""}}>{{old('titre.' . $key, $item->getTranslation('titre', $key))}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="id_Axe" class="form-label fw-bold">{{__('activites.axe')}} ({{ $key }})</label>
                                    <select name="id_Axe"  class="form-control">
                                        @foreach ($Axes as $item)
                                            <option value="{{$item->id}}" {{($item->id==$activite->id_Axe)? "selected": ""}}>{{old('nom.' . $key, $item->getTranslation('nom', $key))}}</option>
                                        @endforeach
                                    </select>
                            </div>
                            <br>
                        </div>
                    @endforeach

                </div>
                <!---------------------------------------------------------------->
                <div class="mb-3">
                    <label for="date_debut" class="form-label fw-bold">{{__('global_translate.debut')}}</label>
                    <input type="date" class="form-control" value="{{$activite->date_debut}}" name="date_debut" >
                </div>
                <div class="mb-3">
                    <label for="date_fin" class="form-label fw-bold">{{__('global_translate.fin')}}</label>
                    <input type="date" class="form-control" value="{{$activite->date_fin}}" name="date_fin" >
                </div>
                <div class="mb-3">
                    <label for="photo" class="form-label fw-bold">{{__('global_translate.imgs')}}</label>
                    <input type="file" min="0" accept="image/*" class="form-control" name="photo[]" multiple="multiple">
                </div>
                <div class="mb-3">
                    <label for="video" class="form-label fw-bold">{{__('global_translate.videos')}}</label>
                    <div class="container">
                        <div id="Vids" class="row">
                            @foreach ($activite->Media->Where('types', 'video') as $item)
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

                <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-primary">{{ __('global_translate.send') }}</button>
                </div>
            </form>
           </div>
      </form>
    </div>
@include('layouts.inc.scriptBtn_Url')
@endsection
