@extends('admin.app')

@section('title','Kategori Düzenle')

@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('category.update',$Category->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3 text-right mt-2 text-bold">
                                Kategori Adı :
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" value="{{$Category->category_name}}" name="category_name"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3 text-right mt-2 text-bold">
                                Üst Kategori :
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-12">
                                        <select name="sub_category" class="form-control">
                                            <option selected disabled>Herhangi bir alt kategori değil.</option>
                                            @foreach($Categories as $MainCategory)
                                                <option @if($MainCategory->id == $Category->sub_category) selected @endif value="{{ $MainCategory->id }}">{{ $MainCategory->category_name }}</option>
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
@endsection
