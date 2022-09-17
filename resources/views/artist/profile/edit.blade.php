<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Edit') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="post" action="{{ route('artist.profile.update', ['profile' => $profile->id ])}}" enctype="multipart/form-data">
                        @csrf
                        <div class="p-2 w-1/2 mx-auto">
                            <div class="relative">
                                <label for="name" class="leading-7 text-sm text-gray-600">Name ※必須</label>
                                <input type="text" id="name" name="name" value="{{ $profile->name }}" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                        </div>
                        <div class="p-2 w-1/2 mx-auto">
                            <div class="relative">
                                <label for="information" class="leading-7 text-sm text-gray-600">Information ※必須</label>
                                <textarea id="information" rows="10" name="information" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $profile->information }}</textarea>
                            </div>
                        </div>
                        <div class="p-2 w-1/2 mx-auto">
                            <div class="relative">
                                <label for="sns_account" class="leading-7 text-sm text-gray-600">SNS Account ※必須</label>
                                <input type="text" id="sns_account" name="sns_account" value="{{ $profile->sns_account }}" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                        </div>
                        <div class="p-2 w-1/2 mx-auto">
                            <label for="profileIcon" class="leading-7 text-sm text-gray-600">ProfileIcon ※必須</label>
                            @if(empty($profile->file_path))
                             <img src="{{ asset('images/non_image')}}">
                            @else
                             <img src="{{ asset($profile->file_path)}}" style="width: 13rem">
                            @endif
                            <input type="file" id="profileIcon" name="image" value="{{ asset($profile->file_path) }}">
                        </div>
                        <div>
                            {{-- @foreach($artist_profile as $profile)
                            <input type="hidden" id="userid" name="profile_id" value="{{ $profile->id }}">
                            @endforeach --}}
                        </div>
                        <div class="p-2 w-full flex justify-around mt-4">
                            <button type="button" onclick="location.href='{{ route('artist.profile.index')}}'" class="bg-gray-200 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 rounded text-lg">戻る</button>
                            <button type="submit" class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">更新する</button>
                        </div>
                    </form>
              </div>
            </div>
        </div>
    </div>
</x-app-layout>
