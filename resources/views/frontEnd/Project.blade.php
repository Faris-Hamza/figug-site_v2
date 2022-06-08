@include('frontEnd.inc.headerMin', ['name' => __("global.project")])

<!--main-->
<main class="">
    <span class="up"><i class="fa-solid fa-up-long"></i></span>
    <section class="container sec5 wow fadeup-animation">
        <h1 class="sec2_title">{{__("global.project")}}</h1>
        <div class="grid-3 sec2_div list-wrapper">
            @foreach ($projets as $item)
                <a href="{{ route('showProjet', $item->id) }}">
                    <div class="sec7_blog1 list-item">
                                <img src="{{$item->Media()->where('types', 'photo')->first()->URL }}" alt="photo">
                                <div class="pro_content">
                                    <h3 class="fifty-chars">{{ $item->titre }}</h3>
                                    <p class="fifty-chars">{{ $item->lieu }} / {{ $item->date_debut }}</p>
                                    <p class="activite_desc fifty-chars">
                                        {{ $item->detail }}
                                    </p>
                                </div>
                    </div>
                </a>
            @endforeach
        </div>
        <div class="page_actP"  style="width:100%; text-align: center;">
            {{$projets->links()}}
        </div>
    </section>
</main>
@include('frontEnd.inc.footer')
