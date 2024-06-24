<nav class="navbar navbar-custom fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand font-bold" href="/">BarProHire</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end custom-sidebar" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title text-m sm:text-m md:text-m font-semibold text-center mb-4 sm:mb-6 py-2 px-6 bg-gradient-to-r from-orange-500 to-orange-700 text-white rounded-lg shadow-lg w-1/4 md:w-1/3" id="offcanvasNavbarLabel" style="z-index: 1050;">LINKS</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    @guest
                    <li class="nav-item">
                        <a class="nav-link hover:text-orange-700" aria-current="page" href="/login">Log In</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link hover:text-orange-700" href="/register">Registrati</a>
                    </li>
                    @endguest
                    @auth
                    <li class="nav-item">
                        <a class="nav-link font-bold text-orange-400 uppercase hover:text-orange-700" href="/posts/create">Crea un Post</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link hover:text-orange-700" href="{{ route('users.show', Auth::user()) }}">Lista Dei Post</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link hover:text-orange-700" href="{{route('auth.profile', Auth::user())}}">Profilo</a>
                    </li>
                    <li class="nav-item">
                        <form action="/logout" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="hover:text-orange-700">Log Out</button>
                        </form>
                    </li>
                    @endauth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle hover:text-orange-700" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Dropdown
                        </a>
                        <ul class="dropdown-menu custom-dropdown">
                            <li><a class="dropdown-item hover:text-orange-700" href="/">Home</a></li>
                            <li><a class="dropdown-item hover:text-orange-700" href="#">Contatti</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item hover:text-orange-700" href="#">Instagram</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
