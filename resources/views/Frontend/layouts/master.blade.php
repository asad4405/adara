@include('Frontend.includes.meta-tags')

<body>
    <!-- preloader  -->
    {{-- @include('Frontend.includes.loader') --}}
    <!-- preloader end -->

    <!-- Scroll-top -->
    <button class="scroll-top scroll-to-target" data-target="html">
        <i class="fas fa-angle-up"></i>
    </button>
    <!-- Scroll-top-end-->

    <!-- header-area -->
    @include('Frontend.includes.header')
    <!-- header-area-end -->

    <!-- main-area -->
    @yield('body-content')
    <!-- main-area-end -->


    <!-- footer-area -->
    @include('Frontend.includes.footer')
    <!-- footer-area-end -->

    <!-- JS here -->
    @include('Frontend.includes.script')
</body>

</html>
