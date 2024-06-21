<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('layouts.components.head')

<body>
    <div id="app">
        @include('layouts.components.nav')

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    @include('layouts.components.script')
</body>

</html>
