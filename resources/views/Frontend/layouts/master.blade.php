@include('Frontend.includes.meta-tags')

<body>
    <!-- start page-wrapper -->
    <div class="page-wrapper">
        <!-- start preloader -->
        {{-- @include('Frontend.includes.loader') --}}
        <!-- end preloader -->

        <!-- start header -->
        @include('Frontend.includes.header')
        <!-- end of header -->
        @yield('body-content')

        @include('Frontend.includes.footer')
    </div>
    <!-- end of page-wrapper -->
    @include('Frontend.includes.script')
</body>
</html>
