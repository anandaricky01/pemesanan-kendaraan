
    @include('layout.components.head')
    @include('layout.components.symbol')
    @include('layout.components.navbar')

    {{-- <div class="mx-5 mt-5"> --}}
        @yield('container')
    {{-- </div> --}}

    @include('layout.components.js')
    @include('layout.components.footer')
