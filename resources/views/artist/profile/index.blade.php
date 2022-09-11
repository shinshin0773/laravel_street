<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                        {{-- <x-flash-message status="session('status')" /> --}}
                        <div>{{ Auth::user()->name }}</div>
                        <div class="flex flex-wrap">
                        {{-- @foreach($posts as $post) --}}
                        <div class="w-1/4 md:p-4">
                            {{-- <a href="{{ route('artist.posts.edit',['post' => $post->id])}}"> --}}
                            <div class="border rounded-md p-2 md:p-4">
                                {{-- <x-thumbnail filename="{{ $post->imageFirst->filename ?? '' }}" type="products" /> --}}
                                {{-- <div class="text-gray-700">{{ $post->name }}</div> --}}
                           </div>
                        </a>
                        </div>
                    {{-- @endforeach --}}
                </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
