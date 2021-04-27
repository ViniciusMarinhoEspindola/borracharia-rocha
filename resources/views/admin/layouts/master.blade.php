<!DOCTYPE html>
<html lang="pt-br">

@include('admin.includes.header')

<body>

<section class="page-content active" id="page-content">
    @yield('content')
</section>

@include('admin.includes.scripts')

@yield('js')

@include('admin.includes.footer')

</body>
</html>


