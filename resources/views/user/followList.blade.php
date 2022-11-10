<x-app-layout>
    <x-slot name="header">
        <div class="md:flex justify-between items-center">
            <h2 class="font-semibold text-xl text-white leading-tight mb-3">
                タイムライン
            </h2>
            {{-- <div>
                <form method="get" action="{{ route('user.items.index')}}">
                    <div class="md:flex">
                        <div class="md:flex">
                            <div>
                                <span class="text-sm text-white">表示順</span><br>
                                <select name="sort" class="mr-4" id="sort">
                                    <option value="{{ \Constant::SORT_ORDER['later']}}"
                                        @if(\Request::get('sort') == \Constant::SORT_ORDER['later'] )
                                        selected
                                        @endif>
                                        新しい順
                                    </option>
                                    <option value="{{ \Constant::SORT_ORDER['older']}}"
                                        @if(\Request::get('sort') == \Constant::SORT_ORDER['older'] )
                                        selected
                                        @endif>
                                        古い順
                                    </option>
                                    <option value="{{ \Constant::SORT_ORDER['recommend']}}"
                                        @if(\Request::get('sort') == \Constant::SORT_ORDER['recommend'] )
                                        selected
                                        @endif>
                                        おすすめ順
                                    </option>
                                    <option value="{{ \Constant::SORT_ORDER['near']}}"
                                        @if(\Request::get('sort') == \Constant::SORT_ORDER['near'] )
                                        selected
                                        @endif>
                                        開催近い順
                                    </option>
                                </select>
                            </div>
                            <div class="mr-4">
                                <span class="text-sm text-white">開催日</span><br>
                                <input type="date" name="holdingDate" value="" id="dateSelect">
                            </div>
                        </div>
                        <div class="flex space-x-2 items-center" style="margin-top: 17px;">
                            <div><input name="keyword" class="border border-gray-500 py-2" placeholder="キーワードを入力" type="text"></div>
                            <div style="margin-bottom: 8px;"><button class="mt-2 ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">検索する</button></div>
                        </div>

                    </div>
                </form>
            </div> --}}
        </div>
    </x-slot>

    <div class="flex">
    {{-- フォロー中のアーティストのタイムライン --}}
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="md:flex md:flex-wrap">
                    @if($posts === null)
                      <div class="mx-auto">
                        <h1 class="text-xl font-bold">現在フォロー中のアーティストがいません</h1>
                      </div>
                    @else
                        @foreach($posts as $post)
                        {{-- @for($ii = 0;$ii < count($post); $ii++) --}}
                            <div class="md:w-1/4 md:p-4 mt-3">
                                <a href="{{ route('user.items.show',['item' => $post['id'],'artist_id' => $post['artist_profile_id']])}}">
                                    <div class="border-solid border-2 border-sky-500 rounded-md p-2 md:p-4">
                                        <img src="{{ $post['file_path']}}" alt="サムネイル" class="post-image">
                                        <div class="mt-3">
                                            <div class="text-gray-700">名前：{{ $post['name'] }}</div>
                                            <div class="text-gray-700 post-content">内容：{{ $post['information']}}</div>
                                            <div class="text-gray-700">場所：{{ $post['place'] }}</div>
                                            <div class="text-gray-700">開催時刻：<br>{{ $post['holding_time']}}</div>
                                            <div class="text-gray-700">終了刻：<br>{{ $post['finish_time'] }}</div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                    {{-- @endfor --}}
                          @endforeach
                          {{ $posts->links() }}
                       @endif
                        </div>

            </div>
        </div>
    </div>

    {{-- フォローリストを表示するサイドバー --}}
        <div class="flex" style="height: 1248px">
            <!-- Sidebar starts -->
            <!-- Remove class [ hidden ] and replace [ sm:flex ] with [ flex ] -->
            <div style="min-height: 716px" class="w-64 absolute sm:relative bg-gray-800 shadow md:h-full flex-col justify-between hidden sm:flex">
                <div class="px-8">
                    <ul class="mt-12">
                        @if($followArtistProfiles === null)
                            <div class="mx-auto">
                            </div>
                        @else
                            @foreach($followArtistProfiles as $profile)
                            <li class="flex w-full text-gray-300 cursor-pointer items-center mb-6">
                                <form style="margin-top:1.5px;margin-right: 25px;" action="{{ route('user.items.unfollow',$profile['artist_id'] )}}" method="POST"  style="margin-bottom: 10px;">
                                    @csrf
                                    <input type="submit" value="unfllow" class="py-1 px-3 mr-5 bg-gray-600 rounded text-gray-300 flex items-center justify-center text-xs">
                                </form>
                                {{-- <a href="javascript:void(0)" class="flex items-center focus:outline-none focus:ring-2 focus:ring-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-grid" width="18" height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z"></path>
                                        <rect x="4" y="4" width="6" height="6" rx="1"></rect>
                                        <rect x="14" y="4" width="6" height="6" rx="1"></rect>
                                        <rect x="4" y="14" width="6" height="6" rx="1"></rect>
                                        <rect x="14" y="14" width="6" height="6" rx="1"></rect>
                                    </svg>
                                </a> --}}
                                <div class="flex">
                                    <a href="{{ route('user.items.artist_profile',$profile['artist_id'])}}"><img src="{{ asset($profile['file_path'] ) }}" alt="アイコン画像" srcset="" style="border-radius: 50%;width: 30px;height: 30px; margin-right: 10px;"></a>
                                    <a href="{{ route('user.items.artist_profile',$profile['artist_id'])}}"><h1 class="text-sm" style="margin-top: 5px;">{{ $profile['name']}}</h1></a>
                                </div>
                            </li>
                            @endforeach
                        @endif
                    </ul>
                    {{-- <div class="flex justify-center mt-48 mb-4 w-full">
                        <div class="relative">
                            <div class="text-gray-300 absolute ml-4 inset-0 m-auto w-4 h-4">
                                <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/light_with_icons_at_bottom-svg2.svg" alt="Search">
                            </div>
                            <input class="bg-gray-700 focus:outline-none focus:ring-1 focus:ring-gray-100 rounded w-full text-sm text-gray-300 placeholder-gray-400 bg-gray-100 pl-10 py-2" type="text" placeholder="Search" />
                        </div>
                    </div> --}}
                </div>
                {{-- <div class="px-8 border-t border-gray-700">
                    <ul class="w-full flex items-center justify-between bg-gray-800">
                        <li class="cursor-pointer text-white pt-5 pb-3">
                            <button aria-label="show notifications" class="focus:outline-none focus:ring-2 rounded focus:ring-gray-300">
                                <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/light_with_icons_at_bottom-svg3.svg" alt="notifications">
                            </button>
                        </li>
                        <li class="cursor-pointer text-white pt-5 pb-3">
                            <button aria-label="open chats" class="focus:outline-none focus:ring-2 rounded focus:ring-gray-300">
                                <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/light_with_icons_at_bottom-svg4.svg" alt="chat">
                            </button>
                        </li>
                        <li class="cursor-pointer text-white pt-5 pb-3">
                            <button aria-label="open settings" class="focus:outline-none focus:ring-2 rounded focus:ring-gray-300">
                                <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/light_with_icons_at_bottom-svg5.svg" alt="settings">
                            </button>
                        </li>
                        <li class="cursor-pointer text-white pt-5 pb-3">
                            <button aria-label="open logs" class="focus:outline-none focus:ring-2 rounded focus:ring-gray-300">
                                <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/light_with_icons_at_bottom-svg6.svg" alt="drawer">
                            </button>
                        </li>
                    </ul>
                </div> --}}
            </div>
            <div class="w-64 z-40 absolute bg-gray-800 shadow md:h-full flex-col justify-between sm:hidden transition duration-150 ease-in-out" id="mobile-nav">
                    <ul class="mt-12">
                        @if($followArtistProfiles === null)
                            <div class="mx-auto">
                            </div>
                        @else
                            @foreach($followArtistProfiles as $profile)
                            <li class="flex w-full text-gray-300 cursor-pointer items-center mb-6">
                                <form style="margin-top:1.5px;" action="{{ route('user.items.unfollow',$post->artist_profile_id)}}" method="POST"  style="margin-bottom: 10px;">
                                    @csrf
                                    <input type="submit" value="unfllow" class="py-1 px-3 mr-5 bg-gray-600 rounded text-gray-300 flex items-center justify-center text-xs">
                                </form>
                                <a href="javascript:void(0)" class="flex items-center focus:outline-none focus:ring-2 focus:ring-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-grid" width="18" height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z"></path>
                                        <rect x="4" y="4" width="6" height="6" rx="1"></rect>
                                        <rect x="14" y="4" width="6" height="6" rx="1"></rect>
                                        <rect x="4" y="14" width="6" height="6" rx="1"></rect>
                                        <rect x="14" y="14" width="6" height="6" rx="1"></rect>
                                    </svg>
                                </a>
                                <h1 class="text-sm">{{ $profile['name']}}</h1>
                            </li>
                            @endforeach
                        @endif
                    </ul>
            </div>
        </div>
    </div>
</x-app-layout>
