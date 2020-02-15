@extends('admin.app')

@section('title','Etkinlik Bilet Fiyatları')

@section('content')
    <div class="col-md-12 card">
        <div class="card-header">
            {{ $Event->title }} <small><small>( {{ json_decode($Event->date)[0].' - '.json_decode($Event->date)[1] }} )</small></small>
            <a href="{{ route('event.ticket.price.new',$Event->id) }}" class="btn btn-primary float-right">Yeni Bilet Ekle</a>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                <tr class="text-bold">
                    <td>#</td>
                    <td>Bilet Kategorisi</td>
                    <td class="text-center">Bilet Ücreti</td>
                    <td class="text-center">Satış Durumu</td>
                    <td class="text-center">Bilet Stok</td>
                    <td class="text-center">Favori</td>
                    <td width="130px" class="text-center">İşlemler</td>
                </tr>
                </thead>
                <tbody>
                    @forelse($EventPrices as $s => $EventPrice)
                        <tr>
                            <td>{{ $s+1 }}</td>
                            <td>{{ $EventPrice->category }}</td>
                            <td class="text-center">{{ number_format($EventPrice->price,2).' '.$EventPrice->currency->icon }}</td>
                            <td class="text-center">{{ $EventPrice->status }}</td>
                            <td class="text-center">@if($EventPrice->stock == "") Stok Girilmemiş @else <b>{{ $EventPrice->stock }}</b> adet @endif</td>
                            <td class="text-center">
                                @if($EventPrice->favorite == 0) <i class="fa fa-times text-danger"></i> @else <i class="fa fa-star text-success"></i> @endif
                            </td>
                            <td>
                                <form method="post" action="{{ route('event.ticket.price.destroy',$EventPrice->id) }}" id="user-delete-{{ $EventPrice->id }}" name="user-delete-{{ $EventPrice->id }}">
                                    @csrf
                                    @method('delete')
                                        <a href="{{ route('event.ticket.price.edit',$EventPrice->id) }}" class="btn btn-sm btn-primary">Düzenle</a>
                                        <button class="btn btn-sm btn-danger">Sil</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr class="alert alert-info">
                            <td colspan="4">Henüz Bilet Fiyatı Eklenmedi</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
