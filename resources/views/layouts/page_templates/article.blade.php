@include('layouts.navbars.navs.guest')

<div class="wrapper wrapper-full-page ">
    <div class="full-page section-image" filter-color="black" data-image="{{ asset('blog') }}/img/hospital.jpg">
        @yield('content')
    </div>
</div>

