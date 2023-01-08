<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('プロフィール') }}
        </h2>
    </x-slot>


    <main class="profile-page">
        <section class="relative block h-500-px" style="height: 400px;">
          <div class="absolute top-0 w-full h-full bg-center bg-cover" style="
                  background-image: url({{ asset('images/background-image.jpeg') }});
                ">
            <div id="blackOverlay" class="bg-color"></div>
          </div>
          <div class="top-auto bottom-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden h-70-px" style="transform: translateZ(0px)">
            <svg class="absolute bottom-0 overflow-hidden" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" version="1.1" viewBox="0 0 2560 100" x="0" y="0">
              <polygon class="text-blueGray-200 fill-current" points="2560 0 2560 100 0 100"></polygon>
            </svg>
          </div>
        </section>
        <section class="relative py-16 bg-blueGray-200">
          <div class="container mx-auto px-4">
            <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-xl rounded-lg -mt-64">
              <div class="px-6">
                <div class="flex flex-wrap justify-center">
                  <div class="w-full lg:w-3/12 px-4 lg:order-2 flex justify-center">
                    <div class="relative">
                        {{ $image }}
                      {{-- <img alt="..." src="" class="shadow-xl rounded-full h-auto align-middle border-none absolute -m-16 -ml-20 lg:-ml-16 max-w-150-px" style="width: 150px;height:150px; border-radius:50%;"> --}}
                    </div>
                  </div>
                  <div class="w-full lg:w-4/12 px-4 lg:order-3 lg:text-right lg:self-center">
                    <div class="py-6 px-3 mt-32 sm:mt-0">
                      {{ $button }}
                      {{-- <button onclick="location.href='{{ route('user.profile.edit') }}'" class="bg-pink-500 active:bg-pink-600 uppercase text-white font-bold hover:shadow-md shadow text-xs px-4 py-2 rounded outline-none focus:outline-none sm:mr-2 mb-1 ease-linear transition-all duration-150" type="button">
                        編集
                      </button> --}}
                    </div>
                  </div>
                  <div class="w-full lg:w-4/12 px-4 lg:order-1">
                    <div class="flex justify-center py-4 lg:pt-4 pt-8">
                      {{ $count }}
                    </div>
                  </div>
                </div>
                <div class="text-center mt-12">
                  <h3 class="text-4xl font-semibold leading-normal mb-2 text-blueGray-700 mb-2">
                    {{ $name }}
                  </h3>
                  <div class="text-sm leading-normal mt-0 mb-2 text-blueGray-400 font-bold uppercase">
                    <img src="{{ asset('images/twitter-icon.png')}}" alt="icon" class="fas fa-map-marker-alt mr-2 text-lg text-blueGray-400"  style="width: 20px;height:20px;">
                    {{ $snsAccount }}
                  </div>
                </div>
                <div class="mt-10 py-10 border-t border-blueGray-200 text-center">
                  <div class="flex flex-wrap justify-center">
                    <div class="w-full lg:w-9/12 px-4">
                      <p class="mb-4 text-lg leading-relaxed text-blueGray-700">
                        {{ $information }}
                      </p>
                    </div>
                  </div>
                </div>
                <div class="mb-5">
                    {{ $list }}
                </div>
                <div class="mb-5">
                    {{ $contents }}
                </div>
              </div>
            </div>
          </div>
          <footer class="relative bg-blueGray-200 pt-8 pb-6 mt-8">
        <div class="container mx-auto px-4">
          <div class="flex flex-wrap items-center md:justify-between justify-center">
            <div class="w-full md:w-6/12 px-4 mx-auto text-center">
              <div class="text-sm text-blueGray-500 font-semibold py-1">
                Made with <a href="https://www.creative-tim.com/product/notus-js" class="text-blueGray-500 hover:text-gray-800" target="_blank">Notus JS</a> by <a href="https://www.creative-tim.com" class="text-blueGray-500 hover:text-blueGray-800" target="_blank"> Creative Tim</a>.
              </div>
            </div>
          </div>
        </div>
      </footer>
        </section>
      </main>
</x-app-layout>
