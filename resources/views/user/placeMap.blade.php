<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
           開催地Map
        </h2>
    </x-slot>

    <div class="py-12">
        <!-- ローディング画面 -->
        <div id="loading-wrapper">
            <div class="loader"></div>
            <p>Loading...</p>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1>開催地</h1>
                <div class="map-wrap">
                    <div id="loading-wrapper">
                        <div class="loader"></div>
                    </div>
                    <div id="map" class="map"></div>
                </div>
            </div>
        </div>
    </div>
<script>
    var map;
    var marker = [];
    var infoWindow = [];

    //postコントローラーから全てのポスト取得
    var markerData = @json($posts);;

    function initMap() {
         //ユーザーの現在位置を取得します・許可すればsuccess関数,許可しなければfail関数
     navigator.geolocation.getCurrentPosition(success, fail);
        function success(pos) {
            var nowlat = pos.coords.latitude;
            var nowlng = pos.coords.longitude;
            var nowlatlng = new google.maps.LatLng(nowlat, nowlng); //中心の緯度, 経度
            console.log(nowlat);
            // var map = new google.maps.Map(document.getElementById('map'), {
            // 	zoom: 17,
            // 	center: nowlatlng
            // });
            // var marker = new google.maps.Marker({
            //     position: nowlatlng, //マーカーの位置（必須）
            //     map: map //マーカーを表示する地図
            // });

            // 地図の作成
            var mapLatLng = new google.maps.LatLng({lat: nowlat, lng: nowlng}); // 緯度経度のデータ作成
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
                        '<div><a href=/show/' + markerData[i]['id'] + '}>'
                        + markerData[i]['name'] + '<br>'
                        + markerData[i]['information'] + '<br>' +
                        '</a><a style="color: blue" href="https://www.google.co.jp/maps/?q='+ markerData[i]['lat'] + ',' + markerData[i]['lng'] + '" target="_blank" rel="noopener noreferrer">GoogleMapで確認する</a></div>'
                    });
                markerEvent(i); // マーカーにクリックイベント追加
            }

            marker[0].setOptions({// TAM 東京のマーカーのオプション設定
                    icon: 'https://images.app.goo.gl/4ep4rovy9wYffoXw8'
            });
            //マーカーオプション設定👇追記
            const markerOption = {
            //   position: center, // マーカーを立てる位置を指定
              map: map, // マーカーを立てる地図を指定
              icon: {
                url: 'storage/app/public/透過アイコン.png' // お好みの画像までのパスを指定
              }
            }

            // マーカーにクリックイベントを追加
            function markerEvent(i) {
                    marker[i].addListener('click', function() { // マーカーをクリックしたとき
                    infoWindow[i].open(map, marker[i]); // 吹き出しの表示
                });
            }

            const loader = document.getElementById('loading-wrapper');
            loader.classList.add('completed');
     }


    function fail(error) {
		alert('位置情報の取得に失敗しました。エラーコード：' + error.code);
		var latlng = new google.maps.LatLng(35.6812405, 139.7649361); //東京駅
		// var map = new google.maps.Map(document.getElementById('maps'), {
		// 	zoom: 10,
		// 	center: latlng
		// });

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
                        // markerOption,
                        position: markerLatLng, // マーカーを立てる位置を指定
                        map: map // マーカーを立てる地図を指定
                });

                infoWindow[i] = new google.maps.InfoWindow({ // 吹き出しの追加
                    content:
                        '<a href=/public/show/' + markerData[i]['id'] + '}>'
                        + markerData[i]['name'] + '<br>'
                        + markerData[i]['information'] + '<br>' +
                        '</a>'
                    });
                markerEvent(i); // マーカーにクリックイベントを追加
            }

            marker[0].setOptions({// TAM 東京のマーカーのオプション設定
                    icon: 'https://images.app.goo.gl/4ep4rovy9wYffoXw8'
            });
            //マーカーオプション設定👇追記
            // const markerOption = {
            //   position: center, // マーカーを立てる位置を指定
            //   map: map, // マーカーを立てる地図を指定
            //   icon: {
            //     url: 'storage/app/public/non-icon.png'// お好みの画像までのパスを指定
            //   }
            // }

            // マーカーにクリックイベントを追加
            function markerEvent(i) {
                    marker[i].addListener('click', function() { // マーカーをクリックしたとき
                    infoWindow[i].open(map, marker[i]); // 吹き出しの表示
                });
            }
    }

  }


</script>
</x-app-layout>
