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
                        <div>
                        <h1 style="font-size:1.6rem;">ランキング</h1>
                        <div class="flex mt-2">
                            <div class="flex mr-1" style="width:25%">
                                <p style="margin-right: 1.25rem; margin-top:7px; font-size: 1.5rem;">1</p>
                                <img src="{{ asset('images/non-icon.png')}}" alt="アイコン" style="width: 10%; border-radius:50%; margin-right: 1.25rem">
                                <p style="margin-top:8px; font-size: 1.3rem;">きゃない</p>
                            </div>
                            <div>
                                {{-- <img src="" alt=""> --}}
                                <p style="margin-top:8px; font-size: 1.3rem;">100000スコア</p>
                            </div>
                        </div>
                        <div class="flex mt-2">
                            <div class="flex mr-1" style="width:25%">
                                <p style="margin-right: 1.25rem; margin-top:7px; font-size: 1.5rem;">2</p>
                                <img src="{{ asset('images/non-icon.png')}}" alt="アイコン" style="width: 10%; border-radius:50%; margin-right: 1.25rem">
                                <p style="margin-top:8px; font-size: 1.3rem;">HIDE</p>
                            </div>
                            <div>
                                {{-- <img src="" alt=""> --}}
                                <p style="margin-top:8px; font-size: 1.3rem;">30000スコア</p>
                            </div>
                        </div>
                        <div class="flex mt-2">
                            <div class="flex mr-1" style="width:25%">
                                <p style="margin-right: 1.25rem; margin-top:7px; font-size: 1.5rem;">3</p>
                                <img src="{{ asset('images/non-icon.png')}}" alt="アイコン" style="width: 10%; border-radius:50%; margin-right: 1.25rem">
                                <p style="margin-top:8px; font-size: 1.3rem;">DAI</p>
                            </div>
                            <div>
                                {{-- <img src="" alt=""> --}}
                                <p style="margin-top:8px; font-size: 1.3rem;">1000スコア</p>
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
