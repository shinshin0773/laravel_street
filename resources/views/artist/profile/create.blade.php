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

        <form method="POST" action="{{ route('artist.profile.store') }}" enctype="multipart/form-data">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- ユーザーの詳細情報 -->
            <div class="mt-4">
                <x-label for="information" :value="__('Information')" />

                <textarea id="info" class="block mt-1 w-full" type="text" name="info" :value="old('info')" required style="border-radius: 0.375rem" /></textarea>
            </div>

            <!-- SNSアカウント -->
            <div class="mt-4">
                <x-label for="sns_account" :value="__('SNSAccount')" />

                <x-input id="sns_account" class="block mt-1 w-full" type="text" name="sns_account" :value="old('sns_account')" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="thumbnail" :value="__('Thumbnail')" />

                <input type="file" name="image" required>
            </div>

            <div class="flex items-center justify-end mt-4">
                {{-- <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('artist.login') }}">
                    {{ __('Already registered?') }}
                </a> --}}

                <x-button class="ml-4">
                    {{ __('OK') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
