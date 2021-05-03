<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
            <div>{{$user->name}}</div>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="/edit">
            @csrf
            @method('PATCH')

            <div>
                <x-label for="bio" :value="__('Bio')" />

                <x-input id="bio" class="block mt-1 w-full" type="text" value="{{old('bio') ?? $user->profile->bio}}"  name="bio" required autofocus />
            </div>

            <div class="mt-4">
                <x-label for="education" :value="__('Education')" />

                <x-input id="education" class="block mt-1 w-full" type="text" name="education" value="{{old('education') ?? $user->profile->education}}"  />
            </div>


            <div class="mt-4">
                <x-label for="current_address" :value="__('Current Address')" />

                <x-input id="current_address" class="block mt-1 w-full" type="text" name="current_address" value="{{old('current_address') ?? $user->profile->current_address}}"  />
            </div>

            <div class="mt-4">
                <x-label for="from_address" :value="__('From')" />

                <x-input id="from_address" class="block mt-1 w-full" type="text" name="from_address" value="{{old('from_address') ?? $user->profile->from_address}}"  />
            </div>

            <div class="mt-4">
                <x-label for="workplace" :value="__('Workplace')" />

                <x-input id="workplace" class="block mt-1 w-full" type="text" name="workplace" value="{{old('workplace') ?? $user->profile->workplace}}"  />
            </div>

            <select name="relationship" class="form-select mt-4" aria-label="Default select example">
                <option value="Single">Single</option>
                <option value="Married">Married</option>
            </select>

            <div class="mt-4">
                <x-label for="hobbies" :value="__('Hobbies')" />

                <x-input id="hobbies" class="block mt-1 w-full" type="text" name="hobbies" value="{{old('hobbies') ?? $user->profile->hobbies}}" />
            </div>

         

            <div class="flex items-center justify-center mt-4">

                <x-button class="ml-4">
                    Submit
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
