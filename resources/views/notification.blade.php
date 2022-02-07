<x-app-layout>

<x-slot name="header">
    <h2 class="mb-5"><a href="/">Go To Home</a></h2>
        <div class="profile d-flex justify-content-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Notification') }}
            </h2>
        </div>
    </x-slot>


    <div class="py-12">
        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                @if (count($users) < 1)
                <div>No Notifications</div>
                @endif
                @foreach ($users as $user)
                    <div class="friend_requests" style="display : flex;">
                        <div style="padding-top:7px" ><a href="/profile/{{$user->id}}">{{$user->name}} </a> has sent you a friend request.</div>
                        <form method="post" action="/accept_request" style="margin-left : 10px">
                            @csrf
                            @method('POST')
                            <input type="hidden" value={{$user->id}} name="user_id_1" />
                            <input type="hidden" value={{Auth::user()->id}} name="user_id_2" />
                            <input type="submit" name="accept_request"/ value="Accept" style="font-size : 18px;margin-left : 10px;border: 2px solid #4CAF50;padding : 5px 32px" />
                        </form>
                        <form method="post" action="/reject_request" style="margin-left : 15px">
                            @csrf
                            @method('POST')
                            <input type="hidden" value={{$user->id}} name="user_id_1" />
                            <input type="hidden" value={{Auth::user()->id}} name="user_id_2" />
                            <input type="submit" name="reject_request"/ value="Reject" style="font-size : 18px;margin-left : 10px;border: 2px solid #f44336;padding: 5px 32px;" />
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

</x-app-layout>