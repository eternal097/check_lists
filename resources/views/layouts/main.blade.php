@include('inc.head')
<body>
    <div id="app">
        @include('inc.header.main')

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
