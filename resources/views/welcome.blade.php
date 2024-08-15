<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        @vite(['resources/js/app.js','resources/css/app.css'])
    </head>
    <body class="font-sans antialiase">
        <div class="bg-gray-100 text-black/50">
            <!-- <img id="background" class="absolute -left-20 top-0 max-w-[877px]" src="https://laravel.com/assets/img/welcome/background.svg" /> -->
            <div class="relative min-h-screen flex flex-col items-center justify-center">
                <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                    <main class="mt-6">
                        <div class="max-w-md mx-auto bg-white shadow-lg rounded-lg overflow-hidden mt-16">
                            <div class="px-4 py-2">
                                <h1 class="text-gray-800 font-bold text-2xl uppercase">To-Do List</h1>
                            </div>
                            <div id="app"></div>
                        </div>
                    </main>
                </div>
            </div>
        </div>
    </body>
</html>
