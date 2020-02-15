@extends('app')

@section('title')
    Hesabım
@endsection

@section('content')
    <div class="container p-6">
        <div class="flex p-6">
            <div class="w-1/4 ml-6 mr-4 bg-white shadow-lg rounded p-3">
                <h3 class="text-3xl font-thin capitalize">@if(Auth::User()->first_name != "") {{ Auth::User()->first_name.' '.Auth::User()->last_name }} @else {{ Auth::User()->username }} @endif</h3>
                <hr>
                <ul class="mt-2">
                    <li class="mb-1 uppercase text-xl hover:text-primary-500 transition-color"><a href="{{ route('my.account') }}">Profilim</a></li>
                    <li class="mb-1 uppercase text-xl hover:text-primary-500 transition-color"><a href="{{ route('my.account.favs') }}">Favorilerim</a></li>
                    <li class="mb-1 uppercase text-xl hover:text-primary-500 transition-color"><a href="{{ route('my.account.events') }}">Etkinliklerim</a></li>
                    <li class="mb-1 uppercase text-xl hover:text-primary-500 transition-color"><a href="{{ route('my.account.tickets') }}">Biletlerim <small><small><small>(Yakında)</small></small></small></a></li>
                </ul>
            </div>

            <div class="w-3/4 mr-6 ml-4 p-3 bg-white shadow-lg rounded">
                <h3 class="text-3xl font-thin text-black px-2 rounded-t uppercase">profilim</h3>
                <hr>
                <div class="container">
                    <form action="{{ route('my.account.edit') }}" class="flex" method="post">
                        @csrf
                        <div class="w-1/2 mr-5 p-2">
                            <div class="flex">
                                <div class="w-1/2 mr-3">
                                    <div class="mt-4">
                                        <label for="first_name" class="text-sm text-gray-900">Adı</label>
                                        <my-input type="text" name="first_name" value="{{ Auth::User()->first_name }}" autofocus />
                                        @error('first_name')
                                            <span class="text-red-600 rounded-b text-xs" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="w-1/2 ml-3">
                                    <div class="mt-4">
                                        <label for="last_name" class="text-sm text-gray-900">Soyadı</label>
                                        <my-input name="last_name" type="text" value="{{ Auth::User()->last_name }}" />
                                        @error('last_name')
                                            <span class="text-red-600 rounded-b text-xs" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4">
                                <label for="email" class="text-sm text-gray-900">E-posta Adresi <span class="text-red-600">*</span></label>
                                <my-input type="email" name="email" value="{{ Auth::User()->email }}" />
                                    @error('email')
                                    <span class="text-red-600 rounded-b text-xs" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>

                        </div>

                        <div class="w-1/2 ml-5 p-2">
                            <div class="mt-4">
                                <label for="username" class="text-sm text-gray-900">Kullanıcı Adı <span class="text-red-600">*</span></label>
                                <my-input name="username" type="text" value="{{ Auth::User()->username }}"/>
                                    @error('username')
                                        <span class="text-red-600 rounded-b text-xs" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>

                            <div class="mt-4">
                                <label for="birthday" class="text-sm text-gray-900">Doğum Tarihi</label>
                                <my-input type="text" name="birthday" value="{{ Auth::User()->birthday }}" />
                            </div>

                            <div class="mt-4">
                                <my-button value="Kaydet" class="float-right" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
<script>
    import MyInput from "../../../js/components/MyInput";
    export default {
        components: {MyInput}
    }
</script>
