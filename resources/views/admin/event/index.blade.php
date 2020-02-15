@extends('admin.app')

@section('title','Etkinlikler')

@section('content')
    <div class="col-md-12 card">
        <div class="card-header">
            <a href="{{ route('event.create') }}" class="btn btn-primary float-right">Yeni Etkinlik Ekle</a>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                <tr class="text-bold">
                    <td>#</td>
                    <td>Etkinlik Adı</td>
                    <td>Ülke / Şehir</td>
                    <td>Organizatör</td>
                    <td>Kategori</td>
                    <td width="120px" class="text-center"></td>
                </tr>
                </thead>
                <tbody>
                @foreach($Events as $i => $Event)
                    <tr>
                        <td>{{$i+1}}</td>
                        <td>{{$Event->title}}</td>
                        <td>{{$Event->Place->Country->name.' / '.$Event->Place->City->name}}</td>
                        <td>{{$Event->Organizer->name}}</td>
                        <td>
                            {{ $Event->Category->category_name }}
                        </td>
                        <td>
                            <form method="post" action="{{ route('event.destroy',$Event->id) }}" id="user-delete-{{ $Event->id }}" name="user-delete-{{ $Event->id }}">
                                @csrf
                                @method('delete')
                                <div class="btn-group">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ route('event.ticket.price',$Event->id) }}">Bilet Fiyatları</a>
                                            <a class="dropdown-item" href="#">Bilet Satışı</a>
                                        </div>
                                    </div>
                                    <button onclick='window.location.replace("{{ route('event.edit',$Event->id) }}")' type="button" class="btn btn-sm btn-primary">Düzenle</button>
                                    <button class="btn btn-sm btn-danger">Sil</button>
                                </div>

                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div>
                {{ $Events->links() }}
            </div>
        </div>
    </div>
@endsection
