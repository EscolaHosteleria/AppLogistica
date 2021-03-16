<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand ancho" href="{{ url('/') }}">
        <img src="{{ asset('images/escola-hosteleria.png') }}" class="amplada">
    </a>
    <button class="navbar-toggler" type="button"  data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor01">

        <ul class="navbar-nav mr-auto">
            @if(Auth::check())
                @php $userRol = Auth::user()->rol->rol; @endphp
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="itemsComandes" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-clipboard-list mr-2"></i>Comandes
                    </a>
                    <div class="dropdown-menu" aria-labelledby="itemsComandes">
                        @if($userRol != 'Alumnat')
                        <a class="dropdown-item" href="/comanda/create"><i class="fas fa-plus mr-2"></i>Crear Comanda</a>
                        @endif
                        @if($userRol == 'Administrador' || $userRol == 'Economat')
                            <a class="dropdown-item" href="/comanda"><i class="fas fa-list-ol mr-2"></i>Llistar Comandes</a>
                        @else
                            <a class="dropdown-item" href="/"><i class="fas fa-calendar-alt mr-2"></i>Comandes setmanals</a>
                        @endif
                    </div>
                </li>
                @if($userRol == 'Administrador' || $userRol == 'Economat')
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="itemsMagatzem" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-boxes mr-2"></i>Magatzem
                    </a>
                    <div class="dropdown-menu" aria-labelledby="itemsMagatzem">
                        <a class="dropdown-item" href="/producte"><i class="fas fa-apple-alt mr-2"></i>Productes</a>
                        <a class="dropdown-item" href="/categoria"><i class="fas fa-tags mr-2"></i>Categories</a>
                        <a class="dropdown-item" href="/format"><i class="fab fa-buromobelexperte mr-2"></i>Formats</a>
                    </div>
                </li>
                @endif
                @if($userRol != 'Professorat')
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="itemsInformes" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-book-open mr-2"></i>Informes
                    </a>
                    <div class="dropdown-menu" aria-labelledby="itemsInformes">
                        <a class="dropdown-item" href="/informe"><i class="fas fa-list-ol mr-2"></i>Crear Informes</a>
                    </div>
                </li>
                @endif
                @if($userRol == 'Administrador')
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="itemsUsuaris" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           <i class="fas fa-user mr-2"></i>Usuaris
                        </a>
                        <div class="dropdown-menu" aria-labelledby="itemsUsuaris">
                            <a class="dropdown-item" href="/usuari/create"><i class="fas fa-user-plus mr-2"></i>Afegir Usuari</a>
                            <a class="dropdown-item" href="/usuari"><i class="fas fa-users mr-2"></i>Llistar Usuaris</a>
                        </div>
                    </li>
                @endif
            @endif
        </ul>

        <div class="form-inline my-2 my-lg-0 justify-content-end">
        @guest
            @if (Route::has('login'))
                    <a type="button" class="btn btn-success mx-2" href="{{ route('login') }}">
                    Iniciar Sessió <i class="fas fa-sign-in-alt"></i>
                    </a>
                @endif
            @else
                <div class="navbar-nav"><a class="nav-link active">{{Auth::user()->rol->rol}}: {{ Auth::user()->name }} </a></div>

                <a type="button" class="btn btn-info ml-4" onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                    Tancar Sessió <i class="fa fa-sign-out-alt" aria-hidden="true"></i>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            @endguest

        </div>
    </div>
</nav>
