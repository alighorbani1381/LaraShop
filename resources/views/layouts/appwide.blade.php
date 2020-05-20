
@include('layouts.Default.header')

<div id="container">
    <div class="container">
        @yield('breadcrumb')
        <div class="row">
            @yield('content')
        </div>
        @yield('customSidebar')
    </div>
</div>

@include('layouts.Default.footer')