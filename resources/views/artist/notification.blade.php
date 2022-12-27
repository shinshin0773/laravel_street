<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Notifications') }}
        </h2>
    </x-slot>

    <div class="bg-black" style="height: 2800px">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>
                <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
                    <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
                        <li class="mr-2" role="presentation">
                            <button class="inline-block p-4 rounded-t-lg border-b-2" id="profile-tab" data-tabs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Present</button>
                        </li>
                        <li class="mr-2" role="presentation">
                            <button class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab" aria-controls="dashboard" aria-selected="false">行きたい</button>
                        </li>
                        <li class="mr-2" role="presentation">
                            <button class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="settings-tab" data-tabs-target="#settings" type="button" role="tab" aria-controls="settings" aria-selected="false">Follow</button>
                        </li>
                    </ul>
                </div>
                <div id="myTabContent">
                    <div class="hidden p-4 bg-gray-50 rounded-lg dark:bg-gray-800" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        @for($i = 0;$i < count($user_collection); $i++)
                            <div class="border-b-2 border-indigo-500 py-2">
                                {{-- <p>{{ $user_collection[$i][0] }}</p> --}}
                                <p>{{ $user_collection[$i][0]->name }}</p>
                                <p>{{ $user_collection[$i][0]->name }}さんから{{$present_golds[$i]}}プレゼントされました。</p>
                            </div>
                        @endfor
                    </div>
                    <div class="hidden p-4 bg-gray-50 rounded-lg dark:bg-gray-800" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                        @for($i = 0;$i < count($array_likes); $i++)
                            <div class="border-b-2 border-indigo-500 py-2">
                                {{-- <p>{{ $array_likes[$i][0]}}</p> --}}
                                <p>{{ $array_likes[$i][0]->name}}がいく</p>
                                <p class="text-lg mt-2">Content</p>
                                <p class="text-sm">{{ $array_posts[$i][0]->information }}</p>
                                <p class="text-sm">{{ $array_posts[$i][0]->place }}</p>
                            </div>
                        @endfor
                    </div>
                    <div class="hidden p-4 bg-gray-50 rounded-lg dark:bg-gray-800" id="settings" role="tabpanel" aria-labelledby="settings-tab">
                        @for($i = 0;$i < count($array_followers); $i++)
                            <div class="border-b-2 border-indigo-500 py-2">
                                    <p>{{ $array_followers[$i][0]->name }}</p>
                                    <p>{{ $array_followers[$i][0]->name }}さんからフォローされました。</p>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</x-app-layout>
