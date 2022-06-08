@include('frontEnd.inc.headerMin',['name' => __('global.about')])

  <!--main-->
  <main class="">
    <span class="up"><i class="fa-solid fa-up-long"></i></span>
    <section class="container sec1_about wow fadeup-animation">
      <nav class="About_Menu">
        @if (app()->getLocale() == "fr")
            <a href="#About_us" >{{__('global.propos')}}</a>
            <a href="#équipe" style="border: none;">{{__('global.team')}}</a>
        @else
            <a href="#About_us" style="border: none;">{{__('global.propos')}}</a>
            <a href="#équipe" >{{__('global.team')}}</a>
        @endif
        
      </nav>
    </section>

    <section class="sec2_about " id="About_us">
      <h1 class="sec2_title wow fadeup-animation">{{__('global.propos')}}</h1>
      <h4 class="sec2_Suntitle wow fadeup-animation">{{__('global.detail')}}</h4>
      <div class="container wow right-animation" data-wow-delay="0.4s">
        <div >
          <h2>{{__('global.Welcome')}}</h2>
          <p>
            {{$info->bienvenu}}
          </p>
        </div>
        <div>
          <h2>{{__('global.vision')}} </h2>
          <p>
            {{$info->vision}}
          </p>
        </div>
        <div>
          <h2>{{__('global.strategy')}}</h2>
          <div>
            <p>
              {{$info->stratigie}}
            </p>
          </div>
        </div>
        <div>
          <h2>{{__('global.programs')}}</h2>
          <p>
            {{$info->programmes}}
          </p>
        </div>
      </div>

    </section>

    <section class="container sec5" id="équipe">
      <h1 class="sec2_title">{{__('global.team')}}</h1>
      <h4 class="sec2_Suntitle">{{__('global.members')}}</h4>
        <div class="carousel2 row">
            @foreach ($Equipe as $item)
            <div class="carousel2-item  col-7 col-md-6 col-lg-4" href="#">
              <div class="testi">
                  <div class="img-area">
                      <img src="{{ asset($item->photo) }}">
                  </div>
                  <h2 style="width: 100%;" class="fifty-chars">{{$item->nom}}</h2>
                  <p style="width: 100%;" class="fifty-chars">{{ $item->statu }}</p>
              </div>
            </div>
            @endforeach
        </div>
    </section>

    <section class="container wow fadeup-animation" >
      <div class="rejoin">
        <h1 class="sec2_title">{{__('global.demande')}}</h1>
        <h4 class="sec2_Suntitle">{{__('global.etre')}}</h4>
        <a class="about_link link_rejoin" href="{{route('getInsc')}}">{{__('global.Submit')}}</a>
      </div>

    </section>
  </main>
  @include('frontEnd.inc.footer')
