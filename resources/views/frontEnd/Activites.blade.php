@include('frontEnd.inc.headerMin',['name' => __('global.actions')])

  <!--main-->
  <main class="">
    <span class="up"><i class="fa-solid fa-up-long"></i></span>

    {{-- <section class="container grand_activite">
      <div >
        <a class="" href="{{route('showActivite',$Activites->first()->id)}}">
            <div class="sec7_blog1 grid-2">
                <img class="big_img_acvt" src="{{asset($Activites->first()->Media->where('types','photo')->first()->URL)}}" alt="">
                <div class="activite_info pro_content">
                  <p class="activite_cate fifty-chars">{{$Activites->first()->Axes->first()->nom}}</p>
                  <h2 class="activite_title fifty-chars">{{$Activites->first()->titre}}</h2>
                  <p class="activite_date fifty-chars">{{$Activites->first()->lieu}} / {{$Activites->first()->date_debut}}</p>
                  <p class="activite_desc big_act ">
                    {{$Activites->first()->detail}}
                  </p>
                </div>
            </div>

        </a>
      </div>
    </section> --}}

    <section class="container sec5 wow fadeup-animation">
      <h1 class="sec2_title">{{__("global.actions")}}</h1>
        <div class="grid-3 sec2_div list-wrapper">
          {{-- @php
              $i=0;
          @endphp --}}
          @foreach ($Activites as $item)

            <a href="{{route('showActivite',$item->id)}}">
            <div class="sec7_blog1 list-item">
              @if ($item->Media->where('types','photo')->first()!=null)
                   <img src="{{asset($item->Media->where('types','photo')->first()->URL)}}" alt="photo">
              @else
                  <img src="{{asset("assets\images\LOGO\\nocontentyet.jpg")}}" alt="photo">
              @endif

                      <div class="pro_content">
                        <h3 class="fifty-chars">{{$item->name}}</h3>
                        <p class="fifty-chars">{{$item->lieu}} / {{$item->date_debut}}</p>
                        <p class="activite_desc  fifty-chars">
                          {{$item->detail}}
                        </p>
                    </div>
            </div>
            </a>

          @endforeach

        </div>
        <div class="page_actP"  style="text-align: center; width:100%;">
            {{ $Activites->links() }}
        </div>
    </section>


    {{-- <section class="container wow fadeup-animation categoriee">
      <div class="categorie">
        <div class="row categorie_div">
          <img class="col-2" width="20px" src="assets/images/SECTION/Vector (1).png" alt="">
          <h1 class="sec2_title col">Classification </h1>

        </div>
        <div class="type_cate grid-2">
          @foreach ($Axes as $item)
            <a class="activite_cate fifty-chars" href="#">{{$item->nom}}</a>
          @endforeach

        </div>

      </div>

    </section> --}}
  </main>
  @include('frontEnd.inc.footer')
