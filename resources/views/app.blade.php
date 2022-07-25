<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon.png') }}">


    <link href="{{ mix('/css/app.css') }}" rel="stylesheet" />

    <script src="{{ mix('/js/app.js') }}" defer></script>

    <link rel="stylesheet" href="{{ asset('style/bootstrap.css') }}">

    @inertiaHead

</head>

<body class="dashboard">

    <div id="preloader"><i>.</i><i>.</i><i>.</i></div>

    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])


    @inertia
    <script src="{{ asset('scripts/jquery.min.js') }}"></script>
    <script src="{{ asset('scripts/bootscrap.js') }}"></script>
    <script src="{{ asset('scripts/main.js') }}"></script>
    <script>
        console.clear()
    </script>

</body>

</html>
