<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
           開催地Map
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1>開催地</h1>
            {{-- <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                {{-- <div class="p-6 bg-white border-b border-gray-200">
                    <img src="{{ asset('images/Map.png')}}" alt="Map">
                </div> --}}

                <div class="map-wrap">
                    <div id="map" class="map"></div>
                </div>
            </div> --}}
        </div>
    </div>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD4TRSMH7b3P1XSqpMikp5mrVhHHPG_ok0&callback=initMap" async defer></script>
<script>
    // window.initMap = () => {

    // let map;



    // const area = document.getElementById("map"); // マップを表示させるHTMLの箱
    // // マップの中心位置(例:原宿駅)
    // const center = {
    // lat: postLat,
    // lng: postLng,
    // };

    // //マップ作成
    // map = new google.maps.Map(area, {
    // center,
    // zoom: 17,
    // });

    // //マーカーオプション設定👇追記
    // const markerOption = {
    //   position: center, // マーカーを立てる位置を指定
    //   map: map, // マーカーを立てる地図を指定
    //   icon: {
    //     // url: '../../../public/images/icon1.png'// お好みの画像までのパスを指定
    //     // scaledSize: new google.maps.Size(30, 30) //👈追記
    //   }
    // }

    // //マーカー作成
    // const marker = new google.maps.Marker(markerOption);
    // }
</script>
</x-app-layout>
