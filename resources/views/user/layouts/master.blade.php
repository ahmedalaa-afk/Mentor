<!DOCTYPE html>
<html lang="en">

@include('user.partials.head')

<body class="@yield('body-class')">

    @include('user.partials.header')


    @yield('content')

    @include('user.partials.footer')
</body>

</html>