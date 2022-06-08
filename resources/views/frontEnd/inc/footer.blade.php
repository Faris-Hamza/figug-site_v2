<footer class="footer">
    <div class="grid-1">
        <img src="{{asset("assets/images/LOGO/WhatsApp Image 2022-04-13 at 2.56 1.png")}}" alt="">
        <div class="menu_footer">
            <nav class="header_nav menu_footer_nav">
                <a href="{{route('Accuiel')}}"class="underline-hover"> {{__('global.home')}}</a>
                <a href="{{route('about')}}" class="underline-hover">{{__('global.about')}}</a>
                <a href="{{route('p_rojet')}}"class="underline-hover">{{__('global.project')}}</a>
                <a href="{{route('activites')}}"class="underline-hover">{{__('global.actions')}}</a>
                <a href="{{route('soutenezNous')}}"class="underline-hover">{{__('global.support')}}</a>
                <a href="{{route('getInsc')}}"class="underline-hover">{{__('global.demande')}}</a>
            </nav>
        </div>
        <div class="media container row">
            <div class="social col"><a href="#"><img class="icon" target="_blank" src="{{asset('assets/images/social-media/fb.png')}}" alt="logo"></a></div>
            <div class="social col"><a href="#" target="_blank"><img class="icon" src="{{asset('assets/images/social-media/insta.png')}}" alt="logo"></a></div>
            <div class="social col"><a href="#"><img class="icon" src="{{asset('assets/images/social-media/whatssap.png')}}" alt="logo" target="_blank"></a></div>
            <div class="social col"><a href="#"><img class="icon" src="{{asset('assets/images/social-media/twitter.png')}}" alt="logo" target="_blank"></a></div>
            <div class="social col"><a href="#"><img class="icon" src="{{asset('assets/images/social-media/linkdin.png')}}" alt="logo" target="_blank"></a></div>
      </div>
    </div>
</footer>
<footer>
    <div class="div-p1">
        <p class="footer-p1">© 20{{date("y")}} Foundation Oriental Figug FOF</p>
    </div>
</footer>


<!-- Wow Animation JS Link -->
<script src="{{asset("assets/js/jquery.min.js")}}"></script>
<script src="{{asset("assets/js/materialize.min.js")}}"></script>
<script src="{{asset("assets/js/simplePagination.js")}}"></script>

<!-- Banner Moving Js Link -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<!-- Slick Slider JS Link -->
<script src="{{asset("assets/js/slick.min.js")}}"></script>
<!-- Portfolio Tabbing JS Link -->
<script src="{{asset("assets/js/jquery.mixitup.min.js")}}"></script>
<script src="{{asset("assets/js/wow.min.js")}}"></script>
<script src="{{asset("assets/js/app.js")}}"></script>




</body>
