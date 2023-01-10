<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <div style="width: 417px;margin-left: 135px;">
                <a>
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </div>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <p>ユーザー用</p>
        <form method="POST" action="{{ route('user.register') }}" enctype="multipart/form-data">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- UserId -->
            <div class="mt-4">
                <x-label for="userId" :value="__('UserId こちらは認証で使用します')" />

                <x-input id="userId" class="block mt-1 w-full" type="text" name="userId" :value="old('userId')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-white md:text-gray-600 hover:text-gray-900" href="{{ route('user.login') }}">
                    {{ __('もう登録していますか?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
