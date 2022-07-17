@include('layouts.header')

<!-- BEGIN: Body-->
<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="">

@include('layouts.navbar')

@include('layouts.menu')

@yield('content')

@include('layouts.footer')
