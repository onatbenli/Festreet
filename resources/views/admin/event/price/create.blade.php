@extends('admin.app')

@section('title','Yeni Bilet Ekle')

@section('script')
    <script src="{{ asset('admin/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
    <script>
        $(function () {
            $('.select2').select2();
        });
    </script>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('admin/bower_components/select2/dist/css/select2.min.css') }}">
@stop

@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('event.ticket.price.store',$Event->id) }}" method="post">
                    @csrf
                    <input type="hidden" value="{{$Event->id}}" name="event_id"/>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2 text-right mt-2 text-bold">
                                        Etkinlik :
                                    </div>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input type="text" class="form-control" disabled value="{{ $Event->title }}"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2 text-right mt-2 text-bold">
                                        Bilet Kategorisi :
                                    </div>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input type="text" class="form-control" name="category"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2 text-right mt-2 text-bold">
                                        Bilet Ücreti :
                                    </div>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" name="price"/>
                                            </div>
                                            <div class="col-md-4">
                                                <select name="currency_id" class="select2" style="width: 100%;">
                                                    @foreach($Currencies as $Currency)
                                                        <option value="{{ $Currency->id }}">{{ $Currency->name }}</option>
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
                                        Favori Bilet :
                                    </div>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <select name="favorite" class="select2" style="width: 100%;">
                                                    <option value="0">Hayır</option>
                                                    <option value="1">Evet</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2 text-right mt-2 text-bold">
                                        Satış Durumu :
                                    </div>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <select name="status" class="select2" style="width: 100%;">
                                                    <option value="Satışta">Satışta</option>
                                                    <option value="Satış Yetkisi Yok" selected>Satış Yetkisi Yok</option>
                                                    <option value="Satışa Kapalı">Satışa Kapalı</option>
                                                    <option value="Tükendi">Tükendi</option>
                                                    <option value="Sadece Gişede">Sadece Gişede</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2 text-right mt-2 text-bold">
                                        Bilet Sayısı :
                                    </div>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input name="stock" class="form-control" />
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
