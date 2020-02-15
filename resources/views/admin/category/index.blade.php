@extends('admin.app')

@section('title','Etkinlik Kategorileri')

@section('content')
    <div class="col-md-12 card">
        <div class="card-header">
            <a href="{{ route('category.create') }}" class="btn btn-primary float-right">Yeni Kategori Ekle</a>

        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                <tr>
                    <td>#</td>
                    <td>Kategori Adı</td>
                    <td class="text-center">Üst Kategori</td>
                    <td width="180px" class="text-center">İşlemler</td>
                </tr>
                </thead>
                <tbody>
                @foreach($Categories as $i => $Category)
                    <tr>
                        <td>{{$i+1}}</td>
                        <td>{{$Category->category_name}}</td>
                        <td class="text-center">@if($Category->sub_category != "") <a href="{{ route('category.show',$Category->SubCategory->id) }}">{{ $Category->SubCategory->category_name }}</a> @else <i class="text-danger fas fa-times"></i> @endif</td>
                        <td>
                            <form method="post" action="{{ route('category.destroy',$Category->id) }}" id="user-delete-{{ $Category->id }}" name="user-delete-{{ $Category->id }}">
                                @csrf
                                @method('delete')
                                <a href="{{ route('category.show',$Category->id) }}" class="badge badge-info p-2">İncele</a>
                                <a href="{{ route('category.edit',$Category->id) }}" class="badge badge-primary p-2">Düzenle</a>
                                <button class="badge badge-danger p-2">Sil</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div>
                {{ $Categories->links() }}
            </div>
        </div>
    </div>
@endsection
