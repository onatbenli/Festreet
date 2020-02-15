@extends('admin.app')

@section('title','Organizatörler')

@section('content')
    <div class="col-md-12 card">
        <div class="card-header">
            <a href="{{ route('organizer.create') }}" class="btn btn-primary float-right">Yeni Organizatör Ekle</a>

        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                <tr>
                    <td>#</td>
                    <td>Adı</td>
                    <td>Açıklama</td>
                    <td class="text-center">Yetkili Üyelik</td>
                    <td width="180px" class="text-center">İşlemler</td>
                </tr>
                </thead>
                <tbody>
                @foreach($Organizers as $i => $Organizer)
                    <tr>
                        <td>{{$i+1}}</td>
                        <td>{{$Organizer->name}}</td>
                        <td>{{$Organizer->description}}</td>
                        <td class="text-center">@if($Organizer->user_id != "") <a href="{{ route('user.show',$Organizer->User->id) }}">{{ $Organizer->User->username }}</a> @else <i class="text-danger fas fa-times"></i> @endif</td>
                        <td>
                            <form method="post" action="{{ route('organizer.destroy',$Organizer->id) }}" id="user-delete-{{ $Organizer->id }}" name="user-delete-{{ $Organizer->id }}">
                                @csrf
                                @method('delete')
                                <a href="{{ route('organizer.show',$Organizer->id) }}" class="badge badge-info p-2">İncele</a>
                                <a href="{{ route('organizer.edit',$Organizer->id) }}" class="badge badge-primary p-2">Düzenle</a>
                                <button class="badge badge-danger p-2">Sil</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div>
                {{ $Organizers->links() }}
            </div>
        </div>
    </div>
@stop
