@extends('app')

@section('title')
    Hoş Geldiniz
@stop

@section('script')
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBo_a4kC36Uu2a7gOF9n00djf0zahAA53A&callback=initMap"  type="text/javascript"></script>
    <script>
        var map;
        var markers = [];
        function initMap() {
            var haightAshbury = {lat: 38.83070624776098, lng: 30.134732054021182};
            map = new google.maps.Map(document.getElementById('map'), {
                zoom: 6,
                styles: [ { "featureType": "administrative", "elementType": "labels.text.fill", "stylers": [ { "color": "#6195a0" } ] }, { "featureType": "administrative.province", "elementType": "geometry.stroke", "stylers": [ { "visibility": "off" } ] }, { "featureType": "landscape", "elementType": "geometry", "stylers": [ { "lightness": "0" }, { "saturation": "0" }, { "color": "#f5f5f2" }, { "gamma": "1" } ] }, { "featureType": "landscape.man_made", "elementType": "all", "stylers": [ { "lightness": "-3" }, { "gamma": "1.00" } ] }, { "featureType": "landscape.natural.terrain", "elementType": "all", "stylers": [ { "visibility": "off" } ] }, { "featureType": "poi", "elementType": "all", "stylers": [ { "visibility": "off" } ] }, { "featureType": "poi.park", "elementType": "geometry.fill", "stylers": [ { "color": "#bae5ce" }, { "visibility": "on" } ] }, { "featureType": "road", "elementType": "all", "stylers": [ { "saturation": -100 }, { "lightness": 45 }, { "visibility": "simplified" } ] }, { "featureType": "road.highway", "elementType": "all", "stylers": [ { "visibility": "simplified" } ] }, { "featureType": "road.highway", "elementType": "geometry.fill", "stylers": [ { "color": "#fac9a9" }, { "visibility": "simplified" } ] }, { "featureType": "road.highway", "elementType": "labels.text", "stylers": [ { "color": "#4e4e4e" } ] }, { "featureType": "road.arterial", "elementType": "labels.text.fill", "stylers": [ { "color": "#787878" } ] }, { "featureType": "road.arterial", "elementType": "labels.icon", "stylers": [ { "visibility": "off" } ] }, { "featureType": "transit", "elementType": "all", "stylers": [ { "visibility": "simplified" } ] }, { "featureType": "transit.station.airport", "elementType": "labels.icon", "stylers": [ { "hue": "#0a00ff" }, { "saturation": "-77" }, { "gamma": "0.57" }, { "lightness": "0" } ] }, { "featureType": "transit.station.rail", "elementType": "labels.text.fill", "stylers": [ { "color": "#43321e" } ] }, { "featureType": "transit.station.rail", "elementType": "labels.icon", "stylers": [ { "hue": "#ff6c00" }, { "lightness": "4" }, { "gamma": "0.75" }, { "saturation": "-68" } ] }, { "featureType": "water", "elementType": "all", "stylers": [ { "color": "#eaf6f8" }, { "visibility": "on" } ] }, { "featureType": "water", "elementType": "geometry.fill", "stylers": [ { "color": "#c7eced" } ] }, { "featureType": "water", "elementType": "labels.text.fill", "stylers": [ { "lightness": "-49" }, { "saturation": "-53" }, { "gamma": "0.79" } ] } ],
                center: haightAshbury,
                zoomControl: true,
                mapTypeControl: false,
                scaleControl: false,
                streetViewControl: false,
                rotateControl: false,
                fullscreenControl: false,
                disableDefaultUi: false
            });
            
            @foreach($Events as $UID => $Event)
                var marker_{{$UID}} = new google.maps.Marker({
                    position: {lat: {{ json_decode($Event->place->coordinates)[0] }}, lng: {{ json_decode($Event->place->coordinates)[1] }} },
                    map: map,
                    icon: "{{ asset('images/map_marker.svg') }}",
                    animation: google.maps.Animation.DROP,
                    title: '{{ $Event->title }}',
                });

                var infowindow_{{$UID}} = new google.maps.InfoWindow({
                    content: marker_{{$UID}}.title
                });

                marker_{{$UID}}.addListener('click', function() {
                    infowindow_{{$UID}}.open(map, marker_{{$UID}});
                });

            @endforeach



        }
    </script>
