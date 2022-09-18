<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('page_title')</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.1/css/bootstrap.min.css' integrity='sha512-siwe/oXMhSjGCwLn+scraPOWrJxHlUgMBMZXdPe2Tnk3I0x3ESCoLz7WZ5NTH6SZrywMY+PB1cjyqJ5jAluCOg==' crossorigin='anonymous'/>
    <link rel="stylesheet" href="{{asset("/css/backend.css")}}">

    <script src="{{asset("js/app.js")}}"></script>
</head>
<body>

    <div class="main-container">
        
        <div class="sidebar"></div>
        
        
        <main>
            <div class="main-content">
                @yield('page_content')
            </div>
        </main>
    </div>
</body>
</html>