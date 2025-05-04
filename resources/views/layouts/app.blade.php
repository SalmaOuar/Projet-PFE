<!DOCTYPE html>
<html>

<head>
    <title>PFENS - Gestion des PFE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>

    @include('partials.navbar')

    <main class="py-5">
        @yield('content')
    </main>

  <!--   @include('partials.navbar')

    <main class="py-4">
        @yield('content')
    </main> -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>


</html>