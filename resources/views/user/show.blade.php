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

                        <div class="flex flex-col sm:flex-row mt-10">
                            <div class="sm:w-1/3 text-center sm:pr-8 sm:py-8">
                              <div class="w-20 h-20 rounded-full inline-flex items-center justify-center bg-gray-200 text-gray-400">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10" viewBox="0 0 24 24">
                                  <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                                  <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                                <img src="{{ asset($post->artistprofile->file_path) }}" alt="アイコン画像" srcset="" style="border-radius: 50%; height:100%">
                              </div>
                              <div class="flex flex-col items-center text-center justify-center">
                                <h2 class="font-medium title-font mt-4 text-gray-900 text-lg">{{$post->artistprofile->name}}</h2>
                                <div class="w-12 h-1 bg-indigo-500 rounded mt-2 mb-4"></div>
                                <p class="text-base">{{$post->artistprofile->information}}</p>
                              </div>
                            </div>
                            <div class="sm:w-2/3 sm:pl-8 sm:py-8 sm:border-l border-gray-200 sm:border-t-0 border-t mt-4 pt-4 sm:mt-0 text-center sm:text-left">
                              <p class="leading-relaxed text-lg mb-4">＼全国各地！学園祭呼んで下さい📩／Vocal Group “マカロン” ことマイクアローン／太陽☀️
                                @sasayamataiyo
                                剛輝💎
                                @gokinokoe
                                 翔真🍬
                                @syomagoodnight
                                 利治🍵
                                @toshiharu_1125
                                ／ファンネーム=メレンゲ🥚【DM:運営管理】</p>
                              <a class="text-indigo-500 inline-flex items-center">Learn More
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                                  <path d="M5 12h14M12 5l7 7-7 7"></path>
                                </svg>
                              </a>
                            </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
