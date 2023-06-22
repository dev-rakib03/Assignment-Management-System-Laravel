<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('frontend.layouts.elements.meta')
    <title>@yield('title',config('app.name', 'Laravel'))</title>
    @include('frontend.layouts.elements.head')
</head>
<body>
    <div id="app">
        @include('frontend.layouts.elements.nav')
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    @include('frontend.layouts.elements.script')
</body>
</html>
