@include('admin.includes.head')
<body class="vertical-layout vertical-menu 2-columns
 @if(Request::is('admin/users/tickets/reply*')) chat-application @endif menu-expanded fixed-navbar"
      data-open="click" data-menu="vertical-menu" data-col="2-columns">
        <!-- fixed-top-->
        @include('admin.includes.header')
        <!-- ////////////////////////////////////////////////////////////////////////////-->
        @include('admin.includes.sidebar')

        @yield('content')
        <!-- ////////////////////////////////////////////////////////////////////////////-->
        @include('admin.includes.footer')

        @notify_js
        @notify_render

        @include('admin.includes.scripts')
</body>
</html>
