<!DOCTYPE html>
<html lang="en">

<head>
    @include('head')
</head>

<body>
    <main id="app">
        @include('sweetalert::alert')
        @include('layout.header')
        @yield('content')
        @include('layout.footer')
    </main>
</body>

</html>
