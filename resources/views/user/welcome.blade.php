<x-app-layout>
    <x-slot name="header">
    </x-slot>
    <div class="text-white bg-black font-bold" id="top">
        {{-- サービスイラスト --}}
        <div class="top-image-wrap md:hidden">
            <img style="width: 100%" src="{{ asset('images/TopImage.png') }}" alt="">
        </div>

        {{-- ストリート紹介文 --}}
        <div class="text-center" style="padding-top:8rem; padding-bottom: 8rem;" style="">
            <h1 class="text-4xl">路上ライブは見る時代から探す時代に・・・</h1>
            <h1 class="text-4xl mb-10">あなたのライブは探される。</h1>

            <div>
                <p class="mt-8">
                    従来の路上ライブは路上を歩いている人がたまたま見かけて立ち止まって見るようなものでした、<br>
                    しかしこれからは探される時代になります。なぜなら「Street」があるからです。<br>
                    これにより魅力的な人がよりピックアップされて人をを集めることが可能になります。
                </p>
            </div>
        </div>

        {{-- 機能一覧 --}}
        <div class="mx-auto px-4font-bold">
            <div class="text-center">
                <h1 class="text-3xl">機能一覧</h1>
                <div class="md:flex md:justify-center md:mt-10">
                    <div class="md:w-2/6 mr-8">
                        <img class="text-center" style="margin: 0 auto;" src="{{ asset('images/ChechIconWhite.svg')}}" width="70" >
                        <h3 class="mt-6 mb-2">告知機能</h3>
                        <p>ライブ情報の告知をすることができます</p>
                    </div>
                    <div class="md:w-2/6 mr-5">
                        <img class="text-center" style="margin: 0 auto;" src="{{ asset('images/ChechIconWhite.svg')}}" width="70" >
                        <h3 class="mt-6 mb-2">開催地Map</h3>
                        <p>近くで開催しているライブ情報をMapで確認することができます</p>
                    </div>
                    <div class="md:w-2/6 mr-5">
                        <img class="text-center" style="margin: 0 auto;" src="{{ asset('images/ChechIconWhite.svg')}}" width="70" >
                        <h3 class="mt-6 mb-2">開催情報一覧</h3>
                        <p>ライブの開催情報を一覧で確認することができます</p>
                    </div>
                </div>
            </div>
            {{-- アーティスト側勧誘セクション --}}
            <div>
                <section class="text-gray-600 body-font">
                    <div class="container px-5 py-24 mx-auto flex flex-wrap">
                      <div class="lg:w-2/3 w-full mb-10 lg:mb-0 rounded-lg overflow-hidden">
                        <img alt="feature" class="object-cover object-center h-full w-full max-w-full" src="{{ asset('images/PCイラスト.png')}}">
                      </div>
                      <div class="flex flex-col flex-wrap lg:py-6 -mb-10 lg:w-1/3 lg:pl-12 lg:text-left text-center">
                        <div class="flex flex-col mb-10 lg:items-start items-center">
                          <div class="w-12 h-12 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-5">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-6 h-6" viewBox="0 0 24 24">
                              <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                            </svg>
                          </div>
                          <div class="flex-grow">
                            <h2 class="text-white text-lg title-font font-medium mb-3">告知機能</h2>
                            <p class="text-white text-base">開催地と日時を入力して投稿することでリスナーに対して告知をすることができます</p>
                            <a href="https://xs808261.xsrv.jp/public/artist/register" class="mt-3 text-indigo-500 inline-flex items-center">アーティストはこちらから登録・・・
                              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                                <path d="M5 12h14M12 5l7 7-7 7"></path>
                              </svg>
                            </a>
                          </div>
                        </div>
                        <div class="flex flex-col mb-10 lg:items-start items-center">
                          <div class="w-12 h-12 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-5">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-6 h-6" viewBox="0 0 24 24">
                              <circle cx="6" cy="6" r="3"></circle>
                              <circle cx="6" cy="18" r="3"></circle>
                              <path d="M20 4L8.12 15.88M14.47 14.48L20 20M8.12 8.12L12 12"></path>
                            </svg>
                          </div>
                          <div class="flex-grow">
                            <h2 class="text-white text-lg title-font font-medium mb-3">プロフィール機能</h2>
                            <p class="text-white text-base">プロフィールを自分なりにカスタマイズできます</p>
                            <a href="https://xs808261.xsrv.jp/public/artist/register" class="mt-3 text-indigo-500 inline-flex items-center">アーティストはこちらから登録・・・
                              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                                <path d="M5 12h14M12 5l7 7-7 7"></path>
                              </svg>
                            </a>
                          </div>
                        </div>
                        <div class="flex flex-col mb-10 lg:items-start items-center">
                          <div class="w-12 h-12 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-5">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-6 h-6" viewBox="0 0 24 24">
                              <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                              <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                          </div>
                          <div class="flex-grow">
                            <h2 class="text-white text-lg title-font font-medium mb-3">Twiiterへの流入</h2>
                            <p class="text-white text-base">登録する際にTwitterのアカウントIDを入力するので、そこからファンがTwitterへ流入するかもしれません。</p>
                            <a href="https://xs808261.xsrv.jp/public/artist/register" class="mt-3 text-indigo-500 inline-flex items-center">アーティストはこちらから登録・・・
                              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                                <path d="M5 12h14M12 5l7 7-7 7"></path>
                              </svg>
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </section>
            </div>
            {{-- ユーザー側勧誘セクション --}}
            <div>
                <section class="text-gray-600 body-font">
                    <div class="container px-5 py-24 mx-auto flex flex-wrap">
                      <div class="flex flex-col flex-wrap lg:py-6 -mb-10 lg:w-1/3 lg:pl-12 lg:text-left text-center">
                        <div class="flex flex-col mb-10 lg:items-start items-center">
                          <div class="w-12 h-12 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-5">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-6 h-6" viewBox="0 0 24 24">
                              <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                            </svg>
                          </div>
                          <div class="flex-grow">
                            <h2 class="text-white text-lg title-font font-medium mb-3">開催地Map</h2>
                            <p class="text-white text-base">現在位置近くでの開催予定のライブ情報を確認することができます</p>
                            <a href="https://xs808261.xsrv.jp/public/register" class="mt-3 text-indigo-500 inline-flex items-center">一般ユーザーはこちらから登録・・・
                              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                                <path d="M5 12h14M12 5l7 7-7 7"></path>
                              </svg>
                            </a>
                          </div>
                        </div>
                        <div class="flex flex-col mb-10 lg:items-start items-center">
                          <div class="w-12 h-12 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-5">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-6 h-6" viewBox="0 0 24 24">
                              <circle cx="6" cy="6" r="3"></circle>
                              <circle cx="6" cy="18" r="3"></circle>
                              <path d="M20 4L8.12 15.88M14.47 14.48L20 20M8.12 8.12L12 12"></path>
                            </svg>
                          </div>
                          <div class="flex-grow">
                            <h2 class="text-white text-lg title-font font-medium mb-3">場所・アーティスト・時間で検索</h2>
                            <p class="text-white text-base">自分なりに好きなタイミング・アーティスト・時間で絞り込んで検索できます</p>
                            <a href="https://xs808261.xsrv.jp/public/register" class="mt-3 text-indigo-500 inline-flex items-center">一般ユーザーはこちらから登録・・・
                              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                                <path d="M5 12h14M12 5l7 7-7 7"></path>
                              </svg>
                            </a>
                          </div>
                        </div>
                        <div class="flex flex-col mb-10 lg:items-start items-center">
                          <div class="w-12 h-12 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-5">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-6 h-6" viewBox="0 0 24 24">
                              <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                              <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                          </div>
                          <div class="flex-grow">
                            <h2 class="text-white text-lg title-font font-medium mb-3">詳細Map</h2>
                            <p class="text-white text-base">気になったライブがあればそこまで案内できます</p>
                            <a href="https://xs808261.xsrv.jp/public/register" class="mt-3 text-indigo-500 inline-flex items-center">一般ユーザーはこちらから登録・・・
                              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                                <path d="M5 12h14M12 5l7 7-7 7"></path>
                              </svg>
                            </a>
                          </div>
                        </div>
                      </div>
                      <div class="lg:w-2/3 w-full mb-10 lg:mb-0 rounded-lg overflow-hidden">
                        <img alt="feature" class="object-cover object-center h-full w-full max-w-full" src="{{ asset('images/ユーザー側イラスト.gif')}}">
                      </div>
                    </div>
                  </section>
            </div>
            <footer class="flex" style="justify-content: space-between; ">
                <div class="flex">
                    <div style="width: 15rem">
                        <img src="{{ asset('images/透過アイコン.png')}}" alt="">
                    </div>
                    <div class="mt-9">
                        <p>&copy; shin. 2022.</p>
                    </div>
                </div>
                <div class="justify-end">
                    <p class="mt-9"><a href="#top">トップへ戻る↑</a></p>
                </div>
            </footer>
        </div>
    </div>
</x-app-layout>
