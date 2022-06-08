@include('frontEnd.inc.header')
<!--main-->
<main class="container">
    <span class="up"><i class="fa-solid fa-up-long"></i></span>
    <section class="sec1">
        <div class="grid-2 sec1_row1">
            <div class="about wow right-animation">
                <h2 cl>{{__('global.propos')}}</h2>
                <h5>{{__('global.summary')}}</h5>
                <div>
                    <p  class="about_p ">
                        {{ $info->bienvenu }}
                    </p>
                </div>
                <a class="about_link" href="{{ route('about') }}">{{__('global.more')}} <i
                        class="fa-solid fa-right-long"></i></a>
            </div>
            <div class="sec1_blog">
                <div class="sec1_blog_div wow left-animation a_la_une">
                    <h2>{{__('global.latest')}}</h2>
                    <div class="grid-1 a_la_une_content">
                        @foreach ($Acts as $item)
                            <div class="row a_la_une_grid">
                                <div class="col">
                                    @if ($item->Media->where('types','photo')->first()!=null)
                                    <img width="100%" src="{{asset($item->Media->where('types','photo')->first()->URL)}}" alt="photo">
                               @else
                                   <img  width="100%" src="{{asset("assets\images\LOGO\\nocontentyet.jpg")}}" alt="photo">
                               @endif
                                </div>
                                <div class="col a_la_une_content_div">

                                    <h3 class="fifty-chars">{{ $item->name }}</h3>
                                    <p class="fifty-chars">{{ $item->date_debut }} - {{ $item->lieu }}</p>
                                    <p class="fifty-chars">{{ $item->detail }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <a class="blog_about_link" href="{{ route('activites') }}">{{__('global.more')}}<i
                            class="fa-solid fa-right-long"></i></a>
                </div>
            </div>
        </div>
    </section>
    <section class="sec2 main-testimonial  wow fadeup-animation">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="center-title">
                        <h1 class="sec2_title">{{__('global.project')}}</h1>
                        <h4 class="sec2_Suntitle">{{__('global.recentProj')}} </h4>
                    </div>
                </div>
            </div>
            <div class="main-testimonial-slider">
                <div class="row servece-slider">
                    @foreach ($Projet as $item)
                        <div class="col slide">
                            <div class="sec2_blog1 card">
                                <img width="100%" src="{{ $item->Media->where('types', 'photo')->first()->URL }}" alt="">
                                <div class="card_div">
                                    <h3 class="fifty-chars">{{ $item->titre }}</h3>
                                    <p class="fifty-chars">{{ $item->lieu }} / {{ $item->date_debut }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <section class="main-testimonial sec3">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="center-title">
                        <h1 class="sec2_title">{{__('global.usAxes')}}</h1>
                        <h4 class="sec2_Suntitle">{{__('global.specialty')}}</h4>
                    </div>
                </div>
            </div>
            <div class="grid-3">
                @foreach ($Axes as $item)
                    <div class="grid-1 axe">
                        <img width="100%" src="{{ asset($item->icon) }}" alt="">
                        <h2 class="fifty-chars">{{ $item->nom }}</h2>
                    </div>
                @endforeach
            </div>
        </div>
        </div>
        </div>
        </div>
        </div>
    </section>
    <section class="container sec4">
        <div class="sec1_row1">
            <div class="container" style="text-align: -webkit-center;">
                <div class="row">
                    <div class="col-12">
                        <div class="center-title">
                            <h1 class="sec2_title">{{__('global.partners')}}</h1>
                            <h4 class="sec2_Suntitle">{{__('global.partnersSay')}}</h4>
                        </div>
                    </div>
                </div>
                <div class="main-testimonial-slider wow fadeup-right">
                    <div class="row servece-slider1 partenaire">
                        @foreach ($Part as $item)
                            <a class="col slide" href="{{$item->url}}">
                                <div>
                                    <img width="100%" src="{{ asset($item->logo) }}" alt="photo">
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
            </div>
    </section>
    <section class="sec7 main-testimonial  wow fadeup-animation">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="center-title">
                        <h1 class="sec2_title">{{__('global.media')}}</h1>
                        <h4 class="sec2_Suntitle">{{__('global.coverage')}}</h4>
                    </div>
                </div>
            </div>
            <div class="main-testimonial-slider">
                <div class="row servece-slider">
                    @foreach ($Presse as $item)
                        <div class="col slide ">
                            <div class="sec7_blog1 Media_Presse">
                                <img src="{{asset($item->logo)}}" alt="photo">
                                <div class="press">
                                    <h3 class="sec2_title fifty-chars">{{ $item->name }}</h3>
                                    <p  class="sec2_Suntitle fifty-chars">{{ $item->lieu }} / {{ $item->date }}</p>
                                    <a href="{{ $item->lieu }}">{{__('global.URL_article')}}</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <section class="sec6 wow fadeup-animation">
     <form action="{{route('mail/store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
        <h1 class="sec2_title">{{__('global.News')}}</h1>
        <h4 class="sec2_Suntitle">{{__('global.Subscribe')}}</h4>
        <div>
            <input class="Textbox" name="mail" type="mail" placeholder="{{__('global.emailPHolder')}}">
             <input class="about_link" type="submit" value="{{__('global.Submit')}}">
        </div>
     </form>
    </section>
</main>
@include('frontEnd.inc.footer')
