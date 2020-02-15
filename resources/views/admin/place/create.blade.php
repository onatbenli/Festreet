@extends('admin.app')

@section('title','Yeni Mekan Ekle')

@section('script')
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBo_a4kC36Uu2a7gOF9n00djf0zahAA53A&callback=initMap"  type="text/javascript"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <script>

        var map;
        var markers = [];
        function initMap() {
            var haightAshbury = {lat: 38.769, lng: 27.446};
            map = new google.maps.Map(document.getElementById('map'), {
                zoom: 4,
                center: haightAshbury
            });
            map.addListener('click', function(event) {
                addMarker(event.latLng);
            });

        }

        function addMarker(location) {
            deleteMarkers();
            var marker = new google.maps.Marker({
                position: location,
                map: map
            });
            $("#lat").val(location.lat());
            $("#lng").val(location.lng());

            $("#lat-d").html(location.lat());
            $("#lng-d").html(location.lng());
            markers.push(marker);
        }

        function setMapOnAll(map) {
            for (var i = 0; i < markers.length; i++) {
                markers[i].setMap(map);
            }
        }

        function deleteMarkers() {
            setMapOnAll(null);
            $("#lat").val("");
            $("#lng").val("");

            $("#lat-d").html('');
            $("#lng-d").html('');
            markers = [];
        }

        function selectCountry(country){
            axios({
                method: 'get',
                url: '{{ url('query/country') }}/'+country,
            }).then((resonse) => {
                $("#city").html("");
                resonse.data.map((city) => {
                    $("#city").append('<option value="'+city.id+'">'+city.name+'</option>')
                });
                console.log(resonse.data);
            });
        }
    </script>
@endsection

@section('style')
    <style>
        #map { height: 200px; width: 100%; }
    </style>
@endsection

@section('content')

    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('place.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3 text-right mt-2 text-bold">
                                Mekanın Adı :
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" name="name"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3 text-right mt-2 text-bold">
                                Konum :
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div id="map"></div>
                                        <div class="clearfix"></div>
                                        <input id="lat" type="hidden" name="coordinates[]" />
                                        <input id="lng" type="hidden" name="coordinates[]" />
                                        <span class="badge badge-secondary" id="lat-d"></span>
                                        <span class="badge badge-secondary" id="lng-d"></span>
                                        <button type="button" class="badge badge-danger" onclick="deleteMarkers()">Clear</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3 text-right mt-2 text-bold">
                                Ülke / İl :
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-6">
                                        <select class="form-control" name="country" onchange="selectCountry(this.value)">
                                            @foreach($Countries as $Country)
                                                <option value="{{ $Country->id }}" @if($Country->name == "Türkiye") selected @endif>{{ $Country->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <select class="form-control" name="city" id="city">
                                            @foreach($Cities as $City)
                                                <option value="{{ $City->id }}">{{ $City->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3 text-right mt-2 text-bold">
                                Açık Adres :
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-12">
                                        <textarea class="form-control" name="address"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3 text-right mt-2 text-bold">
                                Seyirci Kapasitesi :
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="number" class="form-control" name="capacity"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <button class="btn btn-primary">Kaydet</button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
