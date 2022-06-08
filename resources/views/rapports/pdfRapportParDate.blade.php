<!DOCTYPE html>
@php
    app()->setLocale($lang);
@endphp
<html lang="{{$lang}}"  dir="{{($lang=="ar")?"rtl":"ltr"}}">
<head>
    <meta charset="utf-8">
    <title>Rapports</title>
</head>

<body>

    <style>
        .container{
            padding: 2%;
            font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }
        .row{
            margin: 2% 0;
        }
        h2{
            font-size: 15px;
            line-height: 2rem;
        }
        table{
            border-collapse: collapse;
            border: 2px solid;
        }
        td{
            text-align: center;
            font-size: 12px;
            height: 20px;
        }

        .para{
            width: 95%;
            margin: 0 auto;
            font-size: 13px;
        }

        th{
            font-size: 14px;
        }
        .title_{
            display: block;
            color: orange;
            font-size: 22px;
        }
        .content-center{
            width: 100%;
            text-align: center;
        }
        .grid-container {
            margin-top: 35px;
            display: grid;
            grid-template-columns: auto auto ;
        }
        .grid-item {

            text-align: center;
        }
        .content-right{
            width: 100%;
            text-align: right;
        }
    </style>
        <div class="container">


        <div class="content-center">
            <img src="{{'data:image/png;base64,'.base64_encode(file_get_contents(public_path('assets/images/LOGO/logo.png')))}}" alt="logo" width="120px" height="126px">
            <h5>Fondation Oriental Figug</h5>
        </div>
        <div class="content-right">
            <h4>
                {{__('global_translate.date')}} : {{ Date('d/m/yy') }}
            </h4>
        </div>

        <div class="content-center">
            <h2>{{__('rapport.Rapport')}} </h2>
        </div>
        @foreach ($Rapports as $Rapport)
        <div class="title">
            <h2>{{__('rapport.Résumé')}} {{ $Rapport->activite()->first()->name }} :</h2>
        </div>
        <div class="para">
           <p> {{ $Rapport->activite()->first()->detail }}</p>
        </div>

        <div class="title">
            <h2>{{__('rapport.Activité')}} :</h2>
        </div>
        <div class="para">
            <table  border="2px">
               <thead>
                   <th rowspan="2">{{__('projet.Ti_projet')}}</th>
                   <th rowspan="2">{{__('activites.title')}}</th>
                   <th rowspan="2">{{__('global_translate.lieu')}}</th>
                   <th rowspan="2">{{__('global_translate.debut')}}</th>
                   <th rowspan="2">{{__('global_translate.fin')}}</th>
                   <th colspan="2">{{__('rapport.particip')}}</th>
                   <tr>
                       <th >{{__('rapport.nbrfemme')}}</th>
                       <th >{{__('rapport.nbrHomme')}}</th>
                   </tr>
               </thead>
               <tbody>
                   @if ($Rapport->activite->projet!=null)
                        <td> {{ $Rapport->activite->projet->titre }}</td>
                    @else
                        <td>--</td>
                   @endif
                   <td> {{ $Rapport->activite->name }}</td>
                   <td> {{ $Rapport->activite->lieu }}</td>
                   <td> {{ $Rapport->activite->date_debut }}</td>
                   <td> {{ $Rapport->activite->date_fin }}</td>
                   <td> {{ $Rapport->nbr_femme }}</td>
                   <td> {{ $Rapport->nbr_homme }}</td>
               </tbody>
            </table>
        </div>
        <div class="title">
            <h2>Context :</h2>
        </div>
        <div class="para">
            <p> {{ $Rapport->context }}</p>
        </div>
        <div class="title">
            <h2>{{__('rapport.img')}}</h2>
        </div>
        @php
         $Photos = $Rapport->activite->Media->where('types','photo');
        @endphp
        <div class="container">
            <div class="grid-container">
               @foreach ($Photos as $item)
                     <img src="{{'data:image/png;base64,'.base64_encode(file_get_contents(public_path($item->URL)))}}" alt="logo" width="48%">
                @endforeach
            </div>
        </div>
        @endforeach
    </div>
</body>
</html>
