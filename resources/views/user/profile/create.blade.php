<x-guest-layout>
    <x-auth-validation-errors class="mb-4" :errors="$errors" />
    <x-auth-card>
        <x-slot name="logo">
            <div style="width: 417px;margin-left: 135px;">
                <a>
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </div>
        </x-slot>

        <x-flash-message status="session('status')" />
        <!-- Validation Errors -->

        <p>プロフィール情報</p>
        <form method="POST" action="{{ route('user.profile.store') }}" enctype="multipart/form-data">
            @csrf
            <!-- SNSAccount -->
            <div class="mt-4">
                <x-label for="twitter_account" :value="__('TwitterAccount')" />

                <x-input id="twitter_account" class="block mt-1 w-full"
                                placeholder="@Street0000"
                                type="text"
                                name="twitter_account"/>
            </div>

            <!-- Information -->
            <div class="mt-4">
                <x-label for="information" :value="__('Information')" />

                <textarea id="info" placeholder="〇〇駅でよくライブを見ています！！" class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" name="information"/></textarea>
            </div>

            <!-- Profile Image -->
            <div class="mt-4">
                <x-label for="thumbnail" :value="__('ProfileImage')" />

                <input type="file" name="image" required>
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-4">
                    {{ __('登録する') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
