<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sigemuna Login </title>
    <link rel="stylesheet" href="{{ asset("auth/css/style.css") }}">

</head>
<body>
    
    {{ $slot }}

    {{--<div id="preloader" style="width: 100%;height: 100vh;position: fixed;top: 0;left: 0;background-color: #0909099f;z-index: 99999999999;display: none;justify-content: center;align-items: center;flex-direction: column;">
        <div style="width: 250px; height: 100px; background-color: #ffffff; display: flex; align-items: center; justify-content: center;">
            <img src="{{ asset('assets/img/spiner.gif') }}" alt="spiner" style="width: 70px;">
            <p style="font-size: 15pt; margin-top: 7%">Aguarde...</p>
        </div>
    </div>--}}
</body>
</html>