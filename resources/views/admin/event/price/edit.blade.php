@extends('admin.app')

@section('title','Bilet Düzenle')

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
                <form action="{{ route('event.ticket.price.update',$EventPrice->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="event_id" value="{{ $Event->id }}" />
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
                                                <input type="text" class="form-control" value="{{ $EventPrice->category }}" name="category"/>
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
                                                <input type="text" class="form-control" value="{{ $EventPrice->price }}" name="price"/>
                                            </div>
                                            <div class="col-md-4">
                                                <select name="currency_id" class="select2" style="width: 100%;">
                                                    @foreach($Currencies as $Currency)
                                                        <option @if($EventPrice->currency_id == $Currency->id) selected @endif value="{{ $Currency->id }}">{{ $Currency->name }}</option>
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
                                                    <option @if($EventPrice->favorite == "0") selected @endif value="0">Hayır</option>
                                                    <option @if($EventPrice->favorite == "1") selected @endif value="1">Evet</option>
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
                                                    <option @if($EventPrice->status == "Satışta") selected @endif value="Satışta">Satışta</option>
                                                    <option value="Satış Yetkisi Yok" @if($EventPrice->status == "Satış Yetkisi Yok") selected @endif>Satış Yetkisi Yok</option>
                                                    <option value="Satışa Kapalı" @if($EventPrice->status == "Satışa Kapalı") selected @endif>Satışa Kapalı</option>
                                                    <option value="Tükendi" @if($EventPrice->status == "Tükendi") selected @endif>Tükendi</option>
                                                    <option value="Sadece Gişede" @if($EventPrice->status == "Sadece Gişede") selected @endif>Sadece Gişede</option>
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
                                                <input name="stock" class="form-control" value="{{ $EventPrice->stock }}"/>
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
