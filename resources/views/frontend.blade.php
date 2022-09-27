<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Deliverboo</title>

    <!-- css and font-->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset("css/app.css") }}">
    <script src="https://js.braintreegateway.com/web/dropin/1.33.4/js/dropin.js"></script>
    <script src="{{ asset('js/frontend.js') }}" defer></script>
</head>

<body>
    <div id="app">
    </div>
</body>
</html>
