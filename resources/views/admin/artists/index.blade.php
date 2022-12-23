<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('登録アーティスト一覧') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="md:p-6 bg-white border-b border-gray-200">
                    <section class="text-gray-600 body-font">
                        <div class="container md:px-5 mx-auto">
                          <x-flash-message status="session('status')" />
                          <div class="lg:w-2/3 w-full mx-auto overflow-auto">
                            <table class="table-auto w-full text-left whitespace-no-wrap">
                              <thead>
                                <tr>
                                  <th class="md:px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">名前</th>
                                  <th class="md:px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">メールアドレス</th>
                                  <th class="md:px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">作成日</th>
                                  <th class="w-10 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tr rounded-br"></th>
                                  <th class="w-10 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tr rounded-br"></th>
                                </tr>
                              </thead>
                              <tbody>
                                  @foreach($artists as $artist)
                                  <tr>
                                  <td class="md:px-4 py-3">{{ $artist->name }}</td>
                                  <td class="md:px-4 py-3">{{ $artist->email }}</td>
                                  <td class="md:px-4 py-3">{{ $artist->created_at->diffForHumans() }}</td>
                                  @if($artist->recognized)
                                    <form method="post" id="deauthenticate_{{ $artist->id }}" action="{{ route('admin.artist.unrecognizing',['artist' => $artist->id ])}}" >
                                        @csrf
                                        <td class="w-10 text-center">
                                            <button href="#" data-id="{{ $artist->id }}" onclick="deauthenticateArtist(this)" class="mr-3 text-white bg-yellow-400 border-0 py-2 md:px-4 focus:outline-none hover:bg-yellow-500 rounded" style="width: 100px;">公認解除</button>
                                        </td>
                                    </form>
                                  @else
                                    <form method="post" id="recognizing_{{ $artist->id }}" action="{{ route('admin.artist.recognizing',['artist' => $artist->id ])}}" >
                                        @csrf
                                        <td class="w-10 text-center">
                                            <button href="#" data-id="{{ $artist->id }}" onclick="recognizingArtist(this)" class="mr-3 text-white bg-yellow-400 border-0 py-2 md:px-4 focus:outline-none hover:bg-yellow-500 rounded" style="width: 100px;">公認</button>
                                        </td>
                                    </form>
                                  @endif

                                  <form method="post" id="delete_{{$artist->id}}" action="{{ route('admin.artists.destroy',['artist' => $artist->id] )}}">
                                    @csrf
                                    @method('delete')
                                    <td class="w-10 text-center">
                                        <button href="#" data-id="{{ $artist->id }}" onclick="deleteAccount(this)" class="mr-3 text-white bg-red-400 border-0 py-2 md:px-4 focus:outline-none hover:bg-red-500 rounded" style="width: 100px;">削除</button>
                                    </td>
                                  </form>
                                </tr>
                                @endforeach
                              </tbody>
                            </table>
                            {{ $artists->links() }}
                          </div>
                        </div>
                      </section>
                </div>
            </div>
        </div>
    </div>
    <script>
        //
        function deleteAccount(e) {
            'use strict';
            if(confirm('本当にアカウントを削除しますか？')){
                document.getElementById('delete_' + e.dataset.id).submit();
            }
        }

        //アーティストの認証をする関数
        function recognizingArtist(e){
            'use strict';
            if(confirm('このアーティストを認証しますか？')){
                document.getElementById('recognizing_'+e.dataset.id).submit();
            }
        }

        //アーティストの認証を解除する関数
        function deauthenticateArtist(e){
            'use strict';
            if(confirm('このアーティストの認証を解除しますか？')){
                document.getElementById('deauthenticate_'+e.dataset.id).submit();
            }
        }
    </script>
</x-app-layout>
