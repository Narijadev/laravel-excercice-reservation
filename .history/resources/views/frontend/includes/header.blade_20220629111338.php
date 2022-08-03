<!-- End Navbar -->

<nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="/">
         <img class="logo" id="giftimg" src="/img/logo1.png">
        </a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto my-2 my-lg-0">
                <li class="nav-item">
                 <a class="nav-link js-scroll-trigger" href="{{ route('frontend.concept')}}">Concept</a>
                </li>
                
                @can('view_backend')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('backend.dashboard') }}">
                        <i class="now-ui-icons tech_tv"></i>
                        Admin Dashboard
                    </a>
                </li>
                @endcan

                @guest
                
                @if(user_registration())

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">
                        Inscription
                    </a>
                </li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{ route('frontend.liste.search')}}">Chercher une liste</a></li>
                @endif
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">
                        <!--i class="now-ui-icons objects_key-25"></i--> Connexion
                    </a>
                </li>
                @else
                <li class="nav-item dropdown hgli-drop" >
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <!--i class="now-ui-icons users_single-02"></i--> {{ Auth::user()->name }}
                    </a>
                    @if(auth()->user()->listeCouranteId)
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{ route('frontend.liste.accueil', auth()->user()->listeCouranteId)}}">Tableau de bord</a>
                        <a class="dropdown-item" href="{{ route('frontend.users.profile', auth()->user()->username) }}">Votre profile</a>
                        <a class="dropdown-item" href="{{ route('frontend.liste.accueil', auth()->user()->listeCouranteId)}}" id="addArticle">Ajout article</a>
                        <a class="dropdown-item" href="{{ route('frontend.liste.voir', auth()->user()->listeCouranteId)}}">Voir votre liste courante</a>
                    </div>
                    @else
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{ route('frontend.liste.get', 'nouveau')}}">Créer mon nouvelle liste</a>
                        <a class="dropdown-item" href="{{ route('frontend.users.profile', auth()->user()->username) }}">Votre profile</a>
                    </div>
                    @endif
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <!--i class="now-ui-icons sport_user-run"></i--> Déconnexion
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

@push('after-scripts')             
<script>
    $(document).ready(function() {
        $('#addArticle').click(function() {
            localStorage.setItem('currentTab', 'ajout-tab');
        });
    });
</script>
@endpush