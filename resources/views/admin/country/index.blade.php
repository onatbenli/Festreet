@extends('admin.app')

@section('title','Ülkeler')

@section('content')
    <div class="col-md-12 card">
        <div class="card-header">
            <a href="{{ route('country.create') }}" class="btn btn-primary float-right">Yeni Ülke Ekle</a>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                <tr>
                    <td>#</td>
                    <td>Ülke Adı</td>
                    <td>Kısa Adı</td>
                    <td>Telefon Kodu</td>
                    <td class="text-center">Şehir Sayısı</td>
                    <td width="180px" class="text-center">İşlemler</td>
                </tr>
                </thead>
                <tbody>
                @foreach($Countries as $i => $Country)
                    <tr>
                        <td>{{$i+1}}</td>
                        <td>{{$Country->name}}</td>
                        <td>{{$Country->sort_name}}</td>
                        <td>{{$Country->phone_code}}</td>
                        <td class="text-center">
                            {{ $Country->Cities()->count() }}
                        </td>
                        <td>
                            <form method="post" action="{{ route('country.destroy',$Country->id) }}" id="user-delete-{{ $Country->id }}" name="user-delete-{{ $Country->id }}">
                                @csrf
                                @method('delete')
                                <a href="{{ route('country.show',$Country->id) }}" class="badge badge-info p-2">Şehirler</a>
                                <a href="{{ route('country.edit',$Country->id) }}" class="badge badge-primary p-2">Düzenle</a>
                                <button class="badge badge-danger p-2">Sil</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div>
                {{ $Countries->links() }}
            </div>
        </div>
    </div>
@endsection
