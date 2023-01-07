<x-profile :name='$profile->name' :snsAccount='$profile->sns_account' :information='$profile->information'>
    <x-slot name="image">
        <img alt="..." src="{{ asset($profile->file_path) }}" class="shadow-xl rounded-full h-auto align-middle border-none absolute -m-16 -ml-20 lg:-ml-16 max-w-150-px" style="width: 150px;height:150px; border-radius:50%;">
    </x-slot>
    <x-slot name="button">
        <button onclick="location.href='{{ route('user.profile.edit') }}'" class="bg-pink-500 active:bg-pink-600 uppercase text-white font-bold hover:shadow-md shadow text-xs px-4 py-2 rounded outline-none focus:outline-none sm:mr-2 mb-1 ease-linear transition-all duration-150" type="button">
            編集
        </button>
    </x-slot>
    <x-slot name="count">
        <div class="mr-4 p-3 text-center">
            <span class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">{{ count($followArtistProfiles) }}</span><span class="text-sm text-blueGray-400">フォロー中</span>
        </div>
        <div class="mr-4 p-3 text-center">
            <span class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">{{ count($planPostsList) }}</span><span class="text-sm text-blueGray-400">参戦予定</span>
        </div>
    </x-slot>
    <x-slot name="contents">
        <h1 class="mb-3 title-font font-bold text-lg">参戦予定</h1>
        @foreach($planPostsList as $plan)
            <div class="flex mb-3">
                <div class="rounded-full bg-black mr-3 inline-grid text-center content-center" style="width: 60px;height:60px">
                    <span class="text-white font-bold">{{ date('m/d',  strtotime($plan['holding_time']))}}</span>
                </div>
                <div class="rounded-md border-solid border-2 border-gray-500 p-2 w-9/12">
                    <h1>{{ $plan['name'] }}</h1>
                    <p>{{ $plan['information'] }}</p>
                    <p>{{ $plan['sns_account'] }}</p>
                </div>
            </div>
        @endforeach
    </x-slot>
    <x-slot name="list">
        <div class="flow-root">
            <h1 class="mb-3 title-font font-bold text-lg">フォローリスト</h1>
            <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                @if(count($followArtistProfiles) === 0)
                    <span>まだ誰もフォローしていません</span>
                @else
                    @foreach($followArtistProfiles as $profile)
                        <li class="py-3 sm:py-4">
                            <div class="flex items-center space-x-4">
                                <div class="flex-shrink-0">
                                    <img class="w-8 h-8 rounded-full" src="{{ asset($profile->file_path) }}" alt="アイコン">
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                        {{ $profile->name }}
                                    </p>
                                    <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                        {{ $profile->sns_account }}
                                    </p>
                                </div>
                                <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                    <form action="{{ route('user.items.unfollow',$profile->artist_id )}}" method="POST"  style="margin-bottom: 10px;">
                                        @csrf
                                        <input type="submit" value="フォロー解除" class="bg-pink-500 active:bg-pink-600 uppercase text-white font-bold hover:shadow-md shadow text-xs px-4 py-2 rounded outline-none focus:outline-none sm:mr-2 mb-1 ease-linear transition-all duration-150">
                                    </form>
                                </div>
                            </div>
                        </li>
                    @endforeach
                @endif
            </ul>
       </div>
    </x-slot>
</x-profile>
