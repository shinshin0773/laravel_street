<x-profile :name='$artist_profile->name' :snsAccount='$artist_profile->sns_account' :information='$artist_profile->information'>
    <x-slot name="image">
        @if($artist_profile->file_path === null)
            <img alt="..." src="{{ asset('images/non-icon.png') }}" class="shadow-xl rounded-full h-auto align-middle border-none absolute -m-16 -ml-20 lg:-ml-16 max-w-150-px" style="width: 150px;height:150px; border-radius:50%;">
        @else
            <img alt="..." src="{{ asset($artist_profile->file_path) }}" class="shadow-xl rounded-full h-auto align-middle border-none absolute -m-16 -ml-20 lg:-ml-16 max-w-150-px" style="width: 150px;height:150px; border-radius:50%;">
        @endif
    </x-slot>
    <x-slot name="button">
        @if (Auth::id())
            @if($followCheck === false)
            <form action="{{ route('user.items.follow',$artist_profile->id )}}" method="POST"  style="margin-bottom: 10px;">
                @csrf
                <input type="submit" value="フォロー" class="inline-flex text-white bg-red-600 border-0 py-2 px-6 focus:outline-none hover:bg-red-300 rounded-lg text-sm">
            </form>
            @else
            <form action="{{ route('user.items.unfollow',$artist_profile->id )}}" method="POST"  style="margin-bottom: 10px;">
                @csrf
                <input type="submit" value="フォロー解除" class="inline-flex bg-white text-red-600 border-2 border-red-600 py-2 px-5 focus:outline-none hover:bg-red-300 rounded-lg text-sm">
            </form>
            @endif
        @else
            <button onclick="alertLogin()" class="block text-white bg-red-600 border-0 py-2 px-6 focus:outline-none hover:bg-red-300 rounded-lg text-sm" style="margin-bottom: 13px;width:120px;">フォロー</button>
        @endif
    </x-slot>
    <x-slot name="count">
        @if(count($follower_list[0]) === 0)
            <div class="mr-4 p-3 text-center">
                <span class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">0</span><span class="text-sm text-blueGray-400">フォロワー</span>
            </div>
        @else
            <div class="mr-4 p-3 text-center">
                <span class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">{{ count($follower_list) }}</span><span class="text-sm text-blueGray-400">フォロワー</span>
            </div>
        @endif
    </x-slot>
    <x-slot name="list">
        <div class="flow-root">
            <h1 class="mb-3 title-font font-bold text-lg">フォロワーリスト</h1>
            <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                @if(count($follower_list[0]) === 0)
                    <span>まだフォロワーはいません</span>
                @else
                @foreach($follower_list as $profile)
                    <li class="py-3 sm:py-4">
                        <div class="flex items-center space-x-4">
                            <div class="flex-shrink-0">
                                {{-- <img class="w-8 h-8 rounded-full" src="{{ asset($profile[$i][0]->file_path) }}" alt="アイコン"> --}}
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                    {{ $profile[0]->name }}
                                </p>
                                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                    {{ $profile[0]->sns_account }}
                                </p>
                            </div>
                            {{-- <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                <form action="{{ route('user.items.unfollow',$profile[$i]->id )}}" method="POST"  style="margin-bottom: 10px;">
                                    @csrf
                                    <input type="submit" value="フォロー解除" class="bg-pink-500 active:bg-pink-600 uppercase text-white font-bold hover:shadow-md shadow text-xs px-4 py-2 rounded outline-none focus:outline-none sm:mr-2 mb-1 ease-linear transition-all duration-150">
                                </form>
                            </div> --}}
                        </div>
                    </li>
                @endforeach
                @endif
            </ul>
       </div>
    </x-slot>
    <x-slot name="contents">
        @if($artist_profile->movie_file_path)
            <div>
                <h1 class="title-font font-bold text-xl text-black leading-tight mb-3">おすすめ動画</h1>
                <video controls src="{{ $artist_profile->movie_file_path }}"></video>
            </div>
        @endif
    </x-slot>
</x-profile>
