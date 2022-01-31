<nav class="main-header navbar navbar-expand navbar-{{ Auth::user()->dark_mode == 0 ? 'light' : 'dark' }} navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                <i class="fas fa-search"></i>
            </a>
            <div class="navbar-search-block">
                <form class="form-inline">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                            <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
                {{ LaravelLocalization::getCurrentLocaleName() }}
                <img src="{{ asset('img/dropdown.png') }}" alt="">
            </a>
            <div class="dropdown-menu dropdown-menu-right p-0" style="left: inherit; right: 0px;">
                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                <a rel="alternate" class="dropdown-item" hreflang="{{ $localeCode }}"
                    href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                    {{ $properties['name'] }}
                </a>
                @endforeach
            </div>
        </li>
        {{-- <li class="nav-item">
            <div class="d-flex">
                <div class="nav-link">
                    <strong class="text-primary">USD</strong>
                    <span>{{ $usd }}</span>
                </div>
                <div class="nav-link">
                    <strong class="text-primary">RUB</strong>
                    <span>{{ $rub }}</span>
                </div>
                <div class="nav-link">
                    <strong class="text-primary">EUR</strong>
                    <span>{{ $euro }}</span>
                </div>
            </div>
        </li> --}}
        <li class="nav-item">
            <form action="{{ route('darkMode') }}" method="post">
                @csrf
                <input type="hidden" name="dark_mode" />
                <button class="btn text-{{ Auth::user()->dark_mode == 0 ? '' : 'white' }}">
                    <i class="fas fa-adjust"></i>
                </button>
            </form>
        </li>
        <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                <span class="d-none d-md-inline"><b>{{ Str::ucfirst(Auth::user()->name) }}</b></span>
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <li class="user-header">
                    <img src="{{ asset('img/noImage.jpg') }}" class="img-circle elevation-2" alt="User Image">
                    <p>
                        <b>{{ Str::ucfirst(Auth::user()->name) }}</b>
                        <small>{{auth()->user()->roles->first()->name}}</small>
                    </p>
                </li>
                <li class="user-footer">
                    <a href="" class="btn btn-primary btn-flat">{{tr('Profile')}}</a>
                    <a href="#" class="btn btn-danger btn-flat float-right"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{tr('Sign out')}}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </li>
    </ul>
</nav>
