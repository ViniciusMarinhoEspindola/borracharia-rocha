@include('site.includes.header')

<body id="page-top">
    @include('site.includes.navbar')

    @yield('content')

    @include('site.includes.footer')

    @yield('js')
</body>

</html>