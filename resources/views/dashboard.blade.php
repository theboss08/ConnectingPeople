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

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                {{$user->profile->bio}}
                @if ($user->profile->education)
                    <div>Studied At {{$user->profile->education}}</div>
                @endif
                @if ($user->profile->current_address)
                    <div>Lives In {{$user->profile->current_address}}</div>
                @endif
                @if ($user->profile->from_address)
                    <div>From {{$user->profile->from_address}} </diV>
                @endif
                @if ($user->profile->workplace)
                    <div>Works At {{$user->profile->workplace}} </div>
                @endif
                @if($user->profile->relationship)
                <div>Relationship {{$user->profile->relationship}} </div>
                @endif
                @if ($user->profile->hobbies)
                    <div> Likes to {{$user->profile->hobbies}} </div>
                @endif
                </div>

                <div class="p-6 bg-white border-b border-gray-200">
                Your Friends 
                @foreach ($friends as $friend)
                <div class="p-6 bg-white">
                        <a href="/profile/{{$friend->id}}" class="text-blue-500">{{$friend->name}}</a>
                    </div>
                @endforeach
                </div>


                <div class="p-6 bg-white border-b border-gray-200">
                Your Text Posts Total : {{$user->textPost->count()}}
                @foreach ($user->textPost as $post)
                    <div class="p-6 bg-white border-b border-gray-200">
                        <h1 class="mb-4 font-semibold text-xl text-gray-800 leading-tight">{{$post->caption}}</h1>
                        <div>
                        {{$post->post_body}}
                        </div>
                    </div>
                @endforeach
                </div>

                <div class="p-6 bg-white border-b border-gray-200">
                Your Image Posts Total : {{$user->imagePost->count()}}
                @foreach ($user->imagePost as $post)
                    <div class="p-6 bg-white border-b border-gray-200">
                        <h1 class="mb-4 font-semibold text-xl text-gray-800 leading-tight">{{$post->caption}}</h1>
                        <div>
                        <img src="/storage/{{$post->image_url}}" alt="">
                        </div>
                    </div>
                @endforeach
                </div>

            </div>
        </div>
    </div>



    <script src="./js/app.js"></script>
</x-app-layout>
