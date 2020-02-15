@extends('app')

@section('title')
    Giriş Yap
@endsection

@section('content')
    <div class="container flex pb-6 mb-6 md:my-6 md:py-6">
        <div class="w-full md:w-1/3 lg:w-1/3 m-auto rounded shadow-lg border border-gray-200 bg-white">
            <h3 class="text-center text-lg py-3 font-bold text-black">Giriş Yap</h3>

            <hr class="border-t mt-1 border-gray-200" />
            <form method="POST" action="{{ route('login') }}" class="p-5">
                @csrf
                <div>
                    <label for="username" class="text-sm text-gray-900">Kullanıcı Adı veya Eposta</label>
                    <my-input name="username" type="text"></my-input>
                </div>

                <div class="mt-4">
                    <label for="password" class="text-sm text-gray-900">Şifre</label>
                    <my-input name="password" type="password"></my-input>
                </div>

                <div class="mt-4">
                    <div class=" float-right ">
                        <input type="checkbox" name="remember" id="rememberme" class="mr-2"/><label class="text-sm mr-4" for="rememberme">Beni Hatırla</label>
                        <my-button value="Giriş Yap" class="float-right" />
                    </div>
                </div>
            </form>
            <div class="clearfix"></div>
            <div class="flex text-center mt-5 text-sm">
                <div class="w-1/2 border-t border-r border-gray-200 p-2 hover:bg-gray-100 rounded-b">
                    <a href="{{ route('password.request') }}">Şifremi Unuttum</a>
                </div>
                <div class="w-1/2 p-2 border-t border-gray-200 hover:bg-gray-100 rounded-b">
                    <a href="{{ route('register') }}">Yeni Hesap Oluştur</a>
                </div>
            </div>
        </div>
    </div>
@endsection
