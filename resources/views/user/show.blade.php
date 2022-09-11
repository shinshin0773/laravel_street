<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
           詳細
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <section class="text-gray-600 body-font">
                        <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
                          <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6 mb-10 md:mb-0">
                            <img class="object-cover object-center rounded" alt="サムネイル" src="{{ asset($post->file_path) }}">
                          </div>
                          <div class="lg:flex-grow md:w-1/2 lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left items-center text-center">
                            <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">
                                {{ $post->information }}
                            </h1>
                            <p class="mt-8 text-gray-900 lg:text-lg">アーティスト名：{{ $post->name }}</p>
                            <p class="text-gray-900 lg:text-lg">開催地：{{ $post->place }}</p>
                            <p class="text-gray-900 lg:text-lg">開催日時:{{ $post->holding_time }}</p>
                            <p class="text-gray-900 lg:text-lg mb-8">終了予定時間：{{ $post->finish_time }}</p>
                            <div class="flex justify-center">
                              <button class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">行きたい</button>
                              <button class="ml-4 inline-flex text-gray-700 bg-red-100 border-0 py-2 px-6 focus:outline-none hover:bg-gray-200 rounded text-lg">いいね</button>
                            </div>
                          </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
