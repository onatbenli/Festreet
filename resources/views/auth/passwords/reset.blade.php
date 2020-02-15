@extends('app')

@section('content')
    <div class="container flex pb-6 mb-6 md:my-6 md:py-6">
        <div class="w-full md:w-1/3 lg:w-1/3 m-auto rounded shadow-lg border border-gray-200">
            <h3 class="text-center text-lg py-3 font-bold text-black">Şifre Yenileme</h3>
            <hr class="border-t mt-1 border-gray-200" />
            <form method="POST" action="{{ route('password.update') }}" class="p-5">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="mt-4">
                    <label for="email" class="text-sm text-gray-900">E-posta Adresi</label>
                    <input type="email" id="email" name="email" class="p-2 text-sm border border-gray-200 focus:border-gray-400 placeholder-gray-400 @error('email') border-red-400 @enderror rounded block w-full focus:outline-none" placeholder="(eg: name@mail.com)" value="{{ $email ?? old('email') }}" required autocomplete="email"/>
                    @error('email')
                    <span class="text-red-600 rounded-b text-xs" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mt-4 flex">
                    <div class="w-1/2 mr-2">
                        <label for="password" class="text-sm text-gray-900">Şifre</label>
                        <input type="password" id="password" name="password" class="p-2 text-sm border border-gray-200 focus:border-gray-400 @error('password') border-red-400 @enderror placeholder-gray-400 rounded block w-full focus:outline-none" placeholder="(eg: ItIsSecretPassword)"/>
                    </div>
                    <div class="w-1/2 ml-2">
                        <label for="password" class="text-sm text-gray-900">Şifre ( Onay )</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" class="p-2 text-sm border border-gray-200  @error('password') border-red-400 @enderror  focus:border-gray-400 placeholder-gray-400 rounded block w-full focus:outline-none" placeholder="Confirm your password"/>
                    </div>
                </div>
                @error('password')
                <span class="text-red-600 rounded-b text-xs" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <div class="mt-4">
                    <div class="float-right ">
                        <button class="py-2 px-4 bg-primary text-white rounded hover:bg-primary-600 focus:outline-none shadow-lg">
                            Şifre Değiştir
                        </button>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </form>
        </div>
    </div>
@endsection
