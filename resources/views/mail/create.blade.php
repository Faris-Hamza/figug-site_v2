@extends('layouts.dashboard')

@section('Content')
    <div class="px-4 py-5 my-1 text-center">
        <h1 class="display-5 fw-bold">Create un noveau mail</h1>
        <div class="col-lg-6 mx-auto">
        <p class="lead mb-4">Sur cette page, vous devez entrer toutes les Axe requises </p>
        <hr>
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
            <a href="{{route('mail')}}" class="btn btn-primary btn-lg px-4 gap-3">Tout les mail</a>
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
        <form action="{{route('mail/store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                <label for="mail" class="form-label">Nom</label>
                <input type="email" class="form-control"name="mail" placeholder="entrer votre mail" >
                </div>
                
                <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>

    @endsection