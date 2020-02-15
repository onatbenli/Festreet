@extends('app')

@section('title','Etkinliklerim')

@section('content')
    <div class="container p-6">

        <div class="flex-column md:flex p-6">
            <div class="w-full md:w-1/4 mb-6">
                <div class=" bg-white p-3 shadow-lg rounded">
                    <h3 class="text-3xl font-thin capitalize">@if(Auth::User()->first_name != "") {{ Auth::User()->first_name.' '.Auth::User()->last_name }} @else {{ Auth::User()->username }} @endif</h3>
                    <hr>
                    <ul class="mt-2">
                        <li class="mb-1 uppercase text-xl hover:text-primary-500 transition-color"><a href="{{ route('my.account') }}">Profilim</a></li>
                        <li class="mb-1 uppercase text-xl hover:text-primary-500 transition-color"><a href="{{ route('my.account.favs') }}">Favorilerim</a></li>
                        <li class="mb-1 uppercase text-xl hover:text-primary-500 transition-color"><a href="{{ route('my.account.events') }}">Etkinliklerim</a></li>
                        <li class="mb-1 uppercase text-xl hover:text-primary-500 transition-color"><a href="{{ route('my.account.tickets') }}">Biletlerim</a></li>
                    </ul>

                </div>
            </div>
            <div class="w-full md:w-3/4 ml-6 mr-6">
                <div class="container flex flex-wrap">
                    <h3 class="mx-2 mb-3 border-b border-gray-300 text-xl w-full">Favorilere Eklediğim Etkinlikler</h3>
                    @forelse($Events as $Event)
                        <div class="w-full px-2 rounded mb-6">
                            <div class="w-full shadow-lg rounded relative bg-white">
                                <!-- <div class="absolute right-0 top-0 mt-1 z-10 text-xs rounded-bl transition-bg rounded-tr" style="margin-right: 1px;">
                                    <a href="#" class="p-1 bg-orange-200 rounded-bl">🔥 Popüler</a>
                                    <a href="#" class="p-1 bg-red-200">🔞 Yaş Sınırı</a>
                                    <a href="#" class="p-1 bg-green-200">🎉 İndirimli</a>
                                    <a href="#" class="p-1 bg-blue-200 rounded-tr">Ücretsiz</a>
                                </div> -->

                                <div class="flex border border-gray-200 rounded hover:border-gray-400 transition-border">
                                    <div class="w-full rounded-l md:w-1/3 bg-bottom bg-cover bg-no-repeat shadow-inner"
                                         style="background-image: url(data:image/jpg;base64,{{ $Event->event->poster }})"></div>


                                    <div class="w-full md:w-2/3">
                                        <a class="m-3 text-black font-normal text-lg block" href="{{ url('event/'.$Event->event->slug) }}">
                                            {{ $Event->event->title }}
                                        </a>

                                        <div class="m-3 text-sm text-justify">
                                            {{ Str::limit($Event->event->pre_description,250) }}
                                        </div>
                                        <div class="bg-gray-100 shadow-inner p-2 rounded-b flex text-center items-stretch">
                                            <div class="w-1/2 text-xs border-r">
                                                <span>{{ json_decode($Event->event->date)[0] }}</span>
                                            </div>
                                            <div class="w-1/2 text-xs align-middle self-stretch">
                                                <a href="{{ url('place/'.$Event->event->place->slug)  }}">{{ $Event->event->place->name}}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <message title="Upss !" message="Henüz Etkinliğe Gittiğinizi Belirtmediniz." color="blue"/>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection
