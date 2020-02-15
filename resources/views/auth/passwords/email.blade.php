@extends('app')

@section('content')
    <div>
        <div class="container flex pb-6 mb-6 md:my-6 md:py-6">
            <div class="w-full md:w-1/3 lg:w-1/3 m-auto rounded shadow-lg border border-gray-200">
                <h3 class="text-center text-lg py-3 font-bold text-black">Şifremi Unuttum</h3>
                <hr class="border-t mt-1 border-gray-200" />
                @if (session('status'))
                    <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3" role="alert">
                        <div class="flex">
                            <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                            <div>
                                <p class="font-bold">Şifre Değiştirme Talebi Alındı</p>
                                <p class="text-sm">{{ session('status') }}</p>
                            </div>
                        </div>
                    </div>


                @endif
                <form method="POST" action="{{ route('password.email') }}" class="p-5">
                    @csrf

                    <div>
                        <label for="username" class="text-sm text-gray-900">E-posta Adresiniz</label>
                        <input type="email" id="email" name="email" class="p-2 text-sm border border-gray-200 focus:border-gray-400 placeholder-gray-400 rounded block w-full focus:outline-none" placeholder="" value="{{ old('email') }}" required autocomplete="email" autofocus/>
                        @error('email')
                            <span class="text-red-600 rounded-b text-xs" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mt-4">
                        <div class=" float-right ">
                            <button class="py-2 px-4 bg-primary text-white rounded hover:bg-primary-600 focus:outline-none shadow-lg">
                                Şifre Talep Et
                            </button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
