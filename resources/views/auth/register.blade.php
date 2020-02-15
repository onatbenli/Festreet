@extends('app')

@section('title')
    Yeni Hesap Oluştur
@endsection

@section('content')
    <div class="container flex pb-6 mb-6 md:my-6 md:py-6">
        <div class="w-full md:w-1/3 lg:w-1/3 m-auto rounded shadow-lg border border-gray-200 bg-white">
            <h3 class="text-center text-lg py-3 font-bold text-black">Yeni Hesap Oluştur</h3>

            <hr class="border-t mt-1 border-gray-200" />
            <form method="POST" action="{{ route('register') }}" class="p-5">
                @csrf
                <div class="mt-4">
                    <label for="username" class="text-sm text-gray-900">Kullanıcı Adı</label>
                    <my-input name="username" type="text" value="{{ old('username') }}"></my-input>
                    @error('username')
                        <span class="text-red-600 rounded-b text-xs" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <div class="mt-4">
                    <label for="email" class="text-sm text-gray-900">E-posta Adresi</label>
                    <my-input name="email" type="email" value="{{ old('email') }}"></my-input>
                    @error('email')
                        <span class="text-red-600 rounded-b text-xs" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mt-4 flex">
                    <div class="w-1/2 mr-2">
                        <label for="password" class="text-sm text-gray-900">Parola</label>
                        <my-input type="password" name="password" />
                    </div>
                    <div class="w-1/2 ml-2">
                        <label for="password" class="text-sm text-gray-900">Parola ( Onay )</label>
                        <my-input type="password" name="password_confirmation" />
                    </div>
                </div>
                @error('password')
                    <span class="text-red-600 rounded-b text-xs" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <div class="mt-4">
                    <div class="float-right ">
                        <my-button value="Kayıt Ol" class="float-right" />

                    </div>
                    <div class="clearfix"></div>
                </div>
            </form>

            <a href="#" class="text-center block bg-gray-200 text-sm p-2 rounded-b shadow-inner text-gray-700 hover:text-black">
                <font-awesome name="award" class="mr-2"></font-awesome>
                Organizatör Üyeliği Al
            </a>
        </div>
    </div>
@endsection



