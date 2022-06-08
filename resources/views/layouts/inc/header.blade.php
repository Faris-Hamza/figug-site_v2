
<!DOCTYPE html>
<html id="doc-wrapper" lang="{{config('locales.languages')[app()->getLocale()]['lang'] }}" dir="{{config('locales.languages')[app()->getLocale()]['rtl_support'] }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('../assets/img/apple-icon.png')}}">
    <link rel="icon" type="image/png" href="{{asset('../assets/img/favicon.png')}}">
    <title>
      Fondation oriental figug
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{{asset('assets_dashboard/css/nucleo-icons.css')}}" rel="stylesheet" />
    <link href="{{asset('assets_dashboard/css/nucleo-svg.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"></head>

    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="{{asset('assets_dashboard/css/nucleo-svg.css')}}" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{asset('assets_dashboard/css/soft-ui-dashboard.css?v=1.0.5')}}" rel="stylesheet" />

    @if (config('locales.languages')[app()->getLocale()]['lang'] == 'ar')
    <link rel="stylesheet" href="{{asset("assets_dashboard/css/style_arbe.css")}}" />
    @else
    <link rel="stylesheet" href="{{asset("assets_dashboard/css/style.css")}}" />

    @endif

