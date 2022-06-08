@extends('layouts.dashboard')

@section('Content')
    <div class="px-4 py-5 my-1 text-center">
        <h1 class="display-5 fw-bold">{{__('info.header')}}</h1>
        <div class="col-lg-6 mx-auto">
        <p class="lead mb-4">{{__('info.not')}}</p>
        <hr>
        </div>
    </div>

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
    {{-- form_edit --}}

    <div class="container">
        <form action="{{route('info/update',$info->id)}}" method="POST">
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
                        <div class="col-12">
                            <div class="card mb-4">
                                <div class="card-header pb-0">
                                    <legend>{{__('info.info_general')}}</legend>
                                </div>
                                <div class="card-body px-0 pt-0 pb-2">
                                    <div class=" table-responsive p-0">
                                        <div class="container">
                                            <div class=" row">

                                                <div >
                                                    <label for="bienvenu" class="form-label">{{__('info.mot')}} ({{$val['name']}})</label>
                                                    <textarea name="bienvenu[{{ $key }}]" class="form-control" cols="30" rows="10">{{old('bienvenu.' . $key, $info->getTranslation('bienvenu', $key)) }}</textarea>
                                                </div>
                                                <div >
                                                    <label for="Apropo" class="form-label">{{__('info.qui')}} ({{$val['name']}})</label>
                                                    <textarea name="Apropo[{{ $key }}]" class="form-control" cols="30" rows="10">{{old('Apropo.' . $key, $info->getTranslation('Apropo', $key)) }}</textarea>
                                                </div>
                                                <div >
                                                    <label for="programmes" class="form-label">{{__('info.programmes')}} ({{$val['name']}})</label>
                                                    <textarea name="programmes[{{ $key }}]" class="form-control" cols="30" rows="10">{{old('programmes.' . $key, $info->getTranslation('programmes', $key)) }}</textarea>
                                                </div>
                                                <div >
                                                    <label for="vision" class="form-label">{{__('info.Vision')}} ({{$val['name']}})</label>
                                                    <textarea name="vision[{{ $key }}]" class="form-control" cols="30" rows="10">{{old('vision.' . $key, $info->getTranslation('vision', $key)) }} </textarea>
                                                </div>
                                                <div >
                                                    <label for="stratigie" class="form-label">{{__('info.Comment_trav')}} ({{$val['name']}})</label>
                                                    <textarea name="stratigie[{{ $key }}]" class="form-control" cols="30" rows="10">{{old('stratigie.' . $key, $info->getTranslation('stratigie', $key)) }}</textarea>
                                                </div>
                                                <div >
                                                    <label for="txtSetunez" class="form-label">{{__('info.soutien')}} ({{$val['name']}})</label>
                                                    <textarea name="txtSetunez[{{ $key }}]" class="form-control" cols="30" rows="10">{{old('txtSetunez.' . $key, $info->getTranslation('txtSetunez', $key)) }}</textarea>
                                                </div>
                                                <div >
                                                    <label for="txtAdherent" class="form-label">{{__('info.engager')}} ({{$val['name']}})</label>
                                                    <textarea name="txtAdherent[{{ $key }}]" class="form-control" cols="30" rows="10">{{old('txtAdherent.' . $key, $info->getTranslation('txtAdherent', $key)) }}</textarea>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                    </div>
                @endforeach
                    <div class="col-12">
                        <div class="card mb-4">
                            <div class="card-header pb-0">
                                <legend>{{__('info.info_Contact')}}</legend>
                                <h5></h5>
                            </div>
                            <div class="card-body px-0 pt-0 pb-2">
                                <div class=" table-responsive p-0">
                                    <div class="container">
                                        <div class=" row">
                                            <div>
                                                <label for="whatsapp" class="form-label fw-bold">{{__('info.whatsapp')}}</label>
                                                <input type="text" name="whatsapp" class="form-control" value="{{$info->whatsapp}}">
                                            </div>
                                            <div>
                                                <label for="fb" class="form-label fw-bold">{{__('info.facebook')}}</label>
                                                <input type="text" name="fb" class="form-control" value="{{$info->fb}}">
                                            </div>
                                            <div>
                                                <label for="instagram" class="form-label fw-bold">{{__('info.instagram')}}</label>
                                                <input type="text" name="instagram" class="form-control" value="{{$info->instagram}}">
                                            </div>
                                            <div>
                                                <label for="youtube" class="form-label fw-bold">{{__('info.youtube')}}</label>
                                                <input type="text" name="youtube" class="form-control" value="{{$info->youtube}}">
                                            </div>
                                            <div>
                                                <label for="Linkedin" class="form-label fw-bold">{{__('info.linkdin')}}</label>
                                                <input type="text" name="Linkedin" class="form-control" value="{{$info->Linkedin}}">
                                            </div>
                                            <div>
                                                <label for="twitter" class="form-label fw-bold">{{__('info.twitter')}}</label>
                                                <input type="text" name="twitter" class="form-control" value="{{$info->twitter}}">
                                            </div>
                                            <div>
                                                <label for="twitter" class="form-label fw-bold">{{__('info.email')}}</label>
                                                <input type="text" name="email" class="form-control" value="{{$info->email}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <button type="submit" class="btn btn-primary">{{__('global_translate.send')}}</button>
      </form>
    </div>
@endsection
