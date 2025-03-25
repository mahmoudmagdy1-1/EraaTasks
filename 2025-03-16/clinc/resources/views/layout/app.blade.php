<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('layout.links')
    <title>@yield('title')</title>
</head>

<body>
<div class="page-wrapper">
    @include('layout.navbar')
    @yield('content')
</div>


@include('layout.footer')
@include('layout.scripts')
</body>

</html>
