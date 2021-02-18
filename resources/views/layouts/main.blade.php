@include('inc.head')
<body>
    <div id="app">
        @include('inc.header.main')
        @role('blocked')
            @include('inc.block')
        @else
        <main class="py-4">
            @yield('content')
        </main>
        @endrole
    </div>
</body>
</html>
