@extends('layouts.dashboard')

@section('Content')
<body>
  <style>
    td, th {
        text-align: center;
    }

</style>
  <div class="container">
    <div class="row">

        <div class="px-2 py-5 my-2 text-center">
            <h1 class="display-5 fw-bold">{{__('presse.titre')}}</h1>
            <div class="col-lg-6 mx-auto">
              <p class="lead mb-4">{{__('info.not')}}</p>
              <hr>
            </div>
        </div>

    </div>
    <div class="row">
      <div class="col-12">
          <div class="card mb-4">
              <div class="card-header pb-0">
                  <div class="row">
                      <h6 class="col" style="align-self: center;">{{__('presse.titre')}}</h6>
                      <div class="col search">
                          <div class="button_save">
                              <a class="btn bg-gradient-primary mt-3 w-100" href="{{ route('presse/create') }}">
                                  {{__('presse.new')}}
                              </a>
                          </div>
                      </div>

                  </div>
              </div>
              <div class="card-body px-0 pt-0 pb-2">
                  <div class="table-responsive p-0">
                      <table class="table align-items-center mb-0">
                          <thead>
                              <tr>
                                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                      {{__('presse.logo')}}
                                  </th>
                                  <th
                                      class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                      {{__('presse.name')}}
                                  </th>
                                  <th
                                      class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                      {{__('presse.lieu')}}
                                  </th>
                                  <th
                                      class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                      {{__('global_translate.date')}}
                                  </th>
                                  <th
                                      class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                      {{__('presse.Lien')}}
                                  </th>


                                  <th class="text-secondary opacity-7"></th>
                                  <th class="text-secondary opacity-7"></th>
                              </tr>
                          </thead>
                          <tbody>
                              @foreach ($presses as $item)
                                  <tr>
                                      <td>
                                          <img src="{{ asset($item->logo) }}" class="avatar avatar-sm me-3"
                                                   alt="user1">
                                      </td>

                                      <td>
                                          <h6 class="mb-0 text-sm">{{ $item->name }}</h6>
                                      </td>

                                      <td>
                                          <h6 class="mb-0 text-sm">{{ $item->lieu }}</h6>
                                      </td>

                                      <td>
                                          <h6 class="mb-0 text-sm">{{ $item->date }}</h6>
                                      </td>

                                      <td>
                                          <a href="{{ $item->url }}" target="_blank"><span class="mb-0 text-sm">{{__('presse.Lien')}}</span></a>
                                      </td>

                                      <td class="align-middle">
                                          <a href="{{ route('presse/edit', $item->id) }}"
                                              class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                                              data-original-title="Edit user">
                                              {{__('global_translate.edit')}}
                                          </a>
                                      </td>

                                      <td class="align-middle">
                                          <a href="{{ route('presse/destroy', $item->id) }}"
                                              class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                                              data-original-title="Edit user">
                                              {{__('global_translate.delete')}}
                                          </a>
                                      </td>
                                  </tr>
                              @endforeach
                          </tbody>
                      </table>
                  </div>
              </div>
              <div style="width:100%; text-align: center;">
                {{$presses->links()}}
            </div>
          </div>
      </div>
  </div>

</div>
@endsection
