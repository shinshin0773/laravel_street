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
                                <input type="text" id="place" name="place" value="{{ old('plcea') }}" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                        </div>
                        <div class="p-2 w-1/2 mx-auto">
                            <label for="placeMap" class="leading-7 text-sm text-gray-600">詳細開催場所 ※必須</label>
                            <br>緯度：<input type="text" id="lat" name="lat" value="" size="20"><br>経度：<input type="text" id="lng" name="lng" value="" size="20">
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
    var marker = null;
    var lat = 35.729493379635535;
    var lng = 139.71086479574538;

    document.getElementById('lat').value = lat;
    document.getElementById('lng').value = lng;


    window.initMap = () => {

    let map;

    const area = document.getElementById("map"); // マップを表示させるHTMLの箱
    // マップの中心位置(例:原宿駅)
    const center = {
    lat: 35.224221711180704,
    lng: 135.13545327807356,
    };

    //マップ作成
    map = new google.maps.Map(area, {
    center,
    zoom: 17,
    });

    //マーカーオプション設定👇追記
    const markerOption = {
        position: center, // マーカーを立てる位置を指定
        map: map, // マーカーを立てる地図を指定
        icon: {
        // url: '../../../public/images/icon1.png'// お好みの画像までのパスを指定
        // scaledSize: new google.maps.Size(30, 30) //👈追記
        }
    }

    //マーカー作成
    const marker = new google.maps.Marker(markerOption);

     //クリックイベント
    map.addListener('click', function(e) {
        clickMap(e.latLng, map);
    });
    }


    function clickMap(geo, map) {
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
    marker.setMap(null);
    marker = null;
    marker = new google.maps.Marker({
        map: map, position: geo
    });
}
</script>
</x-app-layout>
