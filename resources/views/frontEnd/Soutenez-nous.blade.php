@include('frontEnd.inc.headerMin',['name' => __("global.support")])

  <!--main-->
  <main class="">
    <span class="up"><i class="fa-solid fa-up-long"></i></span>

    <section class="container Project">

      <div class="grid-1 Project_row1 wow fadeup-right">
        <div class="about wow right-animation">
          <h1 >{{__('global.supportstr')}}</h1>
        </div>
        <div >
           <p>
             {{$info->txtSetunez}}
          </p>
        </div>
      </div>

    </section>

    <section class="container sec_Information wow fadeup-animation">
      <div class="Information">
        <h1 class="sec2_title">{{__('global.contact')}}</h1>
              <div class="grid-3 temp">
                  <a href="https://web.facebook.com/Fondation-Oriental-Figuig-933608353443573"><input style="width: 100%;" type="text" disabled placeholder="FACEBOOK"></a>
                  <a href="https://www.whatsap.me/"><input style="width: 100%;" type="text" disabled placeholder="Téléphone"></a>
                  <a href="mailto: foraction@for-action.org"><input style="width: 100%;" type="text" disabled placeholder="Email"></a>
              </div>
      </div>

    </section>
  </main>

  @include('frontEnd.inc.footer')
