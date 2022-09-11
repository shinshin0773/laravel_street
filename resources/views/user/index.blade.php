<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            ホーム
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex flex-wrap">
                        @foreach($posts as $post)
                       <div class="w-1/4 md:p-4">
                           <a href="{{ route('user.items.show',['item' => $post->id ])}}">
                           <div class="border-solid border-2 border-sky-500 rounded-md p-2 md:p-4">
                               <img src="{{asset($post->file_path)}}" alt="サムネイル" style="width: 224px; height: 149.328px">
                               <div class="mt-3">
                                   <div class="text-gray-700">名前：{{ $post->name }}</div>
                                   <div class="text-gray-700">内容：{{ $post->information }}</div>
                                   <div class="text-gray-700">場所：{{ $post->place }}</div>
                                   <div class="text-gray-700">開催時刻：<br>{{ $post->holding_time }}</div>
                                   <div class="text-gray-700">終了時刻：<br>{{ $post->finish_time }}</div>
                               </div>
                          </div>
                       </a>
                       </div>
                   @endforeach
               </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
