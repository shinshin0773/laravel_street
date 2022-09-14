<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('登録アーティスト一覧') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    {{-- エロくアント
                    @foreach ($e_all as $e_artist)
                        {{ $e_artist->name }}
                        {{ $e_artist->created_at->diffForHumans() }}
                    @endforeach
                    <br>
                    クエリビルだ
                    @foreach ($q_get as $q_artist)
                        {{ $e_artist->name }}
                        {{ Carbon\Carbon::parse($e_artist->created_at)->diffForHumans() }}
                    @endforeach --}}

                    <section class="text-gray-600 body-font">
                        <div class="container px-5 mx-auto">
                          <div class="lg:w-2/3 w-full mx-auto overflow-auto">
                            <table class="table-auto w-full text-left whitespace-no-wrap">
                              <thead>
                                <tr>
                                  <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">名前</th>
                                  <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">メールアドレス</th>
                                  <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">作成日</th>
                                  <th class="w-10 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tr rounded-br"></th>
                                </tr>
                              </thead>
                              <tbody>
                                  @foreach($artists as $artist)
                                  <tr>
                                  <td class="px-4 py-3">{{ $artist->name }}</td>
                                  <td class="px-4 py-3">{{ $artist->email }}</td>
                                  <td class="px-4 py-3">{{ $artist->created_at->diffForHumans() }}</td>
                                  <td class="w-10 text-center">
                                    <input name="plan" type="radio">
                                  </td>
                                </tr>
                                @endforeach
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
