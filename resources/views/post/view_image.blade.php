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
                <div class="d-flex justify-content-center p-6 bg-white border-b border-gray-200">
                    <h1 class="mb-4 font-semibold text-xl text-gray-800 leading-tight"> <a href="/image/{{$post->id}}">{{$post->caption}}</a> </h1>
                    <div>
                    <img class="image_post" src="/storage/{{$post->image_url}}" alt="">
                    </div>
                    <div class="mt-5">Posted By : <a class="text-blue-500" href="/profile/{{$post->user->id}}">{{$post->user->name}}</a> </div>
                </div>
                <div class="add_comment">
                <form action="/comment/image" method="post">
                @csrf
                    <div class="mt-4">
                    <x-label for="body" :value="__('Write Comment')" />
                    <input type="hidden" name="post_id" value={{$post->id}}>
                    <x-input id="body" class="block mt-1 w-full" type="text" name="body" value="{{old('body')}}"  />
                    </div>
                    <x-button class="ml-4 mt-4">
                    Add Comment
                </x-button>
                </form>
                </div>
                <div class="comments">
                @foreach ($post->imageComment as $comment)

                <div class="p-6 bg-white border-b border-gray-200">
                    <div>
                    {{$comment->body}}
                    </div>
                    <div>Comment By : <a class="text-blue-500" href="/profile/{{$comment->user->id}}">{{$comment->user->name}}</a> </div>
                </div>
                @endforeach
                </div>
            </div>
        </div>
    </div>

    @if (session('status'))
            <div id="snackbarsuccess" data-severity="success" data-status="{{session('status')}}" ></div>
        @endif



    <script src="../js/app.js"></script>
</x-app-layout>
