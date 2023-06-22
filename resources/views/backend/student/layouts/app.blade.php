<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('backend.student.layouts.elements.meta')
    <title>@yield('title',config('app.name', 'Laravel'))</title>
    @include('backend.student.layouts.elements.head')
</head>
<body>
        {{-- @include('frontend.layouts.elements.nav') --}}
    <div class="container-fluid">
        <div class="row flex-nowrap">
            @include('backend.student.layouts.elements.sidebar')
            <div class="col py-3 vh-100 overflow-auto content-section-custom">
                @include('backend.student.layouts.elements.alert')
                @yield('content')
            </div>
        </div>
    </div>
    @include('backend.student.layouts.elements.script')
</body>
</html>
