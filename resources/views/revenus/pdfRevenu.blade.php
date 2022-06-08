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
         width: 340px;
         padding: 10px;
         margin: 40px 0;
         border: 1px solid black;
         background: transparent;
         text-align: left;
       }
       .Content-center{
         text-align: center;
         width: 100%;
       }

    </style>
  </head>
  <body>
  @php
      app()->setLocale($lang);
  @endphp
    <div class="Content-center">
      <img src="{{'data:image/png;base64,'.base64_encode(file_get_contents(public_path('assets/images/LOGO/logo.png')))}}" alt="logo" width="120px" height="126px">
      <h4 >Fondation Oriental Figug</h4>
       <br>
       <h1 >{{__('revenu.rapport')}}</h1>
    </div>


    <p >{{__('global_translate.date')}} : {{date('Y-m-d')}}</p>
    <table style="width: 100%;  text-align: center; border-collapse: collapse; border: 1px solid ;">
      <thead>
        <tr>
          <th style="width: 30px">..</th>
          <th style="width: 150px">{{__('global_translate.date')}}</th>
          <th style="width: 250px">{{__('revenu.libelle')}}</th>
          <th >{{__('revenu.montant')}}</th>
          <th >{{__('revenu.source')}}</th>
        </tr>
      </thead>
      <tbody>
        @php
            $i=1;
            $total=0;
        @endphp
        @foreach ($Revenus as $item)
            @php
                $libelle = (array)json_decode($item->libelle);
                $L = $libelle[$lang];
                $source = (array)json_decode($item->source);
                $S = $source[$lang];
            @endphp
            <tr>
              <td >{{$i++}}</td>
              <td >{{$item->date}}</td>
              <td>{{$L}}</td>
              <td>{{$item->montant}}</td>
              <td>{{$S}}</td>
            </tr>
            @php
                $total +=$item->montant;
            @endphp
        @endforeach


        </div>
      </tbody>
    </table>
    <div class="total">
      <button class="btn" type="button" >
      <strong> {{__('revenu.total')}} : </strong>{{$total}} {{__('dashboard.mad')}}
      </button>
    </div>
  </body>
</html>
