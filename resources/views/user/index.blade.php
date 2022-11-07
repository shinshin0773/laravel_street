<x-app-layout>
    <x-slot name="header">
        <div class="md:flex justify-between items-center">
            <h2 class="font-semibold text-xl text-white leading-tight mb-3">
                投稿一覧
            </h2>
            <div>
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
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="md:flex md:flex-wrap">
                        @foreach($posts as $post)
                        <div class="md:w-1/4 md:p-4 mt-3">
                            <a href="{{ route('user.items.show',['item' => $post->id,'artist_id' => $post->artist_profile_id])}}">
                                <div class="border-solid border-2 border-sky-500 rounded-md p-2 md:p-4">
                                    <img src="{{asset($post->file_path)}}" alt="サムネイル" class="post-image">
                                    <div class="mt-3">
                                        <div class="text-gray-700">名前：{{ $post->name }}</div>
                                        <div class="text-gray-700 post-content">内容：{{ $post->information }}</div>
                                        <div class="text-gray-700">場所：{{ $post->place }}</div>
                                        <div class="text-gray-700">開催時刻：<br>{{ $post->holding_time->format('Y年m月d日 H時i分') }}</div>
                                        <div class="text-gray-700">終了時刻：<br>{{ $post->finish_time->format('Y年m月d日 H時i分') }}</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
<script>
    const select = document.getElementById('sort')
    select.addEventListener('change', function(){
        //セレクトボックスがチェンジされたら送信する
        this.form.submit()
    })

    const dateSelect = document.getElementById('dateSelect')
    dateSelect.addEventListener('change',function() {
        this.form.submit()
    })

</script>
</x-app-layout>
