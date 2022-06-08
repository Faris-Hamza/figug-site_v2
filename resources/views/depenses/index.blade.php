@extends('layouts.dashboard')

@section('Content')
    <div class="px-4 py-5 my-1 text-center">
        <h1 class="display-5 fw-bold">{{__('depenses.header')}}</h1>
        <div class="col-lg-6 mx-auto">
        <p class="lead mb-4">{{__('info.not')}} </p>
        <hr>

        </div>
    </div>
    {{-- tables_of_members --}}

    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                  <div class="row">
                    <h6 class="col">{{__('depenses.depenses')}}</h6>
                    <div class="col search">
                        <div class="button_save">
                        <a class="btn bg-gradient-primary mt-3 w-100" href="{{route('depense/create')}}">{{__('depenses.btn_add')}}</a>
                        </div>
                    </div>
                  </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                  <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                      <thead>
                        <tr>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ">{{__('depenses.libelle')}}</th>
                          <th class=" text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">{{__('global_translate.date')}}</th>
                          <th class=" text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">{{__('depenses.contrante')}}</th>
                          <th class=" text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">{{__('depenses.beneficiair')}}</th>
                          <th class=" text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">{{__('depenses.montant ')}}</th>
                          <th class=" text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">{{__('depenses.Mode')}} </th>
                          <th class=" text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">{{__('depenses.Piece ')}} </th>
                          <th class="text-secondary opacity-7"></th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($depenses as $item)
                          <tr>

                            <td>
                              <h6 class="mb-0 text-sm">{{$item->libelle}}</h6>
                            </td>
                            <td>
                              <span class="mb-0 text-sm">{{$item->date}}</span>
                            </td>
                            <td>
                              <span class="mb-0 text-sm">{{$item->objectif}}</span>
                            </td>
                            <td>
                              <span class="mb-0 text-sm">{{$item->Beneficiaire}}</span>
                            </td>
                            <td>
                              <span class="mb-0 text-sm">{{$item->montant}}</span>
                            </td>
                            <td>
                              <span class="mb-0 text-sm">{{$item->modePayment}}</span>
                            </td>



                            <td class="align-middle">
                              <a href="{{asset($item->justif)}}" class="badge badge-sm bg-gradient-success" data-toggle="tooltip" data-original-title="Edit user">
                                  {{__('global_translate.download')}}
                              </a>
                            </td>
                            <td class="align-middle">
                              <a href="{{route('depense/edit',$item->id)}}" class="badge badge-sm bg-gradient-success" data-toggle="tooltip" data-original-title="Edit user">
                                  {{__('global_translate.edit')}}
                              </a>
                            </td>
                            <td class="align-middle">
                              <a href="{{route('depense/destroy',$item->id)}}" class="badge badge-sm bg-gradient-danger" data-toggle="tooltip" data-original-title="Edit user">
                                  {{__('global_translate.delete')}}
                              </a>
                            </td>
                            {{-- <td class="align-middle">
                              <a href="{{route('depense/show',$item->id)}}" class="badge badge-sm bg-gradient-primary" data-toggle="tooltip" data-original-title="Edit user">
                                Afficher
                              </a>
                            </td> --}}
                          </tr>
                        @endforeach


                      </tbody>
                    </table>


                  </div>
                </div>

            </div>
            </div>
                  <div style="width:100%; text-align: center;">
                      {{$depenses->links()}}
                  </div>
            <div class="col search search_rpt">
                <div class="button_save">
                    <a class="btn bg-gradient-success mt-3 w-100" href="{{route("depense/pdfDepense",'fr')}}">{{__('depenses.RapportFr')}}</a>
                </div>
                <div class="button_save">
                    <a class="btn bg-gradient-success mt-3 w-100" href="{{route("depense/pdfDepense",'ar')}}">{{__('depenses.RapportAr')}}</a>
                </div>
            </div>

    </div>

@endsection
