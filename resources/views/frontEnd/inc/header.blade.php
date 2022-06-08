<!DOCTYPE html>
<html id="doc-wrapper" lang="{{ config('locales.languages')[app()->getLocale()]['lang'] }}"
    dir="{{ config('locales.languages')[app()->getLocale()]['rtl_support'] }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="manifest" href="manifest.json" />
    <meta name="apple-mobile-web-app-status-bar" content="#db4938" />
    <meta name="theme-color" content="#db4938" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-grid.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/slick-theme.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}" />

    @if (config('locales.languages')[app()->getLocale()]['lang'] == 'ar')
        <link rel="stylesheet" href="{{ asset('assets/css/style_ar.css') }}" />
    @else
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    @endif


    <title>Foundation Oriental _ </title>
</head>

<body>
    <!--header-->
    <header class="headr">
        <div class="slide1">
            <div class="mySlides1 fade1">
                <img class="header-image " src="{{ asset('assets/images/SECTION/figige1.jpg') }}" alt="">
            </div>

            <div class="mySlides1 fade1">
                <img class="header-image " src="{{ asset('assets/images/SECTION/figige2.jpg') }}" alt="">
            </div>
            <div class="mySlides1 fade1">
                <img class="header-image " src="{{ asset('assets/images/SECTION/figege3.jpg') }}" alt="">
            </div>
        </div>

        <div class="nav_Mob">
            <i class="fa-solid fa-bars" id="icon_bar"></i>
        </div>
        <nav class="header_nav_Mob" id="nav_mob">
            <div class="close">
                <i class="fa-solid fa-xmark col" id="icon_close"></i>
                <div class="dropdown col container mr-6">
                    <div>
                         <button class="nav-link btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ config('locales.languages')[app()->getLocale()]['name'] }}
                    </button>
                    <div class=" dropdown-menu" aria-labelledby="dropdownMenuButton">
                        @foreach (config('locales.languages') as $key => $val)
                            @if ($key != app()->getLocale())
                                <a class="dropdown-item"
                                    href="{{ route('change.language', $key) }}">{{ $val['name'] }}</a>
                            @endif
                        @endforeach
                    </div>
                    </div>

                </div>
            </div>
            </div>
            <a href="{{ route('Accuiel') }}" class="underline-hover">Accueil</a>
            <a href="{{ route('about') }}" class="underline-hover">Qui somme Nous?</a>
            <a href="{{ route('p_rojet') }}" class="underline-hover">Projets</a>
            <a href="{{ route('activites') }}" class="underline-hover">Activites</a>
            <a href="{{ route('soutenezNous') }}" class="underline-hover">Soutenez-nous</a>
            <a href="{{ route('getInsc') }}" class="underline-hover">Demande de soutien</a>
        </nav>


        <div class=" header-div1">
            <div class="nav">
                <div class="row wow fadeup-animation">
                    @if (config('locales.languages')[app()->getLocale()]['lang'] == 'ar')
                    <nav class="header_nav col-lg-10 col-xl-7">

                        <a href="{{ route('Accuiel') }}" class="underline-hover"> {{ __('global.home') }}</a>
                        <a href="{{ route('about') }}" class="underline-hover">{{ __('global.about') }}</a>
                        <a href="{{ route('p_rojet') }}" class="underline-hover">{{ __('global.project') }}</a>
                        <a href="{{ route('activites') }}" class="underline-hover">{{ __('global.actions') }}</a>
                        <a href="{{ route('soutenezNous') }}"
                            class="underline-hover">{{ __('global.support') }}</a>
                        <a href="{{ route('getInsc') }}" class="Btn_dom">{{ __('global.demande') }}</a>
                    </nav>
                    @else
                    <nav class="header_nav col-lg-10 col-xl-8">

                        <a href="{{ route('Accuiel') }}" class="underline-hover"> {{ __('global.home') }}</a>
                        <a href="{{ route('about') }}" class="underline-hover">{{ __('global.about') }}</a>
                        <a href="{{ route('p_rojet') }}" class="underline-hover">{{ __('global.project') }}</a>
                        <a href="{{ route('activites') }}" class="underline-hover">{{ __('global.actions') }}</a>
                        <a href="{{ route('soutenezNous') }}"
                            class="underline-hover">{{ __('global.support') }}</a>
                        <a href="{{ route('getInsc') }}" class="Btn_dom">{{ __('global.demande') }}</a>
                    </nav>
                    @endif


                    <div class="dropdown dropdown-Desktop col container mr-6">
                        <button class="nav-link btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ config('locales.languages')[app()->getLocale()]['lang'] }}
                        </button>
                        <div class=" dropdown-menu" aria-labelledby="dropdownMenuButton">
                            @foreach (config('locales.languages') as $key => $val)
                                @if ($key != app()->getLocale())
                                    <a class="dropdown-item"
                                        href="{{ route('change.language', $key) }}">{{ $val['lang'] }}</a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="row Logo container">
                @if (config('locales.languages')[app()->getLocale()]['lang'] == 'ar')
                    <div class="col-7 col-sm-7  col-md-5 col-lg-5 col-xl-4 logo_definition wow right-animation">
                        <p class="row pb-2 pb-sm-3 pb-md-4 pb-lg-0 pb-xl-4 col logo_p1">{{ __('global.slag') }}</p>
                        <p class="row col logo_p2">{{ __('global.name') }}</p>
                        <p class="row pt-4  pt-xl-5 col logo_p3">{{ __('global.mslug') }}</p>
                    </div>
                @else
                    <div class="col-10 col-sm-8 col-md-6 col-lg-6 col-xl-6  logo_definition wow right-animation">
                        <p class="row col logo_p1">{{ __('global.slag') }}</p>
                        <p class="row col logo_p2">{{ __('global.name') }}</p>
                        <p class="row col logo_p3">{{ __('global.mslug') }}</p>
                    </div>
                @endif

            </div>
        </div>
    </header>