@stop

@section('content')
    <div class="container w-full z-0 relative" style="height: 500px">
        <div class="invisible md:visible sm:visible lg:visible xl:visible absolute w-full" style="z-index: -1;">
            <div class="full-w" id="map" style="height: 500px;"></div>
        </div>

        <div class="sm:w-1/4 md:w-1/4 lg:w-1/4 w-full bg-white h-full p-2 z-10 md:ml-6 shadow-2xl">
            <form action="{{ route('search.plan') }}" method="post">
                @csrf
                <div class="text-lg ml-2 mt-6">
                    <span class="block">Çevrenizdeki en iyi etkinlikleri bulun</span><span class="text-sm"> ve biraz eğlenin 🎉</span>
                </div>

                <div class="mt-2 mx-2 mt-6 pt-2">
                    <span class="text-black text-sm">
                        <font-awesome name="map-marker-alt"></font-awesome>
                        <span> Nerede ? </span>
                        <input name="place" class="mt-2 appearance-none border-b-2 border-gray-400 w-full py-2 px-3 text-black placeholder-gray-500 focus:border-black leading-tight focus:outline-none" id="where" placeholder="Bir Mekan veya Şehir Yazınız" />
                    </span>
                </div>
                <div class="mx-2 mt-6">
                    <span class="text-black mt-4 text-sm">
                        <font-awesome name="calendar-alt"></font-awesome>
                        <span> Ne Zaman ? </span> <br>
                        <date-picker
                            name="date"
                            v-model="time1"
                            format="DD.MM.YYYY"
                            placeholder="Tarih Seçiniz"
                            class="mt-2 border-0 border-b-2 border-gray-400 w-full appearance-none rounded-0 placeholder-gray-300 focus:border-black leading-tight focus:outline-none"
                        ></date-picker>
                    </span>
                </div>

                <div class="ml-2 mt-6 flex flex-wrap">
                    <div class="w-1/2">
                        <span class="text-black mt-4 text-sm flex-wrap mr-5">
                            <font-awesome name="wallet"></font-awesome>
                            <span> Bütçe </span>
                            <div class="block relative pt-3 mr-2">
                                <select name="budget" class="block appearance-none w-full bg-gray-300 text-white-50 focus:outline-none p-2 leading-tight">
                                    <option value="1">Öğrenci</option>
                                    <option value="1">Düşük</option>
                                    <option value="1">Normal</option>
                                    <option value="1">Yüksek</option>
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 pt-3 text-gray-700">
                                  <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                </div>
                            </div>
                        </span>
                    </div>

                    <div class="w-1/2">
                        <span class="text-black mt-4 text-sm ml-5">
                            <font-awesome name="tag"></font-awesome>
                            <span> Etiket </span>
                            <div class="block ml-2 relative pt-3">
                                <select name="tag" class="block appearance-none w-full bg-gray-300 focus:outline-none p-2 leading-tight">
                                    @foreach($MainCategories as $Category)
                                        <option value="{{ $Category->id }}">{{ $Category->category_name }}</option>
                                    @endforeach
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 pt-3 text-gray-700">
                                  <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                </div>
                            </div>
                        </span>
                    </div>
                </div>
                <button class="rounded bg-black block w-full text-white p-1 text-center mb-4 mt-3 shadow hover:bg-gray-900 font-thin cursor-pointer transition-bg focus:outline-none" type="submit">Etkinlik Bul</button>
                <p class="text-xs">* arama yapmanız durumunda gizlilik sözleşmesini kabul etmiş sayılırsınız.</p>
            </form>
        </div>
    </div>
@stop
