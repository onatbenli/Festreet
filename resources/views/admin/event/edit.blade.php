@extends('admin.app')

@section('title','Etkinlik Düzenle')

@section('script')
    <script src="{{ asset('admin/bower_components/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('admin/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="{{ asset('admin/plugins/moment/moment.min.js')}}"></script>
    <script src="{{ asset('admin/plugins/daterangepicker/daterangepicker.js')}}"></script>
    <script src="{{ asset('admin/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>


    <script>
        $(function () {
            CKEDITOR.replace('editor1');
            CKEDITOR.replace('editor2');
            CKEDITOR.replace('editor3');
            $('.select2').select2();
            bsCustomFileInput.init();
            $('#dates').daterangepicker({
                timePicker: true,
                startDate: "{{ json_decode($Event->date)[0] }}",
                endDate: "{{ json_decode($Event->date)[1] }}",
                timePickerIncrement: 30,
                timePicker24Hour: true,
                timePickerIncrement: 10,
                locale: {
                    format: 'DD.MM.YYYY HH:mm'
                }
            })
        });

        function getSubCategory(category){
            $('#category').empty();
            axios({
                method: 'get',
                url: '{{ url('query/sub_category') }}/'+category,
            }).then((response) => {
                var newOption = new Option("Alt Kategori Yok", "", true, true);
                $('#category').append(newOption).trigger('change');
                response.data.map((sub_category)=>{
                    var newOption = new Option(sub_category.category_name, sub_category.id, false, false);
                    $('#category').append(newOption).trigger('change');
                });
            });
        }

        function getPlaces(city){
            $('#place').empty();
            axios({
                method: 'get',
                url: '{{ url('query/place') }}/'+city,
            }).then((response) => {
                var newOption = new Option("Mekan Seçiniz...", "", true, true);
                $('#place').append(newOption).trigger('change');
                if(response.data == ""){
                    alert("Bu ilde herhangi bir mekan bulunmuyor. Lütfen önce mekan ekleyin.");
                }else{
                    response.data.map((place)=>{
                        var newOption = new Option(place.name, place.id, false, false);
                        $('#place').append(newOption).trigger('change');
                    });
                }

            });
        }

        function getCities(country){
            $('#place').empty();
            $('#city').empty();

            axios({
                method: 'get',
                url: '{{ url('query/country') }}/'+country,
            }).then((response) => {
                var newOption = new Option("Şehir Seçiniz...", "", true, true);
                $('#city').append(newOption).trigger('change');
                response.data.map((city)=>{
                    var newOption = new Option(city.name, city.id, false, false);
                    $('#city').append(newOption).trigger('change');
                });
            });
        }
    </script>
@stop

@section('style')
    <link rel="stylesheet" href="{{ asset('admin/bower_components/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/daterangepicker/daterangepicker.css')}}">

@stop

@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('event.update',$Event->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2 text-right mt-2 text-bold">
                                        Başlık :
                                    </div>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input type="text" class="form-control" value="{{ $Event->title }}" name="title"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2 text-right mt-2 text-bold">
                                        Ön Açıklama :
                                    </div>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <textarea name="pre_description" class="form-control">{{ $Event->pre_description }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2 text-right mt-2 text-bold">
                                        Detay :
                                    </div>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <textarea id="editor1" name="description">{{ $Event->description }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2 text-right mt-2 text-bold">
                                        Kurallar :
                                    </div>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <textarea id="editor2" name="rules">{{ $Event->rules }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2 text-right mt-2 text-bold">
                                        Kategori :
                                    </div>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <select name="category" class="form-control select2" onchange="getSubCategory(this.value)" style="width: 100%;">
                                                    <option selected disabled>Ana Kategori Seçiniz.</option>
                                                    @foreach($Categories as $Category)
                                                        <option
                                                            @if($Category->id == $Event->category) selected @endif
                                                            value="{{ $Category->id }}">{{ $Category->category_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-md-6">
                                                <select name="sub_category" class="form-control select2" id="category" style="width: 100%; height: 60px;">
                                                    @foreach($SubCategories as $SubCategory)
                                                        <option
                                                            @if($SubCategory->id == $Event->sub_category) selected @endif
                                                        value="{{ $SubCategory->id }}">{{ $SubCategory->category_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-2 text-right mt-2 text-bold">
                                            Tarih :
                                        </div>
                                        <div class="col-md-10">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <input type="text" id="dates" class="form-control" name="dates" value="{{ $Event->date }}"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2 text-right mt-2 text-bold">
                                        Organizatör :
                                    </div>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <select name="organizer" class="form-control select2" style="width: 100%;">
                                                    @foreach($Organizers as $Organizer)
                                                        <option
                                                            @if($Organizer->id == $Event->organizer) selected @endif
                                                            value="{{ $Organizer->id }}">
                                                                {{ $Organizer->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2 text-right mt-2 text-bold">
                                        Mekan :
                                    </div>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <select class="form-control select2" onchange="getCities(this.value)" id="country" style="width: 100%;">
                                                    <option selected disabled>Ülke</option>
                                                    @foreach($Countries as $Country)
                                                        <option @if($Country->id == $Event->Place->country) selected @endif value="{{ $Country->id }}">{{ $Country->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-md-4">
                                                <select class="form-control select2" onchange="getPlaces(this.value)" id="city" style="width: 100%;">
                                                    <option selected disabled>Şehir Seçiniz...</option>
                                                    @foreach($Cities as $City)
                                                        <option @if($City->id == $Event->Place->city) selected @endif value="{{ $City->id }}">{{ $City->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-md-4">
                                                <select name="place_id" class="form-control select2" id="place" style="width: 100%;">
                                                    <option selected disabled>Mekan</option>
                                                    @foreach($Places as $Place)
                                                        <option @if($Place->id == $Event->place_id) selected @endif  value="{{ $Place->id }}">{{ $Place->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2 text-right mt-2 text-bold">
                                        Poster :
                                    </div>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="poster" id="customFile">
                                                    <label class="custom-file-label" for="customFile">Dosya Seç</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2 text-right mt-2 text-bold">
                                        Tavsiyeler :
                                    </div>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <textarea id="editor3" name="trick">{{ $Event->trick }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mt-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-success float-right">Kaydet</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
