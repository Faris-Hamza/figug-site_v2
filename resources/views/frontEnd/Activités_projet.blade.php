@include('frontEnd.inc.headerMin',['name' => $Projets->titre])

  <!--main-->
  <main class="container">
    <span class="up"><i class="fa-solid fa-up-long"></i></span>

    <section class="sec1">
      <div class="grid-2 sec1_row1">
        <div class="about wow right-animation">
          <h2 class="fifty-chars">{{$Projets->titre}}</h2>
          <h5>{{$Projets->responsable}} | {{$Projets->lieu}}</h5>
          <p class="" >
            {{$Projets->detail}}
          </p>
          {{-- <a class="about_link" href="#">EN SAVOIR PLUS <i class="fa-solid fa-right-long"></i></a> --}}
        </div>
        <div class="sec1_blog wow left-animation">
          <div class="sec1_blog_div">
            <h2>{{__('global.Fiche')}}</h2>
            <div class="fichies">
              <div class="grid-1">
                <h3>{{__('global.nameP')}} : <strong>{{$Projets->titre}}</strong></h3>
                <h3>{{__('global_translate.responsabl')}}  : <strong>{{$Projets->responsable}}</strong></h3>
                {{-- <h3>Durée de Projet : <strong>{{$Projets->titre}}</strong></h3> --}}
                <h3>{{__('global.lieuP')}} : <strong>{{$Projets->lieu}}</strong></h3>
                <h3>{{__('global_translate.debut')}} : <strong>{{$Projets->date_debut}}</strong></h3>
                <h3>{{__('global_translate.fin')}} : <strong>{{$Projets->date_fin}}</strong></h3>
            </div>
            </div>
          </div>
        </div>

      </div>
    </section>

    {{-- //Section for Galerie --}}
    @if ($Projets->Media()!=null)
      <section class="sec2 pic wow fadeup-animation">
        <h1 class="sec2_title">{{__('global.Galerie')}}</h1>
        <h4 class="sec2_Suntitle"></h4>
        <div class="grid-1">
            @switch(count($Photos))
                @case(5)
                    <div class="module_1">
                      <div class="row">
                        <div class="col-4">
                          <img src="{{asset($Photos->nth(1)[0]->URL)}}" alt="photo">
                        </div>
                        <div class="col">
                          <div class="row">
                            <div class="col-12">
                              <div class="row">
                                <div class="col">
                                  <div class="row " style="height: 100%;">
                                    <div class="col-12">
                                      <img src="{{asset($Photos->nth(1)[1]->URL)}}" alt="photo">
                                    </div>
                                    <div class="col-12">
                                      <img src="{{asset($Photos->nth(1)[2]->URL)}}" alt="photo">
                                    </div>
                                  </div>

                                </div>
                                <div class="col">
                                  <img src="{{asset($Photos->nth(1)[3]->URL)}}" alt="photo">
                                </div>
                              </div>

                            </div>
                            <div class="col-12">
                              <img src="{{asset($Photos->nth(1)[4]->URL)}}" alt="photo">
                            </div>
                          </div>

                        </div>
                      </div>
                    </div>
                    @break
                @case(4)
                    <div class="module_2">
                      <div class="row">
                        <div class="col-4">
                          <img src="{{asset($Photos->nth(1)[0]->URL)}}" alt="photo">
                        </div>
                        <div class="col">
                          <div class="row" style="height: 100%;">
                            <div class="col-12">
                              <div class="row " style="height: 100%;">
                                <div class="col">
                                  <div class="row " style="height: 100%;">
                                    <div class="col-6">
                                      <img src="{{asset($Photos->nth(1)[1]->URL)}}" alt="photo">
                                    </div>
                                    <div class="col">
                                      <img src="{{asset($Photos->nth(1)[2]->URL)}}" alt="photo">
                                    </div>
                                  </div>

                                </div>
                              </div>
                            </div>
                            <div class="col-12">
                              <img src="{{asset($Photos->nth(1)[3]->URL)}}" alt="photo">
                            </div>
                          </div>

                        </div>
                      </div>
                    </div>
                    @break
                @case(3)
                    <div class="module_3">
                      <div class="row">
                        <div class="col-6">
                          <img src="{{asset($Photos->nth(1)[0]->URL)}}" alt="photo">
                        </div>
                        <div class="col">
                          <div class="row " style="height: 100%;">
                            <div class="col-12">
                              <img src="{{asset($Photos->nth(1)[1]->URL)}}" alt="photo">
                            </div>
                            <div class="col-12">
                              <img src="{{asset($Photos->nth(1)[2]->URL)}}" alt="photo">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    @break
            @endswitch
        </div>
      </section>
    @endif
    <section class="container pic wow fadeup-animation">
      <h1 class="sec2_title">{{__('global_translate.videos')}}</h1>
      <h4 class="sec2_Suntitle"></h4>
      <div class="carousel2 carousel1 row">
        @foreach ($Videos as $item)
          <div class="carousel2-item col">
            @php
                $i=0;
                $lien =  "https://www.youtube.com/embed/"
            @endphp

            @if ($item->URL !='')
            @foreach(explode('/', $item->URL) as $item)

                @if ($i==3)
                    @php
                        $lien =$lien . $item
                    @endphp

                @endif
                @php
                    $i++
                @endphp
            @endforeach
            @endif

            <iframe width="560" height="315" src="{{$lien}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>
        @endforeach


      </div>

  </section>
  </main>
  @include('frontEnd.inc.footer')
