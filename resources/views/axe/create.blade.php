@extends('layouts.dashboard')

@section('Content')
    <div class="px-4 py-5 my-1 text-center">
        <h1 class="display-5 fw-bold">{{__('axes.btn_add')}}</h1>
        <div class="col-lg-6 mx-auto">
        <p class="lead mb-4">{{__('info.not')}}</p>
        <hr>
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
            <a href="{{route('Axe')}}" class="btn btn-primary btn-lg px-4 gap-3">{{__('axes.all')}}</a>
        </div>
        </div>
    </div>
    {{-- Form_for create a new member --}}
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
    <form action="{{route('Axe/store')}}" method="post" ENCTYPE="multipart/form-data">
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
                        <label for="nom" class="form-label">{{__('axes.name')}} ({{ $val['name'] }})</label>
                        <input type="text" class="form-control"name="nom[{{ $key }}]" >
                    </div>
                    <br>
                </div>
            @endforeach
        </div>
        <!---------------------------------------------------------------->
        <div class="mb-3">
            <label for="icon" class="form-label">{{__('axes.icon')}}</label>
            <input type="file" accept="image/*" class="form-control" name="icon" placeholder="entrer votre Icon" >
        </div>
        <div class="form-group">
        <button type="submit" name="submit" class="btn btn-primary">{{ __('global_translate.send') }}</button>
    </div>
    </form>
    </div>
@endsection
