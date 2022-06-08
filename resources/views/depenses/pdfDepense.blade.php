<!DOCTYPE html>
<html lang="{{$lang}}"  dir="{{($lang=="ar")?"rtl":"ltr"}}">
  <head>
    <meta charset="utf-8">
    <title></title>
    <style>
      body{
        font-family: Verdana, Geneva, Tahoma, sans-serif;
          }
       td{
        border: 0.5px solid ;
        height: 30px;
       }

       th{
          border: 0.5px solid ;
       }

       h6{
        text-align: right;
        font-size: 20px;
       }
       .total{
         width: 100%;
         text-align: right;
       }
       .btn{
         width: 300px;
         padding: 10px;
         margin: 40px 0;
         border: 1px solid black;
         background: transparent;
         text-align: left;
       }
    </style>
  </head>
  <body>
    <div style="text-align: center;width:100%">
         <img src="{{'data:image/png;base64,'.base64_encode(file_get_contents(public_path('assets/images/LOGO/logo.png')))}}" alt="logo" width="120px" height="126px">
    </div>
    <h4 style="text-align: center">Fondation Oriental Figug</h4>

    <br><br>
    @php
        app()->setLocale($lang);
    @endphp
    <h1 style="text-align: center">{{__('depenses.Rapport')}}</h1>
    <p >{{__('global_translate.date')}} : {{date('Y-m-d')}}</p>
    <table style="width: 100%;  text-align: center; border-collapse: collapse;
    border: 1px solid;">
      <thead>
        <tr>
          <th style="width: 30px">..</th>
          <th style="width: 150px">{{__('global_translate.date')}}</th>
          <th style="width: 250px">{{__('depenses.libelle')}}</th>
          <th style="width: 150px">{{__('depenses.contrante')}}</th>
          <th >{{__('depenses.beneficiair')}}</th>
          <th >{{__('depenses.Mode')}}</th>
          <th >{{__('depenses.montant ')}} ({{__('dashboard.mad')}})</th>
        </tr>
      </thead>
      <tbody>
        @php
            $i=1;
            $total=0;
        @endphp
        @foreach ($Depenses as $item)
                @php
                   $libelle = (array)json_decode($item->libelle);
                   $L = $libelle[$lang];

                   $objectif = (array)json_decode($item->objectif);
                   $O = $objectif[$lang];

                   $Beneficiaire = (array)json_decode($item->Beneficiaire);
                   $B = $Beneficiaire[$lang];

                   $modePayment = (array)json_decode($item->modePayment);
                   $M =$modePayment[$lang];
            @endphp
            <tr>

              <td >{{$i++}}</td>
              <td >{{$item->date}}</td>
              <td>{{$L}}</td>
              <td>{{$O}}</td>
              <td>{{$B}}</td>
              <td>{{$M}}</td>
              <td>{{$item->montant}}</td>
            </tr>
            @php
                $total +=$item->montant;
            @endphp
        @endforeach

      </tbody>
    </table>
    <div class="total">
      <button class="btn" type="button" >
          {{__('depenses.total')}} : {{$total}}  ({{__('dashboard.mad')}})
    </button>
  </div>
  </body>
</html>
