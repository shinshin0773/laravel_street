<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
           開催情報詳細
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-flash-message status="session('status')" />
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <section class="text-gray-600 body-font">
                        <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
                          <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6 mb-10 md:mb-0">
                            <img class="object-cover object-center rounded  md:w-[512]" alt="サムネイル" src="{{ asset($post->file_path) }}">
                          </div>
                          <div class="lg:flex-grow md:w-1/2 lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left items-center text-center">
                            <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">
                                {{ $post->information }}
                            </h1>
                            <p class="mt-8 text-gray-900 lg:text-lg">アーティスト名：{{ $post->name }}</p>
                            <p class="text-gray-900 lg:text-lg">開催地：{{ $post->place }}</p>
                            <p class="text-gray-900 lg:text-lg">開催日時:{{ $post->holding_time->format('Y年m月d日 H時i分') }}</p>
                            <p class="text-gray-900 lg:text-lg mb-8">終了予定時間：{{ $post->finish_time->format('Y年m月d日 H時i分') }}</p>
                            <p class="text-gray-900 lg:text-lg mb-8">いいね数 {{ $post->like }}</p>
                            <div>
                              @if (Auth::id())
                                @if($followCheck === false)
                                <form action="{{ route('user.items.follow',$post->artist_profile_id)}}" method="POST"  style="margin-bottom: 10px;">
                                    @csrf
                                    <input type="submit" value="Follow" class="inline-flex text-white bg-red-600 border-0 py-2 px-6 focus:outline-none hover:bg-red-300 rounded-lg text-sm">
                                </form>
                                @else
                                <form action="{{ route('user.items.unfollow',$post->artist_profile_id)}}" method="POST"  style="margin-bottom: 10px;">
                                    @csrf
                                    <input type="submit" value="unFollow" class="inline-flex bg-white text-red-600 border-2 border-red-600 py-2 px-5 focus:outline-none hover:bg-red-300 rounded-lg text-sm" style="width:100px;">
                                </form>
                                @endif
                              @else
                                <button onclick="alertLogin()" class="block text-white bg-red-600 border-0 py-2 px-6 focus:outline-none hover:bg-red-300 rounded-lg text-sm" style="margin-bottom: 13px;width:100px;"">Follow</button>
                              @endif

                              @if (Auth::id())
                                @if($likeCheck === false)
                                <form action="{{ route('user.items.like',$post->id)}}" method="POST" style="margin-bottom: 10px;">
                                    @csrf
                                    <input type="submit" value="Like" class="inline-flex text-white bg-red-600 border-0 py-2 px-6 focus:outline-none hover:bg-red-300 rounded-lg text-sm">
                                </form>
                                @else
                                <form action="{{ route('user.items.unlike',$post->id)}}" method="POST" style="margin-bottom: 10px;">
                                    @csrf
                                    <input type="submit" value="unLike" class="inline-flex text-red-600 bg-white border-2 border-red-600 py-2 px-6 focus:outline-none hover:bg-red-300 rounded-lg text-sm">
                                </form>
                                @endif
                                @else
                                <button onclick="alertLogin()" class="block text-white bg-red-600 border-0 py-2 px-6 focus:outline-none hover:bg-red-300 rounded-lg text-sm" style="margin-bottom: 13px;width:100px;">Like</button>
                              @endif

                              <button type="button" onclick="location.href='{{ route('user.items.showMap', $post->id, $post->artist_profile_id )}}'" class=" text-white bg-indigo-500 border-0 focus:outline-none hover:bg-indigo-600 rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center" style="margin-bottom: 13px;margin-right: 20px;">詳細Map</button>

                              {{-- <button onclick="location.href='{{ route('user.items.showMap', $post->id )}}'" class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">詳細Map</button> --}}

                              {{-- <button style="margin-bottom: 10px;" class="inline-flex text-gray-700 bg-red-100 border-0 py-2 px-6 focus:outline-none hover:bg-gray-200 rounded text-lg"><a data-url="https://xs808261.xsrv.jp/public/" href="https://twitter.com/share" class="twitter-share-button" data-lang="ja" data-count="vertical" data-dnt="true" target="_blank">ツイート</a></button> --}}
                              <a data-url="https://xs808261.xsrv.jp/public/" href="https://twitter.com/share" class="block twitter-share-button" data-lang="ja" data-count="vertical" data-dnt="true" target="_blank">
                                <button style="background-color:#1da1f2;color:white;" type="button" class="hover:bg-[#1da1f2]/90 focus:ring-4 focus:outline-none focus:ring-[#1da1f2]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-[#1da1f2]/55 mr-2 mb-2">
                                    <svg class="mr-2 -ml-1 w-4 h-4" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="twitter" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M459.4 151.7c.325 4.548 .325 9.097 .325 13.65 0 138.7-105.6 298.6-298.6 298.6-59.45 0-114.7-17.22-161.1-47.11 8.447 .974 16.57 1.299 25.34 1.299 49.06 0 94.21-16.57 130.3-44.83-46.13-.975-84.79-31.19-98.11-72.77 6.498 .974 12.99 1.624 19.82 1.624 9.421 0 18.84-1.3 27.61-3.573-48.08-9.747-84.14-51.98-84.14-102.1v-1.299c13.97 7.797 30.21 12.67 47.43 13.32-28.26-18.84-46.78-51.01-46.78-87.39 0-19.49 5.197-37.36 14.29-52.95 51.65 63.67 129.3 105.3 216.4 109.8-1.624-7.797-2.599-15.92-2.599-24.04 0-57.83 46.78-104.9 104.9-104.9 30.21 0 57.5 12.67 76.67 33.14 23.72-4.548 46.46-13.32 66.6-25.34-7.798 24.37-24.37 44.83-46.13 57.83 21.12-2.273 41.58-8.122 60.43-16.24-14.29 20.79-32.16 39.31-52.63 54.25z"></path></svg>
                                    Tweet
                                </button>
                              </a>

                              @if (Auth::id())
                              <div class="tooltip2 w-16 h-16 rounded-full bg-blue-300 text-white font-bold" style="text-align:center;line-height: 63px;">
                                <p>投げ銭</p>
                                <div class="description2 w-full">
                                    <div class="w-1/2 flex mt-1.5">
                                        <img src="{{ asset('images/icons8-gold.png')}}" alt="gold" style="width: 20px; height:20px">
                                        <p class="mt-1 " class="inline" style="margin-right: 7px;">50Gold</p>
                                        <form action="{{ route('user.items.present')}}" method="POST" style="margin-bottom: 10px;">
                                            @csrf
                                            <input type="hidden" name="gold" value="50">
                                            <input type="hidden" name="artist_id" value="{{ $post->artistprofile->artist->id }}">
                                            <input type="submit" value="present" class="bg-blue-500 hover:bg-blue-700 text-white font-bold ml-3 px-4 rounded-full">
                                        </form>
                                    </div>
                                    <div class="w-1/2 flex mt-1.5">
                                        <img src="{{ asset('images/icons8-gold.png')}}" alt="gold" style="width: 20px; height:20px">
                                        <p class="mt-1 " class="inline">100Gold</p>
                                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold ml-3 px-4 rounded-full">
                                            present
                                        </button>
                                    </div>
                                    <div class="w-1/2 flex mt-1.5">
                                        <img src="{{ asset('images/icons8-gold.png')}}" alt="gold" style="width: 20px; height:20px">
                                        <p class="mt-1 " class="inline">200Gold</p>
                                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold ml-3 px-4 rounded-full">
                                            present
                                        </button>
                                    </div>
                                    <div class="w-1/2 flex mt-1.5">
                                        <img src="{{ asset('images/icons8-gold.png')}}" alt="gold" style="width: 20px; height:20px">
                                        <p class="mt-1 " class="inline">300Gold</p>
                                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold ml-3 px-4 rounded-full">
                                            present
                                        </button>
                                    </div>
                                    <div class="w-1/2 flex mt-1.5">
                                        <img src="{{ asset('images/icons8-gold.png')}}" alt="gold" style="width: 20px; height:20px">
                                        <p class="mt-1 " class="inline">400Gold</p>
                                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold ml-3 px-4 rounded-full">
                                            present
                                        </button>
                                    </div>
                                    <div class="w-1/2 flex mt-1.5">
                                        <img src="{{ asset('images/icons8-gold.png')}}" alt="gold" style="width: 20px; height:20px">
                                        <p class="mt-1 " class="inline">500Gold</p>
                                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold ml-3 px-4 rounded-full">
                                            present
                                        </button>
                                    </div>
                                    <div class="w-1/2 flex mt-1.5">
                                        <img src="{{ asset('images/icons8-gold.png')}}" alt="gold" style="width: 20px; height:20px">
                                        <p class="mt-1 " class="inline">700Gold</p>
                                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold ml-3 px-4 rounded-full">
                                            present
                                        </button>
                                    </div>
                                    <div class="w-1/2 flex mt-1.5">
                                        <img src="{{ asset('images/icons8-gold.png')}}" alt="gold" style="width: 20px; height:20px">
                                        <p class="mt-1 " class="inline">1000Gold</p>
                                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold ml-3 px-4 rounded-full">
                                            present
                                        </button>
                                    </div>
                                </div>
                                @endif
                            </div>
                            </div>
                          </div>
                        </div>

                        <div class="flex flex-col sm:flex-row mt-10">
                            <div class="sm:w-1/3 text-center sm:pr-8 sm:py-8">
                              <div class="w-20 h-20 rounded-full inline-flex items-center justify-center bg-gray-200 text-gray-400">
                                {{-- <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10" viewBox="0 0 24 24">
                                  <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                                  <circle cx="12" cy="7" r="4"></circle>
                                </svg> --}}
                                @if ($post->artistprofile->file_path)
                                    <img src="{{ asset($post->artistprofile->file_path) }}" alt="アイコン画像" srcset="" style="border-radius: 50%; height:100%; width: 100%;">
                                @else
                                    <img src="{{ asset('images/non-icon.png')}}" alt="アイコンなし" style="border-radius: 50%; height:100%; width: 100%;">
                                @endif
                              </div>
                              <div class="flex flex-col items-center text-center justify-center">
                                <div class="flex">
                                    <h2 class="font-medium title-font mt-4 text-gray-900 text-lg">{{$post->artistprofile->name}}</h2>
                                    @if($post->artistprofile->artist->recognized)
                                        <div class="flex" style="margin-top: 20px; margin-left: 10px;">
                                            <button data-tooltip-target="tooltip-default" type="button"><img src="{{ asset('images/icons-recognize.png')}}" class="w-5 h-5 mt-0.4"></button>
                                            <div id="tooltip-default" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-blue-500 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark:bg-gray-700">
                                              このアカウントは認定されています
                                              <div class="tooltip-arrow" data-popper-arrow></div>
                                            </div>
                                            <span>公認</span>
                                        </div>
                                    @endif
                                </div>
                                <div class="w-12 h-1 bg-indigo-500 rounded mt-2 mb-4"></div>
                                <p class="text-base">{{$post->artistprofile->information}}</p>
                              </div>
                            </div>
                            <div class="sm:w-2/3 sm:pl-8 sm:py-8 sm:border-l border-gray-200 sm:border-t-0 border-t mt-4 pt-4 sm:mt-0 text-center sm:text-left">
                              <p class="eading-relaxed text-lg mb-4"><span class="mr-2" style="font-weight: bold;">SNSアカウント</span> {{$post->artistprofile->sns_account}}</p>
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
<script>
function alertLogin(){
    alert('ログインしていないのでログインします');
    location.href = 'https://street-sing.com/login';
}
</script>
