@extends('app')

@section('title',$Place->name)

@section('script')
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBo_a4kC36Uu2a7gOF9n00djf0zahAA53A&callback=initMap"  type="text/javascript"></script>
    <script>
        var map;
        var markers = [];
        function initMap() {
            var haightAshbury = {lat: {{json_decode($Place->coordinates)[0]}}, lng: {{json_decode($Place->coordinates)[1]}}};
            map = new google.maps.Map(document.getElementById('map'), {
                zoom: 13,
                center: haightAshbury,
                zoomControl: true,
                mapTypeControl: false,
                scaleControl: false,
                streetViewControl: false,
                rotateControl: false,
                fullscreenControl: false,
                disableDefaultUi: false,
                styles: [{"featureType":"all","elementType":"geometry.fill","stylers":[{"weight":"2.00"}]},{"featureType":"all","elementType":"geometry.stroke","stylers":[{"color":"#9c9c9c"}]},{"featureType":"all","elementType":"labels.text","stylers":[{"visibility":"on"}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#f2f2f2"}]},{"featureType":"landscape","elementType":"geometry.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"landscape.man_made","elementType":"geometry.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":-100},{"lightness":45}]},{"featureType":"road","elementType":"geometry.fill","stylers":[{"color":"#eeeeee"}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"color":"#7b7b7b"}]},{"featureType":"road","elementType":"labels.text.stroke","stylers":[{"color":"#ffffff"}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#46bcec"},{"visibility":"on"}]},{"featureType":"water","elementType":"geometry.fill","stylers":[{"color":"#c8d7d4"}]},{"featureType":"water","elementType":"labels.text.fill","stylers":[{"color":"#070707"}]},{"featureType":"water","elementType":"labels.text.stroke","stylers":[{"color":"#ffffff"}]}],

            });

            var marker = new google.maps.Marker({
                position: haightAshbury,
                map: map,
                icon: "{{ asset('images/map_marker.png') }}",
                title: "{{ $Place->name }}",
                animation: google.maps.Animation.DROP,
            });

        }
    </script>
@stop

@section('content')
    <div class="mb-4">
        <div id="map" class="w-full shadow-xl" style="height: 200px">
        </div>
    </div>
    <div class="container p-6">
        <div class="flex-column md:flex p-6">
            <div class="w-full md:w-1/4 mb-6">
                <div class="">
                    <h3 class="text-2xl font-normal text-black px-2 rounded-t uppercase border-b border-gray-200">{{ $Place->name }}</h3>
                    <div class="mt-4 text-sm">
                        <ul>
                            <li class="p-2"><b>Kapasite : </b>{{ number_format($Place->capacity,0,'.','.') }} Kişi</li>
                            <li class="p-2"><b>Adres : </b>{{ $Place->address }} -  {{ $Place->City->name }} / {{ $Place->Country->name }}</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="w-full md:w-3/4 ml-6 mr-6">
                <h3 class="text-2xl font-normal text-black px-2 rounded-t uppercase border-b border-gray-200">Etkinlikler</h3>
                <div class="container flex flex-wrap mt-3">
                    @forelse($Place->Events as $Event)
                        <div class="w-full p-2 rounded mb-6">
                            <div class="w-full shadow-lg rounded">
                                <div class="flex border border-gray-200 rounded hover:border-gray-300">
                                    <div class="w-full md:w-1/3">
                                        <img class="rounded-l shadow-lg w-full h-full" src="{{ asset('images/1.png') }}" />
                                    </div>

                                    <div class="w-full md:w-2/3">
                                        <a class="m-3 text-black font-normal text-lg block" href="{{ url('event/'.$Event->slug) }}">
                                            {{ $Event->title }}
                                        </a>

                                        <div class="m-3 text-sm text-justify">
                                            {{ Str::limit($Event->pre_description,250) }}
                                        </div>
                                        <div class="bg-gray-100 shadow-inner p-2 rounded-b flex text-center items-stretch">
                                            <div class="w-1/3 text-xs border-r">
                                                {{ json_decode($Event->date)[0] }}
                                            </div>
                                            <div class="w-1/3 text-xs border-r align-middle self-stretch">
                                                <a href="{{ url('place/'.$Event->place->slug)  }}">{{ $Event->place->name}}</a>
                                            </div>
                                            <div class="w-1/3 text-xs align-middle self-stretch">
                                                <a href="{{ url('organizer/'.$Event->Organizer->slug) }}">{{ $Event->Organizer->name }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <message title="Upss !" message="Bu Kategoriye Henüz Etkinlik Girilmedi" color="blue"/>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection
