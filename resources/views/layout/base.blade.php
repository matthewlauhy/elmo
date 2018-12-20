<!DOCTYPE html>
<meta name="csrf-token" content="{{ csrf_token() }}">
<html>
<header>
    <title>Elmo</title>
    <link rel="stylesheet" href="/css/app.css">
</header>
<body>
    @include('inc.navbar')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-lg-8">
                @yield('content')
            </div>
            <div class="col-md-4 col-lg-4">
                @include('inc.sidebar')
            </div>
        </div>

    </div>

    <!-- <script src="/js/manifest.js"></script>
    <script src="/js/vendor.js"></script> -->
    <script src="/js/app.js" ></script>
    @yield('script')
</body>
</html>