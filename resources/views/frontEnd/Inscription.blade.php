@include('frontEnd.inc.headerMin',['name' => __("demandeFront.title")])

  <!--main-->
  <main class="container">
    <span class="up"><i class="fa-solid fa-up-long"></i></span>

    <section class="sec2 wow fadeup-animation">
      {{-- <h1 class="sec2_title">Title</h1>
      <h4 class="sec2_Suntitle">SubTitle</h4> --}}
      <div class="container">
        <div >
          <h2>{{__("demandeFront.eter")}} </h2>
          <p>
              {{$info->txtAdherent}}
          </p>
        </div>
      </div>
    </section>

    <section class="container insc1">
      <div>
       @if($errors->any())
            <div class="">
                <p style="background-color: #FA5B39;padding:10px"><strong>{{__("global_translate.error")}}</strong></p>
                <ul style="background-color: #FA5B39;padding:10px">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
        @endif
        @if (\Session::has('success'))
          <div role="alert" >
              <p style="background-color: #4BB543;padding:10px;text-align: center">
                  <strong>{!! \Session::get('success') !!}</strong>
             </p>
         </div>
        @endif
        <br>
        <br>
        <h1>{{__("demandeFront.info")}}</h1>
        {{-- <h4>SubTitle</h4> --}}

        <form action="{{route('demande/store')}}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('POST')
          <div class="grid-2">
                    <input class="text_insc wow right-animation" name="nom['fr']" type="text" placeholder="Nom">
                    <input class="text_insc wow right-animation" name="nom['ar']" type="text" placeholder="اللقب">
                    <input class="text_insc wow left-animation"  name="prenom['fr']" type="text" placeholder="Prénom">
                    <input class="text_insc wow left-animation"  name="prenom['ar']" type="text" placeholder="الاسم الشخصي">
                    <input class="text_insc wow right-animation" name="cin" type="text" placeholder="{{__('demandeFront.Cin')}}">
                    <input class="text_insc wow left-animation"  name="nbrRamed" type="text" placeholder="{{__('demande.ramed')}}">
                    <input class="text_insc wow left-animation"  name="Tel" type="text" placeholder="{{__('demande.télé')}}">
                    <input class="text_insc wow left-animation"  name="email" type="email" placeholder="{{__('global_translate.email')}}">
          </div>
          <div class="grid-2 wow fadeup-animation">
              <input class="text_insc" type="text" name="adresse['fr']" placeholder="Adresse">
              <input class="text_insc" type="text" name="adresse['ar']" placeholder="العنوان">
          </div>
          @php
              $AryDemande = ['Achat'=>["fr"=>'Achat médicaments','ar'=>'شراء الأدوية'],
                  'Intervention'=>["fr"=>'Intervention chirurgicale','ar'=>'عملية جراحية'],
                  'Frais'=>["fr"=>'Frais de transport','ar'=>'تكاليف النقل'],
                  'Articles'=>["fr"=>'Articles de parapharmacies','ar'=>'مواد الصيدلة'],
                  'Analyses'=>["fr"=>'Analyses','ar'=>'التحليلات']]
          @endphp
          <div class="grid-2">
                    <div class="wow left-animation">
                      <select class="select_insc text_insc " name="genreDemande" id="cars">
                        <option value="" hidden>{{__('demande.type')}}</option>
                        @foreach ($AryDemande as $item => $val)
                          <option value="{{$item}}">{{$val[app()->getLocale()]}}</option>
                        @endforeach
                      </select>
                    </div>
                    <input class="text_insc wow right-animation" name="montant" type="text" placeholder="{{__('demande.montantDemander')}}">
                    {{-- <input class="text_insc wow left-animation" name="pieceJustifs"  style="padding-left: 0;" type="file" accept=".pdf" placeholder="Joindre les pièces justificatives "> --}}
                    <input type="file"  class="text_insc wow left-animation" name="pieceJustifs" placeholder="Joindre les pièces justificatives" style="padding-left: 0;" >
          </div>
          <button type="submit" class="about_link">Demandez</button>
        </form>
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

  </html>
