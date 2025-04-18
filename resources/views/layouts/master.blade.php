<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('layouts.head')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
@if (!Auth::check())
    @php
    $redirectUrl = '/';
    header("Location: " . $redirectUrl, true, 302);
    exit();
    @endphp
@endif


@auth
<div class="wrapper">
    @include('layouts.main-headerbar')
    @include('layouts.main-sidebar')
  <div class="content-wrapper">
        @yield('content')
  </div>
@include('layouts.footer')
  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>
@include('layouts.footer-scripts')
@endauth

</body>
</html>



