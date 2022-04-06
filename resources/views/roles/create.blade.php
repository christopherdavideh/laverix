<x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('roles.create') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="names" :value="__('Name')" />

                <x-input id="names" class="block mt-1 w-full" type="text" name="names" :value="old('names')" required autofocus />
            </div>

            <div>
                <x-label for="lastnames" :value="__('Last Name')" />

                <x-input id="lastnames" class="block mt-1 w-full" type="text" name="lastnames" :value="old('lastnames')" required autofocus />
            </div>

            

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>