<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('通知') }}
        </h2>
    </x-slot>

    <div class="bg-black" style="height: 2800px">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>
                <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
                    <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
                        <li class="mr-2" role="presentation">
                            <button class="inline-block p-4 rounded-t-lg border-b-2" id="profile-tab" data-tabs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">開催情報</button>
                        </li>
                    </ul>
                </div>
                <div id="myTabContent">
                    <div class="hidden p-4 bg-gray-50 rounded-lg dark:bg-gray-800" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        @if($followArtistPostsList === null)
                            <div class="border-b-2 border-indigo-500 py-2">
                                <p>まだ通知はありません</p>
                            </div>
                        @else
                            @for($i = 0;$i < count($followArtistPostsList); $i++)
                                <div class="border-b-2 border-indigo-500 py-2">
                                    <p class="mb-2">最新の投稿があります</p>
                                    <a href="{{ route('user.items.show',['item' => $followArtistPostsList[$i]['id'],'artist_id' => $followArtistPostsList[$i]->artist_profile_id])}}"">
                                        <div class="text-blue-700">
                                            <p>{{ $followArtistPostsList[$i]['name'] }}</p>
                                            <p>{{ $followArtistPostsList[$i]['information']}}</p>
                                            <p>開催日時：{{ $followArtistPostsList[$i]['holding_time']->format('Y年m月d日 H時i分') }}</p>
                                        </div>
                                    </a>
                                </div>
                            @endfor
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
</div>
</x-app-layout>
