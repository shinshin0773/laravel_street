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
                    <section class="text-gray-600 body-font">
                        <x-flash-message status="session('status')" />
                        <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
                          <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6 mb-10 md:mb-0">
                            @if(empty($profile->file_path))
                                <img class="object-cover object-center rounded" alt="icon" src="{{ asset('images/non-icon.png')}}">
                            @else
                                <img class="object-cover object-center rounded" alt="icon" src="{{asset($profile->file_path)}}">
                            @endif
                          </div>
                          <div class="lg:flex-grow md:w-1/2 lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left items-center text-center">
                            <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">
                                {{$profile->name}}
                            </h1>
                            <p class="mb-8 leading-relaxed">情報：{{$profile->information}}</p>
                            @if($profile->sns_account)
                              <p class="mb-8 leading-relaxed" style="font-size:1.3rem"><img src="{{ asset('images/sns-icon.png')}}" class="mr-2" style="width: 1.5rem; display:inline;">{{ $profile->sns_account }}</p>
                            @endif
                            <div class="flex justify-center">
                              <button onclick="location.href='{{ route('artist.profile.edit',['profile' => $profile->id ])}}'" class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">編集</button>
                              <button class="ml-4 inline-flex text-gray-700 bg-gray-100 border-0 py-2 px-6 focus:outline-none hover:bg-gray-200 rounded text-lg">削除</button>
                            </div>
                          </div>
                        </div>
                      </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
