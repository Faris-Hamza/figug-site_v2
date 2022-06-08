@extends('layouts.dashboard')

@section('Content')
<style>
    td, th {
        text-align: center;
    }

</style>
    <div class="container">
        <div class="row">

            <div class="px-2 py-5 my-2 text-center">
                <h1 class="display-5 fw-bold">{{__('activites.header')}}</h1>
                <div class="col-lg-6 mx-auto">
                    <p class="lead mb-4"> {{__('info.not')}}</p>
                    <hr>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <div class="row">
                            <h6 class="col">{{__('activites.Activite')}}</h6>
                            <div class="col search">
                                <div class="button_save">
                                    <a class="btn bg-gradient-primary mt-3 w-100" href="{{ route('activite/create') }}">{{__('activites.btn_add')}}</a>
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
                                                    {{__('global_translate.titre')}}  </th>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ">{{__('activites.axe')}}
                                                </th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    {{__('global_translate.projet')}} </th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    {{__('global_translate.lieu')}} </th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    {{__('global_translate.debut')}} </th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    {{__('global_translate.fin')}}  </th>
                                                <th class="text-secondary opacity-7"></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($activite as $item)
                                                <tr>

                                                    <td>
                                                        <h6 class="mb-0 text-sm">{{$item->name}}</h6>
                                                    </td>
                                                    <td>
                                                        @if ($item->Axes != '')
                                                            <span class="mb-0 text-sm">{{$item->Axes()->first()->nom}}</span>
                                                        @else
                                                            <span class="mb-0 text-sm">---</span>
                                                        @endif

                                                    </td>
                                                    <td class="align-middle text-center text-sm">
                                                        @if ($item->projet != '')
                                                            <span class="mb-0 text-sm">{{$item->projet()->first()->titre}}</span>
                                                        @else
                                                            <span class="mb-0 text-sm">---</span>
                                                        @endif
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span class="mb-0 text-sm">{{$item->lieu}}</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span class="mb-0 text-sm">{{ $item->date_debut }}</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span class="mb-0 text-sm">{{ $item->date_fin }}</span>
                                                    </td>

                                                    <td class="align-middle">
                                                        <a href="{{ route('activite/edit', $item->id)}}"
                                                           class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                                                           data-original-title="Edit user">
                                                            {{__('global_translate.edit')}}
                                                        </a>
                                                    </td>
                                                    <td class="align-middle">
                                                        <a href="{{ route('activite/destroy', $item->id) }}"
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
                </div>
                <div style="width:100%; text-align: center;">
                    {{$activite->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection
