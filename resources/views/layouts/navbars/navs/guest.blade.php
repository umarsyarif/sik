<nav class="navbar navbar-expand-md navbar-absolute fixed-top shadow-sm">
    <div class="container">
        <div class="navbar-wrapper">
            <div class="navbar-toggle">
                <button type="button" class="navbar-toggler">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                </button>
            </div>
            <a class="navbar-brand text-white" href="/">{{ __('S I K') }}</a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav">
                @auth
                    <li class="nav-item text-white">
                        <a href="{{ route('page.index', 'home') }}" class="nav-link">
                            {{ __('Dashboard') }}
                        </a>
                    </li>
                @endauth
                @guest
                    <li class="nav-item  text-white ">
                        <a href="{{ route('register') }}" class="nav-link">
                        {{ __('Register') }}
                        </a>
                    </li>
                    <li class="nav-item  text-white ">
                        <a href="{{ route('login') }}" class="nav-link">
                        {{ __('Login') }}
                        </a>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
