<x-app-layout>
    <link rel="stylesheet" href="./css/app.css">
    <x-slot name="header">
    <h2 class="mb-5"><a href="/">Go To Home</a></h2>
        <div class="profile d-flex justify-content-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
            </h2>
            <h2><a class="font-semibold text-xl  leading-tight" href="/edit">Edit Profile</a></h2>
        </div>
    </x-slot>

   

    <x-slot name="slot">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @foreach($users as $user)
                    <div class="p-6 bg-white">
                        <a href="/profile/{{$user->id}}" class="text-blue-500">{{$user->name}}</a>
                        as {{$user->username}}
                        <div>
                            <div>Email : {{$user->email}}</div>
                            <div>Bio : {{$user->profile->bio}}</div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <script src="../js/app.js"></script>
    </x-slot>



    
</x-app-layout>