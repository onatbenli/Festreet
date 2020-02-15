@extends('admin.app')

@section('title','Şehirler')

@section('content')
    <div class="col-md-12 card">
        <div class="card-header">
            <a href="{{ route('city.create') }}" class="btn btn-primary float-right">Yeni Şehir Ekle</a>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                <tr>
                    <td>#</td>
                    <td>Şehir Adı</td>
                    <td class="text-center">Ülke</td>
                    <td width="180px" class="text-center">İşlemler</td>
                </tr>
                </thead>
                <tbody>
                @foreach($Cities as $i => $City)
                    <tr>
                        <td>{{$i+1}}</td>
                        <td>{{$City->name}}</td>
                        <td class="text-center"><a href="{{ route('country.show',$City->Country->id) }}">{{ $City->Country->name }}</a></td>
                        <td>
                            <form method="post" action="{{ route('city.destroy',$City->id) }}" id="user-delete-{{ $City->id }}" name="user-delete-{{ $City->id }}">
                                @csrf
                                @method('delete')
                                <a href="{{ route('city.show',$City->id) }}" class="badge badge-info p-2">İncele</a>
                                <a href="{{ route('city.edit',$City->id) }}" class="badge badge-primary p-2">Düzenle</a>
                                <button class="badge badge-danger p-2">Sil</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div>
                {{ $Cities->links() }}
            </div>
        </div>
    </div>
@endsection
