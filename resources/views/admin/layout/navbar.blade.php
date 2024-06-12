<nav class="navbar navbar-expand-md navbar-light shadow-sm" style="background-color: #5f6676">
    <div class="navbar2 d-flex  ">
        <div class="navbar-container">
            <img class="navbrand" src="{{ url('/image/inspire.png') }}" alt="">
            <a class="navbar-brand text-white" href="{{ url('/') }}">
                <span>INSPIRE DORMITEL</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->

                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button"
                        style="font-size: 17px" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                        v-pre>
                        Hi, {{ Auth::user()->name }}!
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
