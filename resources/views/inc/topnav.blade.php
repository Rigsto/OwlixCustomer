<nav class="navbar navbar-expand-sm navbar-light px-lg-5">
    <a class="navbar-brand" href="{{ route('home.home') }}"><img src="{{ asset('img/logo.svg') }}" alt="logo"></a>
    <!-- <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button> -->
    <div class="scollapse navbar-collapse" id="collapsibleNavId">
        <form class="input-group md-form form-sm form-4 px-4 mx-lg-4 mt-2 search-bar">
            <input class="form-control w-50 my-0 py-1 red-border" type="text"
                   style="background-color: transparent;" placeholder="Search" aria-label="Search">
            <button class="input-group-append btn btn-secondary align-items-center" type="button">
                <i class="fa fa-search text-grey mx-1"></i>
            </button>
        </form>
        <ul class="navbar-nav mt-2 mt-lg-0 align-items-center">
            <li class="nav-item active border-right pr-4">
                <a class="nav-link d-flex" href="{{ url('Cart') }}">
                    <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-cart2" fill="currentColor"
                         xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                              d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l1.25 5h8.22l1.25-5H3.14zM5 13a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
                    </svg>
                    @if(\Illuminate\Support\Facades\Auth::check())
                        <div class="itemsDot rounded-circle bg-warning position-absolute ml-4"
                             style="width: 1em; height: 1em;">
                        </div>
                    @endif
                </a>
            </li>
            <li class="nav-item ml-4">
                @if (\Illuminate\Support\Facades\Auth::check())
                    <div class="btn-group" id="profileDropdown">
                        <div class="d-flex align-items-center">
                            <div class="profileDropdownImg"></div>
                            <div class="text-left">
                                <p class="text-muted mb-0 small">Akun</p>
                                <p class="mt-0 mb-0 font-weight-bold">{{Session::get('user.data.name')}}</p>
                            </div>
                        </div>
                        <button type="button" class="btn dropdown-toggle" data-toggle="dropdown"
                                data-display="static" aria-haspopup="true" aria-expanded="false"
                                style="background-color: transparent!important">

                        </button>
                        <div class="dropdown-menu dropdown-menu-lg-right">
                            <button class="dropdown-item" type="button"
                                    onclick="window.location.href='{{ url('profil')}}'">Profil
                            </button>
                            <button class="dropdown-item" type="button">Pesanan</button>
                            <button class="dropdown-item" type="button"
                                    onclick="window.location.href='{{ url('logout')}}'">Keluar
                            </button>
                        </div>
                    </div>
                @else
                    <a href="{{ route('auth.login') }}" class="btn-primary px-4 py-2 rounded" style="text-decoration: none">Login</a>
                @endif
            </li>
        </ul>

    </div>
</nav>
