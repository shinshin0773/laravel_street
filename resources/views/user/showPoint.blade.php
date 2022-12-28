<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight mb-3">
            ゴールド購入 <span class="text-red-500">(ベータ版ですので、購入は控えてください)</span>
        </h2>
    </x-slot>
    <div class="text-center text-white bg-black font-bold" id="top">

        <div class="md:flex max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="md:mr-20 md:w-3/12">
                <div style="background-color: #202020; border-radius: 3px;padding: 15px;">
                    <p>現在の所持 Gold</p>
                    <div class="flex bg-white" style="padding-left: 18px;">
                        <img src="{{ asset('images/icons8-gold.png')}}" alt="gold">
                        <p class="mt-1 text-black">{{ $user_gold }}Gold</p>
                    </div>
                </div>
            </div>

            <div class="pt-4 md:9/12" style="margin-bottom: 600px">
                <x-flash-message status="session('status')" />
                <h1 class="pb-4 text-3xl mt-3">ゴールド購入<span class="text-red-500">（ベータ版ですので購入はお控えください）</span></h1>
                <div class="flex flex-wrap" style="margin-left: 70px">
                    {{-- それぞれの単価のボックス --}}
                    <div class="md:w-1/2 w-full flex py-4">
                        <div class="w-1/2 flex mt-1.5">
                            <img src="{{ asset('images/icons8-gold.png')}}" alt="gold" style="width: 30px; height:30px">
                            <p class="mt-1" class="inline">100Gold</p>
                        </div>
                        <form action="{{ route('user.items.charge') }}" method="POST" class="mt-1">
                            @csrf
                            {{ csrf_field() }}
                                    <script
                                            src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                            data-key="{{ env('STRIPE_PUBLIC_KEY') }}"
                                            data-amount="110"
                                            data-name="ゴールド購入"
                                            data-label="¥110"
                                            data-description="ゴールドを購入できます"
                                            data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                                            data-locale="auto"
                                            data-currency="JPY">
                                    </script>
                                    {{-- ゴールドの数値 --}}
                                    <input type="hidden" name="gold" value=100>
                                    {{-- お金の数値 --}}
                                    <input type="hidden" name="money" value=110>
                        </form>
                    </div>
                    {{-- それぞれの単価のボックス --}}
                    <div class="md:w-1/2 w-full flex py-4">
                        <div class="w-1/2 flex mt-1.5">
                            <img src="{{ asset('images/icons8-gold.png')}}" alt="gold" style="width: 30px; height:30px">
                            <p class="mt-1" class="inline">300Gold</p>
                        </div>
                        <form action="{{ route('user.items.charge') }}" method="POST" class="mt-1">
                            @csrf
                            {{ csrf_field() }}
                                    <script
                                            src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                            data-key="{{ env('STRIPE_PUBLIC_KEY') }}"
                                            data-amount="330"
                                            data-name="ゴールド購入"
                                            data-label="¥330"
                                            data-description="ゴールドを購入できます"
                                            data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                                            data-locale="auto"
                                            data-currency="JPY">
                                    </script>
                                    {{-- ゴールドの数値 --}}
                                    <input type="hidden" name="gold" value=300>
                                    {{-- お金の数値 --}}
                                    <input type="hidden" name="money" value=330>
                        </form>
                    </div>
                    {{-- それぞれの単価のボックス --}}
                    <div class="md:w-1/2 w-full flex py-4">
                        <div class="w-1/2 flex mt-1.5">
                            <img src="{{ asset('images/icons8-gold.png')}}" alt="gold" style="width: 30px; height:30px">
                            <p class="mt-1" class="inline">500Gold</p>
                        </div>
                        <form action="{{ route('user.items.charge') }}" method="POST" class="mt-1">
                            @csrf
                            {{ csrf_field() }}
                                    <script
                                            src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                            data-key="{{ env('STRIPE_PUBLIC_KEY') }}"
                                            data-amount="550"
                                            data-name="ゴールド購入"
                                            data-label="¥550"
                                            data-description="ゴールドを購入できます"
                                            data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                                            data-locale="auto"
                                            data-currency="JPY">
                                    </script>
                                    {{-- ゴールドの数値 --}}
                                    <input type="hidden" name="gold" value=500>
                                    {{-- お金の数値 --}}
                                    <input type="hidden" name="money" value=550>
                        </form>
                    </div>
                   {{-- それぞれの単価のボックス --}}
                    <div class="md:w-1/2 w-full flex py-4">
                        <div class="w-1/2 flex mt-1.5">
                            <img src="{{ asset('images/icons8-gold.png')}}" alt="gold" style="width: 30px; height:30px">
                            <p class="mt-1" class="inline">1000Gold</p>
                        </div>
                        <form action="{{ route('user.items.charge') }}" method="POST" class="mt-1">
                            @csrf
                            {{ csrf_field() }}
                                    <script
                                            src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                            data-key="{{ env('STRIPE_PUBLIC_KEY') }}"
                                            data-amount="1100"
                                            data-name="ゴールド購入"
                                            data-label="¥1100"
                                            data-description="ゴールドを購入できます"
                                            data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                                            data-locale="auto"
                                            data-currency="JPY">
                                    </script>
                                    {{-- ゴールドの数値 --}}
                                    <input type="hidden" name="gold" value=1000>
                                    {{-- お金の数値 --}}
                                    <input type="hidden" name="money" value=1100>
                        </form>
                    </div>
                    {{-- それぞれの単価のボックス --}}
                    <div class="md:w-1/2 w-full flex py-4">
                        <div class="w-1/2 flex mt-1.5">
                            <img src="{{ asset('images/icons8-gold.png')}}" alt="gold" style="width: 30px; height:30px">
                            <p class="mt-1" class="inline">3000Gold</p>
                        </div>
                        <form action="{{ route('user.items.charge') }}" method="POST" class="mt-1">
                            @csrf
                            {{ csrf_field() }}
                                    <script
                                            src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                            data-key="{{ env('STRIPE_PUBLIC_KEY') }}"
                                            data-amount="3300"
                                            data-name="ゴールド購入"
                                            data-label="¥3300"
                                            data-description="ゴールドを購入できます"
                                            data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                                            data-locale="auto"
                                            data-currency="JPY">
                                    </script>
                                    {{-- ゴールドの数値 --}}
                                    <input type="hidden" name="gold" value=3000>
                                    {{-- お金の数値 --}}
                                    <input type="hidden" name="money" value=3300>
                        </form>
                    </div>
                    {{-- それぞれの単価のボックス --}}
                    <div class="md:w-1/2 w-full flex py-4">
                        <div class="w-1/2 flex mt-1.5">
                            <img src="{{ asset('images/icons8-gold.png')}}" alt="gold" style="width: 30px; height:30px">
                            <p class="mt-1" class="inline">5000Gold</p>
                        </div>
                        <form action="{{ route('user.items.charge') }}" method="POST" class="mt-1">
                            @csrf
                            {{ csrf_field() }}
                                    <script
                                            src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                            data-key="{{ env('STRIPE_PUBLIC_KEY') }}"
                                            data-amount="5500"
                                            data-name="ゴールド購入"
                                            data-label="¥5500"
                                            data-description="ゴールドを購入できます"
                                            data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                                            data-locale="auto"
                                            data-currency="JPY">
                                    </script>
                                    {{-- ゴールドの数値 --}}
                                    <input type="hidden" name="gold" value=5000>
                                    {{-- お金の数値 --}}
                                    <input type="hidden" name="money" value=5500>
                        </form>
                    </div>
                    {{-- それぞれの単価のボックス --}}
                    <div class="md:w-1/2 w-full flex py-4">
                        <div class="w-1/2 flex mt-1.5">
                            <img src="{{ asset('images/icons8-gold.png')}}" alt="gold" style="width: 30px; height:30px">
                            <p class="mt-1" class="inline">7000Gold</p>
                        </div>
                        <form action="{{ route('user.items.charge') }}" method="POST" class="mt-1">
                            @csrf
                            {{ csrf_field() }}
                                    <script
                                            src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                            data-key="{{ env('STRIPE_PUBLIC_KEY') }}"
                                            data-amount="7700"
                                            data-name="ゴールド購入"
                                            data-label="¥7700"
                                            data-description="ゴールドを購入できます"
                                            data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                                            data-locale="auto"
                                            data-currency="JPY">
                                    </script>
                                    {{-- ゴールドの数値 --}}
                                    <input type="hidden" name="gold" value=7000>
                                    {{-- お金の数値 --}}
                                    <input type="hidden" name="money" value=7700>
                        </form>
                    </div>
                    {{-- それぞれの単価のボックス --}}
                    <div class="md:w-1/2 w-full flex py-4">
                        <div class="w-1/2 flex mt-1.5">
                            <img src="{{ asset('images/icons8-gold.png')}}" alt="gold" style="width: 30px; height:30px">
                            <p class="mt-1" class="inline">10000Gold</p>
                        </div>
                        <form action="{{ route('user.items.charge') }}" method="POST" class="mt-1">
                            @csrf
                            {{ csrf_field() }}
                                    <script
                                            src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                            data-key="{{ env('STRIPE_PUBLIC_KEY') }}"
                                            data-amount="11000"
                                            data-name="ゴールド購入"
                                            data-label="¥11000"
                                            data-description="ゴールドを購入できます"
                                            data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                                            data-locale="auto"
                                            data-currency="JPY">
                                    </script>
                                    {{-- ゴールドの数値 --}}
                                    <input type="hidden" name="gold" value=10000>
                                    {{-- お金の数値 --}}
                                    <input type="hidden" name="money" value=11000>
                        </form>
                    </div>
                    {{-- それぞれの単価のボックス --}}
                    <div class="md:w-1/2 w-full flex py-4">
                        <div class="w-1/2 flex mt-1.5">
                            <img src="{{ asset('images/icons8-gold.png')}}" alt="gold" style="width: 30px; height:30px">
                            <p class="mt-1" class="inline">15000Gold</p>
                        </div>
                        <form action="{{ route('user.items.charge') }}" method="POST" class="mt-1">
                            @csrf
                            {{ csrf_field() }}
                                    <script
                                            src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                            data-key="{{ env('STRIPE_PUBLIC_KEY') }}"
                                            data-amount="11500"
                                            data-name="ゴールド購入"
                                            data-label="¥11500"
                                            data-description="ゴールドを購入できます"
                                            data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                                            data-locale="auto"
                                            data-currency="JPY">
                                    </script>
                                    {{-- ゴールドの数値 --}}
                                    <input type="hidden" name="gold" value=15000>
                                    {{-- お金の数値 --}}
                                    <input type="hidden" name="money" value=15500>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
