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
                    @if($followArtistPostsList === null)
                      <div class="mx-auto">
                        <h1 class="text-xl font-bold">現在フォロー中のアーティストがいません</h1>
                      </div>
                    @else
                        @foreach($followArtistPostsList as $post)
                        {{-- @for($ii = 0;$ii < count($post); $ii++) --}}
                            <div class="md:w-1/4 md:p-4 mt-3">
                                <a href="{{ route('user.items.show',['item' => $post['id'],'artist_id' => $post['artist_profile_id']])}}">
                                    <div class="border-solid border-2 border-sky-500 rounded-md p-2 md:p-4">
                                        <img src="{{ $post['file_path']}}" alt="サムネイル" class="post-image">
                                        <div class="mt-3">
                                            <div class="text-gray-700">名前：{{ $post['artist_profile_id'] }}</div>
                                            <div class="text-gray-700">名前：{{ $post['name'] }}</div>
                                            <div class="text-gray-700 post-content">内容：{{ $post['information']}}</div>
                                            <div class="text-gray-700">場所：{{ $post['place'] }}</div>
                                            <div class="text-gray-700">開催時刻：<br>{{ $post['holding_time']}}</div>
                                            <div class="text-gray-700">終了刻：<br>{{ $post['finish_time'] }}</div>
                                        </div>
                                    </div>
                                    {{-- <div class="border-solid border-2 border-sky-500 rounded-md p-2 md:p-4">
                                        <img src="{{ $post[1]['file_path']}}" alt="サムネイル" class="post-image">
                                        <div class="mt-3">
                                            <div class="text-gray-700">名前：{{ $post[1]['artist_profile_id'] }}</div>
                                            <div class="text-gray-700">名前：{{ $post[1]['name'] }}</div>
                                            <div class="text-gray-700 post-content">内容：{{ $post[1]['information']}}</div>
                                            <div class="text-gray-700">場所：{{ $post[1]['place'] }}</div>
                                            <div class="text-gray-700">開催時刻：<br>{{ $post[1]['holding_time']}}</div>
                                            <div class="text-gray-700">終了時刻：<br>{{ $post[]['finish_time'] }}</div>
                                        </div>
                                    </div> --}}
                                </a>
                            </div>
                    {{-- @endfor --}}
                          @endforeach
                    @endif

                </div>
            </div>
            {{-- {{ $followArtistPosts->links() }} --}}
        </div>
    </div>
    {{-- フォロー中のアーティスト一覧
    <div class="bg-white">
        <div>
            <ul>
                <li></li>
                <li></li>
                <li></li>
            </ul>
        </div>
    </div> --}}

        <div class="flex">
            <!-- Sidebar starts -->
            <!-- Remove class [ hidden ] and replace [ sm:flex ] with [ flex ] -->
            <div style="min-height: 716px" class="w-64 absolute sm:relative bg-gray-800 shadow md:h-full flex-col justify-between hidden sm:flex">
                <div class="px-8">
                    <ul class="mt-12">
                        <li class="flex w-full text-gray-300 cursor-pointer items-center mb-6">
                            <div class="py-1 px-3 mr-5 bg-gray-600 rounded text-gray-300 flex items-center justify-center text-xs">unFollow</div>
                            <a href="javascript:void(0)" class="flex items-center focus:outline-none focus:ring-2 focus:ring-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-grid" width="18" height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z"></path>
                                    <rect x="4" y="4" width="6" height="6" rx="1"></rect>
                                    <rect x="14" y="4" width="6" height="6" rx="1"></rect>
                                    <rect x="4" y="14" width="6" height="6" rx="1"></rect>
                                    <rect x="14" y="14" width="6" height="6" rx="1"></rect>
                                </svg>
                            </a>
                            <span class="text-sm">しん</span>
                        </li>
                        <li class="flex w-full text-gray-300 cursor-pointer items-center mb-6">
                            <div class="py-1 px-3 mr-5 bg-gray-600 rounded text-gray-300 flex items-center justify-center text-xs">unFollow</div>
                            <a href="javascript:void(0)" class="flex items-center focus:outline-none focus:ring-2 focus:ring-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-grid" width="18" height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z"></path>
                                    <rect x="4" y="4" width="6" height="6" rx="1"></rect>
                                    <rect x="14" y="4" width="6" height="6" rx="1"></rect>
                                    <rect x="4" y="14" width="6" height="6" rx="1"></rect>
                                    <rect x="14" y="14" width="6" height="6" rx="1"></rect>
                                </svg>
                            </a>
                            <span class="text-sm">しん</span>
                        </li>
                        <li class="flex w-full text-gray-300 cursor-pointer items-center mb-6">
                            <div class="py-1 px-3 mr-5 bg-gray-600 rounded text-gray-300 flex items-center justify-center text-xs">unFollow</div>
                            <a href="javascript:void(0)" class="flex items-center focus:outline-none focus:ring-2 focus:ring-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-grid" width="18" height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z"></path>
                                    <rect x="4" y="4" width="6" height="6" rx="1"></rect>
                                    <rect x="14" y="4" width="6" height="6" rx="1"></rect>
                                    <rect x="4" y="14" width="6" height="6" rx="1"></rect>
                                    <rect x="14" y="14" width="6" height="6" rx="1"></rect>
                                </svg>
                            </a>
                            <span class="text-sm">しん</span>
                        </li>
                        <li class="flex w-full text-gray-300 cursor-pointer items-center mb-6">
                            <div class="py-1 px-3 mr-5 bg-gray-600 rounded text-gray-300 flex items-center justify-center text-xs">unFollow</div>
                            <a href="javascript:void(0)" class="flex items-center focus:outline-none focus:ring-2 focus:ring-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-grid" width="18" height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z"></path>
                                    <rect x="4" y="4" width="6" height="6" rx="1"></rect>
                                    <rect x="14" y="4" width="6" height="6" rx="1"></rect>
                                    <rect x="4" y="14" width="6" height="6" rx="1"></rect>
                                    <rect x="14" y="14" width="6" height="6" rx="1"></rect>
                                </svg>
                            </a>
                            <span class="text-sm">しん</span>
                        </li>
                        <li class="flex w-full text-gray-300 cursor-pointer items-center mb-6">
                            <div class="py-1 px-3 mr-5 bg-gray-600 rounded text-gray-300 flex items-center justify-center text-xs">unFollow</div>
                            <a href="javascript:void(0)" class="flex items-center focus:outline-none focus:ring-2 focus:ring-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-grid" width="18" height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z"></path>
                                    <rect x="4" y="4" width="6" height="6" rx="1"></rect>
                                    <rect x="14" y="4" width="6" height="6" rx="1"></rect>
                                    <rect x="4" y="14" width="6" height="6" rx="1"></rect>
                                    <rect x="14" y="14" width="6" height="6" rx="1"></rect>
                                </svg>
                            </a>
                            <span class="text-sm">しん</span>
                        </li>

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
                <button aria-label="toggle sidebar" id="openSideBar" class="h-10 w-10 bg-gray-800 absolute right-0 mt-16 -mr-10 flex items-center shadow rounded-tr rounded-br justify-center cursor-pointer focus:outline-none focus:ring-2 focus:ring-offset-2 rounded focus:ring-gray-800" onclick="sidebarHandler(true)">
                    <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/light_with_icons_at_bottom-svg7.svg" alt="toggler">
                </button>
                <button aria-label="Close sidebar" id="closeSideBar" class="hidden h-10 w-10 bg-gray-800 absolute right-0 mt-16 -mr-10 flex items-center shadow rounded-tr rounded-br justify-center cursor-pointer text-white" onclick="sidebarHandler(false)">
                    <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/light_with_icons_at_bottom-svg8.svg" alt="cross">
                </button>
                <div class="px-8">
                    <div class="h-16 w-full flex items-center">
                        <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/light_with_icons_at_bottom-svg1.svg" alt="Logo">
                    </div>
                    <ul class="mt-12">
                        <li class="flex w-full justify-between text-gray-300 hover:text-gray-500 cursor-pointer items-center mb-6">
                            <a href="javascript:void(0)" class="flex items-center focus:outline-none focus:ring-2 focus:ring-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-grid" width="18" height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z"></path>
                                    <rect x="4" y="4" width="6" height="6" rx="1"></rect>
                                    <rect x="14" y="4" width="6" height="6" rx="1"></rect>
                                    <rect x="4" y="14" width="6" height="6" rx="1"></rect>
                                    <rect x="14" y="14" width="6" height="6" rx="1"></rect>
                                </svg>
                                <span class="text-sm ml-2">Dashboard</span>
                            </a>
                            <div class="py-1 px-3 bg-gray-600 rounded text-gray-300 flex items-center justify-center text-xs">5</div>
                        </li>
                        <li class="flex w-full justify-between text-gray-400 hover:text-gray-300 cursor-pointer items-center mb-6">
                            <a href="javascript:void(0)" class="flex items-center focus:outline-none focus:ring-2 focus:ring-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-puzzle" width="18" height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z"></path>
                                    <path d="M4 7h3a1 1 0 0 0 1 -1v-1a2 2 0 0 1 4 0v1a1 1 0 0 0 1 1h3a1 1 0 0 1 1 1v3a1 1 0 0 0 1 1h1a2 2 0 0 1 0 4h-1a1 1 0 0 0 -1 1v3a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-1a2 2 0 0 0 -4 0v1a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1h1a2 2 0 0 0 0 -4h-1a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1"></path>
                                </svg>
                                <span class="text-sm ml-2">Products</span>
                            </a>
                            <div class="py-1 px-3 bg-gray-600 rounded text-gray-300 flex items-center justify-center text-xs">8</div>
                        </li>
                        <li class="flex w-full justify-between text-gray-400 hover:text-gray-300 cursor-pointer items-center mb-6">
                            <a href="javascript:void(0)" class="flex items-center focus:outline-none focus:ring-2 focus:ring-white" >
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-compass" width="18" height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z"></path>
                                    <polyline points="8 16 10 10 16 8 14 14 8 16"></polyline>
                                    <circle cx="12" cy="12" r="9"></circle>
                                </svg>
                                <span class="text-sm ml-2">Performance</span>
                            </a>
                        </li>
                        <li class="flex w-full justify-between text-gray-400 hover:text-gray-300 cursor-pointer items-center mb-6">
                            <a href="javascript:void(0)" class="flex items-center focus:outline-none focus:ring-2 focus:ring-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-code" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z"></path>
                                    <polyline points="7 8 3 12 7 16"></polyline>
                                    <polyline points="17 8 21 12 17 16"></polyline>
                                    <line x1="14" y1="4" x2="10" y2="20"></line>
                                </svg>
                                <span class="text-sm ml-2">Deliverables</span>
                            </a>
                        </li>
                        <li class="flex w-full justify-between text-gray-400 hover:text-gray-300 cursor-pointer items-center mb-6">
                            <a href="javascript:void(0)" class="flex items-center focus:outline-none focus:ring-2 focus:ring-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-puzzle" width="18" height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z"></path>
                                    <path d="M4 7h3a1 1 0 0 0 1 -1v-1a2 2 0 0 1 4 0v1a1 1 0 0 0 1 1h3a1 1 0 0 1 1 1v3a1 1 0 0 0 1 1h1a2 2 0 0 1 0 4h-1a1 1 0 0 0 -1 1v3a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-1a2 2 0 0 0 -4 0v1a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1h1a2 2 0 0 0 0 -4h-1a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1"></path>
                                </svg>
                                <span class="text-sm ml-2">Invoices</span>
                            </a>
                            <div class="py-1 px-3 bg-gray-600 rounded text-gray-300 flex items-center justify-center text-xs">25</div>
                        </li>
                        <li class="flex w-full justify-between text-gray-400 hover:text-gray-300 cursor-pointer items-center mb-6">
                            <a href="javascript:void(0)" class="flex items-center focus:outline-none focus:ring-2 focus:ring-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-stack" width="18" height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" />
                                    <polyline points="12 4 4 8 12 12 20 8 12 4" />
                                    <polyline points="4 12 12 16 20 12" />
                                    <polyline points="4 16 12 20 20 16" />
                                </svg>
                                <span class="text-sm ml-2">Inventory</span>
                            </a>
                        </li>
                        <li class="flex w-full justify-between text-gray-400 hover:text-gray-300 cursor-pointer items-center">
                            <a href="javascript:void(0)" class="flex items-center focus:outline-none focus:ring-2 focus:ring-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-settings" width="18" height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" />
                                    <path d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                    <circle cx="12" cy="12" r="3" />
                                </svg>
                                <span class="text-sm ml-2">Settings</span>
                            </a>
                        </li>
                    </ul>
                    <div class="flex justify-center mt-48 mb-4 w-full">
                        <div class="relative">
                            <div class="text-gray-300 absolute ml-4 inset-0 m-auto w-4 h-4">
                                <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/light_with_icons_at_bottom-svg2.svg" alt="Search">
                            </div>
                            <input class="bg-gray-700 focus:outline-none focus:ring-1 focus:ring-gray-100  rounded w-full text-sm text-gray-300 placeholder-gray-400 bg-gray-100 pl-10 py-2" type="text" placeholder="Search" />
                        </div>
                    </div>
                </div>
                <div class="px-8 border-t border-gray-700">
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
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
