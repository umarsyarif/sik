<div class="sidebar" data-color="white" data-active-color="danger">
    <div class="logo">
        <a href="/" class="simple-text logo-mini mt-2">
            <div class="logo-image-small">
                <img src="{{ asset('paper') }}/img/asd.png">
            </div>
        </a>
        <a href="/" class="text-secondary logo-normal">
            <div class="text-center">
                Sistem Informasi <br>
                Kesehatan
            </div>
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="{{ $elementActive == 'dashboard' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'home') }}">
                    <i class="nc-icon nc-bank"></i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'user' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'user') }}">
                    <i class="nc-icon nc-single-02"></i>
                    <p>{{ __('Users') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'category' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'category') }}">
                    <i class="nc-icon nc-bookmark-2"></i>
                    <p>{{ __('Categories') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'article' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'article') }}">
                    <i class="nc-icon nc-paper"></i>
                    <p>{{ __('Articles') }}</p>
                </a>
            </li>
        </ul>
    </div>
</div>
