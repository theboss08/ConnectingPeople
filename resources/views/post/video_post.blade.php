<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="../css/app.css" rel="stylesheet">

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
            #post_text{
                width : 500px;
                height: 300px;
            }
        </style>
    </head>
    <body class="antialiased">

    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>
                        <span id="postMenu">
                        </span>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <form method="POST" action="/post/create/video" enctype=multipart/form-data>
            @csrf
            @method('POST')

            <div>
                <x-label for="caption" :value="__('Caption')" />

                <x-input id="caption" class="block mt-1 w-full" type="text" value="{{old('bio')}}"  name="caption" required autofocus />
            </div>

            <div class="mt-4">
                <x-label for="video" :value="__('Video File')" />

                <x-input id="video" class="block mt-1 w-full" type="file" accept="video/*" value="{{old('bio')}}"  name="video" required />
            </div>

            <div class="flex items-center justify-center mt-8">

                <x-button class="ml-4">
                    Submit
                </x-button>
            </div>
        </form>
        
            </div>
        </div>
    </div>
    </div>
        </div>


        <script src="../js/app.js"></script>
    </body>
</html>
