<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela carlos</title>

    <!-- CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- JS -->
    <script src="{{ asset('js/app.js') }}" defer></script>

</head>

<body class="bg-gray-100" style ="height: 100%; margin: 0;  display: flex; justify-content: center; align-items: center; background-color: #FAFAFA; margin-top:150px;">

    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0" style=" width: 350px; height: 430px; background-color: #09225B; color: white; display: flex; justify-content: center; align-items: center; font-size: 20px; border-radius: 10px; padding: 30px;">
        <!-- <div>
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </div> -->

        <div class="min-h-screen flex items-center justify-center bg-gray-100">
            <div class="w-full sm:max-w-md px-6 py-8 bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden">
                @yield('content')
            </div>
        </div>
    </div>

</body>
</html>
