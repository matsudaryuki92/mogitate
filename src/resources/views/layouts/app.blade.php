<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css')}}">
    @yield('css')
    <title>mogitate</title>
</head>

<body>
    <div class="header">
        <h2 class="header-title">
            <a href="{{ route('products.index') }}">
                <img src="{{ asset('/storage/images/mogitate.png') }}" alt="mogitate">
            </a>
        </h2>
    </div>

    @yield('content')

    @yield('script')
</body>

</html>