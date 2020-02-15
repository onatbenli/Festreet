@extends('admin.app')

@section('title','Organizatör Düzenle')

@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('organizer.update',$Organizer->id) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3 text-right mt-2 text-bold">
                                Organizatör Adı :
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" value="{{ $Organizer->name }}" name="name"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3 text-right mt-2 text-bold">
                                Açıklama :
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-12">
                                        <textarea class="form-control" name="description">{{ $Organizer->description }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3 text-right mt-2 text-bold">
                                Bağlı Üyelik :
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-12">
                                        <select name="user_id" class="form-control">
                                            <option selected disabled>Üye Seçiniz...</option>
                                            @foreach($Users as $User)
                                                <option @if($User->id == $Organizer->user_id) selected @endif value="{{ $User->id }}">{{ $User->username }}</option>
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
@stop
