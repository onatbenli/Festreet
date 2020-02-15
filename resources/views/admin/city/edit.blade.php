@extends('admin.app')

@section('title','Şehir Düzenle')

@section('content')

    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('city.update',$City->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3 text-right mt-2 text-bold">
                                Şehir Adı :
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" value="{{$City->name}}" name="name"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3 text-right mt-2 text-bold">
                                Ülke :
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-12">
                                        <select name="country_id" class="form-control">
                                            <option selected disabled>Bir Ülke Seçiniz.</option>
                                            @foreach($Countries as $Country)
                                                <option @if($Country->id == $City->country_id) selected @endif value="{{ $Country->id }}">{{ $Country->name }}</option>
                                            @endforeach
                                        </select>
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
