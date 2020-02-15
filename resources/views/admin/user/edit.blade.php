@extends('admin.app')

@section('title','Kullanıcı Düzenle')

@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">

                <form action="{{ route('user.update',$User->id) }}" method="post">
                    @csrf
                    @method('PUT')
                 <div class="form-group">
                    <div class="row">
                        <div class="col-md-3 text-right mt-2 text-bold">
                            Adı - Soyadı :
                        </div>
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" class="form-control" value="{{$User->first_name}}" name="first_name"/>
                                </div>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" value="{{$User->last_name}}" name="last_name"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3 text-right mt-2 text-bold">
                            Kullanıcı Adı :
                        </div>
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" value="{{$User->username}}" name="username"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3 text-right mt-2 text-bold">
                            Email Adresi :
                        </div>
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" value="{{$User->email}}" name="email"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3 text-right mt-2 text-bold">
                            Telefon Numarası :
                        </div>
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" value="{{$User->phone_number}}" name="phone_number"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3 text-right mt-2 text-bold">
                            Doğum Tarihi :
                        </div>
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" value="{{$User->birthday}}" name="birthday"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3 text-right mt-2 text-bold">
                            Yetki Seviyesi :
                        </div>
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-12">
                                    <select name="type" class="form-control">
                                        <option value="user" @if($User->type == "user") selected @endif>User</option>
                                        <option value="organizer" @if($User->type == "organizer") selected @endif>Organizer</option>
                                        <option value="editor" @if($User->type == "editor") selected @endif>Editor</option>
                                        <option value="admin" @if($User->type == "admin") selected @endif>Admin</option>
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
