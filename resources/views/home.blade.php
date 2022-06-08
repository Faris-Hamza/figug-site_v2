@extends('layouts.dashboard')

@section('Content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="row">
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">{{__('dashboard.to_Demande')}}</p>
                                        <h5 class="font-weight-bolder mb-0">
                                           {{$nbrDemandes}} {{__('dashboard.dossier')}}
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                        <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">{{__('dashboard.to_Activites')}}</p>
                                        <h5 class="font-weight-bolder mb-0">
                                            {{$activites}} {{__('dashboard.act_réalise')}}
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                        <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">{{__('dashboard.to_Depense')}}</p>
                                        <h5 class="font-weight-bolder mb-0">
                                            {{$depense}} {{__('dashboard.mad')}}
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                        <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">{{__('dashboard.to_Revenues')}}</p>
                                        <h5 class="font-weight-bolder mb-0">
                                            {{$revunu}} {{__('dashboard.mad')}}
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                        <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-lg-7 mb-lg-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-lg">
                                    <div class="d-flex flex-column h-100">

                                        <h5 class="font-weight-bolder">{{__('dashboard.rap_Moral')}}</h5>
                                        <p class="mb-1 pt-2 text-bold">{{__('dashboard.périod')}}</p>

                                        <form action="{{route('rapport/pdfRapportParDate')}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method("POST")
                                            <div class="row" style="margin-top: 20px;">
                                            <div class="col-12 col-lg-6 row">
                                                <p class="col-3 ">{{__('dashboard.de')}}</p>
                                                <input class="col-9 "  type="date" class="form-control col-9" name="dateD">
                                            </div>
                                            <div class="col-12 col-lg-6 row">
                                                <p class="col-3 ">{{__('dashboard.au')}}</p>
                                                <input class="col-9 "  type="date" class="form-control col-9" name="dateF">
                                            </div>
                                            </div>
                                            <div class="btn-rpt">
                                                <button class="btn  bg-gradient-primary mt-3 w-100" type="submit" name="lang" value="ar" style="margin-left: 5px">{{__('dashboard.genererAR')}} </button>
                                            </div>
                                            <div class="btn-rpt">
                                                <button class="btn  bg-gradient-primary mt-3 w-100" type="submit" name="lang" value="fr">{{__('dashboard.genererFR')}} </button>
                                            </div>
                                        </form>

                                        {{-- <h5 class="font-weight-bolder">Rapport Moral par period </h5>
                                        <p class="mb-1 pt-2 text-bold">Choizer la périod</p>
                                        <form action="#" method="POST">
                                            @csrf
                                        <div class="row" style="margin-top: 20px;">
                                            <div class="col-12 col-lg-6 row">

                                                <p class="col-3">de :</p>
                                                <input  type="date" class="form-control col-9" name="dateD">
                                            </div>
                                            <div class="col-12 col-lg-6 row">
                                                <p class="col-3">au :</p>
                                                <input  type="date" class="form-control col-9" name="dateF">


                                        </div>
                                        <div class="btn-rpt">
                                            <button class="btn  bg-gradient-primary mt-3 w-100" type="submit">Générer </button>
                                        </div>
                                        </form> --}}
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="card h-100 p-3">
                        <div class="overflow-hidden position-relative border-radius-lg bg-cover h-100"
                            style="background-image: url('../assets/img/ivancik.jpg');">
                            <span class="mask bg-gradient-dark"></span>
                            <div class="card-body position-relative z-index-1 d-flex flex-column h-100 p-3">
                                <h5 class="text-white font-weight-bolder mb-4 pt-2">{{__('dashboard.g_demandes')}}</h5>

                                <div class="row notification_dom mb-4 ">
                                    @foreach ($Demandes as $item)
                                         <div class="col-12 ">
                                            <div class="card">
                                                <div class="card-body p-3">
                                                    <div class="row">
                                                        <div class="col-8">
                                                            <div class="numbers">
                                                                <p class="text-sm mb-0 text-capitalize font-weight-bold">{{$item->nom}} {{$item->prenom}}</p>
                                                                <h6 class="font-weight-bolder mb-0">
                                                                    {{$item->montant}} {{__('dashboard.mad')}}
                                                                </h6>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach


                                </div>

                                <a class="text-white text-sm font-weight-bold mb-0 icon-move-right mt-auto"
                                    href="{{ route('demandes') }}">
                                    {{__('dashboard.read_mor')}}
                                    <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
