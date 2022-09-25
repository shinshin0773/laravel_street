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
            </div>
        </div>
    </div>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD4TRSMH7b3P1XSqpMikp5mrVhHHPG_ok0&callback=initMap" async defer></script>
<script>
    var map;
    var marker = [];
    var infoWindow = [];

    //コントローラーから全てのポスト取得
    var postplace = @json($posts);

    var markerData = postplace;

    function initMap() {
    // 地図の作成
        var mapLatLng = new google.maps.LatLng({lat: markerData[0]['lat'], lng: markerData[0]['lng']}); // 緯度経度のデータ作成
        map = new google.maps.Map(document.getElementById('map'), { // #sampleに地図を埋め込む
        center: mapLatLng, // 地図の中心を指定
        zoom: 15 // 地図のズームを指定
    });

   // マーカー毎の処理
   for (var i = 0; i < markerData.length; i++) {
        markerLatLng = new google.maps.LatLng({lat: markerData[i]['lat'], lng: markerData[i]['lng']}); // 緯度経度のデータ作成
        marker[i] = new google.maps.Marker({ // マーカーの追加
         position: markerLatLng, // マーカーを立てる位置を指定
            map: map // マーカーを立てる地図を指定
       });


     infoWindow[i] = new google.maps.InfoWindow({ // 吹き出しの追加
         content:
            '<a href=/show/' + markerData[i]['id'] + '}>'
             + markerData[i]['name'] + '<br>'
             + markerData[i]['information'] + '<br>' +
            '</a>'
       });

     markerEvent(i); // マーカーにクリックイベントを追加
    }

    marker[0].setOptions({// TAM 東京のマーカーのオプション設定
            icon: 'https://images.app.goo.gl/4ep4rovy9wYffoXw8',

    });
    //マーカーオプション設定👇追記
    // const markerOption = {
    //   position: center, // マーカーを立てる位置を指定
    //   map: map, // マーカーを立てる地図を指定
    //   icon: {
    //     url: 'storage/app/public/non-icon.png'// お好みの画像までのパスを指定
    //   }
    // }
    }

    // マーカーにクリックイベントを追加
    function markerEvent(i) {
        marker[i].addListener('click', function() { // マーカーをクリックしたとき
        infoWindow[i].open(map, marker[i]); // 吹き出しの表示
    });
    }
</script>
</x-app-layout>
