<nav class="navbar navbar-expand-sm navbar-light px-lg-5">
    <a class="navbar-brand" href="{{ route('home.home') }}"><img src="{{ asset('img/logo.svg') }}" alt="logo"></a>
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
                <a class="nav-link d-flex" href="{{ route('order.cart') }}">
                    <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-cart2" fill="currentColor"
                         xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                              d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l1.25 5h8.22l1.25-5H3.14zM5 13a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
                    </svg>
                    @if(\Illuminate\Support\Facades\Auth::check())
                        @if(count(\Illuminate\Support\Facades\Auth::user()->cartItems) > 0)
                            <div class="itemsDot rounded-circle bg-warning position-absolute ml-4"
                                 style="width: 1em; height: 1em;">
                            </div>
                        @endif
                    @endif
                </a>
            </li>
            <li class="nav-item ml-4">
                @if (\Illuminate\Support\Facades\Auth::check())
                    <div class="btn-group dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="img-profile rounded-circle" src="{{asset('img/accountlogo.png')}}" />
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ \Illuminate\Support\Facades\Auth::user()->name }}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="{{ route('customer.profile') }}">
                                <i class="fa fa-user fa-sm fa-fw mr-2"></i>
                                Profil
                            </a>
                            <a class="dropdown-item" href="{{ route('customer.order') }}">
                                <i class="fa fa-list fa-sm fa-fw mr-2"></i>
                                Pesanan
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2"></i>
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('auth.logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                @else
                    <a href="{{ route('auth.login') }}" class="btn-primary px-4 py-2 rounded" style="text-decoration: none">Login</a>
                @endif
            </li>
        </ul>

    </div>
</nav>
