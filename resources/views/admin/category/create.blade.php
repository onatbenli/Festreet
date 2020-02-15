@extends('admin.app')

@section('title','Yeni Kategori Ekle')

@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('category.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3 text-right mt-2 text-bold">
                                Kategori Adı :
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" name="category_name"/>
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
                                            @foreach($Categories as $Category)
                                                <option value="{{ $Category->id }}">{{ $Category->category_name }}</option>
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
