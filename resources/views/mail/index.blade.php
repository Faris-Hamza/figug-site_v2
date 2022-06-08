@extends('layouts.dashboard')

@section('Content')
<body>
    <div class="px-4 py-5 my-1 text-center">
        <h1 class="display-5 fw-bold">{{__('email.title')}}</h1>
        <div class="col-lg-6 mx-auto">
        <p class="lead mb-4">{{__('info.not')}}</p>
        <hr>
        </div>
    </div>
    {{-- tables_of_members --}}

    <div class="container">
        <style>
            td, th {
                text-align: center;
            }

        </style> <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="row">
                        <h6 class="col">{{__('email.title')}}</h6>
                        <div class="col search">
                        </div>

                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        {{__('email.email')}}
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        {{__('email.date')}}
                                    </th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($mail as $item)
                                    <tr {{($item->Veu==0)?"style=background-color:#AEFF76":""}}>
                                        <td>
                                            <h6 class="mb-0 text-sm">{{ $item->mail }}</h6>
                                        </td>
                                        <td>
                                            <h6 class="mb-0 text-sm">{{ $item->created_at->format('d/m/y')}}</h6>
                                        </td>
                                        <td class="align-middle">
                                            <a href="{{ route('mail/destroy', $item->id) }}"
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
        </div>

        <div style="width:100%; text-align: center;">
            {{$mail->links()}}
        </div>
    </div>



    </div>
    @endsection
