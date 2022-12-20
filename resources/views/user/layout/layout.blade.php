@include('user.includes.header')

@include('user.includes.navbar')
@include('user.includes.sidebar')

@yield('content')

@include('user.includes.footer')
@include('user.includes.js-files')

@yield('script')

</body>

</html>