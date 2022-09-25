<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="post" action="{{ route('artist.posts.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="p-2 w-1/2 mx-auto">
                            <div class="relative">
                                <label for="name" class="leading-7 text-sm text-gray-600">アーティストネーム ※必須</label>
                                <input type="text" id="name" name="name" value="{{ Auth::user()->name }}" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                        </div>
                        <div class="p-2 w-1/2 mx-auto">
                            <div class="relative">
                                <label for="information" class="leading-7 text-sm text-gray-600">開催情報 ※必須</label>
                                <textarea id="information" rows="10" name="information" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ old('information') }}</textarea>
                            </div>
                        </div>
                        <div class="p-2 w-1/2 mx-auto">
                            <div class="relative">
                                <label for="place" class="leading-7 text-sm text-gray-600">開催場所 ※必須</label>
                                <input onchange="getLatLng()" type="text" id="place" name="place" value="{{ old('plcea') }}" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                <button id="searchGeo" onclick="search()">緯度経度変換</button>
                                緯度：<input type="text" id="lat"><br>経度：<input type="text" id="lng">
                            </div>
                        </div>
                        <div class="p-2 w-1/2 mx-auto">
                            <label for="placeMap" class="leading-7 text-sm text-gray-600">詳細開催場所 ※必須</label>
                            <input type="hidden" id="lat" name="lat" value="" size="20"><input type="hidden" id="lng" name="lng" value="" size="20">
                            <div class="map-wrap" style="height: 300px;">
                                <div id="map" class="map"></div>
                            </div>
                        </div>
                        <div class="p-2 w-1/2 mx-auto">
                            <div class="relative">
                                <label for="holdingTime" class="leading-7 text-sm text-gray-600">開催日時 ※必須</label>
                                <input type="datetime-local" name="holdingTime" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" required>
                            </div>
                        </div>
                        <div class="p-2 w-1/2 mx-auto">
                            <div class="relative">
                                <label for="finishTime" class="leading-7 text-sm text-gray-600">終了日時 ※必須</label>
                                <input type="datetime-local" name="finishTime" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" required>
                            </div>
                        </div>
                        <div class="p-2 w-1/2 mx-auto">
                            <div class="relative">
                                <label for="image" class="leading-7 text-sm text-gray-600">サムネイル画像 ※必須</label><br>
                                <input type="file" name="image" required>
                            </div>
                        </div>
                        <div>
                            @foreach($artist_profile as $profile)
                            <input type="hidden" id="userid" name="profile_id" value="{{ $profile->id }}">
                            @endforeach
                        </div>
                        <div class="p-2 w-full flex justify-around mt-4">
                            <button type="button" onclick="location.href='{{ route('artist.posts.index')}}'" class="bg-gray-200 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 rounded text-lg">戻る</button>
                            <button type="submit" class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">投稿する</button>
                        </div>
                    </form>
              </div>
            </div>
        </div>
    </div>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD4TRSMH7b3P1XSqpMikp5mrVhHHPG_ok0&callback=initMap" async defer></script>
<script>
    //住所から緯度と経度を読み取る処理↓
    function getLatLng() {
        // 入力した住所を取得します。
        var addressInput = document.getElementById('place').value;

        // Google Maps APIのジオコーダを使います。
        var geocoder = new google.maps.Geocoder();

        // ジオコーダのgeocodeを実行します。
        // 第１引数のリクエストパラメータにaddressプロパティを設定します。
        // 第２引数はコールバック関数です。取得結果を処理します。
        geocoder.geocode(
            {
                address: addressInput
            },
            function (results, status) {

                console.log(results, status)

                var latlng = "";

                if (status == google.maps.GeocoderStatus.OK) {
                    // 取得が成功した場合
                    // 結果をループして取得します。
                    for (var i in results) {
                        if (results[i].geometry) {

                            // 緯度を取得します。
                            var lat = results[i].geometry.location.lat();
                            // 経度を取得します。
                            var lng = results[i].geometry.location.lng();

                            // val()メソッドを使ってvalue値を設定できる
                            // idがlat(またはlng)のvalue値に、変数lat(またはlng)を設定する
                            document.getElementById('lat').value = lat;
                            document.getElementById('lng').value = lng;

                            // そもそも、ループを回して、検索結果にあっているものをiに入れていっているため
                            // 精度の低いものもでてきてしまう。その必要はないから、一回でbreak
                            initMap(lat,lng);
                            break;
                        }
                    }
                } else if (status == google.maps.GeocoderStatus.ZERO_RESULTS) {
                    alert("住所が見つかりませんでした。");
                } else if (status == google.maps.GeocoderStatus.ERROR) {
                    alert("サーバ接続に失敗しました。");
                } else if (status == google.maps.GeocoderStatus.INVALID_REQUEST) {
                    alert("リクエストが無効でした。");
                } else if (status == google.maps.GeocoderStatus.OVER_QUERY_LIMIT) {
                    alert("リクエストの制限回数を超えました。");
                } else if (status == google.maps.GeocoderStatus.REQUEST_DENIED) {
                    alert("サービスが使えない状態でした。");
                } else if (status == google.maps.GeocoderStatus.UNKNOWN_ERROR) {
                    alert("原因不明のエラーが発生しました。");
                }
            });
        }

        // console.log(getLatLng());

        var lat = 35.729493379635535;
        var lng = 139.71086479574538;
        var marker = null;

        function initMap(lat,lng) {
            var mapPosition = new google.maps.LatLng( lat,lng );//緯度経度
            var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 17,//ズーム
            center: mapPosition
        });
            var marker = new google.maps.Marker({
            position: mapPosition,
            map: map
            });

            map.addListener('click', function(e) {
                clickMap(e.latLng, map, marker);
            });
        }

    // window.initMap = () => {
    //     const area = document.getElementById("map"); // マップを表示させるHTMLの箱
    //     // マップの初期位置
    //     const center = {
    //     lat: lat,
    //     lng: lng,
    //     };

    //     //マップ作成
    //     map = new google.maps.Map(area, {
    //     center,
    //     zoom: 17,
    //     });

    //     //マーカーオプション設定👇追記
    //     const markerOption = {
    //         position: center, // マーカーを立てる位置を指定
    //         map: map, // マーカーを立てる地図を指定
    //     }

    //     document.getElementById('lat').value = lat;
    //     document.getElementById('lng').value = lng;
    //     //初期マーカー
    //     marker = new google.maps.Marker({
    //         map: map, position: new google.maps.LatLng(lat, lng),
    //     });


    //     map.addListener('click', function(e) {
    //         clickMap(e.latLng, map);
    //     });
    // }

    function clickMap(geo, map,marker) {
        lat = geo.lat();
        lng = geo.lng();

        //小数点以下6桁に丸める場合
        //lat = Math.floor(lat * 1000000) / 1000000);
        //lng = Math.floor(lng * 1000000) / 1000000);

        document.getElementById('lat').value = lat;
        document.getElementById('lng').value = lng;
        //中心にスクロール
        map.panTo(geo);

        //マーカーの更新

        var mapPosition = new google.maps.LatLng( lat,lng );//緯度経度

        // var marker = new google.maps.Marker({
        //     position: mapPosition,
        //     map: map
        // });

        marker.setMap(null);
        // marker = null;
        marker = new google.maps.Marker({
            map: map, position: mapPosition,
        });
   }
</script>
</x-app-layout>
