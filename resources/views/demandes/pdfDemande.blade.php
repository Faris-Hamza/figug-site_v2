<!DOCTYPE html>
<html lang="{{$lang}}"  dir="{{($lang=="ar")?"rtl":"ltr"}}">
<head>
    <meta charset="utf-8">
    <title>Demande</title>
    <style>
        body {

            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }
        .container{
          padding: 0 30px ;
        }
        strong{
          font-size: 15px;
        }
        div{
          padding: 8px;
        }
        .date {
            text-align: center;
        }
        .date_ {
            text-align: right;
        }
    </style>
</head>
<body>
@php
    app()->setLocale($lang);
@endphp
        <div class="container">

        <div class="date">
            <img src="{{'data:image/png;base64,'.base64_encode(file_get_contents(public_path('assets/images/LOGO/logo.png')))}}" alt="logo" width="120px" height="126px">
            <h5>Fondation Oriental Figug</h5>
        </div>
        <br>
        <br>
        <br>
        <div class="date_">
            <h4>
                {{__('global_translate.date')}} : {{ Date('d/m/yy') }}
            </h4>
        </div>
@foreach($Demande as $item => $val)
        <div class="date">
            <h2>{{__('demande.numero')}} 0000{{$val->id}}</h2>
        </div>
                @php
                    $nom = (array)json_decode($val->nom);
                    $N = $nom[$lang];

                    $prenom = (array)json_decode($val->prenom);
                    $p = $prenom[$lang];

                    $adresse = (array)json_decode($val->adresse);
                    $A = $adresse[$lang];

                    $genreDemande = (array)json_decode($val->genreDemande);
                    $G =$genreDemande[$lang];
                @endphp
        <h3>{{__('demande.infoP')}}</h3>
        <div class="container">
            <div> <strong>{{__('global_translate.fname')}} :</strong> {{$N}}</div>
            <div> <strong>{{__('global_translate.lname')}} :</strong> {{$p}}</div>
            <div> <strong>{{__('demande.cin')}} :</strong> {{$val->cin }}</div>
            <div><strong>{{__('demande.ramed')}} :</strong> {{$val->nbrRamed }}</div>
            <div><strong>{{__('demande.type')}} :</strong> {{$G}}</div>
            <div><strong>{{__('demande.montantDemander')}} :</strong> {{$val->montant }} MAD</div>
        </div>
        <h3>{{__('demande.infoContact')}} :</h3>
        <div class="container">
            <div><strong>{{__('global_translate.adresse')}} :</strong> {{$A}}</div>
            <div><strong>{{__('demande.télé')}} :</strong> {{$val->Tel }}</div>
            <div><strong>{{__('global_translate.email')}} :</strong> {{$val->email }}</div>
        </div>
@endforeach
    </div>

</body>

</html>
