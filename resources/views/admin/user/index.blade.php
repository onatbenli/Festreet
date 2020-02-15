@extends('admin.app')

@section('title','Kullanıcılar')

@section('content')
    <div class="col-md-12 card">
        <div class="card-header">
            <a href="{{ route('user.create') }}" class="btn btn-primary float-right">Yeni Kullanıcı Ekle</a>

        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                <tr>
                    <td>#</td>
                    <td>Kullanıcı Adı</td>
                    <td>E-posta</td>
                    <td>Tipi</td>
                    <td class="text-center">Kayıt Tarihi</td>
                    <td width="180px" class="text-center">İşlemler</td>
                </tr>
                </thead>
                <tbody>
                @foreach($Users as $User)
                    <tr>
                        <td>{{$User->id}}</td>
                        <td>{{$User->username}}</td>
                        <td>{{$User->email}}</td>
                        <td>{{$User->type}}</td>
                        <td class="text-center">{{$User->created_at->format('d.m.Y H:i')}}</td>
                        <td>
                            <form method="post" action="{{ route('user.destroy',$User->id) }}" id="user-delete-{{ $User->id }}" name="user-delete-{{ $User->id }}">
                                @csrf
                                @method('delete')
                                <a href="{{ route('user.show',$User->id) }}" class="badge badge-info p-2">İncele</a>
                                <a href="{{ route('user.edit',$User->id) }}" class="badge badge-primary p-2">Düzenle</a>
                                <button class="badge badge-danger p-2">Sil</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="text-center">
                {{ $Users->links() }}
            </div>
        </div>
    </div>
@stop
