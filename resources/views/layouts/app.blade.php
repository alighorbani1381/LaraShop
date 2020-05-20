
@include('layouts.Default.header')

<div id="container">
    <div class="container">
        @yield('breadcrumb')
        <div class="row">
            @include('layouts.Default.aside') {{-- Right Sidebar --}}
            @yield('content')
        </div>
    </div>
</div>

@include('layouts.Default.footer')