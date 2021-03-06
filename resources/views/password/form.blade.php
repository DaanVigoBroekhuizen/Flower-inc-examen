<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit password') }}
        </h2>
    </x-slot>

    <x-popup-feedback />

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('password-change', $user->id) }}" method="post">
                        @csrf
                        @method('PUT')

                        <label for="password">Password</label>
                        <input type="password" name="password" id="password">

                        <label for="passwordConfirm">Confirm password</label>
                        <input type="password" name="passwordConfirm" id="passwordConfirm">

                        <input type="submit" name="submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
