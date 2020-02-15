@extends('admin.app')

@section('title','Mekanlar')

@section('content')
    <div class="col-md-12 card">
        <div class="card-header">
            <a href="{{ route('place.create') }}" class="btn btn-primary float-right">Yeni Mekan Ekle</a>

        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                <tr>
                    <td>#</td>
                    <td>Mekan Adı</td>
                    <td>Ülke / İl</td>
                    <td>Adres</td>
                    <td width="120px" class="text-center">İşlemler</td>
                </tr>
                </thead>
                <tbody>
                @foreach($Places as $Place)
                    <tr>
                        <td>{{$Place->id}}</td>
                        <td>{{$Place->name}}</td>
                        <td>{{$Place->Country->name.'/'.$Place->City->name}}</td>
                        <td>{{$Place->address}}</td>
                        <td>
                            <form method="post" action="{{ route('place.destroy',$Place->id) }}" id="user-delete-{{ $Place->id }}" name="user-delete-{{ $Place->id }}">
                                @csrf
                                @method('delete')
                                <a href="{{ route('place.edit',$Place->id) }}" class="badge badge-primary p-2">Düzenle</a>
                                <button class="badge badge-danger p-2">Sil</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="text-center">
                {{ $Places->links() }}
            </div>
        </div>
    </div>
@endsection
