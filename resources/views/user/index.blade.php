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
                           <a href="">
                           <div class="border-solid border-2 border-sky-500 rounded-md p-2 md:p-4">
                               <img src="{{asset($post->file_path)}}" alt="サムネイル">
                               <div class="mt-3">
                                   <div class="text-gray-700">名前：{{ $post->name }}</div>
                                   <div class="text-gray-700">内容：{{ $post->information }}</div>
                                   <div class="text-gray-700">場所：{{ $post->place }}</div>
                                   <div class="text-gray-700">開催時刻：<br>{{ $post->holding_time }}</div>
                                   <div class="text-gray-700">終了時刻：<br>{{ $post->finish_time }}</div>
                                   <form id="delete_{{$post->id}}" method="post" action="{{ route('artist.posts.destroy',['post' => $post->id ])}}">
                                       @csrf
                                       @method('delete')
                                       <div class="p-2 w-full flex justify-around mt-4">
                                           <a href="#" data-id="{{ $post->id }}" onclick="deletePost(this)" class="text-white bg-red-400 border-0 py-2 px-4 focus:outline-none hover:bg-red-500 rounded">削除する</a>
                                       </div>
                                  </form>
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