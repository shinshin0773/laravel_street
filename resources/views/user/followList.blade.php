<x-app-layout>
    <x-slot name="header">
        <div class="md:flex justify-between items-center">
            <h2 class="font-semibold text-xl text-white leading-tight mb-3">
                タイムライン
            </h2>
        </div>
    </x-slot>

    <div class="flex">
    {{-- フォロー中のアーティストのタイムライン --}}
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="md:bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="lg:flex lg:flex-wrap">
                    @if($posts === null)
                      <div class="mx-auto">
                        <h1 class="text-xl font-bold">現在フォロー中のアーティストがいません</h1>
                      </div>
                    @else
                        @foreach($posts as $post)
                        {{-- @for($ii = 0;$ii < count($post); $ii++) --}}
                            <div class="lg:w-1/4 lg:p-4 my-3">
                                <a href="{{ route('user.items.show',['item' => $post['id'],'artist_id' => $post['artist_profile_id']])}}">
                                    <div class="bg-white border-solid border-2 border-sky-500 rounded-md p-2 md:p-4">
                                        <img src="{{ asset($post['file_path'])}}" alt="サムネイル" class="post-image">
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
        <div class="hidden lg:flex" style="height: 1248px">
            <!-- Sidebar starts -->
            <!-- Remove class [ hidden ] and replace [ sm:flex ] with [ flex ] -->
            <div style="min-height: 716px" class="w-64 absolute sm:relative bg-gray-800 shadow md:h-full flex-col justify-between hidden sm:flex">
                <div class="px-8">
                    <p class="text-white font-bold mt-6">フォロー中のアーティスト</p>
                    <ul class="mt-12">
                        @if($followArtistProfiles === null)
                            <div class="mx-auto">
                            </div>
                        @else
                            @foreach($followArtistProfiles as $profile)
                            <li class="flex w-full text-gray-300 cursor-pointer items-center mb-6">
                                <div class="flex">
                                    <a href="{{ route('user.items.artist_profile',$profile['artist_id'])}}"><img src="{{ asset($profile['file_path'] ) }}" alt="アイコン画像" srcset="" style="border-radius: 50%;width: 30px;height: 30px;margin-right:40px;"></a>
                                    <a href="{{ route('user.items.artist_profile',$profile['artist_id'])}}"><h1 class="text-sm" style="margin-top: 5px;margin-right: 25px;">{{ $profile['name']}}</h1></a>
                                </div>
                                <form style="margin-top:1.5px;" action="{{ route('user.items.unfollow',$profile['artist_id'] )}}" method="POST"  style="margin-bottom: 10px;">
                                    @csrf
                                    <input type="submit" value="unfllow" class="py-1 px-3 mr-5 bg-gray-600 rounded text-gray-300 flex items-center justify-center text-xs">
                                </form>
                                </a>
                            </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
            <div class="w-64 z-40 absolute bg-gray-800 shadow md:h-full flex-col justify-between sm:hidden transition duration-150 ease-in-out" id="mobile-nav">
                    <ul class="mt-12">
                        @if($followArtistProfiles === null)
                            <div class="mx-auto">
                            </div>
                        @else
                            @foreach($followArtistProfiles as $profile)
                            <li class="flex w-full text-gray-300 cursor-pointer items-center mb-6">
                                <div class="flex">
                                    <a href="{{ route('user.items.artist_profile',$profile['artist_id'])}}"><img src="{{ asset($profile['file_path'] ) }}" alt="アイコン画像" srcset="" style="border-radius: 50%;width: 30px;height: 30px;margin-right:40px;"></a>
                                    <a href="{{ route('user.items.artist_profile',$profile['artist_id'])}}"><h1 class="text-sm" style="margin-top: 5px;margin-right: 25px;">{{ $profile['name']}}</h1></a>
                                </div>
                                <form style="margin-top:1.5px;" action="{{ route('user.items.unfollow',$post->artist_profile_id)}}" method="POST"  style="margin-bottom: 10px;">
                                    @csrf
                                    <input type="submit" value="unfllow" class="py-1 px-3 mr-5 bg-gray-600 rounded text-gray-300 flex items-center justify-center text-xs">
                                </form>
                            </li>
                            @endforeach
                        @endif
                    </ul>
            </div>
        </div>
    </div>
</x-app-layout>
