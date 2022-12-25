<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                        <div class="md:flex">
                            <div class="md:w-1/2">
                                <div class="md:mr-20">
                                    <div style="background-color: #202020; border-radius: 3px;padding: 15px;">
                                        <p class="text-white">今月の獲得 Gold</p>
                                        <div class="flex bg-white" style="padding-left: 18px;">
                                            <img src="{{ asset('images/icons8-gold.png')}}" alt="gold">
                                            <p class="mt-1 text-black">{{ $within_sum_gold }} Gold</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="md:w-1/2 p-3" style="border-radius: 4px; background-color: #202020;">
                                <h1 class="text-white" style="font-size:1.6rem;">ランキング</h1>
                                <div class="flex mt-4 bg-white p-3 rounded-sm">
                                    <div class="flex mr-1">
                                        <p style="margin-right: 1.25rem; margin-top:7px; font-size: 1.5rem;">1</p>
                                        <img src="{{ asset('images/non-icon.png')}}" alt="アイコン" style="width: 50px;height:50px; border-radius:50%; margin-right: 1.25rem">
                                        <p class="mr-6" style="margin-top:8px; font-size: 1.3rem;">きゃない</p>
                                    </div>
                                    <div>
                                        {{-- <img src="" alt=""> --}}
                                        <p style="margin-top:8px; font-size: 1.3rem;">100000スコア</p>
                                    </div>
                                </div>
                                <div class="flex mt-4 bg-white p-3 rounded-sm">
                                    <div class="flex mr-1">
                                        <p style="margin-right: 1.25rem; margin-top:7px; font-size: 1.5rem;">2</p>
                                        <img src="{{ asset('images/non-icon.png')}}" alt="アイコン" style="width: 50px;height:50px; border-radius:50%; margin-right: 1.25rem">
                                        <p class="mr-6" style="margin-top:8px; font-size: 1.3rem;">HIDE</p>
                                    </div>
                                    <div>
                                        {{-- <img src="" alt=""> --}}
                                        <p style="margin-top:8px; font-size: 1.3rem;">30000スコア</p>
                                    </div>
                                </div>
                                <div class="flex mt-4 bg-white p-3 rounded-sm">
                                    <div class="flex mr-1">
                                        <p style="margin-right: 1.25rem; margin-top:7px; font-size: 1.5rem;">3</p>
                                        <img src="{{ asset('images/non-icon.png')}}" alt="アイコン" style="width: 50px;height:50px; border-radius:50%; margin-right: 1.25rem">
                                        <p class="mr-6" style="margin-top:8px; font-size: 1.3rem;">DAI</p>
                                    </div>
                                    <div>
                                        {{-- <img src="" alt=""> --}}
                                        <p style="margin-top:8px; font-size: 1.3rem;">1000スコア</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-10">
                            <p>ヒートマップ</p>
                            <img src="{{ asset('images/heartmap.png') }}">
                        </div>
            </div>
        </div>
    </div>
</div>
</div>

</x-app-layout>
