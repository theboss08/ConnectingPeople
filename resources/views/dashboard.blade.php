<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
        <a class="font-semibold text-xl  leading-tight" href="/edit">Edit Profile</a>
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
                <div>Relationship Status {{$user->profile->relationship}} </div>
                @endif
                @if ($user->profile->hobbies)
                    <div> Likes to {{$user->profile->hobbies}} </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
