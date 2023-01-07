<x-profile :name='$artist_profile->name' :snsAccount='$artist_profile->sns_account' :information='$artist_profile->information'>
    <x-slot name="image">
        <img alt="..." src="{{ asset($artist_profile->file_path) }}" class="shadow-xl rounded-full h-auto align-middle border-none absolute -m-16 -ml-20 lg:-ml-16 max-w-150-px" style="width: 150px;height:150px; border-radius:50%;">
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
        <div class="mr-4 p-3 text-center">
            <span class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">{{ count($follower) }}</span><span class="text-sm text-blueGray-400">フォロワー</span>
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
