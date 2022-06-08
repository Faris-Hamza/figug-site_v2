<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
      navbar-scroll="true">
      <div class="container-fluid py-1 px-3">

        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center"> </div>
            <ul class="navbar-nav  justify-content-end">
              <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                  <div class="sidenav-toggler-inner">
                    <i class="sidenav-toggler-line"></i>
                    <i class="sidenav-toggler-line"></i>
                    <i class="sidenav-toggler-line"></i>
                  </div>
                </a>
              </li>


              <li class="nav-item px-3 d-flex align-items-center">
                <a href="https://mail.hostinger.com/" class="nav-link text-body p-0">
                    <i class="fa-solid fa-envelope"></i>
                </a>
              </li>
                @php
                  $Demande = \App\Models\Demande::all()->where('Veu',0);
                  $Mails = \App\Models\Mails::all()->where('Veu',0);
                @endphp
              <li class="nav-item dropdown px-3 pe-2 d-flex align-items-center">
                <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="true">
                    @if (count($Mails)!=0 || count($Demande)!=0)
                      <img src="{{asset("assets/images/LOGO/notification.png")}}"/>
                    @else
                      <img src="{{asset("assets/images/LOGO/notification2.png")}}"/>
                    @endif
                </a>
                  <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                          @if (count($Mails)!=0)
                                  <li class="mb-2">
                                    <a class="dropdown-item border-radius-md" href="{{route('mail')}}">
                                      <div class="d-flex py-1">
                                        <div class="my-auto">
                                          <img src="{{asset("assets\images\LOGO\mail.png")}}" class="avatar avatar-sm  me-3 ">
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                          <h6 class="text-sm font-weight-normal mb-1">
                                        <span class="font-weight-bold">nouveau {{count($Mails)}} email(s)  </span>
                                      </h6>
                                      <p class="text-xs text-secondary mb-0 ">
                                        @php
                                          $date = (\Carbon\Carbon::now()->diff(\Carbon\Carbon::parse($Mails->first()->created_at)));
                                        @endphp
                                        <i class="fa fa-clock me-1"></i>
                                        Il y a {{$date->format('%i')}} minute(s)
                                      </p>
                                    </div>
                                  </div>
                                </a>
                              </li>
                         @endif
                           @if (count($Demande)!=0)
                                <li class="mb-2">
                                  <a class="dropdown-item border-radius-md" href="{{route('demandes')}}">
                                    <div class="d-flex py-1">
                                      <div class="my-auto">
                                        <img src="{{asset("assets\images\LOGO\demand.png")}}" class="avatar avatar-sm  me-3 ">
                                      </div>
                                      <div class="d-flex flex-column justify-content-center">
                                        <h6 class="text-sm font-weight-normal mb-1">
                                     <span class="font-weight-bold">nouveau {{count($Demande)}} Demande(s)</span>
                                  </h6>
                                  <p class="text-xs text-secondary mb-0 ">
                                    @php
                                      $date = (\Carbon\Carbon::now()->diff(\Carbon\Carbon::parse($Demande->first()->created_at)));

                                    @endphp
                                    <i class="fa fa-clock me-1"></i>
                                       Il y a {{$date->format('%i')}} minute(s)
                                  </p>
                                    </div>
                                  </div>
                                 </a>
                                </li>
                          @endif

                  </ul>
              </li>

            </ul>

            <ul class="nav nav-tabs">

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">{{ config('locales.languages')[app()->getLocale()]['name'] }}</a>
                    <ul class="dropdown-menu">
                        @foreach(config('locales.languages') as $key => $val)
                            @if ($key != app()->getLocale())
                                <li><a class="dropdown-item" href="{{ route('change.language', $key) }}">{{ $val['name'] }}</a></li>
                            @endif
                        @endforeach


                    </ul>
                </li>
            </ul>
            <ul class="navbar-nav ">
              <!-- Authentication Links -->
              @guest
                  @if (Route::has('login'))
                      <li class="nav-item">
                          <a class="nav-link" href="{{ route('login') }}">{{ __('auth.login') }}</a>
                      </li>
                  @endif
              @else
                  <li class="nav-item dropdown">
                      <div class="" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                              {{ __('auth.logout') }}
                          </a>
                          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                              @csrf
                          </form>
                      </div>
                  </li>
              @endguest
            </ul>
          </div>
      </div>
    </nav>
