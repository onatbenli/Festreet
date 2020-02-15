@extends('app')

@section('title',$SearchText)

@section('content')
    <div class="container p-6">

        <div class="flex-column md:flex p-6">
            <div class="w-full md:w-1/4 mb-6">
                <div class=" bg-white p-3 shadow-lg rounded">
                    <h3 class="text-2xl font-normal text-black px-2 rounded-t uppercase border-b border-gray-200">{{ $SearchText }}</h3>
                    <ul class="mt-2">
                        <li>
                            Toplam <span class="font-bold">{{ $Events->count() }}</span> Kayıt Bulundu
                        </li>
                    </ul>

                </div>
            </div>
            <div class="w-full md:w-3/4 ml-6 mr-6">
                <div class="container flex flex-wrap">
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
                                             style="background-image: url(data:image/jpg;base64,{{ $Event->poster }})"></div>


                                        <div class="w-full md:w-2/3">
                                            <a class="m-3 text-black font-normal text-lg block" href="{{ url('event/'.$Event->slug) }}">
                                                {{ $Event->title }}
                                            </a>

                                            <div class="m-3 text-sm text-justify">
                                                {{ Str::limit($Event->pre_description,250) }}
                                            </div>
                                            <div class="bg-gray-100 shadow-inner p-2 rounded-b flex text-center items-stretch">
                                                <div class="w-1/2 text-xs border-r">
                                                    <span>{{ json_decode($Event->date)[0] }}</span>
                                                </div>
                                                <div class="w-1/2 text-xs align-middle self-stretch">
                                                    <a href="{{ url('place/'.$Event->place->slug)  }}">{{ $Event->place->name}}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <message title="Upss !" message="Aradığınız Başlıkta Herhangi Bir Etkinlik Yok" color="blue"/>
                        @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    import MyInput from "../../../js/components/MyInput";
    export default {
        components: {MyInput}
    }
</script>
