<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Добро пожаловать</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-100 to-green-200">
    <div class="bg-white p-10 rounded-xl shadow-lg w-full max-w-md flex flex-col items-center">
        <svg class="w-20 h-20 mb-6" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="20" cy="20" r="20" fill="#E31B23"/>
            <text x="10" y="28" font-size="18" font-family="Arial, Helvetica, sans-serif" fill="white" font-weight="bold">hh</text>
        </svg>
        <h1 class="text-3xl font-bold mb-4 text-blue-700 text-center">hh.ru</h1>
        <p class="text-gray-600 mb-8 text-center">Это стартовая страница тестовго задания.</p>
        <div class="flex gap-4 w-full justify-center">
            <a href="{{ route('login') }}" class="px-6 py-2 bg-blue-500 text-white rounded-lg font-semibold hover:bg-blue-600 transition">Войти</a>
            <a href="{{ route('register') }}" class="px-6 py-2 bg-green-500 text-white rounded-lg font-semibold hover:bg-green-600 transition">Регистрация</a>
        </div>
    </div>
</body>
</html>
